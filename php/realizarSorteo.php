<?php
require_once "connect.php";

// Función para realizar el sorteo de equipos en grupos
function realizarSorteoEquipos($mysqli) {
// Verificar si ya existen grupos en la base de datos
if (gruposYaExistentes($mysqli)) {
    echo "Error: Los grupos ya han sido creados. No se puede realizar el sorteo nuevamente.";
    header("refresh:2; url=verGrupos.php");
    exit;
}

// Obtener todos los equipos
$query_equipos = $mysqli->query("SELECT nombre_equipo FROM Equipos");
$equipos = $query_equipos->fetch_all(MYSQLI_ASSOC);

// Verificar si hay suficientes equipos para formar grupos completos
if (count($equipos) < 32) {
    echo "Error: No hay suficientes equipos para formar grupos completos.";
    header("refresh:2; url=verGrupos.php");
    exit;
}

// Barajar aleatoriamente la lista de equipos
shuffle($equipos);

// Inicializar un arreglo para los equipos asignados a cada grupo
$equipos_por_grupo = array();

// Obtener la cantidad de grupos posibles
$cantidad_grupos = count($equipos) / 4;

// Dividir los equipos en grupos de cuatro
for ($i = 0; $i < $cantidad_grupos; $i++) {
    $grupo_asignado = chr(65 + $i); // Obtener la letra del grupo (A, B, C, etc.)
    $equipos_por_grupo[$grupo_asignado] = array_slice($equipos, $i * 4, 4);
}

// Verificar si algún equipo se ha asignado a más de un grupo
$equipos_asignados = [];
foreach ($equipos_por_grupo as $grupo => $equipos_grupo) {
    foreach ($equipos_grupo as $equipo) {
        if (in_array($equipo['nombre_equipo'], $equipos_asignados)) {
            echo "Error: El equipo '" . $equipo['nombre_equipo'] . "' está asignado a más de un grupo.";
            header("refresh:2; url=verGrupos.php");
            exit;
            
        }
        $equipos_asignados[] = $equipo['nombre_equipo'];
    }
}

// Guardar los equipos asignados a los grupos en la tabla Grupos
foreach ($equipos_por_grupo as $grupo => $equipos_grupo) {
    foreach ($equipos_grupo as $equipo) {
        $query_insert = $mysqli->prepare("INSERT INTO Grupos (nombre_grupo, nombre_equipo) VALUES (?, ?)");
        $query_insert->bind_param("ss", $grupo, $equipo['nombre_equipo']);
        $query_insert->execute();
    }
}


// Mensaje de éxito y redireccionamiento
echo "Sorteo realizado correctamente";
header("refresh:2; url=verGrupos.php");

}

// Función para verificar si ya existen grupos en la base de datos
function gruposYaExistentes($mysqli) {
    $query = "SELECT COUNT(*) as total_grupos FROM Grupos";
    $resultado = $mysqli->query($query);
    $total_grupos = $resultado->fetch_assoc()['total_grupos'];
    return $total_grupos > 0;
}

// Verificar si se ha enviado el formulario para realizar el sorteo
if(isset($_POST['realizar_sorteo'])) {
    // Llamar a la función para realizar el sorteo
    realizarSorteoEquipos($mysqli);
}
?>

