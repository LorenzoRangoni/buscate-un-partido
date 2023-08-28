<?php
    include("conexion_db.php");
    if($conex)
    {
        echo "todo correcto";
    }
    else {
        echo "ocurrio un error con la base de datos";
    }

    if (isset($_POST['enviar'])) 
        
        
        $consulta = "INSERT INTO datos (nombre, numero_de_telefono_jugador) VALUES ('$nombre', '$telefono')"; 
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