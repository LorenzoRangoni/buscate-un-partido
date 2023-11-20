<?php
include("../../Basededatos/conexion_db.php");
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


$id_formulario = $_POST["id_formulario"];

// Verifica que $id_formulario tenga un valor antes de usarlo en la consulta SQL
if ($id_formulario === null) {
    echo "Error: ID del formulario no definido.";
    // Puedes redirigir o manejar el error de otra manera aquí.
    exit;
}

// Escapa las variables y corrige la sintaxis de la consulta
$sql = "UPDATE formulario_jugadores 
        SET nombre='$nombre', altura='$altura', zona_residencial='$zona', peso='$peso', edad='$edad', sub='$sub', 
            disponibilidad_horaria_jugador='$disponibilidad', posicion_jugador='$posicion', mail_del_jugador='$correo', numero_de_telefono_jugador='$telefono', 
            habilidad='$habilidad'
        WHERE id_formulario = " . mysqli_real_escape_string($mysqli, $id_formulario);

if ($mysqli->query($sql) === TRUE) {
    echo "Consulta SQL: $sql";} else {
    echo "Error al actualizar datos: " . $mysqli->error;
}
?>
