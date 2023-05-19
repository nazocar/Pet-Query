<?php

include('protect_seg.php');
require('conexao.php');

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
            <a href="<?php if(isset($_SESSION['fun'])){echo $_SESSION['fun'];} else if(isset($_SESSION['adm'])){echo $_SESSION['adm'];} else{echo'login.php';}?>" style="text-decoration: none;"><span><img src="img/retornar.png" alt="seta de retorno" class="me-2" style="width: 35px; float: left"><h5 class="mt-1" style="color: #0D51AA; font-weight: 600">Voltar</h6></span></a>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container justify-content-center">
            <div class="row" style="max-width: 500px; margin: 0 auto">
                <form action="relatorio.php" method="POST">
                    <label class="mb-2" style="font-weight: 600" for="data">Selecione uma data</label>
                    <input type="date" name="data_escolhida" class="form-control" style="margin: 0 auto" required>

                    <div class="row text-center">
                        <a href="relatorio_data.php" style="margin: 0 auto; text-align: center"><button id="btnrelatorio" class="mt-4" style="color: #0D51AA; width: 300px; border-radius: 15px; padding-top: 5px; padding-bottom: 5px; font-weight: 600; border: 1px solid #0D51AA; background-color: #A7C8F2; margin: 0 auto; text-align: center">Confirmar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>