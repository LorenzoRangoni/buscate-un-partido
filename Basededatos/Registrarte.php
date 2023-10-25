<?php

include ("conexion_db.php");

if(isset($_POST['Registrarte'])) {

    // Obtengo los valores enviados por el formulario
    $mail=  $_POST['Mail'];
    $nombre= $_POST['Nombre'];
    $contrasena= $_POST['password'];

    // Insertamos los datos en la base de datos
    $sql= "INSERT INTO jugadores (mail_registrado_login, nombre_registrado_login, contrasena_jugador) VALUES ('$mail', ' $nombre', '$contrasena')"; 
    $resultado= mysqli_query ($conexion, $sql);

    //inserccion correcta

    if ($resultado) 
    {
        
        header ("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/index.html");
        exit();
    }
   
    // inserccion fallida
     else {
        echo "No se puede insertar la informacion"."<br>";
        echo "Error: " .$sql. mysqli_error($conexion);
     }
    
    
    
    
}
?>
