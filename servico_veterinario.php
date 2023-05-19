<?php 
require ('conexao.php');
session_start();
$rest = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);

$query = "SELECT id_pet,raca FROM PET WHERE nome_pet = '$rest'";
$query_run = mysqli_query($mysqli,$query);
$id_fk = mysqli_fetch_assoc($query_run);

$id_pet = $id_fk['id_pet'];
$raca = $id_fk['raca'];
$_SESSION['idpet'] = $id_pet;
$_SESSION['nome'] = $rest;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/servicos.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <title>PetQuery - Agendamento de consulta veterinária</title>
</head>
<body>
    
    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <h3 class="mx-auto" style="color: #fff; font-weight: 600">Consulta veterinária</h3>
        </div>
    </nav>

    <!-- seleção de pet -->

    <div class="container mt-5">
        
            <h6 style="font-weight: 600;" class="mb-4">Selecione o pet</h6>
            <div class="card mb-5 mt-2" style="max-width: 440px; border-radius: 10px">
                    <div class="row g-0">
                        <div class="col-sm-3 text-center p-4">
                            <img src="img/pata.png" class="rounded-circle" alt="icone de pata">
                        </div>
                        <div class="col-sm-9 p-4">
                        <div class="card-body">
                            <h5 class="card-text" style="font-weight: 600; color: #0D51AA"><?php echo $rest ;?></h3>
                            <h6 class="card-text" style="font-weight: 600; color: #518CD7"><?php echo $raca ;?></h4>
                        </div>
                        </div>
                    </div>
        </div>

        <!-- seleção de serviço -->

        <form action="confirma_agendamento_vet.php" id="form_vet" method="POST">

            <h6 style="font-weight: 600;" class="mb-4">Selecione o serviço</h6>
            
            <div class="row">

                <div class="col-xxl-2 mb-5">
                        <div class="card p-3 h-100" style="border-radius: 10px;">
                            <div class="row justify-content-center">
                                <img src="img/icons/icone_clinica.jpg" class="card-img-top rounded-circle mt-2" alt="icone de banho" style="width: 100px;">
                            </div>
                        <div class="card-body text-center">
                            <label for="banho" class="mb-3" style="font-weight: 600;">Consulta na clínica</label><br>
                            <input type="radio" id="consulta_clinica" name="serv_vet" value="Consulta clínica" required><br>
                        </div>
                        </div>
                </div>

                <div class="col-xxl-2 mb-5">
                        <div class="card p-3 h-100" style="border-radius: 10px;">
                            <div class="row justify-content-center">
                                <img src="img/icons/icone_dermato.jpg" class="card-img-top rounded-circle mt-2" alt="icone de banho e hidratação" style="width: 100px;">
                            </div>
                        <div class="card-body text-center">
                            <label for="banhohidrat" class="mb-3" style="font-weight: 600;">Consulta dermatológica</label><br>
                            <input type="radio" id="consulta_dermato" name="serv_vet" value="Consulta dermatológica"><br>
                        </div>
                        </div>
                </div>

                <div class="col-xxl-2 mb-5">
                        <div class="card p-3 h-100" style="border-radius: 10px;">
                            <div class="row justify-content-center">
                                <img src="img/icons/icone_vacinagripe.jpg" class="card-img-top rounded-circle mt-2" alt="icone de banho e tosa higienica" style="width: 100px;">
                            </div>
                        <div class="card-body text-center">
                            <label for="banhotosahig" class="mb-3" style="font-weight: 600;">Vacina gripe</label><br>
                            <input type="radio" id="vacina_gripe" name="serv_vet" value="Vacina gripe"><br>
                        </div>
                        </div>
                </div>

                <div class="col-xxl-2 mb-5">
                        <div class="card p-3 h-100" style="border-radius: 10px;">
                            <div class="row justify-content-center">
                                <img src="img/icons/icone_vacinaraiva.jpg" class="card-img-top rounded-circle mt-2" alt="icone de banho e tosa máquina" style="width: 100px;">
                            </div>
                        <div class="card-body text-center">
                            <label for="banhotosamaq" class="mb-3" style="font-weight: 600;">Vacina raiva</label><br>
                            <input type="radio" id="vacina_raiva" name="serv_vet" value="Vacina raiva"><br>
                        </div>
                        </div>
                </div>

                <div class="col-xxl-2 mb-5">
                        <div class="card p-3 h-100" style="border-radius: 10px;">
                            <div class="row justify-content-center">
                                <img src="img/icons/icone_vacinav4.jpg" class="card-img-top rounded-circle mt-2" alt="icone de banho e tosa tesoura" style="width: 100px;">
                            </div>
                        <div class="card-body text-center">
                            <label for="banhotosates" class="mb-3" style="font-weight: 600;">Vacina V4</label><br>
                            <input type="radio" id="vacina_v4" name="serv_vet" value="Vacina V4"><br>
                        </div>
                        </div>
                    </div>  

                    <div class="col-xxl-2 mb-5">
                        <div class="card p-3 h-100" style="border-radius: 10px;">
                            <div class="row justify-content-center">
                                <img src="img/icons/icone_vacinav5.jpg" class="card-img-top rounded-circle mt-2" alt="icone de banho e tosa tesoura" style="width: 100px;">
                            </div>
                        <div class="card-body text-center">
                            <label for="banhotosates" class="mb-3" style="font-weight: 600;">Vacina V5</label><br>
                            <input type="radio" id="vacina_v5" name="serv_vet" value="Vacina V5"><br>
                        </div>
                        </div>
                    </div>  

                    <div class="col-xxl-2 mb-5">
                        <div class="card p-3 h-100" style="border-radius: 10px;">
                            <div class="row justify-content-center">
                                <img src="img/icons/icone_vacinav8.jpg" class="card-img-top rounded-circle mt-2" alt="icone de banho e tosa tesoura" style="width: 100px;">
                            </div>
                        <div class="card-body text-center">
                            <label for="banhotosates" class="mb-3" style="font-weight: 600;">Vacina V8</label><br>
                            <input type="radio" id="vacina_v8" name="serv_vet" value="Vacina V8"><br>
                        </div>
                        </div>
                    </div> 

                    <div class="col-xxl-2 mb-5">
                        <div class="card p-3 h-100" style="border-radius: 10px;">
                            <div class="row justify-content-center">
                                <img src="img/icons/icone_vacinav10.jpg" class="card-img-top rounded-circle mt-2" alt="icone de banho e tosa tesoura" style="width: 100px;">
                            </div>
                        <div class="card-body text-center">
                            <label for="banhotosates" class="mb-3" style="font-weight: 600;">Vacina V10</label><br>
                            <input type="radio" id="vacina_v10" name="serv_vet" value="Vacina V10"><br>
                        </div>
                        </div>
                    </div>
            </div>

            <!-- botões -->

            
        </form>
        
        <div class="row mt-5 mb-5">
            <div class="col text-end">
                <a href="escolha_pet_vet.php" class=""><button class="p-2" style="border: 1px solid #518CD7; background-color: #fff; border-radius: 5px; color: #0D51AA; width: 100px; font-weight: 600"><img class="me-2" src="img/icons/seta-esquerda.png">Voltar</img></button></a>
            </div>
            <div class="col">
                <button type="submit" form="form_vet" class="p-2" style="border: 1px solid #518CD7; background-color: #fff; border-radius: 5px; color: #0D51AA; width: 100px; font-weight: 600">Avançar<img class="ms-2" src="img/icons/seta-direita (2).png"></img></button>
            </div>
        </div>
    </div>

</body>
</html>