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

// Obtén el ID del formulario desde el formulario
$id_formulario = $_POST["idFormulario"];

// Escapa las variables y corrige la sintaxis de la consulta
$sql = "UPDATE formulario_jugadores 
        SET nombre='$nombre', apellido='$apellido', altura='$altura', zona_residencial='$zona', peso='$peso', edad='$edad', sub='$sub', 
            disponibilidad_horaria_jugador='$disponibilidad', posicion_jugador='$posicion', mail_del_jugador='$correo', numero_de_telefono_jugador='$telefono', 
            habilidad='$habilidad'
        WHERE id_formulario=$id_formulario";

if ($mysqli->query($sql) === TRUE) {
    header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/historialform.php");
} else {
    echo "Error al actualizar datos: " . $mysqli->error;
}
?>
