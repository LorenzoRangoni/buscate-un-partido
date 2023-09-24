<?php

include("conexion_db.php");


// Obtener datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$altura = $_POST["altura"];
$peso = $_POST["peso"];
$edad = $_POST["edad"];
$sub = $_POST["sub"];
$disponibilidad = $_POST["disponibilidad"];
$posicion = $_POST["posicion"];
$telefono = $_POST["telefono"];
$habilidad = $_POST["habilidad"];

// Consulta SQL para insertar datos
$sql = "INSERT INTO jugadores (nombre, apellido, altura, peso, edad, sub, disponibilidad_horaria_jugador, posicion_jugador, numero_de_telefono_jugador, habilidad) VALUES ('$nombre','$apellido' '$altura', '$peso', '$edad', '$sub', '$disponibilidad', '$posicion', '$telefono', '$habilidad')";

if ($mysqli->query($sql) === TRUE) {
    // Redirigir después de la inserción exitosa
    header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/");
    exit();  // Asegura que el script se detenga después de la redirección
} else {
    echo "Error al insertar datos: " . $mysqli->error;
}


?>
