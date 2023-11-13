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
$sql = "SELECT * FROM jugadores WHERE id_jugador = $user_id";
$resultado = $mysqli->query($sql);

if ($resultado) {
    $usuario = $resultado->fetch_assoc(); // Obtener el array asociativo de los resultados
    $nombrelogin = $usuario["nombre_registrado_login"];
    $maillogin = $usuario["mail_registrado_login"];
    $contrasena = $usuario["contrasena_jugador"];
    $fecha = $usuario["fecha_registro_jugador"];
} else {
    echo "Error en la consulta: " . $mysqli->error;
}

// Escapa las variables y corrige la sintaxis de la consulta
$sql = "INSERT INTO jugadores 
        (nombre, apellido, altura, zona_residencial, peso, edad, sub, disponibilidad_horaria_jugador, posicion_jugador, numero_de_telefono_jugador, habilidad, fecha_registro_formulario_jugador, mail_del_jugador, nombre_registrado_login, mail_registrado_login, contrasena_jugador, fecha_registro_jugador) 
        VALUES ('$nombre', '$apellido', '$altura', '$zona', '$peso', '$edad', '$sub', '$disponibilidad', '$posicion', '$telefono', '$habilidad', '$fecha_registro_formulario', '$correo', '$nombrelogin', '$maillogin', '$contrasena', '$fecha')";

if ($mysqli->query($sql) === TRUE) {
    header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/index.php");
} else {
    echo "Error al insertar datos: " . $mysqli->error;
}
?>
