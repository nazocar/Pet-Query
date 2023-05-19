<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <title>PetQuery, o melhor serviço de agendamento on-line para seu pet!</title>
</head>
<body>

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
              <li class="nav-item"><a class="nav-link active" id="home" aria-current="page" href="index.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Home</a></li>
              <li class="nav-item"><a class="nav-link" id="agendamento" href="<?php if(isset($_SESSION['servico'])){echo $_SESSION['servico'];}else{echo'login.php';}?>" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Serviços</a></li>
              <li class="nav-item"><a class="nav-link" id="produtos" href="blog.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Blog</a></li>
              <li class="nav-item"><a class="nav-link" id="contato" href="contato.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Contato</a></li>
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

      <!-- carousel -->

      <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img id="carrossel" src="img/icons/servicos.jpg" class="d-block w-100" alt="serviços" style="height: 500px">
          </div>
          <div class="carousel-item">
            <img id="carrossel" src="img/banhoetosa.jpg" class="d-block w-100" alt="banho e tosa" style="height: 500px">
          </div>
          <div class="carousel-item">
            <img id="carrossel" src="img/icons/adestramento.jpg" class="d-block w-100" alt="adestramento" style="height: 500px">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- serviços -->

      <div class="container mb-5">
        <h3 class="mb-5" id="servicos" style="text-align: left; font-weight: 900;">Nossos serviços</h3>
        <div class="row justify-content-center" style="text-align: center">
          <div class="col-md-2 mb-5">
            <a href="<?php if(isset($_SESSION['banho'])){echo $_SESSION['banho'];}else{echo'login.php';}?>"><img class="mb-2" src="img/icons/icons_serviçosPet/banho e tosa.png" alt="" style="width: 90px; border-radius: 50%"></a><br>
            <span style="font-weight: 600;">Banho e tosa</span>
          </div>
          <div class="col-md-2 mb-5">
            <a href="<?php if(isset($_SESSION['vet'])){echo $_SESSION['vet'];}else{echo'login.php';}?>"><img class="mb-2" src="img/icons/icons_serviçosPet/veterinario.png" alt="" style="width: 90px; border-radius: 50%"></a><br>
            <span style="font-weight: 600">Veterinário</span>
          </div>
          <div class="col-md-2 mb-5">
            <a href="<?php if(isset($_SESSION['aumigos'])){echo $_SESSION['aumigos'];}else{echo'login.php';}?>"><img class="mb-2" src="img/icons/icons_serviçosPet/passeio pet.png" alt="" style="width: 90px; border-radius: 50%"></a><br>
            <span style="font-weight: 600">Passeio Pet</span>
          </div>
          <div class="col-md-2 mb-5">
            <a href="<?php if(isset($_SESSION['aumigos'])){echo $_SESSION['aumigos'];}else{echo'login.php';}?>"><img class="mb-2" src="img/icons/icons_serviçosPet/hospedagem pet.png" alt="" style="width: 90px; border-radius: 50%"></a><br>
            <span style="font-weight: 600">Hospedagem Pet</span>
          </div>
          <div class="col-md-2 mb-5">
            <a href="<?php if(isset($_SESSION['aumigos'])){echo $_SESSION['aumigos'];}else{echo'login.php';}?>"><img class="mb-2" src="img/icons/icons_serviçosPet/creche pet.png" alt="" style="width: 90px; border-radius: 50%"></a><br>
            <span style="font-weight: 600">Creche Pet</span>
          </div>
          <div class="col-md-2 mb-5">
            <a href="<?php if(isset($_SESSION['aumigos'])){echo $_SESSION['aumigos'];}else{echo'login.php';}?>"><img class="mb-2" src="img/icons/icons_serviçosPet/adestramento.png" alt="" style="width: 90px; border-radius: 50%"></a><br>
            <span style="font-weight: 600">Adestramento</span>
          </div>
        </div>

      </div>

      <!-- sobre nós -->
      
      <div class="container-fluid p-5 mb-5" style="background-color: #A7C8F2">
        <div class="row">
          <h3 class="mb-5 mt-2" style="text-align: center; font-weight: 900; color: #fff">Sobre nós</h3>
        </div>
        <div class="container text-center mb-2">
          <p class="mb-5" id="textosobre" style="color: #fff; font-weight: 600; padding-left: 15vw; padding-right: 15vw; font-size: 18px; text-align: center"><span>Na PetQuery você pode agendar serviços para seu pet de maneira on-line e fácil. Possuímos profissionais capacitados para realizar banho e tosa, adestramento, hospedagem, passeios e consultas veterinárias para diversos tipos e raças de animais,
          por um preço acessível e qualidade garantida.</span></p>
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-4 mb-4">
                  <button disabled="disabled" style="background-color: #f7f7f7; color: #0D51AA; font-weight: 600; border: none; padding: 15px; font-size: 18px"><img src="img/icone_cuidados.png" alt="ícone de cuidados com o pet" style="width: 40px; margin-right: 10px"><span>Cuidado com seu Pet</span></button>
                </div>
                <div class="col-md-4 mb-4">
                  <button disabled="disabled" style="background-color: #f7f7f7; color: #0D51AA; font-weight: 600; border: none; padding: 15px; font-size: 18px"><img src="img/icone_profissional.png" alt="ícone de profissionais capacitados" style="width: 40px; margin-right: 10px"><span>Profissionais capazes</span></button>
                </div>
                <div class="col-md-4 mb-4">
                  <button disabled="disabled" style="background-color: #f7f7f7; color: #0D51AA; font-weight: 600; border: none; padding: 15px; font-size: 18px"><img src="img/icone_tecnologia.png" alt="ícone de tecnologia" style="width: 40px; margin-right: 10px"><span>Tecnologias de ponta</span></button>
                </div>
            </div>
          <a href="sobre.php"><button id="botaosobre" style="background-color: #fff; color: #0D51AA; font-weight: 600; border: none; border-radius: 10px; padding: 10px; font-size: 18px">Conheça a PetQuery</button></a>
        </div>
      </div>

      <!-- blog -->

      <div class="container mb-5">
        <h3 class="mb-5" id="blog" style="text-align: left; font-weight: 900; margin-top: 20px">Encontre dicas para seu Pet em nosso blog</h3>
        
          <a href="blog.php" style="text-decoration: none; color: #000">
          <div class="card md-3 mb-4" style="border-color: #f0f0f0;">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="img/caobravo.jpg" class="img-fluid rounded-start h-100" alt="cao bravo">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Saiba como evitar comportamentos agressivos de seu cão</h5>
                  <p class="card-text">Para evitar comportamentos agressivos em cães, é importante socializá-los desde cedo, treiná-los para obedecer comandos básicos, prestar atenção aos sinais de estresse ou ansiedade, mantê-los em uma coleira ou área cercada, evitar punições físicas ou reprimendas severas e buscar ajuda profissional se necessário.</p>
                  <p class="card-text"><span style="color: #518CD7; font-weight: 600">Comportamento</span></p>
                </div>
              </div>
            </div>
          </div>
          </a>

          <a href="blog.php" style="text-decoration: none; color: #000">
          <div class="card mb-4" style="border-color: #f0f0f0">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="img/gatofilhote.jpg" class="img-fluid rounded-start h-100" alt="gato filhote">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Dicas para cuidar de um gato filhote</h5>
                  <p class="card-text">Cuidar de gatos filhotes exige atenção especial para garantir que cresçam saudáveis e felizes. Alimentação adequada, higiene, vacinação e monitoramento constante da saúde são essenciais.</p>
                  <p class="card-text"><span style="color: #518CD7; font-weight: 600">Cuidados gerais</span></p>
                </div>
              </div>
            </div>
          </div>
          </a>
          
          <a href="blog.php" style="text-decoration: none; color: #000">
          <div class="card mb-4" style="border-color: #f0f0f0">
            <div class="row g-0">
              <div class="col-md-3">
                  <img src="img/racao.jpeg" class="img-fluid rounded-start h-100" alt="ração">
                </div>
                <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Saiba escolher o tipo de ração ideal para seu Pet</h5>
                  <p class="card-text">Escolher a ração ideal para um pet envolve avaliar sua idade, tamanho, atividade física, possíveis alergias ou doenças, e qualidade dos ingredientes da ração. Consultar um veterinário é importante para determinar as necessidades nutricionais do animal. Escolhendo marcas confiáveis, é possível garantir uma alimentação saudável e equilibrada.</p>
                  <p class="card-text"><span style="color: #518CD7; font-weight: 600">Nutrição</span></p>
                </div>
              </div>
            </div>
          </div>
        </a>
          
          <div class="row justify-content-center text-center mt-5">
            <a href="blog.php"><button id="botaoblog" style="background-color: #518CD7; color: #fff; font-weight: 600; border: none; border-radius: 10px; padding: 10px; font-size: 18px; margin-bottom: 20px">Visite o blog</button></a>
          </div>

      </div>

      <!-- nossas unidades -->
      
      <div class="container-fluid p-5 mb-5" id="mapa" style="background-color: #A7C8F2">
        <div class="row">
          <h3 class="mb-5 mt-2" style="text-align: center; font-weight: 900; color: #fff">Nossas unidades</h3>
        </div>
        <div class="container mb-2 mt-4">

            <div class="row justify-content-center mb-5">
                <div class="col-md-5">
                  <iframe id="map" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.7799321122648!2d-46.7243160881997!3d-23.648050978651742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce510e8d3746ed%3A0x3e9f3a76e1ebfb69!2sEscola%20Senai%20Su%C3%AD%C3%A7o-Brasileira%20Paulo%20Ernesto%20Tolle!5e0!3m2!1spt-BR!2sbr!4v1681598387503!5m2!1spt-BR!2sbr" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-7">
                    <h4 style="font-weight: 600; color: #fff">Santo Amaro</h4>
                    <span style="font-weight: 500; color: #fff; font-size: 20px">R. Bento Branco de Andrade Filho, 379 - Santo Amaro, São Paulo - SP,<br> 04757-000</span>
                    <p class="mt-5" style="font-weight: 600; color: #fff; font-size: 20px">Horário de atendimento: 06:00 às 23:00</p>
                </div>
            </div>
            <hr style="color: #fff">

            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-5">
                <iframe id="map" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.6636918478257!2d-46.71527448819971!3d-23.652212178648725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce51aa42392011%3A0xfbca76924e7bddaa!2sEscola%20Senai%20Ary%20Torres.!5e0!3m2!1spt-BR!2sbr!4v1681598995343!5m2!1spt-BR!2sbr" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-7">
                    <h4 style="font-weight: 600; color: #fff">Santo Amaro II</h4>
                    <span style="font-weight: 500; color: #fff; font-size: 20px">R. Amador Bueno, 504 - Santo Amaro, São Paulo - SP,<br> 04752-020</span>
                    <p class="mt-5" style="font-weight: 600; color: #fff; font-size: 20px">Horário de atendimento: 06:00 às 23:00</p>
                </div>
            </div>
            <hr style="color: #fff">

            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-5">
                <iframe id="map" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1334265510127!2d-46.65730988820182!3d-23.563650978709887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c88c16c03b%3A0xb36f532c0f310e90!2sSenai%20S%C3%A3o%20Paulo!5e0!3m2!1spt-BR!2sbr!4v1681599166743!5m2!1spt-BR!2sbr" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-7">
                    <h4 style="font-weight: 600; color: #fff">Bela Vista</h4>
                    <span style="font-weight: 500; color: #fff; font-size: 20px">Av. Paulista, 1313 - Bela Vista, São Paulo - SP,<br> 01311-200</span>
                    <p class="mt-5" style="font-weight: 600; color: #fff; font-size: 20px">Horário de atendimento: 06:00 às 23:00</p>
                </div>
            </div>

            <!-- <div class="row justify-content-center text-center">
              <a href="mapa.php"><button id="botaomapa" style="background-color: #fff; color: #518CD7; font-weight: 600; border: none; border-radius: 10px; padding: 10px; font-size: 18px;">Confira o mapa</button></a>
            </div> -->
        </div>
      </div>

      <!-- colaboradores -->

        <div class="container">
          <div class="row">
            <h3 class="mb-5 mt-2" style="font-weight: 900; color: #000">Colaboradores</h3>
          </div>
          <div class="row justify-content-center">
  
            <div class="col-md mb-5">
              <div class="card" id="colab" style="margin: 0 auto; height: 300px">
                <img src="img/404.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Leonardo da Silva Flores</h5>
                  <a href="https://www.linkedin.com/in/leonardo-da-silva-flores-617429252/" style="text-decoration: none">LinkedIn</a><br>
                  <a href="https://github.com/leosfl9" style="text-decoration: none">GitHub</a>
                </div>
              </div>
            </div>
  
            <div class="col-md mb-5">
              <div class="card" id="colab" style="margin: 0 auto; height: 300px">
                <img src="img/404.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Matheus Henrique Cardoso</h5>
                  <a href="https://www.linkedin.com/in/matheus-henrique-cardoso-nascimento-empresa-b47677252" style="text-decoration: none">LinkedIn</a><br>
                  <a href="https://github.com/MatheusHenrique29" style="text-decoration: none">GitHub</a>
                </div>
              </div>
            </div>
  
            <div class="col-md mb-5">
              <div class="card" id="colab" style="margin: 0 auto; height: 300px">
                <img src="img/404.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Noemi Sarid Azócar</h5>
                  <a href="https://www.linkedin.com/in/noemi-sarid-azocar-ramirez-152007202" style="text-decoration: none">LinkedIn</a><br>
                  <a href="https://github.com/nazocar" style="text-decoration: none">GitHub</a>
                </div>
              </div>
            </div>
  
            <div class="col-md mb-5">
              <div class="card" id="colab" style="margin: 0 auto; height: 300px">
                <img src="img/404.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Ribamar Julio Nunes</h5>
                  <a href="https://www.linkedin.com/in/ribamar-j-b634b320a" style="text-decoration: none">LinkedIn</a><br>
                  <a href="https://github.com/RibamarJulio" style="text-decoration: none">GitHub</a>
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
              <a href="#mapa" style="text-decoration: none; color: #000"><span style="font-size: 14px">Nossas lojas</span></a><br>
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