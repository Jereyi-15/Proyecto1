<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UEFA - Campeonatos Continentales</title>
    <link rel="stylesheet" href="../css/styleIndex.css">
    <script type="text/javascript" src="../js/index.js" defer></script>
</head>

<body>

    <header>
        <nav>
            <img src="../images/champions_logo.png" alt="champions-logo">
            <ul class="menu-header">
                <li><a class="active" href="#">Torneos</a></li>
                <li><a class="active" href="#">Partidos</a></li>
                <li><a class="active" href="InicioSesion.php">Iniciar Sesión</a></li>
            </ul>
        </nav>

    </header>

    <div id="slider">
        <div class="mySlides fade">
            <img src="../images/slid-1.jpeg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="../images/slid-2.webp" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="../images/slid-1.jpeg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
    <div class="titulos">
        <h2>OTROS TORNEOS</h2>
    </div>
    <div class="container-torneos">

        <div id="torneos-half">
            <div class="card">
                <img src="../images/women_champions_logo.png" alt="womanChampionsIcon">
                <div class="card__content">
                    <p class="card__title">Card Title</p>
                    <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco.</p>
                </div>
            </div>
            <div class="card">
                <img src="../images/Europa_League_2021.svg.png" alt="europaLeagueIcon">
                <div class="card__content">
                    <p class="card__title">Card Title</p>
                    <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco.</p>
                </div>
            </div>
        </div>
        <div id="torneos-half">
            <div class="card">
            <img src="../images/women_qualifiers_logo.png" alt="womanQualifiersIcon">
                <div class="card__content">
                    <p class="card__title">Card Title</p>
                    <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco.</p>
                </div>
            </div>
            <div class="card">
            <img src="../images/conference_league_logo.png" alt="conferenceLeagueIcon">
                <div class="card__content">
                    <p class="card__title">Card Title</p>
                    <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco.</p>
                </div>
            </div>
        </div>

    </div>


    <section id="acerca-de">
        <div class="container">
            <h2>Europa League</h2>
            <p>La UEFA Europa League es otra competición importante de clubes de fútbol en Europa. Está abierta a
                equipos de diferentes ligas europeas, y ofrece una oportunidad para que los equipos compitan a nivel
                continental.</p>
            <p>La Europa League también cuenta con una fase de grupos seguida de eliminatorias directas, culminando en
                una final emocionante.</p>
        </div>
    </section>

    <section id="contact">
        <div class="redes-sociales">
            <a href="#x">X</a>
            <a href="#f">Facebook</a>
            <a href="#i">Instagram</a>
            <a href="#y">Youtube</a>
        </div>
        <div class="sugerencias">
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

    <footer>
        <div class="footer">
            <p>&copy; 1998-2024 UEFA. All rights reserved.</p>
            <p>The UEFA word, the UEFA logo and all marks related to UEFA competitions, are protected by trademarks
                and/or copyright of
                UEFA. No use for commercial purposes may be made of such trademarks. </p>
            <p>Use of UEFA.com signifies your agreement to the Terms and Conditions and Privacy Policy.</p>
        </div>
    </footer>

</body>



</html>