<?php
require_once "connect.php";

// Verificar si se recibió un formulario de ingreso de equipos
if(isset($_POST['nombre_equipo']) && isset($_POST['pais'])) {
    $nombre_equipo = $_POST['nombre_equipo'];
    $pais = $_POST['pais'];

    // Verificar si el equipo ya está registrado
    $query_verificar_equipo = $mysqli->prepare("SELECT COUNT(*) as total FROM equipos WHERE nombre_equipo = ?");
    $query_verificar_equipo->bind_param("s", $nombre_equipo);
    $query_verificar_equipo->execute();
    $result_verificar_equipo = $query_verificar_equipo->get_result();
    $total_equipos_nombre = $result_verificar_equipo->fetch_assoc()['total'];

    if($total_equipos_nombre > 0) {
        echo "Error: El equipo ya está registrado";
        header("refresh:2; url=equipos.php");
        exit;
    }

    // Obtener la cantidad total de equipos
    $query_total = $mysqli->query("SELECT COUNT(*) as total FROM Equipos");
    $total_equipos = $query_total->fetch_assoc()['total'];

    // Verificar la cantidad máxima de equipos
    if($total_equipos >= 32) {
        echo "Error: Se ha alcanzado el límite máximo de equipos (32)";
        header("refresh:2; url=equipos.php");
        exit;
    }

    // Verificar si ya hay 4 equipos para el país proporcionado
    $query_equipos_pais = $mysqli->prepare("SELECT COUNT(*) as total FROM equipos WHERE pais = ?");
    $query_equipos_pais->bind_param("s", $pais);
    $query_equipos_pais->execute();
    $result_equipos_pais = $query_equipos_pais->get_result();
    $total_equipos_pais = $result_equipos_pais->fetch_assoc()['total'];

    if($total_equipos_pais >= 4) {
        echo "Error: Ya hay 4 equipos registrados para el país proporcionado";
        header("refresh:2; url=equipos.php");
        exit;
    }

    // Sentencia preparada para insertar datos
    $query = $mysqli->prepare("INSERT INTO equipos (nombre_equipo, pais) VALUES (?, ?)");
    $query->bind_param("ss", $nombre_equipo, $pais);

    // Ejecutar la consulta preparada
    if($query->execute()) {
        echo "Datos guardados correctamente y ";

        // Insertar un registro en la tabla de estadísticas para el equipo recién agregado
        $query_insertar_estadisticas = $mysqli->prepare("INSERT INTO estadisticas (nombre_equipo, partidos_jugados, partidos_ganados, partidos_perdidos, partidos_empatados, goles_a_favor, goles_en_contra, gol_diferencia, puntos) VALUES (?, 0, 0, 0, 0, 0, 0, 0, 0)");
        $query_insertar_estadisticas->bind_param("s", $nombre_equipo);

        // Ejecutar la consulta preparada para insertar estadísticas
        if($query_insertar_estadisticas->execute()) {
            echo "registro en estadísticas creado correctamente";
            header("refresh:1; url=equipos.php");
            exit;
        } else {
            echo "Ocurrió un error al crear el registro en estadísticas: " . $mysqli->error;
            header("refresh:2; url=equipos.php");
            exit;
        }
    } else {
        echo "Ocurrió un error al guardar los datos: " . $mysqli->error;
        header("refresh:2; url=equipos.php");
        exit;
    }
}   
?>



