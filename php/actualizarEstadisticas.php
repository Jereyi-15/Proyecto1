<?php
require_once "connect.php"; // Incluye el archivo de conexión a la base de datos

// Variable para indicar si se guardaron todos los resultados correctamente
$resultados_guardados = false;

// Verificar si se recibieron los datos del resultado del partido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['equipo_local']) && isset($_POST['equipo_visitante']) && isset($_POST['goles_local']) && isset($_POST['goles_visitante'])) {
    $equiposLocales = $_POST['equipo_local'];
    $equiposVisitantes = $_POST['equipo_visitante'];
    $golesLocales = $_POST['goles_local'];
    $golesVisitantes = $_POST['goles_visitante'];

    // Iterar sobre los resultados de los partidos
    for ($i = 0; $i < count($equiposLocales); $i++) {
        $equipoLocal = $equiposLocales[$i];
        $equipoVisitante = $equiposVisitantes[$i];
        $golesLocal = $golesLocales[$i];
        $golesVisitante = $golesVisitantes[$i];

        // Verificar si se ingresaron goles o si se dejó vacío (para contar los partidos)
        if ($golesLocal !== '' && $golesVisitante !== '') {
            // Calcular el gol diferencia
            $golDiferenciaLocal = $golesLocal - $golesVisitante;
            $golDiferenciaVisitante = $golesVisitante - $golesLocal;

            // Actualizar los goles a favor y en contra de cada equipo
            $sql = "UPDATE Estadisticas SET goles_a_favor = goles_a_favor + ?, goles_en_contra = goles_en_contra + ? WHERE nombre_equipo = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("iis", $golesLocal, $golesVisitante, $equipoLocal);
            $stmt->execute();
            $stmt->bind_param("iis", $golesVisitante, $golesLocal, $equipoVisitante);
            $stmt->execute();
            $stmt->close();

            // Actualizar el gol diferencia y los puntos según el resultado del partido
            if ($golesLocal > $golesVisitante) {
                // Equipo local gana
                $sql = "UPDATE Estadisticas SET partidos_jugados = partidos_jugados + 1, partidos_ganados = partidos_ganados + 1, puntos = puntos + 3, gol_diferencia = gol_diferencia + ? WHERE nombre_equipo = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("is", $golDiferenciaLocal, $equipoLocal);
                $stmt->execute();
                $stmt->close();

                // Equipo visitante pierde
                $sql = "UPDATE Estadisticas SET partidos_jugados = partidos_jugados + 1, partidos_perdidos = partidos_perdidos + 1, gol_diferencia = gol_diferencia + ? WHERE nombre_equipo = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("is", $golDiferenciaVisitante, $equipoVisitante);
                $stmt->execute();
                $stmt->close();
            } elseif ($golesLocal < $golesVisitante) {
                // Equipo local pierde
                $sql = "UPDATE Estadisticas SET partidos_jugados = partidos_jugados + 1, partidos_perdidos = partidos_perdidos + 1, gol_diferencia = gol_diferencia + ? WHERE nombre_equipo = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("is", $golDiferenciaLocal, $equipoLocal);
                $stmt->execute();
                $stmt->close();

                // Equipo visitante gana
                $sql = "UPDATE Estadisticas SET partidos_jugados = partidos_jugados + 1, partidos_ganados = partidos_ganados + 1, puntos = puntos + 3, gol_diferencia = gol_diferencia + ? WHERE nombre_equipo = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("is", $golDiferenciaVisitante, $equipoVisitante);
                $stmt->execute();
                $stmt->close();
            } else {
                // Empate
                $sql = "UPDATE Estadisticas SET partidos_jugados = partidos_jugados + 1, partidos_empatados = partidos_empatados + 1, puntos = puntos + 1 WHERE nombre_equipo = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("s", $equipoLocal);
                $stmt->execute();
                $stmt->bind_param("s", $equipoVisitante);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    // Si se llega a este punto, se han procesado todos los partidos sin errores
    $resultados_guardados = true;
}


// Después de salir del bucle, mostrar el mensaje de éxito o error
if($resultados_guardados) {
    // Mostrar mensaje de éxito
    echo "Los resultados se guardaron exitosamente.";
    header("refresh:2; url=ingresarResultados.php");
    exit();
} else {
    // Mostrar mensaje de error
    echo "Error: No se pudieron guardar los resultados.";
    header("refresh:2; url=ingresarResultados.php");
    exit();
}



