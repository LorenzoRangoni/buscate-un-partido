<?php
include("conexion_db.php"); 
$sql = "SELECT * FROM formulario_jugadores"; 
$result = $mysqli->query($sql);

$players = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $players[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($players);