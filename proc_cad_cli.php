<?php
session_start();
include_once("conexao.php");

function verificador($i){
    $soma = 0;
    $tam = strlen($i);
    $status = false;
    if (is_numeric($i) == 1 && $tam == 11)
    {
        $j = 0;
        for ($count = 10; $count >= 2 ; $count--){
            $valor = $i[$j] * $count;
            $soma = $soma + $valor;
            $j++;
        }
        $resto = $soma%11;
        if ($resto == 0 or $resto == 1){
            $resultado = 0 ;
        }
        else{
            $resultado = 11 - $resto;
        }
        if ($resultado == $i[9])
        {
            $j = 0;
            $valor = 0;
            $soma = 0;
            for ($count = 11; $count >= 2; $count--){
                $valor = $i[$j] * $count;
                $soma = $soma + $valor;
                $j++;
            }
            $resto = $soma%11;
            if ($resto == 0 or $resto == 1){
                $resultado = 0;
            }
            else{
                $resultado = 11 - $resto;
            }
            if ($resultado == $i[10]){
                $status = true;
                return $status;
            }
        }
    }
    return $status;
}

$cpf = filter_input(INPUT_POST, 'cpfcadastro', FILTER_SANITIZE_STRING);
// $status = verificador($cpf);
$status = verificador($cpf);
if ($status == true){
    $email = strtoupper(filter_input(INPUT_POST, 'emailcadastro', FILTER_SANITIZE_EMAIL));
    $resultado_cli = mysqli_query($mysqli, "SELECT * FROM LOGIN_CLIENTE WHERE USERNAME = '$email'");
    $resultado_func = mysqli_query($mysqli, "SELECT * FROM LOGIN_FUNCIONARIO WHERE USERNAME = '$email'");

    if((mysqli_num_rows($resultado_cli) > 0) && (mysqli_num_rows($resultado_func))){
        // EMAIL JÁ CADASTRADO
        $nome = filter_input(INPUT_POST, 'nomecadastro', FILTER_SANITIZE_STRING);
        $sobrenome = filter_input(INPUT_POST, 'sobrenomecadastro', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'emailcadastro', FILTER_SANITIZE_EMAIL);
        $cep = filter_input(INPUT_POST, 'cepcadastro', FILTER_SANITIZE_NUMBER_INT);
        
        $_SESSION['nome'] = $nome;
        $_SESSION['sobrenome'] = $sobrenome;
        $_SESSION['email'] = $email;
        $_SESSION['cep'] = $cep;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['msgemail'] = "<p style='color:red;'>EMAIL Inválido</p>";
        header("Location: cadastro_cli.php");
        
    }else{

        // CADASTRO DO REGISTRO CLIENTE
        $nome = strtoupper(filter_input(INPUT_POST, 'nomecadastro', FILTER_SANITIZE_STRING));
        $sobrenome = strtoupper(filter_input(INPUT_POST, 'sobrenomecadastro', FILTER_SANITIZE_STRING));
        $ddd = filter_input(INPUT_POST, 'dddcadastro', FILTER_SANITIZE_STRING);
        $telefone = filter_input(INPUT_POST, 'telefonecadastro', FILTER_SANITIZE_STRING);
        $datanascimento = $_POST['datanascimentocadastro'];
        $resultado_cli = mysqli_query($mysqli, "INSERT INTO CLIENTE (ID_CLIENTE, NOME, SOBRENOME, CPF, DDD, TELEFONE, DATA_NASCIMENTO, EMAIL, DATA_ENTRADA) VALUES (DEFAULT, '$nome', '$sobrenome', '$cpf','$ddd', '$telefone', '$datanascimento', '$email', NOW())");
        if(mysqli_insert_id($mysqli)){
        // BUSCANDO O ID DO CLINTE RECÉM CADASTRADO
        $resultado_cli = mysqli_query($mysqli, "SELECT ID_CLIENTE FROM CLIENTE WHERE CPF = '$cpf'");
        while ($row = mysqli_fetch_assoc($resultado_cli)){
            $id_cliente = $row['ID_CLIENTE'];
        }
    
        // CADASTRANDO O ENDEREÇO
        $cep = filter_input(INPUT_POST, 'cepcadastro', FILTER_SANITIZE_NUMBER_INT);
        $cidade = strtoupper(filter_input(INPUT_POST, 'cidadecadastro', FILTER_SANITIZE_STRING));
        $uf = strtoupper(filter_input(INPUT_POST, 'ufcadastro', FILTER_SANITIZE_STRING));
        $logradouro = strtoupper(filter_input(INPUT_POST, 'logradourocadastro', FILTER_SANITIZE_STRING));
        $numero = filter_input(INPUT_POST, 'numerocadastro', FILTER_SANITIZE_NUMBER_INT);
        $numero = $numero * 1;
        $complemento = strtoupper(filter_input(INPUT_POST, 'complementocadastro', FILTER_SANITIZE_STRING));
        $bairro = strtoupper(filter_input(INPUT_POST, 'bairrocadastro', FILTER_SANITIZE_STRING));
        $resultado_cli = mysqli_query($mysqli, "INSERT INTO ENDERECO_CLIENTE (ID_ENDERECO_CLIENTE, BAIRRO, CEP, COMPLEMENTO, LOGADOURO, NUMERO, UF, CIDADE, FK_CLI_END) VALUES (DEFAULT, '$bairro', '$cep', '$complemento', '$logradouro', '$numero', '$uf', '$cidade', '$id_cliente')");
        $senha = md5(filter_input(INPUT_POST, 'senhacadastro', FILTER_SANITIZE_STRING));
        $resultado_cli = mysqli_query($mysqli, "INSERT INTO LOGIN_CLIENTE (ID_LOGIN_CLIENTE, USERNAME, SENHA, DATA_DE_ENTRADA, DATA_DE_SAIDA, FK_CLI_LOG) VALUES (DEFAULT, '$email', '$senha', NULL, NULL, '$id_cliente')");
        header("Location:  login.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Cadastro Invalido</p>";
            header("Location: cadastro_cli.php");
        }
    }

}
else{

    // LEVAR ALGUMAS INFORMAÇÕES DE VOLTA A PÁGINA DE CADASTRO
    
    $nome = filter_input(INPUT_POST, 'nomecadastro', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'sobrenomecadastro', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'emailcadastro', FILTER_SANITIZE_EMAIL);
    $cep = filter_input(INPUT_POST, 'cepcadastro', FILTER_SANITIZE_NUMBER_INT);
    
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['email'] = $email;
    $_SESSION['cep'] = $cep;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['msgcpf'] = "<p style='color:red;'>CPF Inválido</p>";
    header("Location: cadastro_cli.php");
}


?>