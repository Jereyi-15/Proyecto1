<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos y Estadísticas</title>
    <link rel="stylesheet" href="../css/styleVerEstadisticas.css">
</head>

<header>
    <nav>
        <img src="../images/champions_logo.png" alt="champions-logo">
        <ul class="menu-header">
            <li><a class="active" href="index.php">Inicio</a></li>
        </ul>
    </nav>

</header>

<body>
    <div class="inicio-container">

        <img src="https://pbs.twimg.com/profile_banners/627673190/1626686644/1500x500">



    </div>

    <div class="Tabla-container">
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
    </div>
    <div class="informacion-container">
        <div id="imagenes"></div>
        <a href="https://twitter.com/championsleague"><img
                src="https://img.freepik.com/vector-gratis/nuevo-diseno-icono-x-logotipo-twitter-2023_1017-45418.jpg?size=338&ext=jpg&ga=GA1.1.1687694167.1715472000&semt=ais_user"
                height="50px" width="50x"></a>
        <a href="https://www.instagram.com/championsleague?igsh=MXhhejJtc2hyZ2dzMw=="><img
                src=" https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1200px-Instagram_logo_2022.svg.png"
                height="50px" width="50x"></a>
        <a href="https://www.facebook.com/ChampionsLeague"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAb1BMVEU7WZj///8lS5Hh5O0hSJDz9PgxU5XV2eYsT5P7/P22vtQpTZI4V5ckSpHJz9/k5+8bRY9EYJyNm71yhLB6i7Skr8pccqartM2Wo8JRaqHY3OcAOIk/XJpjeKmcqMWIl7tsf63DytxgdaeCkbiyu9GG+yoLAAAEcklEQVR4nO3d63KbSBSFUUCowe7mKpBlJ5Fvef9nHBRbY81UWWwBh+aQ/f1KVcqEFUsI1N0QhF9ti806KrYXquD8h7yxcRatoyxOm/x/wqSKjAvWkzNRlVwK63JNvI9cWX8Jd9b37ohkd2dhvU5gR6w/hEnpe0/EKpM/wmp978FzrjoJ88j3fggW5Z2wMb53QzDTdEK73hdp9zJNw2Ab+94L0eJtUGS+d0K0rAg2az7QdIeaDYXao1B/FOqPQv1RqD8K9Ueh/ijUH4X6o9B3zpj0M5OaU8654JavPxcrdM7YOP75q6mP7cOptj0e6uf33ctbFXR/k0WR7cj91mUKncmil2NehN+2LTb568Ph/bGXuEShiR/bp+9x/+k+7dva4oQuCtorvzv1Qhfv836WXqHL9uirU6fQuNt+f+qEnzMnVis0aTIAqEiY7u+GAPUIbTPIp0cYDXkLahJGz0OBSoTp0JeoFqHZDwcqEQ47iuoRlreeqGkTpocxQAVC93MUUIEwHnSupkjoXsYBly8sb7icVyk0u5HAxQvjUZ8UCoTucSxw6cL0fu3CeMz5mgbh+OPM0oX2de3CeNsvUC2c4Ei6cKEZd1WhQJi+4pDi/rB7DFL72b8rKW3/YhiPwgw9J71rq9ieBkMHrXzxKIxAYBunYxb1+BM68Auot5G7509o3iHgfuyyM4/CIwKse4+VffkTQqfdxfjVrf6EFhkOfR+/NNKfMEKufidYOOhPiHwcTrF+d9nCdoL1ux6FwJXFFCuU/QmRa6f+OV39LVs4xSLzZQunWKFMoVwUUohGoVwUUohGoVwUUohGoVwUUohGoVwUUohG4bjclRBhfG0Dp3wLnblSCQjLaxs45Vto+w0jA0bfRIXoXITh7T2vVpcX+l6PLy68AwbBdQuRW6/qFubAfch1C38Dc1F0Cw/AB6JuITIKrluIjILrFiJn5qqF0J3IVQuhPVctfEUey6Fa+IBMzVQtrL1fH0oLX7xf40sLoWerqBZCE4g1C7fQV3GahU/QjmsWQh+HqoUttFJBs/AZmn6qWfgLmkGsWYhNkdYsxBZjKBaCT3FSLEyw/VYs7F8CrF14xNYqKBaC69oUjx8CI2viQvOUXAm47ce1H3+Cxrilx/Ej+30/gFHuH1d+Hn1qI+diyEUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWgUykUhhWh/hRC8k83UzSXMigC6k+v0zSWMt0GYTvDU3SH/8ixCl4bBJE9Ovr2ZhKbphFM83/v2ZhJGeSfE7gM6dfMIXRWehAl0I9CJm0dYJn+EYQ3dRXLaZhHaOvwQhrv5iXMI7S48C8O6nPu9KC90ZR1+CcOkioCHtkyYsNCZqErCS2EY5o2Ns2i2oDthDd14FtsmP28luNjittjM111/g7ddXP73/QNYSl9AM/Q0QgAAAABJRU5ErkJggg=="
                height="50px" width="50px"></a>

    </div>

</body>

</html>