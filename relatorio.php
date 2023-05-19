<?php

include('protect_seg.php');
require('conexao.php');

$data_escolhida=(filter_input(INPUT_POST, 'data_escolhida', FILTER_SANITIZE_STRING));

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/paineis.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <title>PetQuery - Relatório</title>
</head>
<body style="background-color: #fff">
            
    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <a class="navbar-brand" href="logout.php"><img src="img/logout.png" style="width: 45px" alt="icone de logout"></a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mt-4 ms-2">
            <a href="<?php if(isset($_SESSION['fun'])){echo 'relatorio_data.php';} else if(isset($_SESSION['adm'])){echo 'relatorio_data.php';} else{echo'login.php';}?>" style="text-decoration: none;"><span><img src="img/retornar.png" alt="seta de retorno" class="me-2" style="width: 35px; float: left"><h5 class="mt-1" style="color: #0D51AA; font-weight: 600">Voltar</h6></span></a>
        </div>
    </div>

<div class="container-fluid mt-5 mb-5">
    <div class="container">
        <div class="row text-center">
    <?php
                $query_item = "SELECT COUNT(ID_AGED_CLST) AS qnt_agend FROM servicos WHERE data_servicos='$data_escolhida'";
                $result_item = mysqli_query($mysqli, $query_item);
                $row_item = mysqli_fetch_assoc($result_item);

                $results = mysqli_query($mysqli, "SELECT sum(valor) FROM servicos WHERE data_servicos = '$data_escolhida'");
                

                if($row_item['qnt_agend'] == 0){
                    echo "<div class='mb-5'>";
                        echo "<h6 style='font-weight: 600'>Nenhum serviço agendado.</h6>";
                    echo "</div>";
                } else{
                    echo "<div class='mb-5'>";
                        echo "<h6 style='font-weight: 600'>Quantidade de serviços agendados: " . $row_item['qnt_agend'] . "</h6>";
                        while ($rows = mysqli_fetch_array($results)){
                            echo "<h6 class='mt-5' style='font-weight: 600'>Valor total dos serviços: " . $rows['sum(valor)'] . "</h6>";
                        }
                    echo "</div>";
                }

            ?>

        </div>
        <div class="row justify-content-center">
        <?php

        $sql = "SELECT serviço, id_aged_clst, nome_pet, nome, sobrenome, data_servicos, horario, valor FROM servicos INNER JOIN PET ON pet.id_pet = servicos.fk_pet_age INNER JOIN CLIENTE ON cliente.id_cliente = pet.fk_pet_cli WHERE data_servicos='$data_escolhida' ORDER BY id_aged_clst ASC ";

        $result = $mysqli->query($sql);

        while ($row = mysqli_fetch_assoc($result)){
            echo "<div class='col-lg-3'>";
                echo "<div class='card agend p-3' style='border-radius: 20px; margin: 0 auto'>";
                    echo "<div class='card-body'>";
                        echo "<h5 class='card-title mb-4 nome-func'>".$row['serviço']."</h5>";
                        echo "<p class='card-text' style='font-weight: 600'>ID: <span style='font-weight: 300' class='card-text'>".$row['id_aged_clst']."</span></p>";
                        echo "<p class='card-text' style='font-weight: 600'>Pet: <span style='font-weight: 300' class='card-text'>".$row['nome_pet']."</span></p>";
                        echo "<p class='card-text' style='font-weight: 600'>Dono: <span style='font-weight: 300' class='card-text'>".$row['nome']. " " .$row['sobrenome']."</span></p>";
                        echo "<h6 class='card-text mb-3' style='font-weight: 600'>Data: <span style='font-weight: 300' class='card-text'>".$row['data_servicos']."</span></h6>";
                        echo "<p class='card-text' style='font-weight: 600'>Horário: <span style='font-weight: 300' class='card-text'> ".$row['horario']."</span></p>";
                        echo "<p class='card-text' style='font-weight: 600'>Valor: <span style='font-weight: 300' class='card-text'> ".$row['valor']."</span></p>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
        ?>
            </div> 
        </div>
    </div>
</div>

</body>
</html>