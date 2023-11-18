<?php
include("../../Basededatos/conexion_db.php");
session_start();

if (isset($_SESSION['team_id'])) {
    $team_id = $_SESSION['team_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newEmail = $_POST["newEmail"];

        // Verifica si el nuevo correo electrónico ya existe en la base de datos
        $checkEmailQuery = "SELECT id_equipo FROM equipo WHERE email_equipo_login = '$newEmail'";
        $checkEmailResult = mysqli_query($mysqli, $checkEmailQuery);

        if (mysqli_num_rows($checkEmailResult) > 0) {
            echo "El correo electrónico ya está registrado";
        } else {
            // Actualiza el correo electrónico en la base de datos
            $updateEmailQuery = "UPDATE equipo SET email_equipo_login = '$newEmail' WHERE id_equipo = $team_id";
            $updateEmailResult = mysqli_query($mysqli, $updateEmailQuery);

            if ($updateEmailResult) {
                // Actualiza la variable de sesión con el nuevo correo electrónico
                $_SESSION['mail'] = $newEmail;
                echo "success";
            } else {
                echo "Error al actualizar el correo electrónico: " . mysqli_error($mysqli);
            }
        }
        exit(); // Termina la ejecución después de procesar la solicitud de actualización
    }

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
