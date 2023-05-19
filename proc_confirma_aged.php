<?php
session_start();
require("conexao.php");
$time = filter_input(INPUT_POST,'time',FILTER_SANITIZE_NUMBER_FLOAT);
$data = filter_input(INPUT_POST,'data',FILTER_SANITIZE_NUMBER_FLOAT);
$valor = filter_input(INPUT_POST,'valor',FILTER_SANITIZE_NUMBER_FLOAT);
$date = date($time);
$proc = "SELECT id_aged_clst FROM servicos order by id_aged_clst desc limit 0,1";
$result = mysqli_query($mysqli,$proc);
$rest = mysqli_fetch_assoc($result);
$id_agend =  ($rest['id_aged_clst']);
var_dump($id_agend);
var_dump($time);
var_dump($data);
var_dump($valor);
var_dump($date);
$query_up = "UPDATE `servicos` set `DATA_SERVICOS` = '$data' , `HORARIO` = '$time', `VALOR` = '$valor' WHERE `servicos`.`ID_AGED_CLST` = '$id_agend'  ;";
$result_up = mysqli_query($mysqli,$query_up);

header('location: servico_pet.php');