<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Equipo</title>
</head>
<body>

<h1>Formulario de Equipo</h1>

<form action="DB_registroformequipo_edicion.php" method="post">
  <label for="nombreEquipo">Nombre del Equipo:</label>
  <input type="text" id="nombreEquipo" name="nombreEquipo" required><br>

  <label for="golesTemporada">Goles en la Temporada:</label>
  <input type="number" id="golesTemporada" name="golesTemporada" required><br>

  <label for="posicionFaltante">Posición Faltante:</label>
  <select id="posicionFaltante" name="posicionFaltante" multiple>
    <option value="portero">Portero</option>
    <option value="defensa">Defensa</option>
    <option value="centrocampista">Centrocampista</option>
    <option value="delantero">Delantero</option>
  </select><br>

  <label for="capitan">Capitán:</label>
  <input type="text" id="capitan" name="capitan" required><br>

  <label for="telefonoCapitan">Teléfono del Equipo/Capitán:</label>
  <input type="tel" id="telefonoCapitan" name="telefonoCapitan" required><br>

  <label for="mailCapitan">Mail del Capitán:</label>
  <input type="email" id="mailCapitan" name="mailCapitan" required><br>

  <label for="ubicacion">Ubicación:</label>
  <input type="text" id="ubicacion" name="ubicacion" required><br>

  <label for="frecuenciaEntrenamiento">Frecuencia de Entrenamiento:</label>
  <select id="frecuenciaEntrenamiento" name="frecuenciaEntrenamiento" required><br>
  <option value="1">1 día</option>
  <option value="2">2 días</option>
  <option value="3">3 días</option>
  <option value="4">4 días</option>
  <option value="5">5 días</option>
  <option value="6">6 días</option>
  <option value="7">7 días</option>
</select><br>

  <label for="liga">Liga:</label>
  <input type="text" id="liga" name="liga" required><br>

  <label for="diasEntrenamiento">Días de Entrenamiento:</label>
  <input type="text" id="diasEntrenamiento" name="diasEntrenamiento" required><br>

  <label for="horaEntrenamiento">Hora de Entrenamiento:</label>
  <input type="time" id="horaEntrenamiento" name="horaEntrenamiento" required><br>

  <label for="nivelDejuego">Nivel de juego:</label>
  <select id="nivelDejuego" name="nivelDejuego" required><br>
    <option value="Bajo">Bajo</option>
    <option value="Medio"> Medio </option>
    <option value="Alto"> Alto</option>
  </select><br>

  <input type="submit" value="Confirmar cambios">
</form>

</body>
</html>
