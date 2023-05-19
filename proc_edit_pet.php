<?php
    error_reporting(0);
    session_start();
    include("conexao.php");

    // include_once inclui o arquivo mencionado

    $id_pet=filter_input(INPUT_POST, 'id_pet', FILTER_SANITIZE_NUMBER_INT);
    $tipo=filter_input(INPUT_POST, 'pet', FILTER_SANITIZE_STRING);
    $raca=filter_input(INPUT_POST, 'raca', FILTER_SANITIZE_STRING);
    $nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cor=filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
    $sexo=filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $peso=filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_STRING);

    // FILTER_SANITIZE limpa tags HTML

    $result_usuario="UPDATE pet SET nome_pet='$nome', sexo='$sexo', pet='$tipo', raca='$raca', cor='$cor', peso='$peso' WHERE id_pet='$id_pet'";
    $resultado_usuario=mysqli_query($mysqli, $result_usuario);

    if (mysqli_affected_rows($mysqli)){
        $_SESSION['editpet'] = "<div class='mb-2'><span style='color: green; font-size: 1.5rem; font-family: calibri'>Pet editado com sucesso" . "!" . "</span></div>";
        if(isset($_SESSION['adm'])){
            header("Location: painel.php");
        } else if (isset($_SESSION['fun'])){
            header("Location: painel_func.php");
        } else if (isset($_SESSION['clie'])){
            header("Location: perfil_cli_pets.php");
        }
    } else{
        $_SESSION['editpet'] = "<div class='mb-5'><span style='color: red; font-size: 1.5rem'>Pet não foi editado." . "</span></div>";
        if(isset($_SESSION['adm'])){
            header("Location: painel.php");
        } else if (isset($_SESSION['fun'])){
            header("Location: painel_func.php");
        } else if (isset($_SESSION['clie'])){
            header("Location: perfil_cli_pets.php");
        }   
    }