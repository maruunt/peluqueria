<?php
$n=$_POST['nombre'];
$a=$_POST['apellido'];
$e=$_POST['email'];
$s=$_POST['servicio'];

include ('conexion.php');
$insertar="INSERT INTO cliente (nombre,apellido,email, servicio) VALUES  ('$n', '$a', '$e', '$s')";
//llamar a la base
$conexion=new mysqli('localhost', 'root', '', 'peluqueria');
//ejecutar consulta
$conexion->query($insertar);

header('Location:prueba.php');

?>