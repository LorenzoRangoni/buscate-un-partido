<?php
$error = array();
$submit_success = false; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["nombre"])) {
        if (strlen($_POST["nombre"]) < 10) {
            array_push($error, "El nombre tiene que ser mayor a 10 caracteres");
        }
    }

    if (isset($_POST["altura"]) && $_POST["altura"] < 1.5) {
        array_push($error, "La altura no puede ser menor a 1,5 m ni negativa ");
    }

    if (isset($_POST["peso"]) && $_POST["peso"] < 0) {
        array_push($error, "El peso no puede ser negativo");
    }

    if (isset($_POST["edad"]) && $_POST["edad"] < 13) {
        array_push($error, "Tenes que ser mayor a 13 años");
    }
    if (isset($_POST["telefono"])&& $_POST["telefono"]< 10 ){
        array_push($error,"El numero de telefono tiene que ser mayor a 10");
    }
        if (isset($_POST["sub"])) {
            $sub = $_POST["sub"];
            $edad = $_POST["edad"];
        
            if (($sub == "sub 15" && $edad > 15) ||
                ($sub == "sub 17" && $edad > 17) ||
                ($sub == "sub 19" && $edad > 19) ||
                ($sub == "sub 21" && $edad > 21) ||
                ($sub == "sub 23" && $edad > 23) ||
                ($sub == "sub 25" && $edad > 25) ||
                ($sub == "sub 27" && $edad > 27) ||
                ($sub == "sub 29" && $edad > 29) ||
                ($sub == "sub 31" && $edad > 31) ||
                ($sub == "sub 33" && $edad > 33) ||
                ($sub == "sub 35" && $edad > 35)) {
                array_push($error, "La opción sub seleccionada no coincide con la edad");
            }
        }
        
    
    if (empty($error)) {
        $submit_success = true; 
    }
if ($submit_success) {
    header("Location: envio_exitoso.php");
    exit;
}
}   
?>     

<!DOCTYPE html>
<html>
<head>
    
    <title>Formulario de Postulación</title>
  <link rel="stylesheet" type="text/css" href="styles.css"> 
   
</head>
<body>
    <h2>Formulario de Postulación para jugar fútbol</h2>

    <?php if (!empty($error)) : ?>
        <div style="color: red;">
            <?php foreach ($error as $errorMessage) : ?>
                <?php echo $errorMessage; ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if (!$submit_success) : ?>
    <form action="./" method="POST" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        
        <label>Altura (m):</label>
        <input type="text" name="altura" required><br>


        <label>Peso (kg):</label>
        <input type="number" name="peso" required><br>

        <label>Edad:</label>
        <input type="number" name="edad" required><br>
        
        
        <label>Sub el la que jugas :</label>
<select name="sub" required>
    <option value="">Selecciona una opción</option>
    <option value="sub 15">Sub 15</option>
    <option value="sub 17">Sub 17</option>
    <option value="sub 19">Sub 19</option>
    <option value="sub 21">Sub 21</option>
    <option value="sub 23">Sub 23</option>
    <option value="sub 25">Sub 25</option>
    <option value="sub 27">Sub 27</option>
    <option value="sub 29">Sub 29</option>
    <option value="sub 31">Sub 31</option>
    <option value="sub 33">Sub 33</option>
    <option value="sub 35">Sub 35</option>
</select>
<br>

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

       
        <input type="submit" value="Enviar">
    </form>
    <?php else : ?>
        <p>¡Ya estas en la lista de busqueda ahora espera que te escriban , te notificaremos cuando te escriban!</p>
       
    <?php endif; ?>
</body>
</html>