<?php
session_start();
include_once('conexao.php');

$id_servico = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_NUMBER_INT);
if(!empty ($id_servico)){
    $resultado_servico = mysqli_query($mysqli,"DELETE FROM SERVICOS WHERE ID_AGED_CLST = '$id_servico'");
    if(mysqli_affected_rows($mysqli)){
        $_SESSION['teste'] = "<p style='color:green;'>USUÁRIO DELETADO COM SUCESSO</p>";
        header("Location: servico_pet.php");
    }else{
        $_SESSION['teste'] = "<p style='color:red;'>Erro: o usuário não foi apagado</p>";
        header("Location: servico_pet.php");
    }
}else{
    $_SESSION['teste'] = "<p style='color:red;'>Erro: o usuário não foi apagado $id_servico</p>";
    header('Location: servico_pet.php');
}
?>