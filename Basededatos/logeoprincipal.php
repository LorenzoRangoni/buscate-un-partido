<?php
include("conexion_db.php");

if (isset($_POST['mail_del_jugador']) && isset($_POST['contrasena_jugador'])) {
    $mail = $_POST['mail_del_jugador'];
    $contrasena = $_POST['contrasena_jugador'];

    $fecha_registro_jugador = date("Y-m-d H:i:s");

    $sql = "INSERT INTO jugadores (fecha_registro_jugador) VALUES ('$fecha_registro_jugador')";

    // Verificar si las credenciales son válidas en la base de datos
    $sql = "SELECT * FROM jugadores WHERE mail_registrado_login = '$mail' AND contrasena_jugador = '$contrasena'";
    $resultado = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($resultado) >0) {
        // Usuario y contraseña válidos, almacena la información del usuario en la sesión
        $usuario = mysqli_fetch_assoc($resultado);
        session_start();
        $_SESSION['user_id'] = $usuario['id_jugador'];
        $_SESSION['username'] = $usuario['nombre_registrado_login']; 
        //echo 'Test:' . $usuario['id_jugador'] . ":" . $usuario['nombre_registrado_login']; 
        
        header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/index.php");
        exit();
    } else {

        echo "Mail o contraseña incorrecta. Intente de nuevo.";
    }
}
?>