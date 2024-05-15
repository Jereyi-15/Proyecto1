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
                <li><a class="active" href="verEstadisticas.php">Torneo</a></li>
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
    <!--<div class="titulos">
        <h2>OTROS TORNEOS</h2>
    </div>-->
    <div class="container-torneos">

        <div id="torneos-half">
            <div class="card">
                <img src="../images/ChampionsLeague.png" alt="Champions League Icon">
                <div class="card__content">
                    <p class="card__title">UEFA Champions League</p>
                    <p class="card__description">La UEFA Champions League es el torneo de fútbol más prestigioso de Europa,
                        donde los clubes más destacados compiten por el título.
                        Con una historia rica en momentos épicos y rivalidades legendarias,
                        esta competición captura la atención de millones de aficionados en todo el mundo.
                        Desde los enfrentamientos emocionantes en la fase de grupos hasta las dramáticas eliminatorias en la etapa final,
                        la Champions League es un espectáculo que nunca decepciona,
                        brindando momentos de gloria y pasión futbolística que perduran en la memoria de los aficionados.</p>
                </div>
            </div>
            <div class="card">
                <img src="../images/Europa_League_2021.svg.png" alt="europaLeagueIcon">
                <div class="card__content">
                    <p class="card__title">UEFA Europa League</p>
                    <p class="card__description">La UEFA Europa League es una competición emocionante que reúne a
                        algunos de los mejores equipos de
                        fútbol de toda Europa, ofreciendo una emocionante mezcla de acción, drama y talento
                        futbolístico. Como hermana menor de la
                        UEFA Champions League, esta competición brinda a equipos de diferentes países la oportunidad de
                        enfrentarse entre sí en un
                        ambiente de alta intensidad y pasión. Con una rica historia y una amplia base de seguidores, la
                        UEFA Europa League es una
                        parte integral del panorama futbolístico europeo, donde los sueños se hacen realidad y se forjan
                        nuevas leyendas.</p>
                </div>
            </div>
        </div>
        <div id="torneos-half">
            <div class="card">
                <img src="../images/women_qualifiers_logo.png" alt="womanQualifiersIcon">
                <div class="card__content">
                    <p class="card__title">UEFA Women's Champions League</p>
                    <p class="card__description">La UEFA Women's Champions League es la cúspide del fútbol femenino a
                        nivel de clubes en Europa.
                        Este prestigioso torneo reúne a los mejores equipos femeninos del continente en una emocionante
                        competición que destaca la
                        habilidad, la determinación y el espíritu deportivo. Desde sus inicios, ha sido una plataforma
                        para el talento femenino,
                        ofreciendo encuentros emocionantes y momentos inolvidables que inspiran a jugadoras y
                        aficionados por igual.
                        La UEFA Women's Champions League es mucho más que un torneo; es un símbolo del crecimiento y la
                        evolución del fútbol
                        femenino, un escaparate de la excelencia deportiva y un tributo al poder del juego para unir a
                        personas de todas las edades,
                        géneros y culturas en todo el mundo.</p>
                </div>
            </div>
            <div class="card">
                <img src="../images/conference_league_logo.png" alt="conferenceLeagueIcon">
                <div class="card__content">
                    <p class="card__title">UEFA Europa Conference League</p>
                    <p class="card__description">La UEFA Europa Conference League es la última incorporación al
                        emocionante paisaje del fútbol
                        europeo. Diseñada para ofrecer oportunidades de competición a una amplia gama de clubes de toda
                        Europa, esta liga
                        representa una nueva era de inclusión y emoción en el fútbol de clubes. Equipos de diferentes
                        países se enfrentan en una
                        emocionante batalla por el prestigioso título, brindando a los aficionados encuentros llenos de
                        acción y momentos
                        inolvidables. La UEFA Europa Conference League está lista para cautivar a los aficionados y
                        elevar el nivel del fútbol
                        europeo a nuevas alturas.</p>
                </div>
            </div>
        </div>

    </div>

    <div class="contact">

        <div class="social-buttons">
            <a href="https://twitter.com/uefa?lang=en-gb" class="social-button x">
                <svg viewBox="0 0 512 512" height="1.7em" xmlns="http://www.w3.org/2000/svg" class="svgIcon"
                    fill="white">
                    <path
                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
                    </path>
                </svg>
            </a>
            <a href="https://www.youtube.com/user/UEFA" class="social-button youtube">
                <svg viewBox="0 0 576 512" fill="red" height="1.6em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z">
                    </path>
                </svg>
            </a>
            <a href="https://www.facebook.com/uefa/?fref=ts" class="social-button facebook">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 310 310" xml:space="preserve">
                    <g id="XMLID_834_">
                        <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064
    c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996
    V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545
    C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703
    c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"></path>
                    </g>
                </svg>
            </a>
            <a href="https://www.instagram.com/uefa_official/?hl=en" class="social-button instagram">
                <svg width="800px" height="800px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1">
                        <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -7439.000000)">
                            <g id="icons" transform="translate(56.000000, 160.000000)">
                                <path
                                    d="M289.869652,7279.12273 C288.241769,7279.19618 286.830805,7279.5942 285.691486,7280.72871 C284.548187,7281.86918 284.155147,7283.28558 284.081514,7284.89653 C284.035742,7285.90201 283.768077,7293.49818 284.544207,7295.49028 C285.067597,7296.83422 286.098457,7297.86749 287.454694,7298.39256 C288.087538,7298.63872 288.809936,7298.80547 289.869652,7298.85411 C298.730467,7299.25511 302.015089,7299.03674 303.400182,7295.49028 C303.645956,7294.859 303.815113,7294.1374 303.86188,7293.08031 C304.26686,7284.19677 303.796207,7282.27117 302.251908,7280.72871 C301.027016,7279.50685 299.5862,7278.67508 289.869652,7279.12273 M289.951245,7297.06748 C288.981083,7297.0238 288.454707,7296.86201 288.103459,7296.72603 C287.219865,7296.3826 286.556174,7295.72155 286.214876,7294.84312 C285.623823,7293.32944 285.819846,7286.14023 285.872583,7284.97693 C285.924325,7283.83745 286.155174,7282.79624 286.959165,7281.99226 C287.954203,7280.99968 289.239792,7280.51332 297.993144,7280.90837 C299.135448,7280.95998 300.179243,7281.19026 300.985224,7281.99226 C301.980262,7282.98483 302.473801,7284.28014 302.071806,7292.99991 C302.028024,7293.96767 301.865833,7294.49274 301.729513,7294.84312 C300.829003,7297.15085 298.757333,7297.47145 289.951245,7297.06748 M298.089663,7283.68956 C298.089663,7284.34665 298.623998,7284.88065 299.283709,7284.88065 C299.943419,7284.88065 300.47875,7284.34665 300.47875,7283.68956 C300.47875,7283.03248 299.943419,7282.49847 299.283709,7282.49847 C298.623998,7282.49847 298.089663,7283.03248 298.089663,7283.68956 M288.862673,7288.98792 C288.862673,7291.80286 291.150266,7294.08479 293.972194,7294.08479 C296.794123,7294.08479 299.081716,7291.80286 299.081716,7288.98792 C299.081716,7286.17298 296.794123,7283.89205 293.972194,7283.89205 C291.150266,7283.89205 288.862673,7286.17298 288.862673,7288.98792 M290.655732,7288.98792 C290.655732,7287.16159 292.140329,7285.67967 293.972194,7285.67967 C295.80406,7285.67967 297.288657,7287.16159 297.288657,7288.98792 C297.288657,7290.81525 295.80406,7292.29716 293.972194,7292.29716 C292.140329,7292.29716 290.655732,7290.81525 290.655732,7288.98792"
                                    id="instagram-[#167]">

                                </path>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
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
    </div>

    <footer>
<div class="footer">
      <p>&copy; 2024 UEFA. Todos los derechos reservados.</p>
    </div>
</footer>

</body>



</html>