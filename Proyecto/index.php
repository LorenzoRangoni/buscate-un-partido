<?php
$error=array();
if(isset($_POST["nombre"])){
    if(strlen($_POST["nombre"])<2)
    {
        array_push($error , "El nombre tiene que ser mayor a 2 ")
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Postulación</title>
</head>
<body>
    <h2>Formulario de Postulación para jugar fútbol</h2>
    <form action="procesar_postulacion.php" method="post" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label>Altura (cm):</label>
        <input type="text" name="altura" required><br>

        <label>Peso (kg):</label>
        <input type="number" name="peso" required><br>    

        <label>Edad:</label>
        <input type="number" name="edad" required><br>

        <label>Disponibilidad horaria:</label>
<select name="disponibilidad" required>
    <option value="">Selecciona una opción</option>
    <option value="Desde las 00h hasta las 02h">Desde las 00h hasta las 02h</option>
    <option value="Desde las 02h hasta las 04h">Desde las 02h hasta las 04h</option>
    <option value="Desde las 04h hasta las 06h">Desde las 04h hasta las 06h</option>
    <option value="Desde las 06h hasta las 08h">Desde las 06h hasta las 08h</option>
    <option value="Desde las 08h hasta las 10h">Desde las 08h hasta las 10h</option>
    <option value="Desde las 10h hasta las 12h">Desde las 10h hasta las 12h</option>
    <option value="Desde las 12h hasta las 14h">Desde las 12h hasta las 14h</option>
    <option value="Desde las 14h hasta las 16h">Desde las 14h hasta las 16h</option>
    <option value="Desde las 16h hasta las 18h">Desde las 16h hasta las 18h</option>
    <option value="Desde las 18h hasta las 20h">Desde las 18h hasta las 20h</option>
    <option value="Desde las 20h hasta las 22h">Desde las 20h hasta las 22h</option>
    <option value="Desde las 22h hasta las 00h">Desde las 22h hasta las 00h</option> 
</select>
<br>
        <label>Posición en la que juega:</label>
        <select name="posicion" required>
        <option value="">Selecciona una opción</option> 
        <option value="extremo derecho ">Extremo Derecho</option> 
        <option value="delantero centro">Delantero Centro</option>
        <option value="extremo Izquierdo">Extremo Izquierdo</option>
        <option value="mediocampista ofensivo">Mediocampista Ofensivo</option>
        <option value="mediocampista defensivo ">Mediocampista Defensivo</option>
        <option value="mediocampista central ">Mediocampista Central </option>
        <option value="defensor izquierdo">Defensor Izquierdo</option>
        <option value="defensor central">Defensor Central </option>
        <option value="defensor derecho">Defensor Derecho </option>
        <option value="arquero">Arquero</option>

</select>
<br>
        <label>Número telefónico:</label>
        <input type="tel" name="telefono" required><br>

        <label>Mejor habilidad:</label>
        <input type="text" name="habilidad" required><br>

        <label>Video Opcional  (duración entre 2 y 5 minutos):</label>
        <input type="file" name="video" accept="video/*" ><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
