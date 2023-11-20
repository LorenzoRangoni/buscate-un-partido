<?php
include("../../Basededatos/conexion_db.php");
session_start();

if (isset($_SESSION['team_id'])) {
    $team_id = $_SESSION['team_id'];
    $team = $_SESSION['team'];
} else {
    $team_id = "";
    $tam = "";
}

// Obtén el ID del formulario desde el formulario
// Obtén el ID del formulario desde la URL
$id_formulario = $_GET["id"];



// Escapa el valor del ID del formulario
$id_formulario = mysqli_real_escape_string($mysqli, $id_formulario);

// Construye la consulta SQL para eliminar el formulario
$sql = "DELETE FROM formulario_equipo WHERE id_formulario = $id_formulario";

// Ejecuta la consulta
if ($mysqli->query($sql) === TRUE) {
    header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/histroialformequipo.php");
} else {
    echo "Error al eliminar datos: " . $mysqli->error;
}
?>
