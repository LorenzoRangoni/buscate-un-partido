<?php
include("conexion_db.php"); 
$sql = "SELECT * FROM formulario_equipo"; 
$result = $mysqli->query($sql);

$teams = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $teams[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($teams);