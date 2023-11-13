<?php
include("../../Basededatos/conexion_db.php");
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newUsername = $_POST["newData"];

        // Actualiza el nombre de usuario en la base de datos
        $sql = "UPDATE jugadores SET nombre_registrado_login = '$newUsername' WHERE id_jugador = $user_id";
        $resultado = mysqli_query($mysqli, $sql);

        if ($resultado) {
            // Actualiza la variable de sesión con el nuevo nombre de usuario
            $_SESSION['username'] = $newUsername;
            header ("Location:http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/panelusuario.php");
            // No es necesario imprimir "success" aquí
        } else {
            echo "Error al actualizar el nombre de usuario: " . mysqli_error($mysqli);
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

