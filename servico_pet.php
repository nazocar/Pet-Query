<!DOCTYPE html>
<html lang="pt-br">
  <?php
  session_start();
  include_once('conexao.php');
  if (isset($_SESSION['id']) == false){
    header("Location: login.php");
  }
  ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/msg.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <title>Entre em contato com a equipe PetQuery!</title>
</head>
<body>

    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" id="home" aria-current="page" href="index.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Home</a></li>
              <li class="nav-item"><a class="nav-link" id="agendamento" href="servico_pet.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Serviços</a></li>
              <li class="nav-item"><a class="nav-link" id="produtos" href="blog.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Blog</a></li>
              <li class="nav-item"><a class="nav-link active" id="contato" href="contato.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Contato</a></li>
              <?php 
              if(isset($_SESSION['menu'])){
                echo $_SESSION['menu'];
                // unset($_SESSION['menu']);
              }else{ 
                $menu = "<li class='nav-item'><a class='nav-link' id='login' href='login.php' style='border-radius: 5px; padding-left: 15px; padding-right: 15px; margin-left: 5vh; font-weight: bold; font-size: 18px'>Entre ou cadastre-se</a></li>";
                echo $menu;
              }
              ?>
            </ul>
          </div>
        </div>
      </nav>

      <!-- formulário -->

      <div class="container justify-content-center">

        <div class="row mb-5 mt-5">

            <div class="col-lg-7 mb-5">
              <div class="row justify-content-center">

                <div class="col-lg-5 p-3 justify-content-center text-center"><a class="btn" style="border: 1px solid #a9a9a9; background-color: #fff; width: 80%; border-radius: 10px" href="escolha_pet_banho.php" role="button"><img src="img/icons/icons_serviçosPet/banho e tosa.png" style="border-radius: 100%; width: 50px; margin-right: 20px;" alt="Icone de banho e tosa">Banho e Tosa</a></div>
                <div class="col-lg-5 p-3 justify-content-center text-center"><a class="btn" style="border: 1px solid #a9a9a9; background-color: #fff; width: 80%; border-radius: 10px" href="escolha_pet_vet.php" role="button"><img src="img/icons/icons_serviçosPet/veterinario.png" style="border-radius: 100%; width: 50px; margin-right: 20px;" alt="Icone de veterinário">Veterinário</a></div>
              </div>

              <div class="container mt-3 p-3" style="width: 92%; border: 1px solid #a9a9a9; border-radius: 30px;">
                  <div class="row text-center">
                    <div class="mb-3">
                      <img style="width: 128px; height: 128px;" src="img/+aumigo.png" alt="Imagem da mais amigo">
                    </div>
                  </div>
                <div class="row mb-3 justify-content-center">
                  <div class="col-lg p-3 justify-content-center text-center">
                    <a class="btn" href="escolha_pet_agend.php" style="border: 1px solid #a9a9a9; background-color: #fff; width: 80%; border-radius: 10px" role="button"><img src="img/icons/icons_serviçosPet/passeio pet.png" style="border-radius: 100%; width: 50px; margin-right: 20px;" alt="Icone de adestramento">Passeio Pet</a></div>
                  <div class="col-lg p-3 justify-content-center text-center">
                  <a class="btn" href="escolha_pet_agend.php" style="border: 1px solid #a9a9a9; background-color: #fff; width: 80%; border-radius: 10px" role="button"><img src="img/icons/icons_serviçosPet/hospedagem pet.png" style="border-radius: 100%; width: 50px; margin-right: 20px"  alt="icone de uma hospedagem">Hospedagem</a></div>
                </div>
                <div class="row mb-3 justify-content-center">
                  <div class="col-lg p-3 justify-content-center text-center"><a class="btn" href="escolha_pet_agend.php" style="border: 1px solid #a9a9a9; background-color: #fff; width: 80%; border-radius: 10px" role="button"><img src="img/icons/icons_serviçosPet/creche pet.png" style="border-radius: 100%; width: 50px; margin-right: 20px;" alt="Icone de adestramento">Creche Pet</a></div>
                  <div class="col-lg p-3 justify-content-center text-center"><a class="btn" href="escolha_pet_agend.php" style="border: 1px solid #a9a9a9; background-color: #fff; width: 80%; border-radius: 10px" role="button"><img src="img/icons/icons_serviçosPet/adestramento.png" style="border-radius: 100%; width: 50px; margin-right: 20px"  alt="icone de uma hospedagem">Adestramento</a></div>
                  </div>
              </div> <!-- container -->
            </div>
            
            <div class="col-lg-5">
              <div class="container justify-content-center w-100 p-0" style="background: #fff; border-radius: 30px 30px 0px 0px; ">
              <div class="row text-center w-100" style="background: #0D51AA; border-radius: 15px 15px 0px 0px; color: #fff; margin: 0;">
                <h6 class="mt-1">Agendamento</h6>
              </div>

              <div class="row mt-1">
                <div class="btn-group" role="group">
                  <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseagenda" aria-expanded="false" aria-controls="multi-collapse"><img src="img/icons/icons_serviçosPet/agenda.png" alt="Icone de agenda" style="height: 40px;"><p>Agenda</p></button>
                  <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapsehistorico" aria-expanded="false" aria-controls="multi-collapse" ><img src="img/icons/icons_serviçosPet/historia.png" alt="Icone de seta" style="height: 40px;"><p>Histórico</p></button>
                </div>
                <div class="collapse multi-collapse" id="collapseagenda">
                  <div class="card card-body text-center">
                      <?php
                      $fk = $_SESSION['id'];
                      $resultado_agenda = mysqli_query($mysqli,"SELECT * FROM SERVICOS INNER JOIN PET ON FK_PET_AGE = ID_PET INNER JOIN CLIENTE ON FK_PET_CLI = ID_CLIENTE WHERE ID_CLIENTE = '$fk'");
                      if(mysqli_num_rows($resultado_agenda) > 0){
                        echo "<table class='table'>
                        <thead>
                          <tr>
                            <th scope='col'>Nome Pet</th>
                            <th scope='col'>Serviço</th>
                            <th scope='col'>Data</th>
                            <th scope='col'>Horário</th>
                            <th scope='col'>Cancelar</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while ($row = mysqli_fetch_assoc($resultado_agenda)){
                          echo "<tr>
                          <th scope='row'>".$row['NOME_PET']."</th>
                          <td>".$row['SERVIÇO']."</td>
                          <td>".$row['DATA_SERVICOS']."</td>
                          <td>".$row['HORARIO']."</td>
                          <td><a class='btn btn-danger' href='proc_cancelar.php?name=".$row['ID_AGED_CLST']."' role='button'>Cancelar</a></td>
                          </tr>";
                          
                        }
                        echo"</table>";
                      }else{
                        echo "<p>Nenhum agendamento</p>";
                      }
                      ?>
                     
                  </div>
                </div>
                <div class="collapse multi-collapse" id="collapsehistorico" >
                  <div class="card card-body text-center">
                  <?php
                      $fk = $_SESSION['id'];
                      $resultado_agenda = mysqli_query($mysqli,"SELECT * FROM HISTORICO INNER JOIN SERVICOS ON FK_SERV_HIST = ID_AGED_CLST INNER JOIN PET ON  ID_PET = FK_PET_CLI INNER JOIN CLIENTE ON FK_PET_CLI = ID_CLIENTE WHERE ID_CLIENTE = '$fk'");
                      if(mysqli_num_rows($resultado_agenda) > 0){
                        echo "<table class='table'>
                        <thead>
                          <tr>
                            <th scope='col'>Dono</th>
                            <th scope='col'>Serviço Pet</th>
                            <th scope='col'>Data</th>
                            <th scope='col'>Horário</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while ($row = mysqli_fetch_assoc($resultado_agenda)){
                          echo "<tr>
                          <th scope='row'>".$row['NOME_PET']."</th>
                          <td>".$row['NOME']."</td>
                          <td>".$row['SERVIÇO']."</td>
                          <td>".$row['DATA_HISTORICO']."</td>
                          <td>".$row['HORARIO']."</td>
                          </tr>";
                          
                        }
                        echo"</table>";
                      }else{
                        echo "<p>Nenhum Histórico</p>";
                      }
                      ?>
                  </div>
                </div>
              </div>
              
              </div> <!-- container -->
            </div>
        </div>
      </div>

</body>
</html>