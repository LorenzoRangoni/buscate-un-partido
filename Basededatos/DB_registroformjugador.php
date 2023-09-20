<?php

include("conexion_db.php");


// Obtener datos del formulario
$nombre = $_POST["nombre"];
$altura = $_POST["altura"];
$peso = $_POST["peso"];
$edad = $_POST["edad"];

$sub = $_POST["sub"];
$disponibilidad = $_POST["disponibilidad"];
$posicion = $_POST["posicion"];
$telefono = $_POST["telefono"];
$habilidad = $_POST["habilidad"];

// Consulta SQL para insertar datos
$sql = "INSERT INTO jugadores (nombre, altura, peso, edad, sub, disponibilidad_horaria_jugador, posicion_jugador, numero_de_telefono_jugador, habilidad) VALUES ('$nombre', '$altura', '$peso', '$edad', '$sub', '$disponibilidad', '$posicion', '$telefono', '$habilidad')";

if ($mysqli->query($sql) === TRUE) {
    // Redirigir después de la inserción exitosa
    header("Location: http://localhost:5500/Proyecto/css%20html%20joaco/envio_exitoso.htmll");
    exit();  // Asegura que el script se detenga después de la redirección
} else {
    echo "Error al insertar datos: " . $mysqli->error;
}


?>
