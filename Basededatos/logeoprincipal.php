<?php
include("conexion_db.php");

if (isset($_POST['mail_del_jugador']) && isset($_POST['contrasena_jugador'])) {
    $mail = $_POST['mail_del_jugador'];
    $contrasena = $_POST['contrasena_jugador'];

    // Verificar si las credenciales son válidas en la base de datos
    $sql = "SELECT * FROM jugadores WHERE mail_del_jugador = '$mail' AND contrasena_jugador = '$contrasena'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        // Usuario y contraseña válidos, almacena la información del usuario en la sesión
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['user_id'] = $usuario['id_jugador'];
        $_SESSION['username'] = $usuario['nombre']; 

        
        header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/");
        exit();
    } else {

        echo "Mail o contraseña incorrecta. Intente de nuevo.";
    }
}
?>