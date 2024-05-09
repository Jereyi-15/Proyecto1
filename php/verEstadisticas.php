<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos y Estadísticas</title>
    <link rel="stylesheet" href="../css/styleVerGrupos.css">
</head>

<header>
    <nav>
        <h1>UEFA</h1>
        <ul class="menu-header">
            <li><a href="index.php">Inicio</a></li>
        </ul>
    </nav>
</header>

<body>
<?php
// Obtener los grupos disponibles
$grupos = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');

foreach ($grupos as $grupo) {
    // Obtener los equipos del grupo actual ordenados por puntos de mayor a menor
    $query_equipos = $mysqli->query("SELECT g.*, e.partidos_jugados, e.partidos_ganados, e.partidos_perdidos, e.partidos_empatados, e.goles_a_favor, e.goles_en_contra, e.goles_a_favor - e.goles_en_contra AS gol_diferencia, e.puntos FROM Grupos g JOIN Estadisticas e ON g.nombre_equipo = e.nombre_equipo WHERE g.nombre_grupo = '$grupo' ORDER BY e.puntos DESC");
    $equipos = $query_equipos->fetch_all(MYSQLI_ASSOC);

    // Mostrar el nombre del grupo
    echo "<h2>Grupo $grupo</h2>";

    // Verificar si hay equipos en el grupo
    if (!empty($equipos)) {
        // Mostrar la tabla de estadísticas
        echo "<table border='1'>";
        echo "<tr><th>Equipo</th><th>Partidos Jugados</th><th>Partidos Ganados</th><th>Partidos Perdidos</th><th>Partidos Empatados</th><th>Goles a Favor</th><th>Goles en Contra</th><th>Gol Diferencia</th><th>Puntos</th></tr>";
        foreach ($equipos as $equipo) {
            echo "<tr>";
            echo "<td>" . $equipo['nombre_equipo'] . "</td>";
            echo "<td>" . $equipo['partidos_jugados'] . "</td>";
            echo "<td>" . $equipo['partidos_ganados'] . "</td>";
            echo "<td>" . $equipo['partidos_perdidos'] . "</td>";
            echo "<td>" . $equipo['partidos_empatados'] . "</td>";
            echo "<td>" . $equipo['goles_a_favor'] . "</td>";
            echo "<td>" . $equipo['goles_en_contra'] . "</td>";
            echo "<td>" . $equipo['gol_diferencia'] . "</td>";
            echo "<td>" . $equipo['puntos'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Si no hay equipos en el grupo, mostrar un mensaje
        echo "<p>No se encontraron equipos en el grupo $grupo.</p>";
    }
}
?>

</body>
</html>

