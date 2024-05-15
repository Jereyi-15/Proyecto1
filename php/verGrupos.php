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
    <title>Ver Grupos</title>
    <link rel="stylesheet" href="../css/styleVerGrupos.css">
</head>

<body>

    <header>
        <nav>
            <h1>UEFA</h1>
            <ul class="menu-header">
                <li><a href="equipos.php">Inicio</a></li>
                <li><a href="ingresarResultados.php">Ingresar Resultados</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <section>

        <h2>Grupos y Equipos</h2>

        <form action="realizarSorteo.php" method="POST">
            <div class="container">
            <button class="btn" type="submit" name="realizar_sorteo">Realizar Sorteo</button>
            </div>
        </form>



        <?php

        // Realizar la consulta para obtener los grupos con sus equipos y estadísticas
        $query = "SELECT g.nombre_grupo, g.nombre_equipo, e.partidos_jugados, e.partidos_ganados, e.partidos_perdidos, e.partidos_empatados, e.goles_a_favor, e.goles_en_contra, e.goles_a_favor - e.goles_en_contra AS gol_diferencia, e.puntos FROM Grupos g JOIN Estadisticas e ON g.nombre_equipo = e.nombre_equipo ORDER BY g.nombre_grupo, e.puntos DESC";
        $resultado = $mysqli->query($query);

        // Array asociativo para almacenar los equipos por grupo
        $grupos = array();

        // Verificar si se obtuvieron resultados
        if ($resultado->num_rows > 0) {
            // Almacenar los datos de cada equipo en el array asociativo
            while ($fila = $resultado->fetch_assoc()) {
                $grupo = $fila["nombre_grupo"];
                $equipo = $fila["nombre_equipo"];
                $grupos[$grupo][] = array(
                    "equipo" => $equipo,
                    "partidos_jugados" => $fila["partidos_jugados"],
                    "partidos_ganados" => $fila["partidos_ganados"],
                    "partidos_perdidos" => $fila["partidos_perdidos"],
                    "partidos_empatados" => $fila["partidos_empatados"],
                    "goles_a_favor" => $fila["goles_a_favor"],
                    "goles_en_contra" => $fila["goles_en_contra"],
                    "gol_diferencia" => $fila["gol_diferencia"],
                    "puntos" => $fila["puntos"]
                );
            }

            // Mostrar los grupos, sus equipos y sus estadísticas en tablas HTML
            foreach ($grupos as $grupo => $equipos) {
                echo "<h3>Grupo $grupo</h3>";
                echo "<table>";
                echo "<tr><th>Equipo</th><th>Partidos Jugados</th><th>Partidos Ganados</th><th>Partidos Perdidos</th><th>Partidos Empatados</th><th>Goles a Favor</th><th>Goles en Contra</th><th>Gol Diferencia</th><th>Puntos</th></tr>";
                foreach ($equipos as $equipo) {
                    echo "<tr>";
                    echo "<td>" . $equipo["equipo"] . "</td>";
                    echo "<td>" . $equipo["partidos_jugados"] . "</td>";
                    echo "<td>" . $equipo["partidos_ganados"] . "</td>";
                    echo "<td>" . $equipo["partidos_perdidos"] . "</td>";
                    echo "<td>" . $equipo["partidos_empatados"] . "</td>";
                    echo "<td>" . $equipo["goles_a_favor"] . "</td>";
                    echo "<td>" . $equipo["goles_en_contra"] . "</td>";
                    echo "<td>" . $equipo["gol_diferencia"] . "</td>";
                    echo "<td>" . $equipo["puntos"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        } else {
            echo "No se encontraron grupos.";
        }

        // Liberar el resultado de la consulta
        $resultado->free();
        ?>
    </section>



</body>



</html>