<?php
session_start();
include_once('conexao.php');
$id_cli = filter_input(INPUT_POST,'id_cli', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id_cli)){
    $sql = "SELECT * FROM PET WHERE FK_PET_CLI = '$id_cli'";
    $result = $mysqli->query($sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id_pet = $row['ID_PET'];
            $sql = "SELECT * FROM SERVICOS WHERE FK_PET_AGE = '$id_pet'";
            $result_servico = $mysqli->query($sql);
            if(mysqli_num_rows($result_servico) > 0){
                $sql = "DELETE FROM SERVICOS WHERE FK_PET_AGE = '$id_pet'";
                $mysqli->query($sql);
            }
            $sql = "DELETE FROM PET WHERE ID_PET = '$id_pet'";
            $mysqli->query($sql);
        }
    }
    $sql = "DELETE FROM LOGIN_CLIENTE WHERE FK_CLI_LOG = '$id_cli'";
    $mysqli->query($sql);
    $sql = "DELETE FROM ENDERECO_CLIENTE WHERE FK_CLI_END = '$id_cli'";
    $mysqli->query($sql);
    $sql = "DELETE FROM CLIENTE WHERE ID_CLIENTE = '$id_cli'";
    $mysqli->query($sql);
    header("Location: painel.php");
}else{
    header("Location: painel.php");
}
?>