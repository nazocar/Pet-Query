<?php
    session_start();
    include_once("conexao.php");

    $id_func = filter_input(INPUT_POST, 'id_func', FILTER_SANITIZE_NUMBER_INT);
    $id_end_func = filter_input(INPUT_POST, 'id_end_func', FILTER_SANITIZE_NUMBER_INT);
    $id_login_func = filter_input(INPUT_POST, 'id_login_func', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id_func)){
        $resultad_usuario = mysqli_query($mysqli, "DELETE b.* FROM endereco_funcionario b WHERE id_endereco_funcionario = $id_end_func");
        $resulta_usuario = mysqli_query($mysqli, "DELETE c.* FROM login_funcionario c WHERE id_login_funcionario = $id_login_func");
        $resultado_usuario = mysqli_query($mysqli, "DELETE a.* FROM funcionario a WHERE id_funcionario = $id_func");

        if (mysqli_affected_rows($mysqli)){
            echo "<div class='mb-5' style='text-align: center'><span style='text-align: center; color: green; font-size: 1.5rem'>Funcionário removido com sucesso" . "!" . "</span></div>";
            if(isset($_SESSION['adm'])){
                header("Location: painel.php");
            } else if (isset($_SESSION['fun'])){
                header("Location: painel_func.php");
            }
        } else{
            echo "<div class='mb-5' style='text-align: center'><span style='text-align: center; color: red; font-size: 1.5rem'>Funcionário não foi editado." . "</span></div>";
            header("Location: painel.php");   
        }
    }
?>