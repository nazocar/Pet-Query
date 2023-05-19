<?php
session_start();
require('conexao.php');

$id = $_SESSION['id'];
$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST,'sexo',FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST,'date',FILTER_SANITIZE_NUMBER_INT);
$cor = filter_input(INPUT_POST,'cor',FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST,'tipo',FILTER_SANITIZE_STRING);
$peso = filter_input(INPUT_POST,'peso',FILTER_SANITIZE_STRING);
$raca = filter_input(INPUT_POST,'raca',FILTER_SANITIZE_STRING);
date_default_timezone_set('America/Sao_Paulo');

// Gerar com PHP o horario atual
$horario_atual = date("H:i:s");
//var_dump($horario_atual);

// Gerar a data com PHP no formato que deve ser salvo no BD
$data = date('Y/m/d');
$data_entrada = ($data);

$insertpet = "INSERT INTO pet(ID_PET,NOME_pet,RACA,PET,SEXO,COR,PESO,DATA_NASCIMENTO_pet,FK_PET_CLI,data_cadastro) 
VALUE('', '$nome','$raca','$tipo','$sexo','$cor','$peso','$data','$id',NOW())";
$resultpet = mysqli_query($mysqli,$insertpet);
var_dump($nome);
echo $data_entrada;

header('location: servico_pet.php')
?>