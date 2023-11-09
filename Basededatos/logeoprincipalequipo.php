<?php
include("conexion_db.php");

if (isset($_POST['mail_del_equipo']) && isset($_POST['contrasena_equipo'])) {
    $mail = $_POST['mail_del_equipo'];
    $contrasena = $_POST['contrasena_equipo'];

    
    // Verificar si las credenciales son válidas en la base de datos
    $sql = "SELECT * FROM equipo WHERE email_equipo_login = '$mail' AND password_equipo = '$contrasena'";
    $resultado = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($resultado) >0) {
        // Usuario y contraseña válidos, almacena la información del usuario en la sesión
        $usuarioequipo = mysqli_fetch_assoc($resultado);
        session_start();
        $_SESSION['team_id'] = $usuarioequipo['id_equipo'];
        $_SESSION['team'] = $usuarioequipo['nombre_equipo_login']; 
        //echo 'Test:' . $usuario['id_jugador'] . ":" . $usuario['nombre_registrado_login']; 
        
        header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/indexequippo.php");
        exit();
    } else {

        echo "Mail o contraseña incorrecta. Intente de nuevo.";
    }
}
?>