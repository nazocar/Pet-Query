<!DOCTYPE html>
<html lang="pt-br">
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
<body style="background-color: #EDEDED">

    <!-- navbar -->
<?php session_start(); ?>
    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" id="home" aria-current="page" href="index.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Home</a></li>
              <li class="nav-item"><a class="nav-link" id="agendamento" href="<?php if(isset($_SESSION['servico'])){echo $_SESSION['servico'];}else{echo'login.php';}?>" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Serviços</a></li>
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
            <div class="col-lg-6 mb-5">
                <div class="container" id="contcontato" style="width: 92%">
                    <div class="row">
                        <form class="formulario p-5" action="" method="POST" style="background-color: #fff; border-radius: 30px; border: 1px solid #a9a9a9;">
                            <div class="mb-3">
                                <label for="nome" class="form-label" style="font-weight: 600; font-size: 20px">Nome</label><br>
                                <input type="text" placeholder="Nome" minlength="1" maxlength="250" class="form-control" id="nome" style="border-color: #a9a9a9" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="email" class="form-label" style="font-weight: 600; font-size: 20px">E-mail</label><br>
                                <input type="email" placeholder="E-mail" minlength="1" maxlength="200" class="form-control" id="email" style="border-color: #a9a9a9" required>
                            </div>
        
                            <div class="mb-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 mb-3">
                                            <label for="ddd" class="form-label" style="font-weight: 600; font-size: 20px">DDD</label><br>
                                            <input class="form-control" type="number" name="ddd" id="ddd" placeholder="DDD" min="11" max="99" style="border-color: #a9a9a9; border-radius: 4px" required>
                                        </div>
                                        <div class="col-lg-9 mb-3">
                                            <label for="telefone" class="form-label" style="font-weight: 600; font-size: 20px">Telefone</label><br>
                                            <input type="text" minlength="8" maxlength="9" placeholder="Telefone" class="form-control" id="telefone" style="border-color: #a9a9a9" required>
                                        </div>
                                    </div>
                                </div>
                                <label for="assunto" class="form-label" style="font-weight: 600; font-size: 20px">Assunto</label><br>
                                <input type="text" placeholder="Assunto" minlength="1" maxlength="150" class="form-control" id="assunto" style="border-color: #a9a9a9" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="mensagem" class="form-label" style="font-weight: 600; font-size: 20px">Mensagem</label><br>
                                <textarea class="form-control mb-4" minlength="1" maxlength="1000" placeholder="Sua mensagem..." id="mensagem" rows="5" style="border-color: #a9a9a9" required></textarea>
                            </div>
                            
                            <div class="container text-center mt-5">
                                <button type="submit" id="enviarmsg" class="btn" style="background-color: #A7C8F2; border: 1px solid #3a86ff; border-radius: 20px; color: #3a86ff;font-weight: 600">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="container" id="contredes" style="width: 90%; background-color: #A7C8F2; border-radius: 30px; border: 1px solid #3a86ff;">
                    <div class="row mt-5 text-center justify-content-center">
                        <h5 style="font-weight: 600" class="mb-5 mt-5">OU NOS CONTATE ABAIXO</h5>

                        <img src="img/icon_telefone.png" alt="ícone de telefone" style="width: 55px">
                        <span class="mt-2" style="font-weight: 600">Telefone</span>
                        <span class="mt-2">(11) 91234-5678</span>
                    </div>
                    <div class="row mt-5 text-center justify-content-center">
                        <img src="img/icon_email.png" alt="ícone de email" style="width: 55px">
                        <span class="mt-2" style="font-weight: 600">E-mail</span>
                        <span class="mt-2">petquerysp@gmail.com</span>
                    </div>
                    <div class="row mt-5 mb-4 text-center justify-content-center">
                        <img src="img/icon_whatsapp.png" alt="ícone de whatsapp" style="width: 55px">
                        <span class="mt-2" style="font-weight: 600">Whatsapp</span>
                        <span class="mt-2">(11) 98765-4321</span>
                    </div>
                    <div class="row text-center justify-content-center">
                        <img src="img/icons/logo.png" id="logocontato" alt="ícone da petquery" style="width: 173px">
                    </div>
                </div>
            </div>
        </div>
      </div>

      <!-- footer -->

      <nav class="container-fluid p-5" style="background-color: #F7F7F7;">
        <div class="row">
          <div class="col-sm-3 mb-5" style="text-align: center;">
              <h5 style="font-weight: bold">Sobre nós</h5>
              <a href="sobre.php" style="text-decoration: none; color: #000"><span style="font-size: 14px">Quem somos</span></a><br>
              <a href="index.php#mapa" style="text-decoration: none; color: #000"><span style="font-size: 14px">Nossas lojas</span></a><br>
              <a href="contato.php" style="text-decoration: none; color: #000"><span style="font-size: 14px">Entre em contato</span></a><br>
          </div>
          <div class="col-sm-3 mb-5" style="text-align: center;">
            <h5 style="font-weight: bold">Serviços</h5>
            <a href="<?php if(isset($_SESSION['banho'])){echo $_SESSION['banho'];}else{echo'login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Banho e Tosa</span></a><br>
            <a href="<?php if(isset($_SESSION['vet'])){echo $_SESSION['vet'];}else{echo'login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Veterinário</span></a><br>
            <a href="<?php if(isset($_SESSION['aumigos'])){echo $_SESSION['aumigos'];}else{echo'login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Passeio Pet</span></a><br>
            <a href="<?php if(isset($_SESSION['aumigos'])){echo $_SESSION['aumigos'];}else{echo'login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Hospedagem Pet</span></a><br>
            <a href="<?php if(isset($_SESSION['aumigos'])){echo $_SESSION['aumigos'];}else{echo'login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Creche Pet</span></a><br>
            <a href="<?php if(isset($_SESSION['aumigos'])){echo $_SESSION['aumigos'];}else{echo'login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Adestramento</span></a><br>
          </div>
          <div class="col-sm-3 mb-5" style="text-align: center;">
            <h5 style="font-weight: bold">Cliente</h5>
            <a href="login.php" style="text-decoration: none; color: #000"><span style="font-size: 14px">Fazer login</span></a><br>
            <a href="cadastro_cli.php" style="text-decoration: none; color: #000"><span style="font-size: 14px">Cadastrar-se</span></a><br>
            <a href="<?php if(isset($_SESSION['agend'])){echo $_SESSION['agend'];}else{echo'login.php';}?>" style="text-decoration: none; color: #000"><span style="font-size: 14px">Agendamentos</span></a><br>
          </div>
          <div class="col-sm-3" style="text-align: center;">
            <h5 style="font-weight: bold">Redes sociais</h5>
            <a href="https://www.facebook.com/profile.php?id=100092203154650"><img class="mb-2" src="img/facebook.png" alt="" style="width: 30px; border-radius: 50%"></a><br>
            <a href="https://twitter.com/PetQuery"><img class="mb-2" src="img/twitter.png" alt="" style="width: 30px; border-radius: 50%"></a><br>
            <a href="https://www.instagram.com/petquery/"><img class="mb-2" src="img/instagram.png" alt="" style="width: 30px; border-radius: 50%"></a><br>
            <a href="https://www.youtube.com/channel/UCZplcMZlorhJ3N2uyuRnoxw"><img class="mb-2" src="img/youtube.png" alt="" style="width: 30px; border-radius: 50%"></a><br>
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