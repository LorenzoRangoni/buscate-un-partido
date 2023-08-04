<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];
    $edad = $_POST["edad"];
    $disponibilidad = $_POST["disponibilidad"];
    $posicion = $_POST["posicion"];
    $telefono = $_POST["telefono"];
    $habilidad = $_POST["habilidad"];

    
    $target_dir = "videos/"; 
    $target_file = $target_dir . basename($_FILES["video"]["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $validExtensions = array("mp4", "avi", "mov");
    if (!in_array($videoFileType, $validExtensions)) {
        echo "Error: Solo se permiten videos en formato MP4, AVI o MOV.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
        $videoDuration = shell_exec("ffprobe -i " . escapeshellarg($target_file) . " -show_entries format=duration -v quiet -of csv='p=0'");
        $videoDuration = (float)$videoDuration;
        if ($videoDuration < 120 || $videoDuration > 300) { 
            echo "Error: La duración del video debe estar entre 2 y 5 minutos.";
            $uploadOk = 0;
        }
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
            echo "¡Gracias por tu postulación! El video se ha subido correctamente.";
        } else {
            echo "Error al subir el video.";
        }
    }
}
?>
