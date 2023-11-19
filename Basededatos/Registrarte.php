<?php
include("conexion_db.php");

// Obtengo los valores enviados por el formulario
$mail = $_POST['Mail'];
$nombre = $_POST['Nombre'];
$contrasena = $_POST['password'];
$fecha_registro_jugador = date("Y-m-d H:i:s");

// Verificar si el correo electrónico ya está registrado
$sqlVerificarEmail = "SELECT * FROM jugadores WHERE mail_registrado_login = '$mail'";
$resultadoVerificarEmail = $mysqli->query($sqlVerificarEmail);

if ($resultadoVerificarEmail->num_rows > 0) {
    // El correo electrónico ya está registrado
    echo "email_registrado";
} else {
    // Insertar datos en la base de datos
    $sqlInsertar = "INSERT INTO jugadores (mail_registrado_login, nombre_registrado_login, contrasena_jugador, fecha_registro_jugador) VALUES ('$mail', '$nombre', '$contrasena','$fecha_registro_jugador')";
    $resultadoInsertar = $mysqli->query($sqlInsertar);

    if ($resultadoInsertar) {
        // Realizar una consulta para obtener la información del jugador recién registrado
        $sqlConsulta = "SELECT * FROM jugadores WHERE id_jugador = " . $mysqli->insert_id;
        $resultadoConsulta = $mysqli->query($sqlConsulta);

        if ($resultadoConsulta) {
            $usuario = $resultadoConsulta->fetch_assoc();
            session_start();
            $_SESSION['user_id'] = $usuario['id_jugador'];
            $_SESSION['username'] = $usuario['nombre_registrado_login'];

            // Redirigir al jugador a la página principal
            header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/index.php");
            exit();
        } else {
            echo "Error al obtener información del jugador registrado.";
        }
    } else {
        echo "No se puede insertar la información" . "<br>";
        echo "Error: " . $sqlInsertar . mysqli_error($conexion);
    }
}
?>
