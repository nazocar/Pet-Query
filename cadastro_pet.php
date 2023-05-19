<?php
    date_default_timezone_set('America/Sao_paulo');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cadastro_pet.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/scriptpet.js"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <title>PetQuery - Cadastro de pet</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <span><img src="img/cadeado.png" class="me-5" alt="icone de cadeado" style="width: 5vh;"></span>
        </div>
    </nav>

    <!-- cadastro pet -->

    <div class="container-fluid mt-5">
        <div class="container" id="form_login" style="width: 50%">
            <div class="row justify-content-center">
                <img class="rounded-circle mt-5" src="img/icone-pet.jpg" alt="icone de pet" style="width: 80px;">
            </div>
            <div class="row justify-content-center text-center mt-4 mb-5">
                <h6 style="font-weight: 600">Cadastrar um pet</h6>
            </div>
            <form method="POST" action="proc_cad_pet.php">
                <div class="mb-4">
                    <label for="nomepet" style="font-weight: 600" class="mb-2">Nome</label>
                    <input type="text" name="nome" placeholder="Nome do pet" minlength="1" maxlength="200" class="form-control" id="nomepet" style="border-color: #a9a9a9" required>
                </div>
                <div class="mb-4">
                    <div class="row">
                        <h6 style="font-weight: 600" class="mb-4">Tipo do pet</h6>
                        <div class="col-lg text-center">
                            <img src="img/icon-cachorro.png" class="mb-2" alt="icone de cachorro" style="width: 100px"><br>
                            <input type="radio" id="cachorro" name="tipo" value="Cachorro" onchange="yesDog()" required><br>
                            <label for="cachorro">Cachorro</label>
                        </div>
                        <div class="col-lg text-center">
                            <img src="img/icon-gato.png" class="mb-2" alt="icone de gato" style="width: 100px"><br>
                            <input type="radio" id="gato" name="tipo" value="Gato" onchange="yesCat()"><br>
                            <label for="gato">Gato</label>
                        </div>
                        <div class="col-lg text-center">
                            <img src="img/icon-ave.png" class="mb-2" alt="icone de ave" style="width: 100px"><br>
                            <input type="radio" id="passaro" name="tipo" value="Passaro" onchange="yesBird()"><br>
                            <label for="passaro">Pássaro</label>
                        </div>
                        <div class="col-lg text-center">
                            <img src="img/icon-coelho.png" class="mb-2" alt="icone de coelho" style="width: 100px"><br>
                            <input type="radio" id="coelho" name="tipo" value="Coelho" onchange="yesRabbit()"><br>
                            <label for="coelho">Coelho</label>
                        </div>
                        <div class="col-lg text-center">
                            <img src="img/icon-peixe.png" class="mb-2" alt="icone de peixe" style="width: 100px"><br>
                            <input type="radio" id="peixe" name="tipo" value="Peixe" onchange="yesFish()"><br>
                            <label for="peixe">Peixe</label>
                        </div>
                    </div>
                </div>

                <!-- inputs de raça -->

                <div class="mb-4" id="ifDog" style="display: none;">
                    <label for="racacachorro" style="font-weight: 600" class="mb-2">Raça</label>
                    <select class="form-control" name="raca" id="racacachorro" style="border-color: #a9a9a9">
                        <option value="" selected disabled>Selecione a raça do seu pet*</option>
                        <option value="Pug">Pug</option>
                        <option value="Shih-tzu">Shih Tzu</option>
                        <option value="Buldogue">Buldogue</option>
                        <option value="Dachshund">Dachshund</option>
                        <option value="Pastor-alemão">Pastor Alemão</option>
                        <option value="Poodle">Poodle</option>
                        <option value="Rottweiler">Rottweiler</option>    
                        <option value="Labrador">Labrador</option>
                        <option value="Pinscher">Pinscher</option>    
                        <option value="Golden retriever">Golden Retriever</option> 
                        <option value="Sem raça">Sem raça definida</option>                 
                    </select>
                </div>

                <div class="mb-4" id="ifCat" style="display: none;">
                    <label for="racagato" style="font-weight: 600" class="mb-2">Raça</label>
                    <select class="form-control" name="raca" id="racagato" style="border-color: #a9a9a9">
                        <option value="" selected disabled>Selecione a raça do seu pet*</option>
                        <option value="Persa">Persa</option>
                        <option value="Himalaia">Himalaia</option>
                        <option value="Siamês">Siamês</option>
                        <option value="Maine Coon">Maine Coon</option>
                        <option value="Angorá">Angorá</option>
                        <option value="Sphynx">Sphynx</option>
                        <option value="Ragdoll">Ragdoll</option>    
                        <option value="Ashera">Ashera</option>
                        <option value="American shorthair">American Shorthair</option>    
                        <option value="Exótico">Exótico</option> 
                        <option value="Sem raça">Sem raça definida</option>                 
                    </select>
                </div>

                <div class="mb-4" id="ifBird" style="display: none;">
                    <label for="racapassaro" style="font-weight: 600" class="mb-2">Raça</label>
                    <select class="form-control" name="raca" id="racapassaro" style="border-color: #a9a9a9">
                        <option value="" selected disabled>Selecione a raça do seu pet*</option>
                        <option value="Canário">Canário</option>
                        <option value="Calopsita">Calopsita</option>
                        <option value="Diamante-de-gould">Diamante de Gould</option>
                        <option value="Diamante-mandarim">Diamante Mandarim</option>
                        <option value="Manon">Manon</option>
                        <option value="Periquito">Periquito</option>               
                    </select>
                </div>

                <div class="mb-4" id="ifRabbit" style="display: none;">
                    <label for="racacoelho" style="font-weight: 600" class="mb-2">Raça</label>
                    <select class="form-control" name="raca" id="racacoelho" style="border-color: #a9a9a9">
                        <option value="" selected disabled>Selecione a raça do seu pet*</option>
                        <option value="Angorá">Angorá</option>
                        <option value="Coelho Leão">Coelho Leão</option>
                        <option value="Mini Lop">Mini Lop</option>
                        <option value="Fuzzy Lop">Fuzzy Lop</option>
                        <option value="Holland Lop">Holland Lop</option>
                        <option value="Nova Zelândia">Nova Zelândia</option>
                        <option value="Teddy">Teddy</option>               
                    </select>
                </div>

                <div class="mb-4" id="ifFish" style="display: none;">
                    <label for="racapeixe" style="font-weight: 600" class="mb-2">Raça</label>
                    <select class="form-control" name="raca" id="racapeixe" style="border-color: #a9a9a9">
                        <option value="" selected disabled>Selecione a raça do seu pet*</option>
                        <option value="Colisa">Colisa</option>
                        <option value="Tetra neon">Tetra Neon</option>
                        <option value="Coridora">Coridora</option>
                        <option value="Kinguio">Kinguio</option>
                        <option value="Molinésia">Molinésia</option>
                        <option value="Peixe arco-íris">Peixe Arco-íris</option>
                        <option value="Mato Grosso">Mato Grosso</option> 
                        <option value="Peixe limpa-vidro">Peixe Limpa-vidro</option>
                        <option value="Tanictis">Tanictis</option>
                        <option value="Acará Bandeira">Acará Bandeira</option>               
                    </select>
                </div>

                <div class="mb-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 style="font-weight: 600" class="mb-4">Sexo</h6>
                            <input type="radio" id="macho" name="sexo" value="M" required>
                            <label for="radiomacho">Macho</label>
                            <input type="radio" id="femea" name="sexo" value="F" style="margin-left: 15px">
                            <label for="radiomacho">Fêmea</label>
                        </div>
                        <div class="col-lg-6">
                            <label for="corpet" style="font-weight: 600" class="mb-2">Cor do pet</label>
                            <input type="text" name="cor" pattern="[a-zA-z]{1-20}" placeholder="Cor do seu pet" minlength="1" maxlength="20" class="form-control" id="corpet" style="border-color: #a9a9a9" required>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nascimentopet" style="font-weight: 600" class="mb-2">Data de nascimento</label>
                            <input type="date" name="date" onkeydown="return false" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="nascimentopet" style="border-color: #a9a9a9" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="pesopet" style="font-weight: 600" class="mb-2">Peso (em kg)</label>
                            <input type="number" name="peso" placeholder="Peso do seu pet" min="0" max="500" class="form-control" id="pesopet" style="border-color: #a9a9a9" required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <button type="submit" class="btn mb-3" style="background-color: #518CD7; color: #fff; font-weight: 600; width: 97%">Salvar</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>