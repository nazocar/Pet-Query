<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['adm'])) {
    die("<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <link rel='stylesheet' href='css/protect.css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
        <link rel='icon' href='img/icons/logo.png' type='Image/png'>
        <title>PetQuery - ERRO DE ACESSO</title>
    </head><body style='background-color: #A7C8F2'><div class='container-fluid'>
    <div class='row text-center justify-content-center'>
        <h1 id='ops' style='font-size: 200px; font-weight: bold; color: #fff;'>OOPS!</h1>
        <small id='texto' style='font-size: 24px; color: #fff'>Parece que você não possui acesso a esta página por falta de nível de acesso.</small>
    </div>
    <div class='row mt-3 text-center justify-content-center'>
        <img src='img/denied.png' alt='cachorro policial proibindo acesso' style='max-width: 600px'>
    </div>
    <div class='row mt-3 text-center justify-content-center'>
        <a href='index.php' style='text-decoration: none; position: absolute;'><span><img src='img/home.png' alt='imagem de login' style='width: 50px;'><h6 style='color: #fff'>Retornar à home</h6></span></a>
    </div>
</div></body></html>");
}

?>

