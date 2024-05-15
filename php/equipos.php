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
        <h1><a href="index.php">UEFA</a></h1>
        <ul class="menu-header">
            <li><a href="verGrupos.php">Realizar Sorteo</a></li>
            <li><a class="active" href="logout.php">Cerrar Sesion</a></li>
        </ul>
    </nav>
</header>

<body>

    <section>
        
        <div class="login-box">
            <form>
                <div class="user-box">
                    <input type="text" name="" required="">
                    <label>Nombre del Equipo</label>
                </div>
                <div class="user-box">
                    <input type="password" name="" required="">
                    <label>País de Procedencia</label>
                </div>
                <center>
                    <a href="#">
                        Guardar
                        <span></span>
                    </a>
                </center>
            </form>
        </div>

    </section>

</body>

</html>