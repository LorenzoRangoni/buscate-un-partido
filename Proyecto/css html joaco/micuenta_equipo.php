<?php
include("../../Basededatos/conexion_db.php");
session_start();

if (isset($_SESSION['team_id'])) {
    $team_id = $_SESSION['team_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newUsername = $_POST["newData"];

        // Actualiza el nombre de usuario en la base de datos
        $sql = "UPDATE equipo SET nombre_equipo_login = '$newUsername' WHERE id_equipo = $team_id";
        $resultado = mysqli_query($mysqli, $sql);

        if ($resultado) {
            // Actualiza la variable de sesión con el nuevo nombre de usuario
            $_SESSION['team'] = $newUsername;
            header ("Location:http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/panelusuarioequipo.php");
            // No es necesario imprimir "success" aquí
        } else {
            echo "Error al actualizar el nombre del equipo: " . mysqli_error($mysqli);
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

