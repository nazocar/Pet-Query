<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/perfil_cli_end.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <title>Endereços</title>
</head>
<body>
    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <span><img src="img/cadeado.png" class="me-5" alt="icone de cadeado" style="width: 5vh;"></span>
        </div>
    </nav>
    <?php 
    session_start();
    include_once('conexao.php');
    if(isset($_SESSION['id']) == false){
        header("Location: login.php");
    }else{
        $id = $_SESSION['id'];
        $tabela = $_SESSION['tabela_end'];
        $resultado_cli = mysqli_query($mysqli,"SELECT * FROM $tabela WHERE FK_CLI_END = '$id'");
        while ($row = mysqli_fetch_assoc($resultado_cli)){
            $bairro = $row['BAIRRO'];
            $cep = $row['CEP'];
            $complemento = $row['COMPLEMENTO'];
            $cpf = $row['COMPLEMENTO'];
            $logradouro = $row['LOGADOURO'];
            $numero = $row['NUMERO'];
            $uf = $row['UF'];
            $cidade = $row['CIDADE'];
        }
    }
    ?>

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Fechar &times;</button>
        <label for="nome_cliente" class="mt-3 ms-3 mb-3" style="color: #000000; font-weight: 700; font-size: 20px">Olá, <?php echo $_SESSION['nome_perfil']?></label>
        <a href="perfil_cli.php" class="w3-bar-item w3-button">
            <label for="dados" style="color: #000000; font-weight: 600;">Dados</label><br>
            <label for="dados" style="color: #808080; font-weight: 500;">Meus dados</label>
        </a>
        <a href="perfil_cli_end.php" class="w3-bar-item w3-button">
            <label for="end" style="color: #000000; font-weight: 600;">Endereços</label><br>
            <label for="end" style="color: #808080; font-weight: 500;">Meus endereços</label>
        </a>
        <a href="perfil_cli_seg.php" class="w3-bar-item w3-button">
            <label for="seguranca" style="color: #000000; font-weight: 600;">Segurança</label><br>
            <label for="seguranca" style="color: #808080; font-weight: 500;">Altere sua senha</label>
        </a>
        <a href="perfil_cli_pets.php" class="w3-bar-item w3-button">
            <label for="pets" style="color: #000000; font-weight: 600;">Pets</label><br>
            <label for="pets" style="color: #808080; font-weight: 500;">Meus pets cadastrados</label>
        </a>
      </div>
      
      <div class="w3-main" style="margin-left:200px">
      <div class="nav-item">
        <button class="w3-button burguer-teal w3-xlarge w3-hide-large" style="color: #fff ; background-color: #A7C8F2;" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
          <h1>Meus endereços</h1>
        </div>
      </div>
      
      <div class="w3-container">
        <p style="color: #808080; font-weight: 500;">Mantenha seu endereço sempre atualizado para agendamentos mais facilitados</p>

        <form action="proc_atualizar_end.php" method="POST">
            
            <div class="row">
                <div class="col mb-2" id="colname">
                    <label class="placeholder" style="font-weight: 600">CEP</label>
                    <input type="text" placeholder="CEP" pattern="[0-9]{8}" onblur="pesquisacep(this.value);" minlength="8" maxlength="8" class="form-control input" id="cep" name="cep" style="border-color: #a9a9a9" value="<?php echo $cep?>" required>
                </div>
                <div class="col mb-2" style="margin-right: 60%;">
                    <label class="placeholder" style="font-weight: 600">Cidade</label>
                    <input type="text" class="form-control input" required="required" style="width: 300px;" name="cidade" id="cidade" value="<?php echo $cidade?>">
                </div>
            </div><br>
    
            <div class="row">
                <div class="col mb-2">
                    <label class="placeholder" style="font-weight: 600">UF</label>
                    <input type="text" class="form-control input" required="required" style="width: 300px;" id="uf" name="uf" value="<?php echo $uf?>">
                </div>
                <div class="col mb-2" style="margin-right: 60%";>
                    <label class="placeholder" style="font-weight: 600">Endereço</label>
                    <input type="text" class="form-control input" required="required" style="width: 300px;" id="logradouro" name="logradouro" value="<?php echo $logradouro?>">
                </div>
            </div><br>
    
            <div class="row">
                <div class="col mb-2">
                    <label class="placeholder" style="font-weight: 600">Número</label>
                    <input type="text" class="form-control input" required="required" style="width: 300px;" name="numero" value="<?php echo $numero?>">
                </div>
                <div class="col mb-2" style="margin-right: 60%;">
                    <label class="placeholder" style="font-weight: 600">Complemento</label>
                    <input type="text" class="form-control input" style="width: 300px;" id="complemento" name="complemento" value="<?php echo $complemento?>">
                </div>
            </div><br>
            <div class="row">
                <div class="col mb-2">
                    <label class="placeholder" style="font-weight: 600">Bairro</label><br>
                    <input type="text" class="form-control input" required="required" style="width: 300px;" id="bairro" name="bairro" value="<?php echo $bairro?>">
                </div>
            </div><br>
    
            <div>
                <button type="submit" class="btn btn-primary mb-3"id="criar">Editar informações</button>
            </div><br>
          </div>
        </form>
         
      
      </div>
      <script>


    function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('logradouro').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
    
        function pesquisacep(valor) {
            
            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');
    
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
    
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
    
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
    
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('logradouro').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";
    
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
    
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
    
                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
                    
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                    //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    </script>

    <script>
        
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
      }
      
      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
      }
    </script>

    
        <!--<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%; margin-left: 15%">
            <h3 class="w3-bar-item">Minha Conta</h3>
            <a href="dados_cli.php">
                <label for="dados" style="color: #000000; font-weight: 600; font-size: 20px">Ola, fulano</label><br>
                <label for="dados" style="color: #808080; font-weight: 500; font-size: 20px">Meus dados</label>
            </a>
            <hr>
            <a href="end_cadastrado.php">
                <label for="endereco" style="color: #000000; font-weight: 600; font-size: 20px">Endereços</label><br>
                <label for="endereco" style="color: #808080; font-weight: 500; font-size: 20px">Meus endereços</label>
            </a>
            <hr>
            <a href="seguranca.php">
                <label for="seguranca" style="color: #000000; font-weight: 600; font-size: 20px">Segurança</label><br>
                <label for="seguranca" style="color: #808080; font-weight: 500; font-size: 20px">Altere sua senha</label>
            </a>
            <hr>
            <a href="pets_cadastrados.php">
                <label for="pets" style="color: #000000; font-weight: 600; font-size: 20px">Pets</label><br>
                <label for="pets" style="color: #808080; font-weight: 500; font-size: 20px">Meus pets cadastrados</label>
            </a>
            <div style="margin-left:25%">
            
            <div class="w3-container w3-teal">
             <h1 style="margin-top: -25%; margin-left: 25%">Minha Conta</h1>
             <img src="img/icons/usuario.png" alt="Car" style="width:200px; margin-top: 1%; margin-left: 25%; border-radius: 150px">
            </div>
            
            
            
            
            
            </div>
          </div> -->
          
          <!-- Page Content -->
    </div>
</body>
</html>