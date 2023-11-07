<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partido</title>
    <link rel="shortcut icon" href="imagenes/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="estilos.css">

</head>

<body>
<?php 
session_start();
if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
   $username = $_SESSION['username'];
} else {
    $user_id = "";
    $username = "";
}
?>
    <header class="hero">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title">Partido</h2>
            </div>
            <ul class="nav__link nav__link--menu">
            <?php if ($username <> "") { ?>
                <li class="nav__items">
                    <a href="index.php" class="nav__links"> <?php echo $username ?> </a>
                </li>
                <?php } else { ?>
                <li class="nav__items">
                    <a href="index.php" class="nav__links">Inicio</a>
                </li>
                <?php }  ?>

                <?php if ($username <> "") { ?>
                <li class="nav__items">
                    <a href="../../Basededatos/CerrarSesion.php" class="nav__links">Logout </a>
                </li>
                <?php } else { ?>
                <li class="nav__items">
                    <a href="Pagina_de_registroylogin.html" class="nav__links">Logearse</a>
                </li>
                <?php }  ?>
                </li>
                <li class="nav__items">
                    <a href="registrarse2.php" class="nav__links"> Formulario </a>
                </li>
                <li>
             <?php if ($username <> "") { ?>
             <a href="historialform.php" class="nav__links user-link">Cuenta</a>
           <?php } else { ?>
           <a href="panelusuario.php" ></a>
         <?php } ?>
          </li>

                <img src="imagenes/close.svg" alt="" class="nav__close">
            </ul>
            <div class="nav__menu">
                <img src="imagenes/menu.svg" class="nav__img">
            </div>
        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">Encontra ese jugador que te falta al instante </h1>
            <p class="hero__paragraph">Te falta un jugador a último momento y no encuentras por ninguna parte? Este es
                el sitio indicado, aqui podras encontrar jugadores.</p>
            <a href="filtro.html" class="cta">Encontrar jugadores (nuevo filtro)</a>
        </section>
    </header>
    <main>
        <section class="container about">
            <h2 class="subtitle">Que lograras usandonos?</h2>
            <p class="about__paragraph">Podras entrar en nuevos equipos, podras jugar partidos si tenes ganas, fichar
                jugadores (en el caso de clubes), etc.</p>
            <div class="about__main">
                <article class="about__icons">
                    <img src="imagenes/pelota.svg" class="pelota__icon">
                    <h3 class="about__title">JUGADORES</h3>
                    <p class="about__paragraph">Jugadores de todas las edades y con diferentes niveles de control de
                        pelota</p>
                </article>
                <article class="about__icons">
                    <img src=".//imagenes/pelota.svg" class="pelota__icon">
                    <h3 class="about__title">Canchas</h3>
                    <p class="about__paragraph">Canchas de pasto sintetico con caucho, de primer nivel y aptas para
                        cualquier partido</p>
                </article>
                <article class="about__icons">
                    <img src="imagenes/pelota.svg" class="pelota__icon">
                    <h3 class="about__title">Nuevo equipo</h3>
                    <p class="about__paragraph">Tendras la posibilidad de encontrar un equipo nuevo, en el cual vas a
                        poder cnocer gente nueva y vas a poder pasar un buen rato con ellos</p>
                </article>
            </div>

        </section>
        <section class="questions container">
            <h2 class="subtitle">Preguntas frecuentes</h2>
            <p class="questions__paragraph">Ejemplos:</p>

            <section class="questions__container">
                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Que lograras usandonos?
                            <span class="questions__arrow">
                                <img src="imagenes/arrow.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">Lograras entrar en un nuevo equipo, jugar partidos con gente nueva,
                            hacer nuevos amigos, etc.</p>
                    </div>
                </article>

                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Que pasa si vives alejado del lugar donde me llamaron a jugar?
                            <span class="questions__arrow">
                                <img src="imagenes/arrow.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">No pasa nada! Podes anotarte en nuestra pagina por zonas, barrios,
                            comunas, asi no
                            tenes que pagar un viaje muy caro</p>
                    </div>
                </article>

                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Porque deberias confiarnos tus partido?
                            <span class="questions__arrow">
                                <img src="imagenes/arrow.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">Somos el mejor sitio web para partidos de futbol, contamos con
                            jugadores, predios y clubes de primer nivel en las mejores ligas.</p>
                    </div>
                </article>
            </section>

        </section>
    </main>
    <footer>

        <div class="container__footer">
            <div class="box__footer">
                <div class="logo">
                    <img src="Images/logo-magtimus.png" alt="">
                </div>
                <div class="terms">
                    <p>Video Tutorial para Registrarse.</p>
                    <video controls>
                        <source src="video/video.mp4" type="video/mp4">
                        <source src="video/video.webm" type="video/webm">
                    </video>
                </div>
            </div>
            <div class="box__footer">
                <h2>Links</h2>
                <a href="logeoprincipal.html">Logeo</a>
                <a href="registrarse.html">Registro</a>
                <a href="filtro.html">Encontrar jugadores</a>
                <a href="#">Encontrar equipo</a>
            </div>



            <div class="box__footer">
                <h2>Redes Sociales</h2>
                <a href="#"> <i class="fab fa-facebook-square"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter-square"></i> Twitter</a>
                <a href="#"><i class="fab fa-instagram-square"></i> Instagram</a>
            </div>

        </div>


    </footer>
    </main>
    <script src="questions.js"></script>
</body>

</html>