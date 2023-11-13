<?php
include("conexion_db.php");
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
} else {
    $user_id = "";
    $username = "";
}

// Obtener datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$altura = $_POST["altura"];
$zona = $_POST["zona"];
$peso = $_POST["peso"];
$edad = $_POST["edad"];
$sub = $_POST["sub"];
$disponibilidad = $_POST["disponibilidad"];
$posicion = $_POST["posicion"];
$telefono = $_POST["telefono"];
$habilidad = $_POST["habilidad"];
$correo = $_POST["correo"];

$fecha_registro_formulario = date("Y-m-d H:i:s");



// Realiza una consulta para verificar cuántos registros existen para el usuario
$sql = "SELECT *  FROM jugadores WHERE id_jugador = $user_id";
$resultado = $mysqli->query($sql);

   $nombrelogin = $usuario["nombre_registrado_login"];
    $maillogin = $usuario["mail_registrado_login"];
    $contrasena= $usuario["contrasena_jugador"];
    $fecha=$usuario["fecha_registro_jugador"];

if ($resultado) {
    $row = $resultado->fetch_assoc();
    $numRegistros = $row['count'];

    if ($numRegistros > 0) {
        
 $sql = "INSERT INTO jugadores 
 (nombre, apellido, altura, zona_residencial, peso, edad, sub, disponibilidad_horaria_jugador, posicion_jugador, numero_de_telefono_jugador, habilidad, fecha_registro_formulario_jugador, mail_del_jugador, id_jugador, nombre_registrado_login, mail_registrado_login, contrasena_jugador, fecha_registro_jugador) 
 VALUES ('$nombre', '$apellido', '$altura', '$zona', '$peso', '$edad', '$sub', '$disponibilidad', '$posicion', '$telefono', '$habilidad', '$fecha_registro_formulario', '$correo', '$user_id', '$nombrelogin', $maillogin, $contrasena, )";
            

    } else {
        // Si ya hay registros, realiza una actualización
        $sql = "UPDATE jugadores SET 
            nombre = '$nombre', 
            apellido = '$apellido', 
            altura = '$altura', 
            zona_residencial = '$zona', 
            peso = '$peso', 
            edad = '$edad', 
            sub = '$sub', 
            disponibilidad_horaria_jugador = '$disponibilidad', 
            posicion_jugador = '$posicion', 
            numero_de_telefono_jugador = '$telefono', 
            habilidad = '$habilidad', 
            fecha_registro_formulario_jugador = '$fecha_registro_formulario', 
            mail_del_jugador = '$correo' 
            WHERE id_jugador = $user_id";

        // Si no hay registros, realiza una inserción
           }

    // Después de la ejecución de la consulta
    if ($mysqli->query($sql) === TRUE) {
        header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/index.php");
    } else {
        echo "Error al insertar/actualizar datos: " . $mysqli->error;
    }
} else {
    echo "Error al ejecutar la consulta: " . $mysqli->error;
}
?>


