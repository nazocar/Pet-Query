<?php

$usuario = 'sbwjgtkzyy';
$senha = '2W162SH2T2573YZ4$';
$database = 'petquery-database';
$host = 'petquery-server.mysql.database.azure.com';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
