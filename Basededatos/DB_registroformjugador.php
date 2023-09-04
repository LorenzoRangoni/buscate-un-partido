<?php
// Datos de conexión
$hostname = "aws.connect.psdb.cloud";
$username = "jia4hgeiw0xrsz4kpjpm";
$password = "pscale_pw_9OrPORrnYforaotmp602Ala7vUOAir2qj8oVHto6WZS";
$database = "buscateunpartido";

// Conexión a la base de datos
$conn = new mysqli($hostname, $username, $password, $database);

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
$sql = "INSERT INTO jugadores (nombre, altura, peso, edad, disponibilidad_horaria_jugador, posicion_jugador, numero_de_telefono_jugador, habilidad) VALUES ('$nombre', '$altura', '$peso', '$edad', '$sub', '$disponibilidad', '$posicion', '$telefono', '$habilidad')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados exitosamente";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
