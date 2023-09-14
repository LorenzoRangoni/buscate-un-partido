<?php

include("conexion_db.php");

header("location:  http://localhost/Proyecto/css%20html%20joaco/envio_exitoso.html");
exit(); 



// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

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

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados exitosamente";
} else {
    echo "Error al insertar datos: " . $conn->error;
}


?>
