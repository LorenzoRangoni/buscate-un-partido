<?php
include("conexion_db.php");

if (isset($_POST['mail_del_jugador']) && isset($_POST['contrasena_jugador'])) {
    $mail = $_POST['mail_del_jugador'];
    $contrasena = $_POST['contrasena_jugador'];

    // Verificar si las credenciales son válidas en la base de datos
    $sql = "SELECT * FROM jugadores WHERE mail_del_jugador = '$mail' AND contrasena_jugador = '$contrasena'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        // Usuario y contraseña válidos, redirige a la página de inicio
        echo "Perfecto.Has ingresado correctamente.";
        exit();
    } else {
        // Usuario o contraseña incorrectos, muestra un mensaje de error
        echo "Mail o contraseña incorrecta. Intente de nuevo.";
    }
}
?>