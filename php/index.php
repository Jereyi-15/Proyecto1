<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UEFA - Campeonatos Continentales</title>
    <link rel="stylesheet" href="../css/styleIndex.css">
</head>

<header>
        <nav>
          <h1>UEFA</h1>
            <ul class="menu-header">
              <li><a class="active" href="#champions">Champions League</a></li>
              <li><a class="active" href="#europa">Europa League</a></li>
              <li><a class="active" href="#conference">Conference League</a></li>
              <li><a class="active" href="#contact">Contacto</a></li>
              <li><a class="active" href="verEstadisticas.php">Ver Grupos y Estadísticas</a></li> 
              <li><a class="active" href="InicioSesion.php">Iniciar Sesión</a></li>
            </ul>
        </nav>
       <!-- 
      <div class="header">
        <img src="../images/UEFA.png" alt="Logo UEFA">
      </div>
-->
     </header>

<body>
        <div class="container">
            <h2>Acerca de la UEFA</h2>
            <p>La UEFA (Unión de Asociaciones Europeas de Fútbol) es la organización responsable de organizar los campeonatos continentales de fútbol en Europa. </p>
            <p>Entre sus competiciones más destacadas se encuentran la Champions League, la Europa League y la Conference League.</p>
        </div>
    </section>

    <section id="champions">
        <div class="container">
            <h2>Champions League</h2>
            <p>La UEFA Champions League es la competición de clubes de fútbol más prestigiosa de Europa. Se juega anualmente y participan los mejores equipos de las ligas nacionales de toda Europa.</p>
            <p>La fase de grupos está seguida de eliminatorias directas hasta la gran final, que es uno de los eventos deportivos más vistos en todo el mundo.</p>
        </div>
    </section>

    <section id="europa">
        <div class="container">
            <h2>Europa League</h2>
            <p>La UEFA Europa League es otra competición importante de clubes de fútbol en Europa. Está abierta a equipos de diferentes ligas europeas, y ofrece una oportunidad para que los equipos compitan a nivel continental.</p>
            <p>La Europa League también cuenta con una fase de grupos seguida de eliminatorias directas, culminando en una final emocionante.</p>
        </div>
    </section>

    <section id="conference">
        <div class="container">
            <h2>Conference League</h2>
            <p>La UEFA Europa Conference League es una competición relativamente nueva, creada en 2021. Está diseñada para ofrecer a más equipos la oportunidad de competir a nivel europeo.</p>
            <p>La Conference League cuenta con equipos de ligas de menor nivel y ofrece una plataforma para que estos equipos puedan experimentar el fútbol continental y competir por un título.</p>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="contact-form-container">
            <h2>Contacto</h2>
            <p>¿Tienes alguna pregunta o sugerencia? ¡No dudes en ponerte en contacto con nosotros!</p>
            <form action="submit_contact.php" method="POST" class="contact-form">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" required></textarea>
                <button type="submit">Enviar Mensaje</button>
            </form>
        </div>
        </div>
    </section>

   
</body>

<footer>
        <div class="footer">
            <p>&copy; 2024 UEFA - Todos los derechos reservados</p>
        </div>
</footer>

</html>
