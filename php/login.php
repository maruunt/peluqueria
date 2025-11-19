<?php
include ('conexion.php');

if (isset($_POST['email']) && isset($_POST['clave'])) {
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    $query = "SELECT * FROM cliente WHERE email='$email' AND clave='$clave'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        // Credenciales correctas, redirigir al formulario de reserva
        header('Location: form.php');
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        $error = "Correo electrónico o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Inicio de sesion</title>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand me-auto" href="../index.html"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg> </a>
        </div>
    </nav>

    <!--Formulario-->
    <section class="formulario">
        <form action="">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@ejemplo.com" required>
                <div id="emailHelp" class="form-text">No compartiremos tu correo electrónico con nadie más.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" name="clave" class="form-control" id="exampleInputPassword1">
            </div>

            <input type="submit" id="botonValidar" class="btn btn-primary" name="Enviar">
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>