<?php session_start();
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      $username = $_SESSION['username'];
    
   } else {
       $user_id = "";
       $username = "";
   }
   ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Formularios</title>
    <link rel="stylesheet" href="styles8.css">
</head>
<body>
    <h1>Historial de Formularios Enviados</h1>

    <?php
   include("../../Basededatos/conexion_db.php");
   
    
    $sql= "SELECT * FROM formulario_jugadores WHERE id_jugador = '$user_id'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Fecha de Envío</th><th>Nombre</th><th>Altura</th><th>Peso</th><th>Posicion</th><th>Teléfono</th><th>Disponibilidad horaria</th><th>Correo</th><th>Edad</th><th>sub</th><th>Habilidad</th><th>Zona residencial</th>';

        while ($row = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["fecha_registro_formulario_jugador"] . '</td>';
            echo '<td>' . $row["nombre"] . ' ' . $row["apellido"] . '</td>';
            echo '<td>' . $row["altura"] . '</td>';
            echo '<td>' . $row["peso"] . '</td>';
            echo '<td>' . $row["posicion_jugador"] . '</td>';
            echo '<td>' . $row["numero_de_telefono_jugador"] . '</td>';
            echo '<td>' . $row["disponibilidad_horaria_jugador"] . '</td>';
            echo '<td>' . $row["mail_del_jugador"] . '</td>';
            echo '<td>' . $row["edad"] . '</td>';
            echo '<td>' . $row["sub"] . '</td>';
            echo '<td>' . $row["habilidad"] . '</td>';
            echo '<td>' . $row["zona_residencial"] . '</td>';
            echo '<td><a href="registrarse2_edicion.php" id=' . $row["id_formulario"] . '">Editar</a></td>';
            echo '<td><a href="eliminarformulario.php" id=' . $row["id_formulario"] . ')">Eliminar</button></td>';
            echo '</tr>';
            
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No se encontraron registros en el historial.';
    }
    ?>
</body>
</html>
