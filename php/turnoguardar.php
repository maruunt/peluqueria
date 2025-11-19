<?php
session_start();
if (!isset($_SESSION['email'])) {
    // Usuario no autenticado, redirigir al login
    header('Location: ../index.php');
    exit();
}

if (isset($_POST['id_servicio']) && isset($_POST['fecha']) && isset($_POST['hora'])) {
    $a = $_SESSION['id_usuario'];
    $e = $_POST['id_servicio'];
    $c = $_POST['fecha'];
    $s = $_POST['hora'];
} else {
    echo "No se han recibido datos";
    exit();
}

include ('./conexion.php');
$insertar="INSERT INTO turnos (id_cliente, id_servicio, fecha, hora) VALUES ($a, $e, '$c', '$s')"; //
// $conexion=new mysqli('localhost', 'root', '', 'peluqueria');
//ejecutar consulta
$result = $conexion->query($insertar);

if ($result) {
    $_SESSION['alerta'] = "bienahre";
    // Credenciales correctas, redirigir al formulario de reserva
} else {
    $_SESSION['alerta'] = "maal";
    // Credenciales incorrectas, mostrar mensaje de error
    $error = "Correo electrónico o contraseña incorrectos.";
}
$conexion->close();

header('Location: turnos.php');
?>