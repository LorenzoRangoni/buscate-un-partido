<?php

include ("conexion_db.php");

var_dump($_POST);


    // Obtengo los valores enviados por el formulario
    $mail=  $_POST['Mail'];
    $nombre= $_POST['Nombre'];
    $contrasena= $_POST['password'];
    $fecha_registro_jugador = date("Y-m-d H:i:s");

    

    // Insertamos los datos en la base de datos
    $sql= "INSERT INTO jugadores (mail_registrado_login, nombre_registrado_login, contrasena_jugador, fecha_registro_jugador) VALUES ('$mail', ' $nombre', '$contrasena','$fecha_registro_jugador')"; 
    $resultado= $mysqli->query($sql);

    //inserccion correcta

    echo $resultado;

    if ($resultado) 
    {
        
        header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/");
        exit();
    }
        else {
        echo "No se puede insertar la informacion"."<br>";
        echo "Error: " .$sql. mysqli_error($conexion);
     }
    
    
    
    
?>
