<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sobrenos.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/sobre.js"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <title>Conheça a PetQuery!</title>
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

    <!-- links das seções -->

    <div class="container-fluid">
        <div class="container mt-5 mb-5">
            <div class="row text-center">
                <div class="col-md-4 mb-4 mt-3">
                    <button id="missao" style="font-size: 22px; background-color: #A7C8F2; color: #0D51AA; border: 1px solid #518CD7; font-weight: 600; border-radius: 25px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px" onclick="red()">Nossa missão</button>
                </div>

                <div class="col-md-4 mb-4 mt-3">
                    <button id="valores" style="font-size: 22px; background-color: #A7C8F2; color: #0D51AA; border: 1px solid #518CD7; font-weight: 600; border-radius: 25px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px" onclick="green()">Nossos valores</button>
                </div>

                <div class="col-md-4 mb-4 mt-3">
                    <button id="vantagens" style="font-size: 22px; background-color: #A7C8F2; color: #0D51AA; border: 1px solid #518CD7; font-weight: 600; border-radius: 25px; padding-top: 5px; padding-bottom: 5px; padding-left: 15px; padding-right: 15px"  onclick="blue()">Nossas vantagens</button>
                </div>
            </div>
        </div>

        <!-- seções -->

        <div class="container mb-5 text-center justify-content-center" id="vermelho" style="background-color: #fff; display: block; border-radius: 25px; max-width: 850px; padding-top: 35px;"> 
            <img src="img/logo3.png" alt="" style="width: 150px">
            <h2 style="font-weight: 600; color: #518CD7;">Trazendo o melhor para o seu pet!</h2>
            <div class="container p-5" style="max-width: 550px">
                <p style="font-size: 18px;">Bem-vindo à PetQuery! Nossa missão é fornecer serviços de qualidade para animais de estimação, promovendo o bem-estar e a saúde dos bichinhos.<br><br>Entendemos que nossos clientes consideram seus animais de estimação como membros da família e, por isso, nos dedicamos a oferecer tudo o que eles precisam para garantir uma vida saudável e feliz para seus bichinhos.<br><br>Nosso time é formado por funcionários dedicados e apaixonados por animais, que estão sempre prontos para ajudá-lo a escolher os serviços mais adequados para as necessidades do seu bichinho. Todos os nossos profissionais são treinados e capacitados para fornecer orientação e suporte aos nossos clientes, garantindo que seus animais recebam o melhor tratamento possível.<br><br>Também estamos comprometidos com a responsabilidade social e ambiental. Nós promovemos a adoção de animais e incentivamos nossos clientes a fazerem escolhas sustentáveis, como a redução do uso de plásticos e outros materiais prejudiciais ao meio ambiente.<br><br>Agradecemos por nos escolher e estamos sempre prontos para ajudá-lo a cuidar do seu animal de estimação da melhor maneira possível.</p>

            </div>
        </div>

        <div class="container mb-5 text-center justify-content-center" id="verde" style="background-color: #fff; display: none; border-radius: 25px; max-width: 850px; padding-top: 35px;"> 
            <img src="img/logo3.png" alt="" style="width: 150px">
            <h2 style="font-weight: 600; color: #518CD7;">Conheça os valores da PetQuery.</h2>
            <div class="container p-5" style="max-width: 550px">
                <p style="font-size: 18px;">Nós, da PetQuery, temos como valores fundamentais o respeito e a dedicação aos animais, a excelência em nossos serviços, o compromisso com a satisfação dos nossos clientes e a responsabilidade social e ambiental.<br><br>Para nós, os animais são seres vivos que merecem todo o nosso respeito e cuidado. Por isso, trabalhamos com serviços que visam garantir o bem-estar e a saúde dos bichinhos, além de oferecermos um ambiente acolhedor e seguro para eles.<br><br>A excelência em nossos serviços é uma prioridade para nós. Estes são realizados por profissionais altamente capacitados e dedicados, que estão sempre em busca da perfeição.<br><br>Nós valorizamos a satisfação dos nossos clientes acima de tudo. Estamos sempre prontos para ouvir as necessidades e as expectativas de nossos clientes, e fazemos o nosso melhor para superá-las. Nós buscamos estabelecer uma relação de confiança com nossos clientes, oferecendo-lhes um atendimento personalizado e de qualidade.<br><br>A responsabilidade social e ambiental é um valor que está presente em tudo o que fazemos. Nós nos preocupamos com o meio ambiente e trabalhamos para minimizar o nosso impacto no planeta. Além disso, promovemos a adoção de animais e contribuímos com diversas causas sociais que visam o bem-estar dos animais.<br><br>Estes são os valores que nos definem. Agradecemos a sua confiança em nosso trabalho e esperamos continuar oferecendo serviços de qualidade para os seus bichinhos.</p>

            </div>
        </div>

        <div class="container mb-5 text-center justify-content-center" id="azul" style="background-color: #fff; display: none; border-radius: 25px; max-width: 850px; padding-top: 35px;"> 
            <img src="img/logo3.png" alt="" style="width: 150px">
            <h2 style="font-weight: 600; color: #518CD7;">Por que escolher a PetQuery?</h2>
            <div class="container p-5" style="max-width: 550px">
                <p style="font-size: 18px;">Ao escolher o nosso pet shop, você pode desfrutar dos seguintes benefícios: <br><br> <img style="width: 70px; border-radius: 50%" src="img/espec.jpg" alt="icone de serviços especializados"> <br><br>

                    Serviços especializados: Nós oferecemos serviços especializados para animais de estimação, como banho, tosa, tratamentos de saúde e hospedagem. Nossos profissionais são altamente capacitados e estão sempre prontos para fornecer orientação e suporte aos nossos clientes, garantindo que seus animais recebam o melhor tratamento possível.
                    <br><br> <img style="width: 70px; border-radius: 50%" src="img/atend.jpg" alt="icone de atendimento personalizado"> <br><br>
                    Atendimento personalizado: Nós valorizamos a satisfação dos nossos clientes acima de tudo. Por isso, oferecemos um atendimento personalizado e de qualidade, entendendo as necessidades e as expectativas de cada um de nossos clientes e trabalhando para superá-las.
                    <br><br> <img style="width: 70px; border-radius: 50%" src="img/acolh.jpg" alt="icone de ambiente acolhedor"> <br><br>
                    Ambiente acolhedor: Nós criamos um ambiente acolhedor e seguro para os animais de estimação e seus donos. Em nosso pet shop, você encontrará um espaço dedicado ao bem-estar dos bichinhos, com uma equipe apaixonada por animais e pronta para ajudá-lo em tudo o que for necessário.
                    <br><br> <img style="width: 70px; border-radius: 50%" src="img/ambie.jpg" alt="icone de responsabilidade social e ambiental"> <br><br>
                    Responsabilidade social e ambiental: Nós estamos comprometidos com a responsabilidade social e ambiental, promovendo a adoção de animais e incentivando nossos clientes a fazerem escolhas sustentáveis, como a redução do uso de plásticos e outros materiais prejudiciais ao meio ambiente.
                    <br><br>
                    Estes são apenas alguns dos benefícios que você pode desfrutar ao escolher a PetQuery. Agradecemos a sua confiança em nosso trabalho e estamos sempre prontos para ajudá-lo a cuidar do seu animal de estimação da melhor maneira possível. Conheça os nossos serviços!</p>
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