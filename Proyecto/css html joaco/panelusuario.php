<?php
include("../../Basededatos/conexion_db.php");
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM jugadores WHERE id_jugador = $user_id";
    $resultado = mysqli_query($mysqli, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
    $nombre = $usuario["nombre_registrado_login"];
    $mail = $usuario["mail_registrado_login"];
    $contrasena = $usuario["contrasena_jugador"];
} else {
    $user_id = "";
    $username = "";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="panelusuario.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #3498db; /* Fondo azul similar al segundo CSS */
            color: white;
        }

        header {
            background-color: #2c3e50; /* Azul más oscuro para el encabezado */
            color: white;
            padding: 10px 0;
            
        }

        .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}

.logo h1 {
    margin: 0;
    font-size: 24px;
    color: white;
}

        .nav__links .button {
            background-color: #3498db;
            color: white;
            border: 2px solid white;
            border-radius: 5px;
            padding: 10px 15px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .nav__links .button:hover {
            background-color: white;
            color: #3498db;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #3498db;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user-profile {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .data-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .data-label {
            font-weight: bold;
            margin-right: 10px;
        }

        .edit-button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-left: 10px;
        }

        .edit-button:hover {
            background-color: #2980b9;
        }

        .modal-content {
            background-color: #f2f2f2;
            color: #333;
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button.save-button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        form button.save-button:hover {
            background-color: #2980b9;
        }

        .nav__links {
    display: flex;
    align-items: center;
    list-style: none;
}
    </style>
    <title>Buscate un partido</title>
</head>

<body>
    <header class="headercop">
        <nav class="navbar">
            <div class="logo">
                <h1>Fútbol App</h1>
                <nav class="nav container">
        <div class="nav__logo">
        </div>
        <div class="nav__links">
            <a href="index.php" class="button">Inicio</a>
            <!-- <a href="Pagina_de_registroylogin.html" class="button">Logearse</a>
            <a href="encontrarjugadores.html" class="button">Encontrar jugador</a>
            <a href="registrarse2.html" class="button">Formulario</a> -->
 
    </div>

    </nav>
            </div>
            <a href="http://localhost/buscate_un_partido/buscate-un-partido/Basededatos/CerrarSesion.php" class="button">Cerrar Sesión</a>
        </nav>
    </header>

    <main class="container">
        <section class="user-profile">
            <h2>Mi Cuenta</h2>
            <div id="userData">
                <div class="data-item">
                    <span class="data-label">Nombre de Usuario:</span>
                    <span id="username"><?php echo $nombre ?></span>
                    <a href="" class="edit-button" id="editUsernameButton">Editar</a>
                </div>
                <div class="data-item">
                    <span class="data-label">Correo Electrónico:</span>
                    <span id="email"><?php echo $mail ?></span>
                    <a href="" class="edit-button" id="editEmailButton">Editar</a>
                </div>
                <div class="data-item">
                    <span class="data-label">Contraseña:</span>
                    <span id="password">**</span>
                    <a href="#" class="edit-button" id="editPasswordButton">Editar</a>
                </div>
            </div>
        </section>
    </main>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2 id="modalTitle"></h2>
            <form id="editForm" action="micuenta.php" method="post">
                <div class="form-group">
                    <label for="newData">Nuevo Dato:</label>
                    <input type="text" id="newData" name="newData" required>
                </div>
                <button type="submit" class="save-button">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <div id="editEmailModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeEmailModal">&times;</span>
            <h2>Editar Correo Electrónico</h2>
            <form id="editEmailForm" action="micuentaemail.php" method="post">
                <div class="form-group">
                    <label for="newEmail">Nuevo Correo Electrónico:</label>
                    <input type="email" id="newEmail" name="newEmail" required>
                </div>
                <button type="submit" class="save-button">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <div id="editPasswordModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closePasswordModal">&times;</span>
            <h2>Editar Contraseña</h2>
            <form id="editPasswordForm" action="micuentapassword.php" method="post">
                <div class="form-group">
                    <label for="currentPassword">Contraseña Actual:</label>
                    <input type="password" id="currentPassword" name="currentPassword" required>
                </div>
                <div class="form-group">
                    <label for="newPassword">Nueva Contraseña:</label>
                    <input type="password" id="newPassword" name="newPassword" required>
                </div>
                <div id="mensajealerta"></div>
                <button type="submit" class="save-button">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <script src="editeemail.js"></script>
    <script src="panelusuario.js"></script>
    <script src="editepassword.js"></script>
</body>

</html>