<?php
include("../../Basededatos/conexion_db.php");

// Obtengo los valores enviados por el formulario
if (isset($_POST['Mail']) && isset($_POST['Nombre']) && isset($_POST['password'])) {
    // Obtengo los valores enviados por el formulario
    $mail = $_POST['Mail'];
    $nombre = $_POST['Nombre'];
    $contrasena = $_POST['password'];
    $fecha_registro_jugador = date("Y-m-d H:i:s");

    // Verificar si el correo electrónico ya está registrado
    $sqlVerificarEmail = "SELECT * FROM equipo WHERE mail_registrado_login = '$mail'";
    $resultadoVerificarEmail = $mysqli->query($sqlVerificarEmail);

    if ($resultadoVerificarEmail->num_rows > 0) {
        // El correo electrónico ya está registrado
        echo "registrado";
        die(); // Detener la ejecución del script
    } else {
        // Insertar datos en la base de datos
        $sqlInsertar = "INSERT INTO equipo (email_equipo_login, nombre_equipo_login, password_equipo, fecha_registro_equipo	) VALUES ('$mail', '$nombre', '$contrasena','$fecha_registro_jugador')";
        $resultadoInsertar = $mysqli->query($sqlInsertar);

        if ($resultadoInsertar) {
            // Realizar una consulta para obtener la información del jugador recién registrado
            $sqlConsulta = "SELECT * FROM equipo WHERE id_equipo = " . $mysqli->insert_id;
            $resultadoConsulta = $mysqli->query($sqlConsulta);

            if ($resultadoConsulta) {
                $usuario = $resultadoConsulta->fetch_assoc();
                session_start();
                $_SESSION['team_id'] = $usuario['id_equipo'];
                $_SESSION['team'] = $usuario['nombre_equipo_login'];

                // Redirigir al jugador a la página principal
                header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/indexequippo.php");
                exit();
            } else {
                echo "Error al obtener información del jugador registrado.";
            }
        } else {
            echo "No se puede insertar la información" . "<br>";
            echo "Error: " . $sqlInsertar . mysqli_error($mysqli);
        }
    }
} else {
    echo "Error: Datos del formulario no recibidos correctamente.";
}
?>

