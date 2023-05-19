<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/noticias.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="../img/logo_blog.png" type="Image/png">
    <title>A melhor forma de alimentar seu peixe</title>
</head>
<body>

    <!-- navbar -->

<?php session_start() ?>
    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
          <a class="navbar-brand" href="../blog.php"><img src="../img/logo_blog.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" id="home" aria-current="page" href="../index.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Home</a></li>
              <li class="nav-item"><a class="nav-link" id="agendamento" href="<?php if(isset($_SESSION['servico'])){echo '../servico_pet.php';}else{echo'../login.php';}?>" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Serviços</a></li>
              <li class="nav-item"><a class="nav-link active" id="produtos" href="../blog.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Blog</a></li>
              <li class="nav-item"><a class="nav-link" id="contato" href="../contato.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Contato</a></li>
              <?php 
              if(isset($_SESSION['blog'])){
                echo $_SESSION['blog'];
                // unset($_SESSION['menu']);
              }else{ 
                $menu = "<li class='nav-item'><a class='nav-link' id='login' href='../login.php' style='border-radius: 5px; padding-left: 15px; padding-right: 15px; margin-left: 5vh; font-weight: bold; font-size: 18px'>Entre ou cadastre-se</a></li>";
                echo $menu;
              }
              ?>
              </ul>
          </div>
        </div>
      </nav>

    <!-- notícia -->

    <div class="container mt-5 mb-5">
      <div class="row mb-5 text-center">
        <h3 style="font-weight: 600">Entenda alguns dos comportamentos de seu cão</h3>
      </div>
      <div class="row mb-5 text-center justify-content-center">
        <img class="w-100 d-block" src="../img/comportamento_canino.jpg" alt="cachorro deitado" style="height: 400px">
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Comportamentos caninos</h4>
        <p style="font-size: 20px">Os cães são animais que possuem uma série de comportamentos que são fundamentais para a comunicação entre eles e com os humanos. Compreender esses comportamentos pode ajudar a estabelecer uma relação mais saudável e equilibrada com o animal. A seguir, conheça o significado de alguns dos principais comportamentos caninos.</p>
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Abanar o rabo</h4>
        <p style="font-size: 20px">Um dos comportamentos mais conhecidos dos cães, o abanar do rabo pode indicar felicidade, excitação ou uma tentativa de se comunicar com outros animais ou pessoas.</p>
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Lamber</h4>
        <p style="font-size: 20px">Quando um cão lambe alguém, pode estar demonstrando afeto, submissão ou tentando chamar a atenção.</p>
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Latir</h4>
        <p style="font-size: 20px">O latido pode ter diferentes significados, como alerta, comunicação, medo ou agressão.</p>
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Rosnar</h4>
        <p style="font-size: 20px">O rosnado é uma forma de comunicação agressiva, que pode ser usado para defender um território, para expressar descontentamento ou para indicar que o animal está se sentindo ameaçado.</p>
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Coçar o chão</h4>
        <p style="font-size: 20px">Quando um cão se coça no chão, pode estar tentando aliviar algum desconforto ou simplesmente se divertindo.</p>
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Bocejar</h4>
        <p style="font-size: 20px">O bocejo em cães pode ter diferentes significados, como indicar tédio, estresse ou cansaço.</p>
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Rolar</h4>
        <p style="font-size: 20px">Quando um cão rola, pode estar demonstrando submissão ou tentando se comunicar de forma amigável.</p>
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Cheirar</h4>
        <p style="font-size: 20px">O cheiro é fundamental para os cães, que utilizam o olfato para se comunicar e obter informações sobre o ambiente.</p>
      </div>
      <div class="row">
        <h4 class="mb-5 mt-4" style="font-weight: 600">Compreensão e respeito</h4>
        <p style="font-size: 20px">Compreender esses comportamentos e saber interpretá-los pode ajudar a melhorar a relação entre os cães e seus tutores, além de garantir o bem-estar e a segurança do animal e das pessoas ao seu redor. <br><br>Lembre-se sempre de respeitar o espaço e as necessidades do seu animal de estimação, buscando entender suas necessidades e oferecendo o melhor cuidado possível.</p>
      </div>
    </div>

    
      <!-- footer -->

      <nav class="container-fluid p-5" style="background-color: #F7F7F7;">
        <div class="row">
          <div class="col-sm-3 mb-5" style="text-align: center;">
              <h5 style="font-weight: bold">Sobre nós</h5>
              <a href="../sobre.php" style="text-decoration: none; color: #000"><span style="font-size: 14px">Quem somos</span></a><br>
              <a href="../index.php#mapa" style="text-decoration: none; color: #000"><span style="font-size: 14px">Nossas lojas</span></a><br>
              <a href="../contato.php" style="text-decoration: none; color: #000"><span style="font-size: 14px">Entre em contato</span></a><br>
          </div>
          <div class="col-sm-3 mb-5" style="text-align: center;">
            <h5 style="font-weight: bold">Serviços</h5>
            <a href="<?php if(isset($_SESSION['banho'])){echo '../escolha_pet_banho.php';}else{echo '../login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Banho e Tosa</span></a><br>
            <a href="<?php if(isset($_SESSION['vet'])){echo '../escolha_pet_vet.php';}else{echo '../login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Veterinário</span></a><br>
            <a href="<?php if(isset($_SESSION['aumigos'])){echo '../escolha_pet_agend.php';}else{echo '../login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Passeio Pet</span></a><br>
            <a href="<?php if(isset($_SESSION['aumigos'])){echo '../escolha_pet_agend.php';}else{echo '../login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Hospedagem Pet</span></a><br>
            <a href="<?php if(isset($_SESSION['aumigos'])){echo '../escolha_pet_agend.php';}else{echo '../login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Creche Pet</span></a><br>
            <a href="<?php if(isset($_SESSION['aumigos'])){echo '../escolha_pet_agend.php';}else{echo '../login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Adestramento</span></a><br>
          </div>
          <div class="col-sm-3 mb-5" style="text-align: center;">
            <h5 style="font-weight: bold">Cliente</h5>
            <a href="../login.php" style="text-decoration: none; color: #000"><span style="font-size: 14px">Fazer login</span></a><br>
            <a href="../cadastro_cli.php" style="text-decoration: none; color: #000"><span style="font-size: 14px">Cadastrar-se</span></a><br>
            <a href="<?php if(isset($_SESSION['agend'])){echo '../servico_pet.php';}else{echo '../login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Agendamentos</span></a><br>
          </div>
          <div class="col-sm-3" style="text-align: center;">
            <h5 style="font-weight: bold">Redes sociais</h5>
            <a href="https://www.facebook.com/profile.php?id=100092203154650"><img class="mb-2" src="../img/facebook.png" alt="" style="width: 30px; border-radius: 50%"></a><br>
            <a href="https://twitter.com/PetQuery"><img class="mb-2" src="../img/twitter.png" alt="" style="width: 30px; border-radius: 50%"></a><br>
            <a href="https://www.instagram.com/petquery/"><img class="mb-2" src="../img/instagram.png" alt="" style="width: 30px; border-radius: 50%"></a><br>
            <a href="https://www.youtube.com/channel/UCZplcMZlorhJ3N2uyuRnoxw"><img class="mb-2" src="../img/youtube.png" alt="" style="width: 30px; border-radius: 50%"></a><br>
          </div>
        </div>
      </nav>

      <nav class="container-fluid" style="background-color: #000;">
        <div class="row" style="text-align: center;">
          <p style="color: #fff; padding-top: 2vh; font-size: 0.875rem; font-weight: 500">© PET QUERY 2023 - Todos os direitos reservados</p>
        </div>
      </nav>

</body>
</html>