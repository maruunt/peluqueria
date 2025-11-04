<?php
$serv= "SELECT id, tipo FROM servicio ORDER BY id ASC";
include('conexion.php');
// aca se ejecuta el coso
$servicio= $conexion ->query($serv);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Peluqueria Blanca | Agenda</title>
</head>
<body>
    <h1>Registra tu turno</h1>
    <form action="registrar.php" method="post">

        <label>Nombre</label>
        <input type="text" name="nombre" required> <br> <br>

        <label>Apellido</label>
        <input type="text" name="apellido" required> <br> <br>

        <label>Email</label>
        <input type="email" name="email" required> <br> <br>

        <label>Servicio</label>
        <select name="servicio" id="" required>
            <option value="0">Seleccione el servicio que desea:</option>
            <?php
                while($fila=$servicio->fetch_assoc()){
                    echo "<option value='{$fila['id']}'> {$fila['tipo']}</option>";
                }
            ?>
        </select> <br> <br>

        <input type="submit" name="Enviar">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>