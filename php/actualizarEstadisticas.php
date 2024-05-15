<?php
require_once "connect.php"; // Incluye el archivo de conexión a la base de datos

// Verificar si se recibieron los datos del resultado del partido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['equipo_local']) && isset($_POST['equipo_visitante']) && isset($_POST['goles_local']) && isset($_POST['goles_visitante'])) {
    $equiposLocales = $_POST['equipo_local'];
    $equiposVisitantes = $_POST['equipo_visitante'];
    $golesLocales = $_POST['goles_local'];
    $golesVisitantes = $_POST['goles_visitante'];

    // Verificar si todos los campos están vacíos
    $allFieldsEmpty = true;
    for ($i = 0; $i < count($golesLocales); $i++) {
        if ($golesLocales[$i] !== '' && $golesVisitantes[$i] !== '') {
            $allFieldsEmpty = false;
            break;
        }
    }

    if ($allFieldsEmpty) {
        header("Location: ingresarResultados.php");
        exit();
    }

    $resultados_guardados = false;
    $partidos_jugados = [];

    for ($i = 0; $i < count($equiposLocales); $i++) {
        $equipoLocal = $equiposLocales[$i];
        $equipoVisitante = $equiposVisitantes[$i];
        $golesLocal = $golesLocales[$i];
        $golesVisitante = $golesVisitantes[$i];

        if ($golesLocal !== '' && $golesVisitante !== '') {
            $sql = "SELECT COUNT(*) AS count FROM Resultados WHERE nombre_equipo_local = ? AND nombre_equipo_visitante = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ss", $equipoLocal, $equipoVisitante);
            $stmt->execute();
            $resultado = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            if ($resultado['count'] == 0) {
                $golDiferenciaLocal = $golesLocal - $golesVisitante;
                $golDiferenciaVisitante = $golesVisitante - $golesLocal;

                // Actualizar las estadísticas del equipo local
                $sql = "UPDATE Estadisticas SET goles_a_favor = goles_a_favor + ?, goles_en_contra = goles_en_contra + ?, partidos_jugados = partidos_jugados + 1, gol_diferencia = gol_diferencia + ? WHERE nombre_equipo = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("iiis", $golesLocal, $golesVisitante, $golDiferenciaLocal, $equipoLocal);
                $stmt->execute();
                $stmt->close();

                // Actualizar las estadísticas del equipo visitante
                $sql = "UPDATE Estadisticas SET goles_a_favor = goles_a_favor + ?, goles_en_contra = goles_en_contra + ?, partidos_jugados = partidos_jugados + 1, gol_diferencia = gol_diferencia + ? WHERE nombre_equipo = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("iiis", $golesVisitante, $golesLocal, $golDiferenciaVisitante, $equipoVisitante);
                $stmt->execute();
                $stmt->close();

                // Determinar el resultado del partido y actualizar puntos y partidos ganados/perdidos/empatados
                if ($golesLocal > $golesVisitante) {
                    // Equipo local gana
                    $sql = "UPDATE Estadisticas SET partidos_ganados = partidos_ganados + 1, puntos = puntos + 3 WHERE nombre_equipo = ?";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $equipoLocal);
                    $stmt->execute();
                    $stmt->close();

                    // Equipo visitante pierde
                    $sql = "UPDATE Estadisticas SET partidos_perdidos = partidos_perdidos + 1 WHERE nombre_equipo = ?";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $equipoVisitante);
                    $stmt->execute();
                    $stmt->close();
                } elseif ($golesLocal < $golesVisitante) {
                    // Equipo visitante gana
                    $sql = "UPDATE Estadisticas SET partidos_ganados = partidos_ganados + 1, puntos = puntos + 3 WHERE nombre_equipo = ?";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $equipoVisitante);
                    $stmt->execute();
                    $stmt->close();

                    // Equipo local pierde
                    $sql = "UPDATE Estadisticas SET partidos_perdidos = partidos_perdidos + 1 WHERE nombre_equipo = ?";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $equipoLocal);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    // Empate
                    $sql = "UPDATE Estadisticas SET partidos_empatados = partidos_empatados + 1, puntos = puntos + 1 WHERE nombre_equipo = ?";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $equipoLocal);
                    $stmt->execute();
                    $stmt->bind_param("s", $equipoVisitante);
                    $stmt->execute();
                    $stmt->close();
                }

                // Insertar el resultado del partido en la tabla Resultados
                $sql = "INSERT INTO Resultados (nombre_equipo_local, nombre_equipo_visitante, goles_equipo_local, goles_equipo_visitante, partido_jugado) VALUES (?, ?, ?, ?, TRUE)";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ssii", $equipoLocal, $equipoVisitante, $golesLocal, $golesVisitante);
                $stmt->execute();
                $stmt->close();

                $resultados_guardados = true;
            } else {
                $partidos_jugados[] = "$equipoLocal vs $equipoVisitante";
            }
        }
    }

    if (!empty($partidos_jugados)) {
        echo "<h2>Los resultados se guardaron exitosamente. <br></h2>";
        echo "Pero los siguientes partidos ya se jugaron y no pueden ser ingresados nuevamente: <br>";
        foreach ($partidos_jugados as $partido) {
            echo $partido . "<br>";
        }
        header("refresh:5; url=ingresarResultados.php");
        exit();
    }

    if ($resultados_guardados) {
        echo "<h2>Los resultados se guardaron exitosamente.</h2>";
        header("refresh:2; url=ingresarResultados.php");
        exit();
    }
} else {
    header("Location: ingresarResultados.php");
    exit();
}
?>