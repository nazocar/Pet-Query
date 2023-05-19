<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cadastro_cliente.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <title>PetQuery - Cadastro de funcionário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/cadusuario.js"></script>
    <?php
    date_default_timezone_set('America/Sao_paulo');
    session_start();
    include('protect.php');
    ?> 
</head>
<body>

    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <span><img src="img/cadeado.png" class="me-5" alt="icone de cadeado" style="width: 5vh;"></span>
        </div>
    </nav>

    <!-- cadastro -->

    <div class="container-fluid">
        <div class="row mt-4 ms-2">
            <a href="painel.php" style="text-decoration: none;"><span><img src="img/retornar.png" alt="seta de retorno" class="me-2" style="width: 35px; float: left"><h5 class="mt-1" style="color: #0D51AA; font-weight: 600">Voltar</h6></span></a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container" id="form_cad" style="width: 70%">
            <div class="row justify-content-center">
                <img class="rounded-circle mt-5" src="img/icons/usuario.png" alt="icone de usuario" style="width: 80px;">
            </div>
            <div class="row justify-content-center text-center mt-4">
                <h6 style="font-weight: 600">Cadastrar funcionário</h6>
            </div>
            <div class="row justify-content-center text-center mt-2 mb-5">
                <small class="form-text">Complete os campos com as informações do funcionário</small>
                <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg'];unset($_SESSION['msg']);} ?>
            </div>
            <form method="POST" action="proc_cad_func.php">


                <!-- parte de cima -->

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="mb-4">
                            <input type="text" placeholder="Nome" minlength="1" maxlength="100" class="form-control" name="nomecadastro" style="border-color: #a9a9a9" value="<?php if(isset($_SESSION['nome'])){echo $_SESSION['nome'];unset($_SESSION['nome']);}?>" required>
                        </div>
                        <div class="mb-4">
                            <input type="text" placeholder="Sobrenome" minlength="1" maxlength="100" class="form-control" name="sobrenomecadastro" style="border-color: #a9a9a9" value="<?php if(isset($_SESSION['sobrenome'])){echo $_SESSION['sobrenome'];unset($_SESSION['sobrenome']);}?>" required>
                        </div>
                        <div class="mb-4">
                            <input type="text" placeholder="Profissão " class="form-control" minlength="1" maxlength="100" name="profissaocadastro" style="border-color: #a9a9a9" required>
                        </div>
                        <div class="mb-4">
                            <input type="text" minlength="11" maxlength="11" pattern="[0-9]{11}" placeholder="CPF" class="form-control" minlength="11" maxlength="11" name="cpfcadastro" style="border-color: #a9a9a9" value="<?php if(isset($_SESSION['cpf'])){echo $_SESSION['cpf'];unset($_SESSION['cpf']);}?>" required>
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-xl-4 mb-4">
                                    <input class="form-control" placeholder="Data de nascimento" type="text" onfocus="(this.type='date')" onkeydown="return false" max="<?php echo date('Y-m-d'); ?>" name="datanascimentocadastro" style="border-color: #a9a9a9; border-radius: 4px" required>
                                </div>
                                <div class="col-xl-2 mb-4">
                                    <input class="form-control" type="number" name="dddcadastro" id="dddcadastro" placeholder="DDD" min="11" max="99" style="border-color: #a9a9a9; border-radius: 4px" required>
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" placeholder="Telefone" minlength="8" maxlength="9" pattern="[0-9]{8-9}" class="form-control" name="telefonecadastro" style="border-color: #a9a9a9" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="mb-4">
                            <input type="email" placeholder="E-mail" minlength="1" maxlength="250" class="form-control" name="emailcadastro" style="border-color: #a9a9a9" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];unset($_SESSION['email']);}?>" required>
                            <?php if(isset($_SESSION['msgemail'])){ echo $_SESSION['msgemail']; unset($_SESSION['msgemail']); } ?>
                        </div>
                        <div class="mb-4" id="divi">
                            <input type="password" placeholder="Senha" minlength="8" maxlength="30" class="form-control" name="senhacadastro" id="password" style="border-color: #a9a9a9;" required>
                            <i class="fa fa-eye" onclick="passShow(this)" id="showpassword"></i>
                        </div>
                        <div class="mb-4" id="divi">
                            <input type="password" id="confpassword" placeholder="Confirmar senha" minlength="8" maxlength="30" class="form-control" name="confcadastro" style="border-color: #a9a9a9" onblur="confirmarsenha();" required>
                            <i class="fa fa-eye" onclick="confShow(this)" id="showpassword"></i>
                        </div>
                    </div>

                    <!-- parte de baixo -->

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <input type="text" placeholder="CEP" pattern="[0-9]{8}" onblur="pesquisacep(this.value);" minlength="8" maxlength="8" class="form-control" id="cepcadastro" name="cepcadastro" style="border-color: #a9a9a9" value="<?php if(isset($_SESSION['cep'])){echo $_SESSION['cep'];unset($_SESSION['cep']);}?>" required>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="mb-4">
                                    <input type="text" placeholder="Cidade" minlength="1" maxlength="250" class="form-control" id="cidadecadastro" name="cidadecadastro" style="border-color: #a9a9a9" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-4">
                                    <input type="text" placeholder="UF" pattern="[A-Za-z]{2}" class="form-control" id="ufcadastro" name="ufcadastro" style="border-color: #a9a9a9" value="<?php if(isset($_SESSION['uf'])){echo $_SESSION['uf'];unset($_SESSION['uf']);}?>" required>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="mb-4">
                                    <input type="text" placeholder="Logradouro" minlength="1" maxlength="250" class="form-control" id="logradourocadastro" name="logradourocadastro" style="border-color: #a9a9a9" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-4">
                                    <input type="number" placeholder="Nº" minlength="1" maxlength="6" class="form-control" id="numerocadastro" name="numerocadastro" style="border-color: #a9a9a9" required>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <input type="text" placeholder="Complemento*" minlength="1" maxlength="50" class="form-control" id="complementocadastro" name="complementocadastro" style="border-color: #a9a9a9">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="mb-4">
                                    <input type="text" placeholder="Bairro" minlength="1" maxlength="250" class="form-control" id="bairrocadastro" name="bairrocadastro" style="border-color: #a9a9a9" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid mb-5">
                        <div class="row justify-content-center text-center mt-3">
                            <button type="submit" class="btn mb-3" style="background-color: #518CD7; color: #fff; font-weight: 600; width: 98%" id="criar">Crie uma conta</button>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>

</body>
</html>
<script>


    function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('logradourocadastro').value=(conteudo.logradouro);
                document.getElementById('bairrocadastro').value=(conteudo.bairro);
                document.getElementById('cidadecadastro').value=(conteudo.localidade);
                document.getElementById('ufcadastro').value=(conteudo.uf);
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
                    document.getElementById('logradourocadastro').value="...";
                    document.getElementById('bairrocadastro').value="...";
                    document.getElementById('cidadecadastro').value="...";
                    document.getElementById('ufcadastro').value="...";
    
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