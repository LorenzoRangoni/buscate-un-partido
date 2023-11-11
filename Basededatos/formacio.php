<?php
include("conexion_db.php");

var_dump($_POST);

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
$correo = $_POST["correo"]; // Cambiado de mail a correo



// Consulta SQL para insertar datos
$sql = "INSERT INTO jugadores (nombre, apellido, altura, zona_residencial, peso, edad, sub, disponibilidad_horaria_jugador, posicion_jugador, numero_de_telefono_jugador, habilidad, fecha_registro_formulario_jugador, mail_del_jugador) VALUES ('$nombre','$apellido','$altura','$zona', '$peso', '$edad', '$sub', '$disponibilidad', '$posicion', '$telefono', '$habilidad', '$fecha_registro_formulario', '$correo')";

// Después de la ejecución de la consulta
if ($mysqli->query($sql) === TRUE) {
    header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/indexequipo.php");
} else {
    echo "Error al insertar datos: " . $mysqli->error;
}

?>
