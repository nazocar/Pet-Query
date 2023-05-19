<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/perfil_cli_dados.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <title>Perfil</title>
</head>
<body>
    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <span><img src="img/cadeado.png" class="me-5" alt="icone de cadeado" style="width: 5vh;"></span>
        </div>
    </nav>

    <?php 
    session_start();
    include_once('conexao.php');
    if(isset($_SESSION['id']) == false){
        header("Location: login.php");
    }else{
        $id = $_SESSION['id'];
        $tabela = $_SESSION['tabela'];
        $resultado_cli = mysqli_query($mysqli,"SELECT * FROM $tabela WHERE ID_CLIENTE = '$id'");
        while ($row = mysqli_fetch_assoc($resultado_cli)){
            $nome = $row['NOME'];
            $sobrenome = $row['SOBRENOME'];
            $cpf = $row['CPF'];
            $email = $row['EMAIL'];
            $ddd = $row['DDD'];
            $telefone = $row['TELEFONE'];
            $data = $row['DATA_NASCIMENTO'];
        }
        $_SESSION['nome_perfil'] = $nome;
    }
    ?>

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Fechar &times;</button>
        <label for="nome_cliente" class="mt-3 ms-3 mb-3" style="color: #000000; font-weight: 700; font-size: 20px">Olá, <?php echo $nome ?></label>
        <a href="perfil_cli.php" class="w3-bar-item w3-button">
            <label for="dados" style="color: #000000; font-weight: 600;">Dados</label><br>
            <label for="dados" style="color: #808080; font-weight: 500;">Meus dados</label>
        </a>
        <a href="perfil_cli_end.php" class="w3-bar-item w3-button">
            <label for="end" style="color: #000000; font-weight: 600;">Endereços</label><br>
            <label for="end" style="color: #808080; font-weight: 500;">Meus endereços</label>
        </a>
        <a href="perfil_cli_seg.php" class="w3-bar-item w3-button">
            <label for="seguranca" style="color: #000000; font-weight: 600;">Segurança</label><br>
            <label for="seguranca" style="color: #808080; font-weight: 500;">Altere sua senha</label>
        </a>
        <a href="perfil_cli_pets.php" class="w3-bar-item w3-button">
            <label for="pets" style="color: #000000; font-weight: 600;">Pets</label><br>
            <label for="pets" style="color: #808080; font-weight: 500;">Meus pets cadastrados</label>
        </a>
      </div>
      
      <div class="w3-main" style="margin-left:200px">
      <div class="nav-item">
        <button class="w3-button burguer-teal w3-xlarge w3-hide-large" style="color: #fff ; background-color: #A7C8F2;" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
          <h1>Meus pets</h1>
        </div>
      </div>
      
      <div class="w3-container">
        <p style="color: #808080; font-weight: 500;">Mantenha os dados de seus pets sempre atualizados para ter uma melhor experiência com a PetQuery</p>
        <?php if(isset($_SESSION['editpet'])){echo $_SESSION['editpet'];unset($_SESSION['editpet']);}?>

            <div class="row">
                <?php

            $sql = "SELECT id_pet, id_cliente, nome_pet, pet, raca, cor, peso, data_nascimento_pet, sexo, nome, sobrenome FROM PET INNER JOIN CLIENTE ON cliente.id_cliente = pet.fk_pet_cli ORDER BY id_pet ASC";

            $result = $mysqli->query($sql);

            while ($row = mysqli_fetch_assoc($result)){
            echo "<div class='card mb-5 mt-2 ms-2' style='max-width: 440px; border-radius: 10px'>";
            echo "<div class='row g-0'>";
            echo "<div class='col-sm-3 text-center p-4'>";
            echo "<button data-bs-toggle='modal' data-bs-target='#editanimal".$row['id_pet']."' style='border: none; outline: none; background-color: #fff'><img src='img/pata.png' class='rounded-circle' alt='icone de pata'></button>";
            echo "</div>";
            echo "<div class='col-sm-9 p-4'>";
            echo "<div id='card' class='card-body'>";
            echo "<h5 class='card-text' style='font-weight: 600; color: #0D51AA'>".$row['nome_pet']."</h5>"; 
            echo "<h6 class='card-text' style='font-weight: 600; color: #A7C8F2'>".$row['raca']."</h6>";               
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            echo "<div class='modal fade' id='editanimal".$row['id_pet']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo    "<div class='modal-content'>";
                echo    "<div class='modal-header'>";
                echo        "<h5 class='modal-title' id='exampleModalLabel'>Edição de pet</h5>";
                echo        "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo    "</div>";
                echo    "<div class='modal-body'>";
                echo        "<form method='POST' action='proc_edit_pet.php'>";

                echo        "<input type='hidden' name='id_pet' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['id_pet']. "'>";

                echo        "<input type='hidden' name='id_cliente' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['id_cliente']. "'>";

                echo        "<label for='nome' class='mb-1' style='font-weight: 600;'>Nome do pet</label><br>";
                echo        "<input type='text' name='nome' minlength='1' maxlength='200' class='form-control mb-3' value='".$row['nome_pet']. "' required>";

                echo        "<label for='pet' class='mb-1' style='font-weight: 600;'>Tipo do pet</label><br>";
                echo        "<input type='text' name='pet' minlength='1' maxlength='30' class='form-control mb-3' value='".$row['pet']. "' required>";

                echo        "<label for='raca' class='mb-1' style='font-weight: 600;'>Raça</label><br>";
                echo        "<input type='text' name='raca' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['raca']. "' required>";

                echo        "<label for='sexo' class='mb-1' style='font-weight: 600;'>Sexo</label><br>";
                echo        "<input type='text' name='sexo' minlength='1' maxlength='1' class='form-control mb-3' value='".$row['sexo']. "' required>";

                echo        "<label for='peso' class='mb-1' style='font-weight: 600;'>Peso</label><br>";
                echo        "<input type='number' name='peso' min='0' max='500' class='form-control mb-3' value='".$row['peso']. "' required>";

                echo        "<label for='cor' class='mb-1' style='font-weight: 600;'>Cor</label><br>";
                echo        "<input type='text' name='cor' pattern='[a-zA-z]{1-20}' minlength='1' maxlength='20' class='form-control mb-3' value='".$row['cor']. "' required>";

                echo    "</div>";
                echo    "<div class='modal-footer'>";
                echo        "<button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancelar</button>";
                echo        "<button type='submit' class='btn btn-success'>Salvar alterações</button>";
                echo    "</div>";
                echo    "</div>";
                echo    "</form>";
                echo "</div>";
                echo "</div>";

                echo "<div class='modal fade' id='apagapet".$row['id_pet']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo    "<div class='modal-content'>";
                echo    "<div class='modal-header'>";
                echo        "<h5 class='modal-title' id='exampleModalLabel'>Exclusão de animal</h5>";
                echo        "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo    "</div>";
                echo    "<div class='modal-body'>";
                echo    "<form method='POST' action='proc_apaga_pet.php'>";
                echo        "<input type='hidden' name='id_pet' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['id_pet']. "'>";
                echo    "<h5>Você tem certeza de que deseja excluir esse animal?</h5>";
                echo    "</div>";
                echo    "<div class='modal-footer'>";
                echo        "<button type='button' class='btn btn-success' data-bs-dismiss='modal'>Cancelar</button>";
                echo        "<button type='submit' class='btn btn-danger'>Confirmar exclusão</button>";
                echo    "</div>";
                echo    "</div>";
                echo    "</form>";
                echo "</div>";
                echo "</div>";
            }

            ?>
            
            <br>

            <div class="row">
                </div>
            </div>

        <a href="cadastro_pet.php"><button id="novo" class="p-2" style="border: 1px solid #518CD7; background-color: #fff; border-radius: 5px; color: #0D51AA; width: 440px; font-weight: 600">Cadastrar novo pet</button></a>
      
      </div>
      
      <script>
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
      }
      
      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
      }
      </script>

    
        <!--<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%; margin-left: 15%">
            <h3 class="w3-bar-item">Minha Conta</h3>
            <a href="dados_cli.php">
                <label for="dados" style="color: #000000; font-weight: 600; font-size: 20px">Ola, fulano</label><br>
                <label for="dados" style="color: #808080; font-weight: 500; font-size: 20px">Meus dados</label>
            </a>
            <hr>
            <a href="end_cadastrado.php">
                <label for="endereco" style="color: #000000; font-weight: 600; font-size: 20px">Endereços</label><br>
                <label for="endereco" style="color: #808080; font-weight: 500; font-size: 20px">Meus endereços</label>
            </a>
            <hr>
            <a href="seguranca.php">
                <label for="seguranca" style="color: #000000; font-weight: 600; font-size: 20px">Segurança</label><br>
                <label for="seguranca" style="color: #808080; font-weight: 500; font-size: 20px">Altere sua senha</label>
            </a>
            <hr>
            <a href="pets_cadastrados.php">
                <label for="pets" style="color: #000000; font-weight: 600; font-size: 20px">Pets</label><br>
                <label for="pets" style="color: #808080; font-weight: 500; font-size: 20px">Meus pets cadastrados</label>
            </a>
            <div style="margin-left:25%">
            
            <div class="w3-container w3-teal">
             <h1 style="margin-top: -25%; margin-left: 25%">Minha Conta</h1>
             <img src="img/icons/usuario.png" alt="Car" style="width:200px; margin-top: 1%; margin-left: 25%; border-radius: 150px">
            </div>
            
            
            
            
            
            </div>
          </div> -->
          
          <!-- Page Content -->
    </div>
</body>
</html>