<?php
session_start();
include_once('conexao.php');

if(isset($_SESSION['id']) == false){
    header('Location: login.php');
}else{
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $senhac = filter_input(INPUT_POST, 'senhac', FILTER_SANITIZE_STRING);
    if($senha == $senhac){
        $senha = md5($senha);
        $tabela = $_SESSION['tabela_log'];
        $fk = $_SESSION['fK_log'];
        $id = $_SESSION['id'];
        mysqli_query($mysqli, "UPDATE $tabela SET SENHA = '$senha' WHERE $fk = '$id'");
        header("Location: perfil_cli.php");
    }else{
        $_SESSION['msg'] = "<p>Senhas diferentes</p>";
        header('Location: perfil_cli_seg.php');
    }
}

?>