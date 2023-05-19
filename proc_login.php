<?php
include('conexao.php');

    if(isset($_POST['email']) || isset($_POST['senha'])) {
    
    // if(strlen($_POST['email']) == 0) {
    //     echo "Preencha seu e-mail";
    // } else if(strlen($_POST['senha']) == 0) {
    //     echo "Preencha sua senha";
    // } else {
        
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $email = strtoupper($email);
        $senha = md5($senha);

        // VERIFICAR SE O CADASTRO É DE CLIENTE 
        $sql_code = "SELECT * FROM LOGIN_CLIENTE WHERE USERNAME = '$email' AND SENHA = '$senha'";
        $sql_query_cli = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        $clie = $sql_query_cli->num_rows;
        
        // VERIFICAR SE O CADASTRO É DE FUNCIONARIO
        $sql_code = "SELECT * FROM LOGIN_FUNCIONARIO WHERE USERNAME = '$email' AND SENHA = '$senha'";
        $sql_query_fun = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        $fun = $sql_query_fun->num_rows;
        
        // VERIFICAR SE O CADASTRO É ADM
        $sql_code = "SELECT * FROM LOGIN_ADM WHERE USERNAME = '$email' AND SENHA = '$senha'";
        $sql_query_adm = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        $adm = $sql_query_adm->num_rows;
        
        if($clie == 1) {
            
            // $usuario = $sql_query->fetch_assoc();
            
            if(!isset($_SESSION)) {
                session_start();
                
            }
            while ($row = mysqli_fetch_assoc($sql_query_cli)){
                $fk = $row["FK_CLI_LOG"];
            }
            $sql_code = mysqli_query($mysqli, "SELECT NOME, SOBRENOME FROM CLIENTE WHERE ID_CLIENTE = '$fk'");
            while ($row = mysqli_fetch_assoc($sql_code)){
                $nome = $row["NOME"];
                $sobrenome = $row["SOBRENOME"];
            }
            
            $_SESSION['id'] = $fk;
            $_SESSION['tabela'] = 'CLIENTE';
            $_SESSION['tabela_end'] = 'ENDERECO_CLIENTE';
            $_SESSION['tabela_log'] = 'LOGIN_CLIENTE';
            $_SESSION['fK_log'] = 'FK_CLI_LOG';
            $_SESSION['condicao_dado'] = 'ID_CLIENTE';
            $_SESSION['condicao_end'] = 'FK_CLI_END';
            
            $nome = $nome . " " . $sobrenome;
            $menu = "<li class='nav-item dropdown'>\n<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false' style='color: #fff; margin-left: 5vh; font-weight: bold; font-size: 18px'> ".$nome." </a>\n<ul class='dropdown-menu'>\n<li><a class='dropdown-item' href='perfil_cli.php'>Perfil</a></li>\n<li><a class='dropdown-item' href='logout.php'>Sair</a></li>\n</ul>\n</li>";
            $blog = "<li class='nav-item dropdown'>\n<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false' style='color: #fff; margin-left: 5vh; font-weight: bold; font-size: 18px'> ".$nome." </a>\n<ul class='dropdown-menu'>\n<li><a class='dropdown-item' href='../perfil_cli.php'>Perfil</a></li>\n<li><a class='dropdown-item' href='../logout.php'>Sair</a></li>\n</ul>\n</li>";

            $_SESSION['nomeus'] = $nome;
            $_SESSION['menu'] = $menu;
            $_SESSION['blog'] = $blog;
            $_SESSION['servico'] = 'servico_pet.php';
            $_SESSION['banho'] = 'escolha_pet_banho.php';
            $_SESSION['vet'] = 'escolha_pet_vet.php';  
            $_SESSION['aumigos'] = 'escolha_pet_agend.php'; 
            $_SESSION['agend'] = 'servico_pet.php';       
            
            header("Location: index.php");
            
        }else if($fun == 1) {
            
            // $usuario = $sql_query->fetch_assoc();
            
            if(!isset($_SESSION)) {
                session_start();
                
            }
            while ($row = mysqli_fetch_assoc($sql_query_fun)){
                $fk = $row["FK_FUN_LOG"];
            }
            $sql_code = mysqli_query($mysqli, "SELECT NOME, SOBRENOME FROM FUNCIONARIO WHERE ID_FUNCIONARIO = '$fk'");
            while ($row = mysqli_fetch_assoc($sql_code)){
                $nome = $row["NOME"];
                $sobrenome = $row["SOBRENOME"];
            }
            
            $_SESSION['id'] = $fk;
            $_SESSION['tabela'] = 'FUNCIONARIO';
            $_SESSION['tabela_end'] = 'ENDERECO_FUNCIONARIO';
            $_SESSION['tabela_log'] = 'LOGIN_FUNCIONARIO';
            $_SESSION['fK_log'] = 'FK_FUN_LOG';
            $_SESSION['condicao_dado'] = 'ID_FUNCIONARIO';
            $_SESSION['condicao_end'] = 'FK_FUN_END';
            
            $nome = $nome . " " . $sobrenome;
            $menu = "<li class='nav-item dropdown'>\n<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false' style='color: #fff; margin-left: 5vh; font-weight: bold; font-size: 18px'> ".$nome." </a>\n<ul class='dropdown-menu'>\n<li><a class='dropdown-item' href='#'>Perfil</a></li>\n<li><a class='dropdown-item' href='logout.php'>Sair</a></li>\n</ul>\n</li>";
            $blog = "<li class='nav-item dropdown'>\n<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false' style='color: #fff; margin-left: 5vh; font-weight: bold; font-size: 18px'> ".$nome." </a>\n<ul class='dropdown-menu'>\n<li><a class='dropdown-item' href='#'>Perfil</a></li>\n<li><a class='dropdown-item' href='../logout.php'>Sair</a></li>\n</ul>\n</li>";
            
            $_SESSION['fun'] = $fun;
            $_SESSION['nomeus'] = $nome;
            $_SESSION['menu'] = $menu;
            $_SESSION['blog'] = $blog;
            $_SESSION['servico'] = 'servico_pet.php';
            $_SESSION['banho'] = 'escolha_pet_banho.php';
            $_SESSION['vet'] = 'escolha_pet_vet.php';
            $_SESSION['aumigos'] = 'escolha_pet_agend.php'; 
            $_SESSION['agend'] = 'servico_pet.php';
            $_SESSION['fun'] = 'painel_func.php';           
            
            header("Location: painel_func.php");
            
        }else if($adm == 1){

            if(!isset($_SESSION)) {
                session_start();
                
            }
            while ($row = mysqli_fetch_assoc($sql_query_adm)){
                $fk = $row["FK_LOGIN"];
            }
            $sql_code = mysqli_query($mysqli, "SELECT NOME, SOBRENOME FROM ADM WHERE ID_ADM = '$fk'");
            while ($row = mysqli_fetch_assoc($sql_code)){
                $nome = $row["NOME"];
                $sobrenome = $row["SOBRENOME"];
            }
            
            $_SESSION['id'] = $fk;
            $_SESSION['tabela'] = 'ADM';
            
            $nome = $nome . " " . $sobrenome;
            $menu = "<li class='nav-item dropdown'>\n<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false' style='color: #fff; margin-left: 5vh; font-weight: bold; font-size: 18px'> ".$nome." </a>\n<ul class='dropdown-menu'>\n<li><a class='dropdown-item' href='#'>Perfil</a></li>\n<li><a class='dropdown-item' href='logout.php'>Sair</a></li>\n</ul>\n</li>";
            $blog = "<li class='nav-item dropdown'>\n<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false' style='color: #fff; margin-left: 5vh; font-weight: bold; font-size: 18px'> ".$nome." </a>\n<ul class='dropdown-menu'>\n<li><a class='dropdown-item' href='#'>Perfil</a></li>\n<li><a class='dropdown-item' href='../logout.php'>Sair</a></li>\n</ul>\n</li>";
            
            $_SESSION['adm'] = $adm;
            $_SESSION['nomeus'] = $nome;
            $_SESSION['menu'] = $menu;
            $_SESSION['blog'] = $blog;
            $_SESSION['servico'] = 'servico_pet.php';
            $_SESSION['banho'] = 'escolha_pet_banho.php';
            $_SESSION['vet'] = 'escolha_pet_vet.php'; 
            $_SESSION['aumigos'] = 'escolha_pet_agend.php'; 
            $_SESSION['agend'] = 'servico_pet.php'; 
            $_SESSION['adm'] = 'painel.php';

            
            header("Location: painel.php");
        }
        else{
            session_start();
            $_SESSION['falha_login'] = "<p style='color: red; margin-bottom: -15px'>Falha ao logar! E-mail ou senha incorretos</p>";
            header("Location: login.php");
        }
    }

// }
?>