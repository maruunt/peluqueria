<?php 
session_start();
error_reporting(0);
if (!isset($_SESSION['email'])) {
    // Usuario no autenticado, redirigir al login
    header('Location: ../index.php');
    exit();
}
$serv = "SELECT id, tipo FROM servicio ORDER BY id ASC";
include('conexion.php');
// aca se ejecuta el coso
$servicio= $conexion->query($serv);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Lotus peluqueria | Agenda</title>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="../index.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg> </a>
        </div>
    </nav>

    <!--Formulario-->
    <section class="formulario">
        <h2>Agenda tu turno</h2>
        <p>Completa el formulario con tus datos y el servicio que deseas reservar.</p>

        <!--La aletra con js :v-->
        <div id="alertaForm"></div>
        <?php if ($_SESSION['alerta'] == 'bienahre') : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Listo!</strong> Tu turno ha sido registrado con éxito. 
                En dos días recibirás un correo de confirmación.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php unset($_SESSION['alerta']); ?>
        <?php elseif ($_SESSION['alerta'] == 'maal') : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Alto salio mal!</strong> :c Intenta nuevamente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php unset($_SESSION['alerta']); ?>
        <?php endif; ?>

        <form id="formTurno" action="turnoguardar.php" method="POST">
            <label>Servicio</label>
            <select name="id_servicio" class="form-select" aria-label="Default select example" required>
                <option value="0">Seleccione el servicio que desea:</option>
                <?php
                    while($fila=$servicio->fetch_assoc()){
                        echo "<option value='{$fila['id']}'> {$fila['tipo']}</option>";
                    }
                ?>
            </select> <br>
            <p><input type="date" class="form-control" name="fecha"></p>
            <p><input type="time" class="form-control" name="hora"> </p>


            <input type="submit" id="botonValidar" class="btn btn-primary" name="Enviar">
        </form>
    </section>
    
    <!-- <script src="../js/calendario.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>