<?php 
session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
   $username = $_SESSION['username'];
} else {
    $user_id = "";
    $username = "";
}


 if ($username <> "") 
    { header ("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/registrarse2.html");
                } else { 
                    header ("Location: http://localhost/buscate_un_partido/buscate-un-partido/Proyecto/css%20html%20joaco/logeoprincipal.html");
                 }  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="registrarse2.css">
  <title>Formulario Registro</title>
  <script type="text/javascript">
    
    function validarFormulario() {
        var errors = [];


        // Validación del campo Nombre
        var nombre = document.getElementById("nombre").value;
        if (nombre.length < 10) {
            errors.push("El nombre debe ser mayor a 10 letras .");
        }

        // Validación del campo Altura
        var altura = parseFloat(document.getElementById("altura").value);
        if (isNaN(altura) || altura < 1.5) {
            errors.push("La altura no puede ser menor a 1.5 m ni negativa.");
        }

        // Validación del campo Peso
        var peso = parseFloat(document.getElementById("peso").value);
        if (isNaN(peso) || peso < 0) {
            errors.push("El peso no puede ser negativo.");
        }

        // Validación del campo Edad
        var edad = parseInt(document.getElementById("edad").value);
        if (isNaN(edad) || edad < 13) {
            errors.push("Debes ser mayor de 13 años.");
        }
        // Validacion del campo de Sub
        var sub = document.getElementById("sub").value;
        var subAge = parseInt(sub.split(" ")[1]);
        if (edad > subAge) {
            errors.push("La opción Sub seleccionada no coincide con la edad");
        }

        // Validación del campo Teléfono
        var telefono = document.getElementById("telefono").value;
        if (telefono.length < 10) {
            errors.push("El número de teléfono debe tener al menos 10 dígitos.");
        }

        // Validación del campo Mejor Habilidad
        var mejorHabilidad = document.getElementById("habilidad").value;
        if (mejorHabilidad.trim() === "") {
            errors.push("El campo Mejor Habilidad es obligatorio.");
        }

        if (errors.length > 0) {
            var errorContainer = document.getElementById("errorMessages");
            errorContainer.innerHTML = errors.join("<br>");
            errorContainer.style.color = "red";
            return false;
        }

        return true;
    }
    fetch("envio_exitoso", {
method: "POST",
headers: {
    "Content-Type": "application/json"
},
body: JSON.stringify(formData)
})
.then(response => {
if (response.ok) {
    window.location.href = "envio_exitoso.html"; // Redirección aquí
} else {
    console.error("Error en la solicitud HTTP");
}
})
.catch(error => {
console.error("Error en la solicitud HTTP:", error);
});
</script>
</head>
<body>
  <form class="form-register" action="../../Basededatos/DB_registroformjugador.php" method="POST">
    <h4>Formulario Registro</h4>
    
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre">
    </div>

    <div class="form-group">
      <label for="apellido">Apellido:</label>
      <input class="controls" type="text" name="apellido" id="apellido" placeholder="Ingrese su Apellido">
    </div>

    <div class="form-group">
      <label for="altura">h:</label>
      <input class="controls" type="number" name="altura" id="altura" placeholder="Altura">
    </div>
    
    <div class="form-group">
      <label for="peso">Peso:</label>
      <input class="controls" type="number" name="peso" id="peso" placeholder="Peso">
    </div>
    
    <div class="form-group">
      <label for="edad">Edad:</label>
      <input class="controls" type="number" name="edad" id="edad" placeholder="Edad">
    </div>
    
    <div class="form-group">
      <label for="correo">Correo:</label>
      <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
    </div>
    
    <div class="form-group">
      <label for="telefono">Número telefónico:</label>
      <input class="controls" type="number" name="telefono" id="telefono" placeholder="Número telefónico">
    </div>
    
    <div class="form-group">
      <label for="zona">Zona residencial:</label>
      <input class="controls" type="text" name="zona" id="zona" placeholder="Zona residenacial">
    </div>

    <div class="form-group">
      <label for="habilidad">Mejor habilidad:</label>
      <input class="controls" type="text" name="habilidad" id="habilidad" placeholder="Mejor habilidad">
    </div>
    
    <div class="form-group">
      <label for="disponibilidad">Disponibilidad horaria:</label>
      <select class="controls" name="disponibilidad" id="disponibilidad" required>
        <option value="">Selecciona una opción</option>
        <!-- Opciones de disponibilidad horaria aquí -->
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
    </div>
    
    <div class="form-group">
      <label for="posicion">Posición:</label>
      <select class="controls" name="posicion" id="posicion" required>
        <option value="">Selecciona una opción</option>
        <!-- Opciones de posición aquí -->
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
    </div>
    
    <div class="form-group">
      <label for="sub">Sub:</label>
      <select class="controls" name="sub" id="sub" required>
        <option value="">Selecciona una opción</option>
        <!-- Opciones de Sub aquí -->
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
    </div>
    <input type="hidden" name="identificador_formulario" value="<?php echo uniqid(); ?>">
    <input class="botons" type="submit" value="Registrar">
    
    <p><a href="logeoprincipal.html">¿Ya tengo Cuenta?</a></p>
  </form>
</body>
</html>
