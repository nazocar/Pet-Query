<?php
    error_reporting(0);
    session_start();
    include("conexao.php");

    // include_once inclui o arquivo mencionado

    $id_aged=filter_input(INPUT_POST, 'id_aged', FILTER_SANITIZE_NUMBER_INT);
    $id_pet=filter_input(INPUT_POST, 'id_pet', FILTER_SANITIZE_NUMBER_INT);
    $id_cliente=filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);
    $nome=filter_input(INPUT_POST, 'nome_pet', FILTER_SANITIZE_STRING);
    $dono=filter_input(INPUT_POST, 'dono', FILTER_SANITIZE_STRING);
    $data=filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $hora=filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);

    // FILTER_SANITIZE limpa tags HTML

    $result_usuario="UPDATE servicos INNER JOIN pet INNER JOIN cliente SET data_servicos='$data', horario='$hora' WHERE id_aged_clst='$id_aged'";
    $resultado_usuario=mysqli_query($mysqli, $result_usuario);

    if (mysqli_affected_rows($mysqli)){
        $_SESSION['edit'] = "<div class='mb-2 mt-3' style='text-align: center'><span style='text-align: center; color: green; font-size: 1.5rem'>Serviço editado com sucesso" . "!" . "</span></div>";
        if(isset($_SESSION['adm'])){
            header("Location: painel.php");
        } else if (isset($_SESSION['fun'])){
            header("Location: painel_func.php");
        }
    } else{
        $_SESSION['edit'] = "<div class='mb-2 mt-3' style='text-align: center'><span style='text-align: center; color: red; font-size: 1.5rem'>Serviço não foi editado." . "</span></div>";
        if(isset($_SESSION['adm'])){
            header("Location: painel.php");
        } else if (isset($_SESSION['fun'])){
            header("Location: painel_func.php");
        }   
    }