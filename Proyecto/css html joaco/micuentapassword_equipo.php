<?php
include("../../Basededatos/conexion_db.php");
session_start();

if (isset($_SESSION['team_id'])) {
    $team_id = $_SESSION['team_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];

        // Verifica la contraseña actual
        $checkPasswordQuery = "SELECT id_equipo FROM equipo WHERE id_equipo = $team_id AND password_equipo = '$currentPassword'";
        $checkPasswordResult = mysqli_query($mysqli, $checkPasswordQuery);

        if (mysqli_num_rows($checkPasswordResult) > 0) {
            // Contraseña actual es correcta, actualiza la contraseña
            $updatePasswordQuery = "UPDATE equipo SET password_equipo = '$newPassword' WHERE id_equipo = $team_id";
            $updatePasswordResult = mysqli_query($mysqli, $updatePasswordQuery);

            if ($updatePasswordResult) {
                echo "success";
            } else {
                echo "Error al actualizar la contraseña: " . mysqli_error($mysqli);
            }
        } else {
            echo "La contraseña actual es incorrecta";
        }
        exit(); // Termina la ejecución después de procesar la solicitud de actualización
    }

    // Obtén los datos del usuario
    // Obtén los datos del usuario
    $sql = "SELECT * FROM equipo WHERE id_equipo = $team_id";
    $resultado = mysqli_query($mysqli, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
    $nombre = $usuario["nombre_equipo_login"];
    $mail = $usuario["email_equipo_login"];
    $contrasena = $usuario["password_equipo"];
} else {
    $team_id = "";
    $team = "";
}
?>
