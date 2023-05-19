<?php
session_start();
include('protect_func.php');
require('conexao.php');

$id=$_SESSION['id'];


$consult_nome = "SELECT nome from funcionario inner join login_funcionario on fk_fun_log = id_login_funcionario
WHERE id_funcionario = '$id'";

$result_nome = mysqli_query($mysqli,$consult_nome);
$nome = mysqli_fetch_assoc($result_nome);

$data_agend = date('Y-m-d');
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
    <script src="js/painel_fun.js"></script>
    <title>PetQuery - Painel de funcionário</title>
</head>
<body style="background-color: #fff">
            
    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <a class="navbar-brand" href="logout.php"><img src="img/logout.png" style="width: 45px" alt="icone de logout"></a>
        </div>
    </nav>

<div class="container-fluid text-center">
    <div class="container">
        <div class="row mt-5">
            <h5 style="color: #0D51AA">Bem-vindo ao Painel de controle,  <?php echo $nome['nome']; ?>!</h5>
            <?php if(isset($_SESSION['edit'])){echo $_SESSION['edit'];unset($_SESSION['edit']);}?>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <a href="cadastro_cli.php"><button class="mb-4" id="cadus" style="color: #0D51AA; background-color: #fff; border: 1px solid #518CD7; font-weight: 600; border-radius: 25px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; width: 190px">Cadastrar usuários</button></a>
            </div>

            <div class="col-md">
                <button onclick="cli()" class="mb-4" id="listus" style="color: #0D51AA; background-color: #fff; border: 1px solid #518CD7; font-weight: 600; border-radius: 25px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; width: 190px">Listar usuários</button>
            </div>

            <div class="col-md">
                <button onclick="ani()" class="mb-4" id="listani" style="color: #0D51AA; background-color: #fff; border: 1px solid #518CD7; font-weight: 600; border-radius: 25px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; width: 190px">Listar animais</button>
            </div>

            <div class="col-md">
                <button onclick="agend()" class="mb-4" id="agend" style="color: #0D51AA; background-color: #fff; border: 1px solid #518CD7; font-weight: 600; border-radius: 25px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px; width: 190px">Agendamentos</button>
            </div>
        </div>
    </div>
</div>


<!-- lista de clientes -->

<div class="container-fluid mt-5 mb-5" id="list_cli" style="display: none">
    <div class="container">
    <div class="row text-center">
    <?php
                $query_item = "SELECT COUNT(id_cliente) AS qnt_cli FROM cliente";
                $result_item = mysqli_query($mysqli, $query_item);
                $row_item = mysqli_fetch_assoc($result_item);

                echo "<div class='mb-5'>";
                    echo "<h6 style='font-weight: 600'>Quantidade de usuários registrados: " . $row_item['qnt_cli'] . "</h6>";
                echo "</div>";
            ?>
            <div class="search-wrapper mb-5">
                <input type="search" onkeyup="searchcli()" placeholder="Pesquise algo..." style="width: 50%; border-radius: 15px; border: 1px solid #a9a9a9; padding: 5px; padding-left: 10px" id="searchcli">
            </div>
        </div>
        <div class="row justify-content-center">
            <?php

            $sql = "SELECT id_cliente, sobrenome, nome, cpf, ddd, telefone, email, data_nascimento, bairro, cep, complemento, logadouro, numero, uf, cidade, id_endereco_cliente, id_login_cliente FROM cliente INNER JOIN endereco_cliente ON cliente.id_cliente = endereco_cliente.fk_cli_end INNER JOIN login_cliente on cliente.id_cliente = login_cliente.fk_cli_log ORDER BY id_cliente ASC";

            $result = $mysqli->query($sql);

            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='col-lg-3'>";
                    echo "<div class='card cli mb-4' style='border-radius: 20px; margin: 0 auto'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title mb-4 nome-func'>".$row['nome'] . " " . $row['sobrenome']."</h5>";
                            echo "<p class='card-text' style='font-weight: 600'>ID: <span style='font-weight: 300' class='card-text'>".$row['id_cliente']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>CPF: <span style='font-weight: 300' class='card-text'>".$row['cpf']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>E-mail: <span style='font-weight: 300' class='card-text'>".$row['email']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Telefone: <span style='font-weight: 300' class='card-text'> (".$row['ddd'].")". " " . $row['telefone']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Endereço: <span style='font-weight: 300' class='card-text'> ".$row['cep']. " - " .$row['logadouro']. ", " . $row['numero']. " - " . $row['bairro'] . ", " . $row['cidade'] . " - " . $row['uf'] . ", " . $row['complemento'] ."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Nascimento: <span style='font-weight: 300' class='card-text'>".$row['data_nascimento']."</span></p>";
                            echo "<a href='#' data-bs-toggle='modal' data-bs-target='#editcliente".$row['id_cliente']."' class='btn btn-success mb-2 mt-3'>Editar</a><a href='#' data-bs-toggle='modal' data-bs-target='#apagacli".$row['id_cliente']."' class='btn btn-danger ms-3 mb-2 mt-3'>Excluir</a>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";

                echo "<div class='modal fade' id='editcliente".$row['id_cliente']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo    "<div class='modal-content'>";
                echo    "<div class='modal-header'>";
                echo        "<h5 class='modal-title' id='exampleModalLabel'>Edição de usuário</h5>";
                echo        "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo    "</div>";
                echo    "<div class='modal-body'>";
                echo        "<form method='POST' action='proc_edit_cli.php'>";

                echo        "<input type='hidden' name='id' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['id_cliente']. "'>";

                echo        "<input type='hidden' name='id_end_cli' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['id_endereco_cliente']. "'>";

                echo        "<input type='hidden' name='id_login_cli' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['id_login_cliente']. "'>";

                echo        "<label for='nome' class='mb-1' style='font-weight: 600;'>Nome</label><br>";
                echo        "<input type='text' name='nome' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['nome']. "' required>";

                echo        "<label for='sobrenome' class='mb-1' style='font-weight: 600;'>Sobrenome</label><br>";
                echo        "<input type='text' name='sobrenome' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['sobrenome']. "' required>";

                echo        "<label for='cpf' class='mb-1' style='font-weight: 600;'>CPF</label><br>";
                echo        "<input type='text' name='cpf' minlength='11' maxlength='11' pattern='[0-9]{11}' class='form-control mb-3' value='".$row['cpf']. "' required>";

                echo        "<label for='email' class='mb-1' style='font-weight: 600;'>E-mail</label><br>";
                echo        "<input type='mail' name='email' minlength='1' maxlength='250' class='form-control mb-3' value='".$row['email']. "' required>";

                echo        "<label for='ddd' class='mb-1' style='font-weight: 600;'>DDD</label><br>";
                echo        "<input type='number' name='ddd' min='11' max='99' class='form-control mb-3' value='".$row['ddd']. "' required>";

                echo        "<label for='telefone' class='mb-1' style='font-weight: 600;'>Telefone</label><br>";
                echo        "<input type='text' name='telefone' minlength='8' maxlength='9' pattern='[0-9]{8-9}' class='form-control mb-3' value='".$row['telefone']. "' required>";

                echo        "<label for='cep' class='mb-1' style='font-weight: 600;'>CEP</label><br>";
                echo        "<input type='text' minlength='8' maxlength='8' pattern='[0-9]{8}' name='cep' class='form-control mb-3' value='".$row['cep']. "' required>";

                echo        "<label for='logradouro' class='mb-1' style='font-weight: 600;'>Logradouro</label><br>";
                echo        "<input type='text' name='logradouro' minlength='1' maxlength='250' class='form-control mb-3' value='".$row['logadouro']. "' required>";

                echo        "<label for='numero' class='mb-1' style='font-weight: 600;'>Número</label><br>";
                echo        "<input type='number' name='numero' minlength='1' maxlength='6' class='form-control mb-3' value='".$row['numero']. "' required>";

                echo        "<label for='bairro' class='mb-1' style='font-weight: 600;'>Bairro</label><br>";
                echo        "<input type='text' name='bairro' minlength='1' maxlength='250' class='form-control mb-3' value='".$row['bairro']. "' required>";

                echo        "<label for='cidade' class='mb-1' style='font-weight: 600;'>Cidade</label><br>";
                echo        "<input type='text' name='cidade' minlength='1' maxlength='250' class='form-control mb-3' value='".$row['cidade']. "' required>";

                echo        "<label for='uf' class='mb-1' style='font-weight: 600;'>UF</label><br>";
                echo        "<input type='text' name='uf' pattern='[A-Za-z]{2}' class='form-control mb-3' value='".$row['uf']. "' required>";

                echo        "<label for='complemento' class='mb-1' style='font-weight: 600;'>Complemento</label><br>";
                echo        "<input type='text' name='complemento' minlength='1' maxlength='50' class='form-control mb-3' value='".$row['complemento']. "' required>";

                echo    "</div>";
                echo    "<div class='modal-footer'>";
                echo        "<button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancelar</button>";
                echo        "<button type='submit' class='btn btn-success'>Salvar alterações</button>";
                echo    "</div>";
                echo    "</div>";
                echo    "</form>";
                echo "</div>";
                echo "</div>";

                echo "<div class='modal fade' id='apagacli".$row['id_cliente']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo    "<div class='modal-content'>";
                echo    "<div class='modal-header'>";
                echo        "<h5 class='modal-title' id='exampleModalLabel'>Exclusão de cliente</h5>";
                echo        "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo    "</div>";
                echo    "<div class='modal-body'>";
                echo    "<form method='POST' action='proc_apaga_cli.php'>";
                echo        "<input type='hidden' name='id_cli' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['id_cliente']. "'>";
                echo    "<h5>Você tem certeza de que deseja excluir esse cliente?</h5>";
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
            <!-- Modal -->
        <div class="row mt-5 text-center">
            <p id="noresultcli"></p>
        </div>
        </div>
    </div>
</div>

<!-- lista de animais -->

<div class="container-fluid mt-5 mb-5" id="list_ani" style="display: none">
    <div class="container">
    <div class="row text-center">
    <?php
                $query_item = "SELECT COUNT(id_pet) AS qnt_pet FROM pet";
                $result_item = mysqli_query($mysqli, $query_item);
                $row_item = mysqli_fetch_assoc($result_item);

                echo "<div class='mb-5'>";
                    echo "<h6 style='font-weight: 600'>Quantidade de animais registrados: " . $row_item['qnt_pet'] . "</h6>";
                echo "</div>";
            ?>
            <div class="search-wrapper mb-5">
                <input type="search" onkeyup="searchani()" placeholder="Pesquise algo..." style="width: 50%; border-radius: 15px; border: 1px solid #a9a9a9; padding: 5px; padding-left: 10px" id="searchani">
            </div>
        </div>
        <div class="row justify-content-center">
            <?php

            $sql = "SELECT id_pet, id_cliente, nome_pet, pet, raca, cor, peso, data_nascimento_pet, sexo, nome, sobrenome FROM PET INNER JOIN CLIENTE ON cliente.id_cliente = pet.fk_pet_cli ORDER BY id_pet ASC";

            $result = $mysqli->query($sql);

            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='col-lg-3'>";
                    echo "<div class='card ani mb-4' style='border-radius: 20px; margin: 0 auto'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title mb-4 nome-func'>".$row['nome_pet']."</h5>";
                            echo "<p class='card-text' style='font-weight: 600'>ID: <span style='font-weight: 300' class='card-text'>".$row['id_pet']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Tipo: <span style='font-weight: 300' class='card-text'>".$row['pet']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Raça: <span style='font-weight: 300' class='card-text'>".$row['raca']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Sexo: <span style='font-weight: 300' class='card-text'>".$row['sexo']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Peso: <span style='font-weight: 300' class='card-text'> ".$row['peso']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Cor: <span style='font-weight: 300' class='card-text'> ".$row['cor']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Nascimento: <span style='font-weight: 300' class='card-text'>".$row['data_nascimento_pet']."</span></p>";
                            echo "<p class='card-text' style='font-weight: 600'>Dono: <span style='font-weight: 300' class='card-text'> ".$row['nome']." ".$row['sobrenome']."</span></p>";
                            echo "<a href='#' data-bs-toggle='modal' data-bs-target='#editanimal".$row['id_pet']."' class='btn btn-success mb-2 mt-3'>Editar</a><a href='#' data-bs-toggle='modal' data-bs-target='#apagapet".$row['id_pet']."' class='btn btn-danger ms-3 mb-2 mt-3'>Excluir</a>";
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
            <div class="row mt-5 text-center">
            <p id="noresultani"></p>
        </div>
        </div>
    </div>
</div>

<!-- lista de agendamentos -->

<div class="container-fluid mt-5 mb-5" id="list_agend" style="display: none">
    <div class="container">
    <div class="row text-center">
    <?php
                $query_item = "SELECT COUNT(ID_AGED_CLST) AS qnt_agend FROM servicos";
                $result_item = mysqli_query($mysqli, $query_item);
                $row_item = mysqli_fetch_assoc($result_item);

                echo "<div class='mb-5'>";
                    echo "<h6 style='font-weight: 600'>Quantidade de serviços agendados: " . $row_item['qnt_agend'] . "</h6>";
                echo "</div>";
            ?>
            <div class="search-wrapper mb-5">
                <input type="search" onkeyup="searchagend()" placeholder="Pesquise algo..." style="width: 50%; border-radius: 15px; border: 1px solid #a9a9a9; padding: 5px; padding-left: 10px" id="searchagend">
            </div>
        </div>
        <div class="row justify-content-center">
        <?php

        $sql = "SELECT serviço, id_aged_clst, nome_pet, nome, sobrenome, data_servicos, horario, valor FROM servicos INNER JOIN PET ON pet.id_pet = servicos.fk_pet_age INNER JOIN CLIENTE ON cliente.id_cliente = pet.fk_pet_cli ORDER BY id_aged_clst ASC";

        $result = $mysqli->query($sql);

        while ($row = mysqli_fetch_assoc($result)){
            echo "<div class='col-lg-3'>";
                echo "<div class='card agend mb-4' style='border-radius: 20px; margin: 0 auto'>";
                    echo "<div class='card-body'>";
                        echo "<h5 class='card-title mb-4 nome-func'>".$row['serviço']."</h5>";
                        echo "<p class='card-text' style='font-weight: 600'>ID: <span style='font-weight: 300' class='card-text'>".$row['id_aged_clst']."</span></p>";
                        echo "<p class='card-text' style='font-weight: 600'>Pet: <span style='font-weight: 300' class='card-text'>".$row['nome_pet']."</span></p>";
                        echo "<p class='card-text' style='font-weight: 600'>Dono: <span style='font-weight: 300' class='card-text'>".$row['nome']. " " .$row['sobrenome']."</span></p>";
                        echo "<h6 class='card-text mb-3' style='font-weight: 600'>Data: <span style='font-weight: 300' class='card-text'>".$row['data_servicos']."</span></h6>";
                        echo "<p class='card-text' style='font-weight: 600'>Horário: <span style='font-weight: 300' class='card-text'> ".$row['horario']."</span></p>";
                        echo "<p class='card-text' style='font-weight: 600'>Valor: <span style='font-weight: 300' class='card-text'> ".$row['valor']."</span></p>";
                        echo "<a href='#' data-bs-toggle='modal' data-bs-target='#editaged".$row['id_aged_clst']."' class='btn btn-success mb-2 mt-3'>Editar</a><a href='#' data-bs-toggle='modal' data-bs-target='#apagaaged".$row['id_aged_clst']."' class='btn btn-danger ms-3 mb-2 mt-3'>Excluir</a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";

            $hora_agend = $row['horario'];

            echo "<div class='modal fade' id='editaged".$row['id_aged_clst']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo    "<div class='modal-content'>";
                echo    "<div class='modal-header'>";
                echo        "<h5 class='modal-title' id='exampleModalLabel'>Edição de pet</h5>";
                echo        "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo    "</div>";
                echo    "<div class='modal-body'>";
                echo        "<form method='POST' action='proc_edit_aged.php'>";

                echo        "<input type='hidden' name='id_aged' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['id_aged_clst']. "'>";

                echo        "<label for='data' class='mb-1' style='font-weight: 600;'>Data</label><br>";
                echo        "<input type='date' name='data' onkeydown='return false' min='".$data_agend."' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['data_servicos']. "' required>";

                echo        "<label for='hora' class='mb-1' style='font-weight: 600;'>Horário</label><br>";
                echo        "<input name='hora' min='07:00' max='20:00' class='form-control mb-3' value='".$hora_agend. "' type='time' required>";

                echo    "</div>";
                echo    "<div class='modal-footer'>";
                echo        "<button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancelar</button>";
                echo        "<button type='submit' class='btn btn-success'>Salvar alterações</button>";
                echo    "</div>";
                echo    "</div>";
                echo    "</form>";
                echo "</div>";
                echo "</div>";

                echo "<div class='modal fade' id='apagaaged".$row['id_aged_clst']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo    "<div class='modal-content'>";
                echo    "<div class='modal-header'>";
                echo        "<h5 class='modal-title' id='exampleModalLabel'>Cancelamento de agendamento</h5>";
                echo        "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo    "</div>";
                echo    "<div class='modal-body'>";
                echo    "<form method='POST' action='proc_apaga_aged.php'>";
                echo    "<input type='hidden' name='id_aged' minlength='1' maxlength='100' class='form-control mb-3' value='".$row['id_aged_clst']. "'>";
                echo    "<h5>Você tem certeza de que deseja cancelar esse serviço?</h5>";
                echo    "</div>";
                echo    "<div class='modal-footer'>";
                echo        "<button type='button' class='btn btn-success' data-bs-dismiss='modal'>Cancelar</button>";
                echo        "<button type='submit' class='btn btn-danger'>Confirmar cancelamento</button>";
                echo    "</div>";
                echo    "</div>";
                echo    "</form>";
                echo "</div>";
                echo "</div>";
        }
        ?>
            </div>
            <div class="row mt-5 justify-content-center">
                <a href="relatorio_data.php" style="margin: 0 auto; text-align: center; text-decoration: none"><button id="btnrelatorio" style="color: #0D51AA; width: 400px; border-radius: 15px; padding-top: 5px; padding-bottom: 5px; font-weight: 600; border: 1px solid #0D51AA; background-color: #A7C8F2; margin: 0 auto">Gerar relatório</button></a>
            </div>
            <div class="row mt-5 text-center">
            <p id="noresultagend"></p>
        </div>  
        </div>
    </div>
</div>


</body>
</html>