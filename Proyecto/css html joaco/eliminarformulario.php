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

// Obtén el ID del formulario desde el formulario
$id_formulario = $_POST["id_formulario"];

// Escapa el valor del ID del formulario
$id_formulario = mysqli_real_escape_string($mysqli, $id_formulario);

// Construye la consulta SQL para eliminar el formulario
$sql = "DELETE FROM formulario_jugadores WHERE id_formulario = $id_formulario";

// Ejecuta la consulta
if ($mysqli->query($sql) === TRUE) {
    header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/historialform.php");
} else {
    echo "Error al eliminar datos: " . $mysqli->error;
}
?>
