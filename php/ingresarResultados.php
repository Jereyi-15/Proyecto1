<?php
session_start();

// Verificar y cerrar la sesión si está inactiva por más de 10 minutos
if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
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
    <title>Ingresar Resultados</title>
    <link rel="stylesheet" href="../css/styleIngresarResultados.css">
</head>

<header>
    <nav>
        <h1>UEFA</h1>
        <ul class="menu-header">
            <li><a href="equipos.php">Inicio</a></li>
            <li><a href="verGrupos.php">Ver Grupos</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>

<body>

    <h2>Ingresar Resultados de Partidos</h2>
    <form action="actualizarEstadisticas.php" method="post">
        <?php
        // Obtener los grupos disponibles
        $grupos = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');

        foreach ($grupos as $grupo) {
            // Obtener los equipos del grupo actual
            $query_equipos = $mysqli->query("SELECT nombre_equipo FROM Grupos WHERE nombre_grupo = '$grupo'");
            $equipos = $query_equipos->fetch_all(MYSQLI_ASSOC);

            
            // Generar los partidos para cada equipo del grupo
         
            foreach ($equipos as $equipo) {
                $equipo_local = $equipo['nombre_equipo'];
            
                // Iterar sobre los equipos restantes para generar los partidos
                foreach ($equipos as $equipo_visitante) {
                    if ($equipo_visitante['nombre_equipo'] != $equipo_local) {
                        $equipo_visitante = $equipo_visitante['nombre_equipo'];
            
                        // Generar los campos del formulario para ingresar los resultados
                        echo "<div class='group'>";
                        echo "<h3>Grupo $grupo</h3>";
                        echo "<p><b>$equipo_local vs $equipo_visitante</b></p>";
                        echo "<label>Goles $equipo_local:</label>";
                        echo "<input type='number' name='goles_local[]'>";
                        echo "<label>Goles $equipo_visitante:</label>";
                        echo "<input type='number' name='goles_visitante[]'>";
                        echo "<input type='hidden' name='equipo_local[]' value='$equipo_local'>";
                        echo "<input type='hidden' name='equipo_visitante[]' value='$equipo_visitante'>";
                        echo "<br>";
                        echo "</div>";
                    }
                }
            }   
        }
        ?>
        <button type="submit">Guardar Resultados</button>
    </form>
</body>

<footer>
        <div class="footer">
            <p>&copy; 2024 UEFA - Todos los derechos reservados</p>
        </div>
</footer>

</html>


