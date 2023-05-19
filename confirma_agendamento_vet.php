<?php
session_start();
date_default_timezone_set('America/Sao_paulo');
require('conexao.php');
$serv = filter_input(INPUT_POST,'serv_vet',FILTER_SANITIZE_STRING);
$idpet = $_SESSION['idpet'];
if($serv == 'Consulta clínica'){
    $valor = 180.00;
} else if ($serv == 'Vacina gripe'){
    $valor = 50.00;
} else if ($serv == 'Vacina raiva'){
    $valor = 60.00;
} else if ($serv == 'Vacina V4'){
    $valor = 40.00;
} else if ($serv == 'Vacina V5'){
    $valor = 120.00;
} else if ($serv == 'Vacina V8'){
    $valor = 95.00;
} else if ($serv == 'Vacina V10'){
    $valor = 110.00;
}; 
$nomepet = $_SESSION['nome'];
$result = "INSERT INTO SERVICOS(SERVIÇO,FK_PET_AGE, VALOR) VALUE ('$serv','$idpet','$valor')";
$resuult_query = mysqli_query($mysqli,$result);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/confirmar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <script src="js/confirma.js"></script>
    <title>PetQuery - Agendamento de consulta veterinária</title>
</head>
<body>
        
    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top p-3" style="background-color: #518CD7;">
        <div class="container-fluid">
        <a href="" class=""><button class="p-2" style="border: none; background-color: #518CD7; color: #fff; width: 100px; font-weight: 600"><img class="me-2" src="img/aseta-esquerda1.png">Voltar</img></button></a>
            <h4 class="mx-auto" style="color: #fff; font-weight: 600">Confirmar agendamento</h4 >
        </div>
    </nav>
    <form method="post" action="proc_confirma_aged.php">
        <div class="container-fluid" style="background-color: #D4E1F2">
            <div class="row p-4">
                <div class="col-6 text-end">
                    <span><img id="agenda" src="img/icons/icons_serviçosPet/agenda.png" alt="icone de agenda" style="width: 35px; margin-right: 10px"><small id="dia" style="font-weight: 600; color: #464444; font-size: 16px; margin-right: 15px"><input class="p-1" style="border: 1px solid #a9a9a9; border-radius: 5px" type="date" id="data" onkeydown="return false" min="<?php echo date('Y-m-d'); ?>" name="data"></small></span>
                </div>
                <div class="col-6 text-start">
                    <span><img id="relogio" src="img/icons/icons_serviçosPet/relogio.png" alt="icone de relogio" style="width: 35px; margin-right: 10px; margin-left: 35px"><small id="hora" style="font-weight: 600; color: #464444; font-size: 16px;"><input id="time" class="p-1" style="border: 1px solid #a9a9a9; border-radius: 5px" min="07:00" max="20:00" type="time" name="time"></small></span>
                </div>
            </div>
        </div>

    <!-- confirmação -->

    <div class="container-fluid mt-5">
        <div class="container" id="form_confirma" style="width: 500px">
                <div class="mb-4">
                    <input type="text" placeholder="Nome do pet" value="<?php echo $nomepet ?>" minlength="1" maxlength="200" class="form-control" id="nomepet" style="border-color: #a9a9a9" required readonly>
                </div>
                <div class="mb-4">
                    <label for="servicopet" class="mb-2" style="font-weight: 600">Serviço escolhido</label>
                    <input type="text" placeholder="Serviço escolhido" value="<?php echo $serv ?>" class="form-control" id="servicopet" style="border-color: #a9a9a9" required readonly>
                    <input type="hidden" name="valor" value="<?php echo $valor ?>">
                </div>
                <div class="container mb-4 mt-5">
                    <div class="row text-center justify-content-center">
                        <button type="submit" class="form-control" id="servicopet" style="border-color: #0D51AA; color: #0D51AA; background-color: #A7C8F2; font-weight: 600; width: 80%;">Confirmar agendamento</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>