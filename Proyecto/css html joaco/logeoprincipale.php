<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login Form Design One | Fazt</title>
    <link rel="stylesheet" href="logeoprincipal.css">

</head>

<body>
    <nav class="nav container">
        <div class="nav__logo">
            <h2 class="nav__title">Partido</h2>
        </div>
        <div class="nav__links">
            <a href="index.html" class="button">Inicio</a>
            <a href="logeoprincipal.html" class="button">Logearse</a>
            <a href="encontrar-jugador.html" class="button">Encontrar jugador</a>
            <a href="registrarse2.html" class="button">Formulario</a>
        </div>
    </nav>
    <img src="./imagenes/7604152.png" class="avatar" alt="Logo">
    <div class="login-box">
        <!-- Agrega la siguiente línea para mostrar mensajes de error -->


        <h1>Login Here</h1>
        <form method="POST" action="../../Basededatos/logeoprincipal.php">
            <label for="mail_del_jugador">Correo:</label>
            <input type="email" name="mail_del_jugador" placeholder="Escribi tu correo" required>
            <!-- CONTRASEÑA DEL JUGADOR INPUT -->
            <label for="contrasena_jugador">Contraseña:</label>
            <input type="password" name="contrasena_jugador" placeholder="Escribi tu contraseña" required>
            
            <input type="submit" value="Log In">
            <a href="Registrarte.html">Don't have An account?</a>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login-form').submit(function(e) {
                e.preventDefault();
                
                $.ajax({
                    type: 'POST',
                    url: '../../Basededatos/logeoprincipal.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            window.location.href = 'http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/index.php';
                        } else {
                            $('#error-message').text(response.message);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>