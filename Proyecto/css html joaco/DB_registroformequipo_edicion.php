<?php
include("../../Basededatos/conexion_db.php");
session_start();

if (isset($_SESSION['team_id'])) {
    $team_id = $_SESSION['team_id'];
    $team = $_SESSION['team'];
} else {
    $team_id = "";
    $team = "";
}

// Obtener datos del formulario
$nombreEquipo = $_POST['nombreEquipo'];
$golesTemporada = $_POST['golesTemporada'];
$posicionFaltante = $_POST['posicionFaltante'];
$capitan = $_POST['capitan'];
$telefonoCapitan = $_POST['telefonoCapitan'];
$mailCapitan = $_POST['mailCapitan'];
$ubicacion = $_POST['ubicacion'];
$frecuenciaEntrenamiento = $_POST['frecuenciaEntrenamiento'];
$liga = $_POST['liga'];
$diasEntrenamiento = $_POST['diasEntrenamiento'];
$horaEntrenamiento = $_POST['horaEntrenamiento'];
$nivelDejuego = $_POST['nivelDejuego'];
$fecha_registro_formulario = date("Y-m-d H:i:s");


$id_formulario = $_POST["id_formulario"];

// Verifica que $id_formulario tenga un valor antes de usarlo en la consulta SQL
if ($id_formulario === null) {
    echo "Error: ID del formulario no definido.";
    // Puedes redirigir o manejar el error de otra manera aquí.
    exit;
}

// Escapa las variables y corrige la sintaxis de la consulta
$sql = "UPDATE formulario_equipo
        SET nombre_equipo='$nombreEquipo', goles='$golesTemporada', posicion_requerida='$posicionFaltante', capitan='$capitan', telefono_capitan='$telefonoCapitan', mail_capitan='$mailCapitan', 
        ubicacion='$ubicacion', liga='$liga', dias_entrenamiento='$diasEntrenamiento', frecuencia_entrenamiento='$frecuenciaEntrenamiento', 
        hora_entrenamiento='$horaEntrenamiento', nivel_de_juego='$nivelDejuego'
        WHERE id_formulario = " . mysqli_real_escape_string($mysqli, $id_formulario);

if ($mysqli->query($sql) === TRUE) {
    echo "Consulta SQL: $sql";} else {
    echo "Error al actualizar datos: " . $mysqli->error;
}
?>
