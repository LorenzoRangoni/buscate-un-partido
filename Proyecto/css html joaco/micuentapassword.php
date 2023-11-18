<?php
include("../../Basededatos/conexion_db.php");
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];

        // Verifica la contraseña actual
        $checkPasswordQuery = "SELECT id_jugador FROM jugadores WHERE id_jugador = $user_id AND contrasena_jugador = '$currentPassword'";
        $checkPasswordResult = mysqli_query($mysqli, $checkPasswordQuery);

        if (mysqli_num_rows($checkPasswordResult) > 0) {
            // Contraseña actual es correcta, actualiza la contraseña
            $updatePasswordQuery = "UPDATE jugadores SET contrasena_jugador = '$newPassword' WHERE id_jugador = $user_id";
            $updatePasswordResult = mysqli_query($mysqli, $updatePasswordQuery);

            if ($updatePasswordResult) {
                echo "contraseña cambiada con exito";
            } else {
                echo "Error al actualizar la contraseña: " . mysqli_error($mysqli);
            }
        } else {
            echo "La contraseña actual es incorrecta";
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
