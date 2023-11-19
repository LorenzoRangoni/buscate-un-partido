<?php 
include("conexion_db.php");

session_start();
if (isset($_SESSION['team_id'])) {
   $team_id = $_SESSION['team_id'];
   $team = $_SESSION['team'];
} else {
    $team_id = "";
    $team = "";
}

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

$sql = "SELECT * FROM equipo WHERE id_equipo = $team_id";
$resultado = $mysqli->query($sql);

if ($resultado) {
    $usuario = $resultado->fetch_assoc(); // Obtener el array asociativo de los resultados
    $team_id=$usuario["id_equipo"];
    $nombreloginequipo = $usuario["nombre_equipo_login"];
    $mailloginequipo = $usuario["email_equipo_login"];
    $contrasenaequipo = $usuario["password_equipo"];
  
} else {
    echo "Error en la consulta: " . $mysqli->error;
}
$sql = "INSERT INTO formulario_equipo (nombre_equipo, goles, posicion_requerida, capitan, telefono_capitan, mail_capitan, ubicacion, frecuencia_entrenamiento, liga, dias_entrenamiento, hora_entrenamiento, nivel_de_juego, id_equipo, fecha_registro_formulario)
        VALUES ('$nombreEquipo', '$golesTemporada', '$posicionFaltante', '$capitan', '$telefonoCapitan', '$mailCapitan', '$ubicacion', '$frecuenciaEntrenamiento', '$liga', '$diasEntrenamiento', '$horaEntrenamiento', '$nivelDejuego', '$team_id','$fecha_registro_formulario')";

if ($mysqli->query($sql) === TRUE) {
    header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/indexequippo.php");
} else {
    echo "Error al insertar datos: " . $mysqli->error;
}
?>