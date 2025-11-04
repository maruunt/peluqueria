<?php
$servidor='localhost';
$usuario='root';
$pass='';
$bd='peluqueria';

$conexion=mysqli_connect($servidor, $usuario, $pass, $bd);

//if (mysqli_connect_error()){
//     echo 'conexion fallida';
//}else{
//     echo 'conexion establecida';
//}

?>