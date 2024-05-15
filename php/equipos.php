<?php
session_start();

// Verificar y cerrar la sesión si está inactiva por más de 10 minutos
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    session_unset();
    session_destroy();
    header("Location: InicioSesion.php");
    exit();
}

// Actualizar el tiempo de la última actividad
$_SESSION['LAST_ACTIVITY'] = time();

// Comprobar si el usuario está autenticado
if (!isset($_SESSION['user'])) {
    // Si no está autenticado, redirigir al inicio de sesión
    header("Location: InicioSesion.php");
    exit();
}

require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styleEquipos.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/styleGuardarDatos.css">
    <title>Guardar datos</title>
</head>

<header>
        <nav>
            <h1><a>UEFA</a></h1>
            <ul class="menu-header">
                <li><a href="verGrupos.php">Realizar Sorteo</a></li>
                <li><a class="active" href="logout.php">Cerrar Sesion</a></li>
            </ul>
        </nav>

    </header>

<body>

<section>
    <div class="form-box">
        <div class="form-value">
            <form action="ingresarEquipos.php" method="POST"> 
                <div class="input-box">
                    <input type="text" name="nombre_equipo" required>
                    <label>Nombre del Equipo</label>
                </div>
                <div class="input-box">
                    <input type="text" name="pais" required>
                    <label>País de Procedencia</label>
                </div>
                <center>
                    <button type="submit">Guardar</button>
                </center>
            </form>
        </div>
    </div>
</section>


</body>

</html>