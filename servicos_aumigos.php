<?php
    session_start();
    date_default_timezone_set('America/Sao_paulo');
    require('conexao.php');

    $id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/servicos_.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <title>PetQuery - Agendamento de serviços</title>
</head>
<body>
    
    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <h3 class="mx-auto" style="color: #fff; font-weight: 600">Serviços</h3>
        </div>
    </nav>

    <!-- seleção de pet -->
    
    <div class="container-fluid">
        <div class="row mt-4 ms-2">
            <a href="escolha_pet_agend.php" style="text-decoration: none;"><span><img src="img/retornar.png" alt="seta de retorno" class="me-2" style="width: 35px; float: left"><h5 class="mt-1" style="color: #0D51AA; font-weight: 600">Voltar</h6></span></a>
        </div>
    </div>

    <div class="container mt-5">

        
            <div class="row mb-4">
                <div class="col-lg-3 mb-4">
                    <label for="select_servicos" class="mb-2" style="font-weight: 600">Serviço</label><br>
                    <select class="form-control" name="select_servicos" id="select_servicos" style="border-color: #0D51AA" required>
                        <option value="Passeio pet">Passeio pet</option>
                        <option value="Hospedagem pet">Hospedagem pet</option>
                        <option value="Creche pet">Creche pet</option>
                        <option value="Adestramento">Adestramento</option>
                    </select>
                </div>

                <div class="col-lg-5 mb-4">
                    <label for="endereco_servicos" class="mb-2" style="font-weight: 600">Região</label><br>
                    <select name="regiao" class="form-control" style="border-color: #0D51AA" id="regiao">
                        <option value="" disabled selected required>Escolha sua região</option>
                        <option value="Norte">Norte</option>
                        <option value="Oeste">Oeste</option>
                        <option value="Centro">Centro</option>
                        <option value="Leste">Leste</option>
                        <option value="Sul">Sul</option>
                    </select>
                </div>

                <div class="col-lg-2 mb-4">
                    <label for="entrada_servicos" class="mb-2" style="font-weight: 600">Entrada</label><br>
                    <input type="date" class="form-control" onkeydown="return false" min="<?php echo date('Y-m-d'); ?>" id="entrada_servicos" style="border-color: #0D51AA" required>
                </div>

                <div class="col-lg-2 mb-4">
                    <label for="saida_servicos" class="mb-2" style="font-weight: 600">Saída</label><br>
                    <input type="date" class="form-control" onkeydown="return false" min="<?php echo date('Y-m-d'); ?>"  id="saida_servicos" style="border-color: #0D51AA" required>
                </div>
            </div>

        <!-- seleção de aumigo -->

        <div class="row text-center">
            <h3 style="color: #0D51AA; font-weight: 600">Aumigos Recomendados</h3>
        </div>\

        <?php

            $sql = "SELECT id_amg_rec, nome, sobrenome, funcao, link, valor, bairro, cidade, numero, uf, cep FROM amigos_rec INNER JOIN endereco_amigos ON amigos_rec.id_amg_rec = endereco_amigos.fk_amg_end ORDER BY id_amg_rec ASC";

            $result = $mysqli->query($sql);

            while ($row = mysqli_fetch_assoc($result)){

        echo "<div class='container mt-5 mb-5' id='cont_aumigos' style='width: 850px'>";
        echo "<div class='row p-5' style='border: 1px solid #0D51AA; border-radius: 10px'>";

        echo "<div class='col-md-2' id='foto_aumigo'>";
        echo "<img src='img/aumigo.png' alt='imagem de aumigo' style='width: 90px'>";
        echo "</div>";

        echo "<div class='col-md-6 mt-4 mb-3'>";
        echo "<p class='ms-2' id='nome_aumigo' style='font-weight: 600; font-size: 20px'>".$row['nome'] . " " . $row['sobrenome'] . "</p>";
        echo "<small class='ms-2' id='nome_aumigo' style='font-weight: 600; font-size: 16px; color: gray'>".$row['funcao'] . "</small><br>";
        echo "<small class='ms-2' id='nome_aumigo' style='font-weight: 600; font-size: 16px; color: lightgray'>".$row['cep'] . " - " . $row['bairro'] . ", " . $row['cidade'] . " - " . $row['uf'] . ", " . $row['numero'] . "</small>";
        echo "</div>";

        echo "<div class='col-md-4 text-end mt-2' id='preco'>";
        echo "<span><small style='font-weight: 600; font-size: 28px'>R$ ".$row['valor']."</small><br><small style='font-weight: 600; font-size: 20px' class='form-text'>p/ noite</small></span>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        }

    ?>


</body>
</html>