<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mi Equipo</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
</head>
<body>
    <div id="formation-section">
        <label for="formation">Selecciona la formación:</label>
        <select id="formation">
            <option value="4-4-2">4-4-2</option>
            <option value="4-3-3">4-3-3</option>
        </select>

        <div id="team-formation">
            <!-- Área para mostrar la formación y jugadores -->
        </div>

        <div id="players-list">
            <!-- Área para que los usuarios ingresen nombres de jugadores -->
            <ul>
                <?php for ($i = 1; $i <= 11; $i++) { ?>
                    <li><input type="text" class="player-name" placeholder="Jugador <?php echo $i; ?>"></li>
                <?php } ?>
            </ul>
        </div>

        <button id="save-team">Guardar Equipo</button>
    </div>

    <script src="jquery.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

