<?php
session_start(); // Iniciar sesión antes de cualquier salida

if(isset($_POST['email']) && isset($_POST['clave'])){
    require_once "connect.php";
    require_once "login.php"; // Aquí se procesará el formulario en login.php
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styleLogin.css">
    <title>Login</title>
</head>

<header>
        <nav>
          <h1>UEFA</h1>
            <ul class="menu-header">
              <li><a class="active" href="index.php">Inicio</a></li>
            </ul>
        </nav>
</header>  

<body>

<section>
    <div class="form-container">
        <div class="form-box">
            <div class="form-value">
                <form action="InicioSesion.php" method="POST">
                    <h2>Log In</h2>
                    <div class="input-box">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="clave" required>
                        <label>Password</label>
                    </div>
                    <button class="button">Log In</button>
                </form>
            </div>
        </div>
        <div class="error">
            <?php
            if(isset($_SESSION['error_message'])) {
                echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
            }
            ?>
        </div>
    </div>
</section>



<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons"></script>

</body>

<footer>
        <div class="footer">
            <p>&copy; 2024 UEFA - Todos los derechos reservados</p>
        </div>
</footer>

</html>
