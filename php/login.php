<?php
$email = $_POST['email'];
$clave = ($_POST['clave']);
$query = "SELECT * FROM administrador WHERE Email='$email' AND Clave='$clave'";
$consulta2 = $mysqli->query($query);
if($consulta2->num_rows >= 1){
    $fila = $consulta2->fetch_array(MYSQLI_ASSOC);
    $_SESSION['user'] = $fila['Id']; 
    $_SESSION['verificar'] = true;
    header("Location: equipos.php");
    exit;
} else {
    $_SESSION['error_message'] = "Los datos son incorrectos";
}
?>
