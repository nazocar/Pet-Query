<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/blog.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/logo_blog.png" type="Image/png">
    <title>Blog PetQuery, tudo que você precisa saber sobre o seu pet!</title>
</head>
<body>
    
    <!-- navbar -->
<?php session_start() ?>
    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
          <a class="navbar-brand" href="blog.php"><img src="img/logo_blog.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" id="home" aria-current="page" href="index.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Home</a></li>
                <li class="nav-item"><a class="nav-link" id="pservicos" href="<?php if(isset($_SESSION['servico'])){echo $_SESSION['servico'];}else{echo'login.php';}?>" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Serviços</a></li>
                <li class="nav-item"><a class="nav-link active" id="produtos" href="blog.php" style="margin-left: 5vh; font-weight: bold; font-size: 18px">Blog</a></li>
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

    <!-- notícias -->

    <div class="container mb-5 mt-5">
        
        <!-- carousel -->

        <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <a href="noticias/alimentos-proibidos.php"><img id="carrossel" src="img/cao_comendo.jpg" class="d-block w-100" alt="cachorro comendo" style="height: 500px"></a>
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-weight: 600">Alimentos proibidos</h5>
                    <p style="font-weight: 500">Saiba quais alimentos não são recomendados para a alimentação de seu pet</p>
                </div>
                </div>
                <div class="carousel-item">
                <a href="noticias/cuidados-castracao.php"><img id="carrossel" src="img/pos_castracao.jpg" class="d-block w-100" alt="gato castrado" style="height: 500px"></a>
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-weight: 600">Cuidados pós-castração</h5>
                    <p style="font-weight: 500">Como cuidar de um gato após a castração</p>
                </div>
                </div>
                <div class="carousel-item">
                <a href="noticias/comportamentos-caninos.php"><img id="carrossel" src="img/comportamento_canino.jpg" class="d-block w-100" alt="cachorro deitado" style="height: 500px"></a>
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-weight: 600">Comportamentos caninos</h5>
                    <p style="font-weight: 500">Entenda alguns dos comportamentos de seu cão</p>
                </div>
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

        <h3 class="mb-5" id="blog" style="text-align: left; font-weight: 900; margin-top: 20px">Últimas postagens</h3>
        
          <a href="noticias/cao-agressivo.php" style="text-decoration: none; color: #000">
          <div class="card md-3 mb-4" style="border-color: #f0f0f0">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="img/caobravo.jpg" class="img-fluid rounded-start h-100" alt="cao bravo">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Saiba como evitar comportamentos agressivos de seu cão</h5>
                  <p class="card-text">Para evitar comportamentos agressivos em cães, é importante socializá-los desde cedo, treiná-los para obedecer comandos básicos, prestar atenção aos sinais de estresse ou ansiedade, mantê-los em uma coleira ou área cercada, evitar punições físicas ou reprimendas severas e buscar ajuda profissional se necessário.</p>
                  <p class="card-text"><span style="color: #518CD7; font-weight: 600">Comportamento - Há 18 horas</span></p>
                </div>
              </div>
            </div>
          </div>
          </a>

          <a href="noticias/gato-filhote.php" style="text-decoration: none; color: #000">
          <div class="card mb-4" style="border-color: #f0f0f0">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="img/gatofilhote.jpg" class="img-fluid rounded-start h-100" alt="gato filhote">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Dicas para cuidar de um gato filhote</h5>
                  <p class="card-text">Cuidar de gatos filhotes exige atenção especial para garantir que cresçam saudáveis e felizes. Alimentação adequada, higiene, vacinação e monitoramento constante da saúde são essenciais.</p>
                  <p class="card-text"><span style="color: #518CD7; font-weight: 600">Cuidados gerais - Há 2 dias</span></p>
                </div>
              </div>
            </div>
          </div>
          </a>
          
          <a href="noticias/racao-ideal.php" style="text-decoration: none; color: #000">
          <div class="card mb-4" style="border-color: #f0f0f0">
            <div class="row g-0">
              <div class="col-md-3">
                  <img src="img/racao.jpeg" class="img-fluid rounded-start h-100" alt="ração">
                </div>
                <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Saiba escolher o tipo de ração ideal para seu Pet</h5>
                  <p class="card-text">Escolher a ração ideal para um pet envolve avaliar sua idade, tamanho, atividade física, possíveis alergias ou doenças, e qualidade dos ingredientes da ração. Consultar um veterinário é importante para determinar as necessidades nutricionais do animal. Escolhendo marcas confiáveis, é possível garantir uma alimentação saudável e equilibrada.</p>
                  <p class="card-text"><span style="color: #518CD7; font-weight: 600">Nutrição - Há 5 dias</span></p>
                </div>
              </div>
            </div>
          </div>
        </a>

        <a href="noticias/banho-cao.php" style="text-decoration: none; color: #000">
          <div class="card mb-4" style="border-color: #f0f0f0">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="img/cao_banho.jpg" class="img-fluid rounded-start h-100" alt="cão tomando banho">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Como dar banho em seu cão</h5>
                  <p class="card-text">O banho é uma parte importante da rotina de cuidados com os animais de estimação, especialmente para os cães. Além de manter o animal limpo e cheiroso, o banho também é fundamental para a saúde do animal, prevenindo doenças de pele e infecções.</p>
                  <p class="card-text"><span style="color: #518CD7; font-weight: 600">Cuidados gerais - Há 2 semanas</span></p>
                </div>
              </div>
            </div>
          </div>
        </a>

        <a href="noticias/cuidar-hamster.php" style="text-decoration: none; color: #000">
          <div class="card mb-4" style="border-color: #f0f0f0">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="img/hamster.jpg" class="img-fluid rounded-start h-100" alt="mão segurando hamster">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">Aprenda a cuidar de hamster</h5>
                  <p class="card-text">Cuidar de um hamster pode ser uma atividade divertida e gratificante, mas é importante lembrar que esses pequenos animais precisam de atenção e cuidados diários para manter sua saúde e bem-estar. </p>
                  <p class="card-text"><span style="color: #518CD7; font-weight: 600">Cuidados gerais - Há 2 semanas</span></p>
                </div>
              </div>
            </div>
          </div>
        </a>

        <a href="noticias/alimentar-peixe.php" style="text-decoration: none; color: #000">
          <div class="card mb-4" style="border-color: #f0f0f0">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="img/peixe.jpg" class="img-fluid rounded-start h-100" alt="peixe betta">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600">A melhor forma de alimentar seu peixe</h5>
                  <p class="card-text">Para alimentar seu peixe, é preciso escolher uma ração adequada para a espécie do animal e dar a quantidade correta de comida, evitando excessos que podem causar problemas de saúde.</p>
                  <p class="card-text"><span style="color: #518CD7; font-weight: 600">Nutrição - Há 3 semanas</span></p>
                </div>
              </div>
            </div>
          </div>
        </a>
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
</body>
</html>