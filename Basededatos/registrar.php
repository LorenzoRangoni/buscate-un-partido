<?php
    include("conexion_db.php");
    if($conex)
    {
        echo "todo correcto";
    }
    else {
        echo "ocurrio un error con la base de datos";
    }

    if (isset(enviar)) 
        
        
        $consulta = "INSERT INTO jugadores (nombre, altura, peso, edad, disponibilidad_horaria_jugador, posicion_jugador, numero_de_telefono_jugador, habilidad) VALUES ('$nombre','$altura' '$peso', '$edad', '$disponibilidad', '$posicion', '$telefono','$habilidad' )"; 
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
        ?>
        <h3 class="ok">¡Te has inscripto correctamente!</h3> <?php
        } else {
        }
        ?>
        <h3 class="bad">¡Ups ha ocurrido un error!</h3>
        <?php
        else {
        ?>
        <h3 class="bad">¡Por favor complete los campos!</h3>
        <?php
        }


    ?>