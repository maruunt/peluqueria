<?php
$n=$_POST['nombre'];
$a=$_POST['apellido'];
$e=$_POST['email'];
$c=$_POST['clave'];
$s=$_POST['servicio'];

include ('conexion.php');
$insertar="INSERT INTO cliente (nombre,apellido,email, clave, servicio) VALUES  ('$n', '$a', '$e', '$c','$s')"; //
//llamar a la base
$conexion=new mysqli('localhost', 'root', '', 'peluqueria');
//ejecutar consulta
$conexion->query($insertar);

header('Location: form.php');

?>