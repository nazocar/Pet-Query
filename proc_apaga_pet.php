<?php
    session_start();
    include_once("conexao.php");

    $id_pet = filter_input(INPUT_POST, 'id_pet', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id_pet)){
        $resultad_usuario = mysqli_query($mysqli, "DELETE a.* FROM servicos a WHERE fk_pet_age = $id_pet");
        $resulta_usuario = mysqli_query($mysqli, "DELETE b.* FROM pet b WHERE id_pet = $id_pet");
    
        if (mysqli_affected_rows($mysqli)){
            echo "<div class='mb-5' style='text-align: center'><span style='text-align: center; color: green; font-size: 1.5rem'>Usuário removido com sucesso" . "!" . "</span></div>";
            if(isset($_SESSION['adm'])){
                header("Location: painel.php");
            } else if (isset($_SESSION['fun'])){
                header("Location: painel_func.php");
            }
        } else{
            echo "<div class='mb-5' style='text-align: center'><span style='text-align: center; color: red; font-size: 1.5rem'>Usuário não foi editado." . "</span></div>";
            header("Location: painel.php");   
        }
    }
?>