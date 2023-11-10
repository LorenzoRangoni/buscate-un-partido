<?php
include("conexion_db.php");

// Obtengo los valores enviados por el formulario
$mail = $_POST['Mail'];
$nombre = $_POST['Nombre'];
$contrasena = $_POST['password'];
$fecha_reg_equipo = date("Y-m-d H:i:s");

// Insertamos los datos en la base de datos
$sql = "INSERT INTO equipo (email_equipo_login, nombre_equipo_login, password_equipo, fecha_reg_equipo) VALUES ('$mail', '$nombre', '$contrasena','$fecha_reg_equipo')";
$resultado = $mysqli->query($sql);

// Verificar si la inserción fue exitosa
if ($resultado) {
    // Realizar una consulta para obtener la información del equipo recién registrado
    $sqlConsulta = "SELECT * FROM equipo WHERE id_equipo = " . $mysqli->insert_id;
    $resultadoConsulta = $mysqli->query($sqlConsulta);

    if ($resultadoConsulta) {
        $usuarioequipo = $resultadoConsulta->fetch_assoc();
        session_start();
        $_SESSION['team_id'] = $usuarioequipo['id_equipo'];
        $_SESSION['team'] = $usuarioequipo['nombre_equipo_login'];

        // Redirigir al equipo a la página principal
        header("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/indexequippo.php");
        exit();
    } else {
        echo "Error al obtener información del equipo registrado.";
    }
} else {
    echo "No se puede insertar la información" . "<br>";
    echo "Error: " . $sql . mysqli_error($mysqli);
}
?>

    
    
    
    
?>
