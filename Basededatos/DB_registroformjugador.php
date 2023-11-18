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
    $user_id=$usuario["id_jugador"];
    $nombrelogin = $usuario["nombre_registrado_login"];
    $maillogin = $usuario["mail_registrado_login"];
    $contrasena = $usuario["contrasena_jugador"];
    $fecha = $usuario["fecha_registro_jugador"];
} else {
    echo "Error en la consulta: " . $mysqli->error;
}

// Escapa las variables y corrige la sintaxis de la consulta
$sql = "INSERT INTO formulario_jugadores 
        (nombre, apellido, altura, zona_residencial, peso, edad, sub, disponibilidad_horaria_jugador, posicion_jugador, numero_de_telefono_jugador, habilidad, mail_del_jugador, fecha_registro_formulario_jugador, id_jugador) 
        VALUES ('$nombre', '$apellido', '$altura', '$zona', '$peso', '$edad', '$sub', '$disponibilidad', '$posicion', '$telefono', '$habilidad', '$correo','$fecha_registro_formulario','$user_id')";

if ($mysqli->query($sql) === TRUE) {
    header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/index.php");
    
} else {
    echo "Error al insertar datos: " . $mysqli->error;
}
?>
