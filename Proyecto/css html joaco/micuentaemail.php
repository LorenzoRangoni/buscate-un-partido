<?php
include("../../Basededatos/conexion_db.php");
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newEmail = $_POST["newEmail"];  // Cambia el nombre de la variable

        // Actualiza el correo electrónico en la base de datos
        $sql = "UPDATE jugadores SET mail_registrado_login = '$newEmail' WHERE id_jugador = $user_id";
        $resultado = mysqli_query($mysqli, $sql);

        if ($resultado) {
            // Actualiza la variable de sesión con el nuevo correo electrónico
            $_SESSION['mail'] = $newEmail;
            echo "success";
        } else {
            echo "Error al actualizar el correo electrónico: " . mysqli_error($mysqli);
        }
        exit(); // Termina la ejecución después de procesar la solicitud de actualización
    }

    // Obtén los datos del usuario
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
