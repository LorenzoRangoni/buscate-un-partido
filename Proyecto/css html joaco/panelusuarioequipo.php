<?php
include("../../Basededatos/conexion_db.php");
session_start();
if (isset($_SESSION['team_id'])) {
   $team_id = $_SESSION['team_id'];
   $team = $_SESSION['team'];
    $sql = "SELECT * FROM jugadores WHERE id_equipo = $team_id";
    $resultado = mysqli_query($mysqli, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
    $nombre = $usuario["nombre_equipo_login"];
    $mail = $usuario["email_equipo_login"];
    $contrasena= $usuario["password_equipo"];

 } else {
     $team_id = "";
     $team = "";
 }
 
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="panelusuario.css">
    <title>Buscate un partido</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>Fútbol App</h1>
            </div>
            <a href="indexequippo.php">Volver al inicio</a>
            <a href="http://localhost/buscate_un_partido/buscate-un-partido/Basededatos/CerrarSesion.php">Cerrar Sesión</a>
        </nav>
    </header>

    <main class="container">
        <section class="user-profile">
            <h2>Mi Perfil</h2>
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
                    <span id="password">********</span>
                    <a href="#" class="edit-button" id="editPasswordButton">Editar</a>
                </div>
            </div>
        </section>
    </main>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2 id="modalTitle"></h2>
            <form id="editForm" action="micuenta_equipo.php" method="post">
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
        <form id="editEmailForm" action="micuentaemail_equipo.php" method="post">
         <!-- Agrega el atributo 'action' -->
            <div class="form-group">
                <label for="newEmail">Nuevo Correo Electrónico:</label>
                <input type="email" id="newEmail" name="newEmail" required>
            </div>
            <button type="submit" class="save-button">Guardar Cambios</button>
        </form>
    </div>
</div>
<form id="editPasswordForm">
    <div class="form-group">
        <a href="#" class="edit-button" id="editPasswordButton">Editar</a>
    </div>
    <div class="form-group">
        <label for="currentPassword">Contraseña Actual:</label>
        <input type="password" id="currentPassword" name="currentPassword" required>
    </div>
    <div class="form-group">
        <label for="newPassword">Nueva Contraseña:</label>
        <input type="password" id="newPassword" name="newPassword" required>
    </div>
    <button type="submit" class="save-button">Guardar Cambios</button>
</form>

  


<script src="editeemail_equipo.js"></script>
<script src="panelusuario_equipo.js"></script>
<script src="editepassword_equipo.js"></script>



    
</body>
</html>
