<?php
session_start();
include_once('conexao.php');
if(isset($_SESSION['id']) == false){
    header("Location: login.php");
}else{
    $id = $_SESSION['id'];
    $tabela = $_SESSION['tabela_end'];
    $condicao = $_SESSION['condicao_end'];

    
    if(!empty($id)){
        $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
        $uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
        $logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
        $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
        $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
        $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
        $resultado_update = mysqli_query($mysqli, "UPDATE $tabela SET BAIRRO = '$bairro', CEP = '$cep', COMPLEMENTO = '$complemento', LOGADOURO = '$logradouro', NUMERO = '$numero', UF = '$uf', CIDADE = '$cidade' WHERE $condicao = '$id'");
        header("Location: perfil_cli_end.php");
    }
}
?>