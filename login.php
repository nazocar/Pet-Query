<?php
    include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>PetQuery - Login</title>
    <script src="js/login.js"></script>
</head>
<body>

    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <span><img src="img/cadeado.png" class="me-5" alt="icone de cadeado" style="width: 5vh;"></span>
        </div>
    </nav>

    <!-- login -->
    <?php session_start(); if(isset($_SESSION['data'])){echo $_SESSION['data'];unset($_SESSION['data']);}?>
    <div class="container-fluid mt-5">
        <div class="container" id="form_login" style="width: 35%">
            <div class="row justify-content-center">
                <img class="rounded-circle mt-5" src="img/icons/usuario.png" alt="icone de usuario" style="width: 80px;">
            </div>
            <div class="row justify-content-center text-center mt-4">
                <h6 style="font-weight: 600">Login</h6>
            </div>
            <div class="row justify-content-center text-center mt-2 mb-5">
                <small class="form-text mb-3">Informe seu e-mail e senha de cadastro</small>
                <?php if(isset($_SESSION['falha_login'])){echo $_SESSION['falha_login'];unset($_SESSION['falha_login']);}?>
            </div>
            <form method="POST" action="proc_login.php">
                <div class="mb-4">
                    <input type="text" minlength="1" maxlength="250" name="email" placeholder="E-mail ou Username" class="form-control" id="emaillogin" style="border-color: #a9a9a9" required>
                </div>
                <div class="mb-4" id="divi">
                    <input type="password" minlength="8" maxlength="30" name="senha" placeholder="Senha" class="form-control" id="senhalogin" style="border-color: #a9a9a9;" required>
                    <i class="fa fa-eye" onclick="passShow(this)" id="showpassword"></i>
                </div>
                <div class="row justify-content-center text-center">
                    <button type="submit" class="btn mb-3" style="background-color: #518CD7; color: #fff; font-weight: 600; width: 96%">Entrar</button>
                    <span class="form-text">Ainda não tem conta? <a href="cadastro_cli.php" style="text-decoration: none">Cadastre-se</a></span>
                </div>
            </form>
        </div>
    </div>

</body>
</html>