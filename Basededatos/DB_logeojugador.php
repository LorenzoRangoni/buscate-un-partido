<?php

$hostname = "aws.connect.psdb.cloud";
$username = "jia4hgeiw0xrsz4kpjpm";
$password = "pscale_pw_9OrPORrnYforaotmp602Ala7vUOAir2qj8oVHto6WZS";
$database = "buscateunpartido";


$conn = new mysqli($servername, $username, $password, $database);


// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail_del_jugador = $_POST["mail_del_jugador"];
    $contrasena_jugador = $_POST["contrasena_jugador"];
   
    $sql = "INSERT INTO jugadores (mail_del_jugador,contrasena_jugador ) VALUES ('$mail_del_jugador', '$contrasena_jugador')";
    
    if (empty($mail_del_jugador) || empty($contrasena_jugador)) {
        echo 'Faltan datos';
        exit();
    } else {
        $query_check_password_mail = "SELECT * FROM jugadores WHERE mail_del_jugador=? AND contrasena_jugador=?";
        $stmt_check_password_mail = $mysqli->prepare($query_check_password_mail);
        $stmt_check_password_mail->bind_param("ss", $mail_del_jugador, $contrasena_jugador);
        $stmt_check_password_mail->execute();
        $stmt_check_password_mail->store_result();

        if ($stmt_check_password_mail->num_rows > 0) {
            $_SESSION["mail_del_jugador"] = $mail_del_jugador;
            echo "Has iniciado sesión correctamente";
            header("Location: Index2.html"); // Redirige a la página de inicio exitoso
            exit();
        } else {
            echo "Correo o contraseña incorrectos. Intente de nuevo.";
        }
    }
}
$conn->close();
?>
