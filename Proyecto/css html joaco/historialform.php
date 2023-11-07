<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Formularios</title>
    <!-- Agrega tus estilos CSS si es necesario -->
</head>
<body>
    <h1>Historial de Formularios Enviados</h1>

    <?php
   include("../../Basededatos/conexion_db.php");
   
   
    

    
    $sql= "SELECT * FROM jugadores WHERE nombre_registrado_login = '$user_id'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Fecha de Envío</th><th>Nombre</th><th>Altura</th><th>Teléfono</th><th>Correo</th></tr>';
        while ($row = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["fecha_registro_formulario_jugador"] . '</td>';
            echo '<td>' . $row["nombre"] . ' ' . $row["apellido"] . '</td>';
            echo '<td>' . $row["altura"] . '</td>';
            echo '<td>' . $row["numero_de_telefono_jugador"] . '</td>';
            echo '<td>' . $row["mail_del_jugador"] . '</td>';
            
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No se encontraron registros en el historial.';
    }
    ?>
</body>
</html>
