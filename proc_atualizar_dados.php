<?php
session_start();
include_once('conexao.php');
if(isset($_SESSION['id']) == false){
    header("Location: login.php");
}else{
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
    
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $status = verificador($cpf);
    if($status == true){
        $id = $_SESSION['id'];
        $tabela = $_SESSION['tabela'];
        $condicao = $_SESSION['condicao_dado'];
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $ddd = filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_NUMBER_INT);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
        $data = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
        $resultado_update = mysqli_query($mysqli, "UPDATE $tabela SET NOME = '$nome', SOBRENOME = '$sobrenome', CPF = '$cpf', DDD = '$ddd', TELEFONE = '$telefone', DATA_NASCIMENTO = '$data', EMAIL = '$email' WHERE $condicao = '$id'");
        header("Location: perfil_cli.php");
    
    
    }else{
        $_SESSION['msgcpf'] = "<p style='color:red;'>CPF Inválido</p>";
        header("Location: perfil_cli.php");
    }  
}
?>
