<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retro_machine";

$conexion = mysqli_connect($servername,$username,$password,$dbname);
//var_dump($_POST);

if(!$conexion){
    die('Fallo la conexion: '.mysqli_connect_error());
}




?>