<?php

include ("conexion_db.php");

var_dump($_POST);


    // Obtengo los valores enviados por el formulario
    $mail=  $_POST['Mail'];
    $nombre= $_POST['Nombre'];
    $contrasena= $_POST['password'];
    $fecha_reg_equipo = date("Y-m-d H:i:s");

    

    // Insertamos los datos en la base de datos
    $sql= "INSERT INTO equipo (email_equipo_login, nombre_equipo_login, contraseña_equipo, fecha_reg_equipo) VALUES ('$mail', ' $nombre', '$contrasena','$fecha_reg_equipo')"; 
    $resultado= $mysqli->query($sql);

    //inserccion correcta

    echo $resultado;

    if ($resultado) 
    {
        
        
        header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/index.php");
        exit();
    }
        else {
        echo "No se puede insertar la informacion"."<br>";
        echo "Error: " .$sql. mysqli_error($conexion);
     }
    
    
    
    
?>
