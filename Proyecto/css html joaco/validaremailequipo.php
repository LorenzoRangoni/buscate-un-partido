<?php
include("../../Basededatos/conexion_db.php");

// Obtengo los valores enviados por el formulario
if (isset($_POST['email']) ) {
    // Obtengo los valores enviados por el formulario
    $mail = $_POST['email'];


    // Verificar si el correo electrónico ya está registrado
    $sqlVerificarEmail = "SELECT * FROM equipo WHERE email_equipo_login = '$mail'";
    $resultadoVerificarEmail = $mysqli->query($sqlVerificarEmail);

    if ($resultadoVerificarEmail->num_rows > 0) {
        // El correo electrónico ya está registrado
        echo "registrado";
        //die(); // Detener la ejecución del script
    } else {
        // Insertar datos en la base de datos
        echo "no existe";
    }
}

?>
