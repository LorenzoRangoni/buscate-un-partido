<?php
session_start();
if (isset($_SESSION['team_id'])) {
    $team_id = $_SESSION['team_id'];
    $team = $_SESSION['team'];
} else {
    $team_id = "";
    $team = "";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Formularios</title>
    <link rel="stylesheet" href="styles6.css">
    <nav class="nav container">
        <div class="nav__logo">
            <h2 class="nav__title">Partido</h2>
        </div>
        <div class="nav__links">
            <a href="index.html" class="button">Inicio</a>
            <a href="Pagina_de_registroylogin.html" class="button">Logearse</a>
            <a href="encontrarjugadores.html" class="button">Encontrar jugador</a>
            <a href="registrarse2.html" class="button">Formulario</a>
 
    </div>

    </nav>
    <style>
        body {
            background-color: #3498db;
            color: black; /* Texto en negro */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333; /* Color de fondo del encabezado */
            color: white;
        }

        a {
            color: #FFD700; /* Color dorado para los enlaces */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Estilos para el popup */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        /* Estilos para la superposición de fondo */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Estilos para el filtro */
        .filtro {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilos para el botón de fecha */
        .boton-fecha {
            font-size: 18px;
            padding: 10px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <h1>Historial de Formularios Enviados</h1>

    <!-- Filtro para ordenar por fecha -->
    <div class="filtro">
        <label for="ordenar">Ordenar por:</label>
        <select id="ordenar" onchange="ordenarFormularios()">
            <option value="asc">Más Antiguos</option>
            <option value="desc">Más Recientes</option>
        </select>
    </div>

    <?php
    include("../../Basededatos/conexion_db.php");

    $orden = isset($_GET['orden']) && ($_GET['orden'] === 'asc' || $_GET['orden'] === 'desc') ? $_GET['orden'] : 'desc';
    $sql = "SELECT * FROM formulario_equipo WHERE id_equipo = '$team_id' ORDER BY fecha_registro_formulario $orden";
    $resultado = $mysqli->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Fecha de Envío</th><th>Posición Requerida</th><th>Acciones</th></tr>';

        while ($row = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td><button class="boton-fecha" onclick="mostrarPopup(\'' . $row["fecha_registro_formulario"] . '\', \'' . $row["nombre_equipo"] . '\', \'' . $row["goles"] . '\', \'' . $row["posicion_requerida"] . '\', \'' . $row["capitan"] . '\', \'' . $row["telefono_capitan"] . '\', \'' . $row["mail_capitan"] . '\', \'' . $row["ubicacion"] . '\', \'' . $row["liga"] . '\', \'' . $row["dias_entrenamiento"] . '\', \'' . $row["frecuencia_entrenamiento"] . '\', \'' . $row["hora_entrenamiento"] .'\', \'' . $row["nivel_de_juego"] . '\')">' . $row["fecha_registro_formulario"] . '</button></td>';
            echo '<td>' . $row["posicion_requerida"] . '</td>';
            echo '<td><a href="formularioequipoedicion.php?id=' . $row["id_formulario"] . '">Editar</a> | <a href="eliminarformularioequipo.php?id=' . $row["id_formulario"] . '">Eliminar</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No se encontraron registros en el historial.';
    }
    ?>

    <!-- Popup y superposición de fondo -->
    <div class="overlay" id="overlay" onclick="cerrarPopup()"></div>
    <div class="popup" id="popup"></div>

    <script>
        function mostrarPopup(fecha, nombre, goles, posicion, capitan, telefono, mail, ubicacion, liga, dia, hora, frecuencia, nivel) {
            document.getElementById("overlay").style.display = "block";
            document.getElementById("popup").style.display = "block";
            document.getElementById("popup").innerHTML =
                '<p>Fecha de Envío: ' + fecha + '</p>' +
                '<p>Nombre: ' + nombre + '</p>' +
                '<p>Goles: ' + goles + '</p>' +
                '<p>Posicion faltante: ' + posicion + '</p>' +
                '<p>Capitan: ' + capitan + '</p>' +
                '<p>Teléfono: ' + telefono + '</p>' +
                '<p>Mail: ' + mail + '</p>' +
                '<p>Ubicacion: ' + ubicacion + '</p>' +
                '<p>Liga: ' + liga + '</p>' +
                '<p>Nivel de juego: ' + nivel + '</p>' +
                '<p>Frecuencia de entrnamiento: ' + frecuencia + '</p>' +
                '<p>Dias de entrenamiento: ' + dia + '</p>' +
                '<p>Hora de entrenamiento: ' + hora + '</p>' +
                
                '<button onclick="cerrarPopup()">Cerrar</button>';
        }

        function cerrarPopup() {
            document.getElementById("overlay").style.display = "none";
            document.getElementById("popup").style.display = "none";
        }

        function ordenarFormularios() {
            // Obtener el valor seleccionado del filtro
            var orden = document.getElementById("ordenar").value;
            // Obtener la URL actual y quitar cualquier parámetro de orden existente
            var url = window.location.href.split('?')[0];
            // Redirigir a la URL actual con el nuevo parámetro de orden
            window.location.href = url + '?orden=' + orden;
        }

        // Función para inicializar el valor correcto del filtro
        window.onload = function () {
            var ordenActual = '<?php echo isset($_GET['orden']) ? $_GET['orden'] : 'desc'; ?>';
            document.getElementById('ordenar').value = ordenActual;
        };
    </script>
</body>

</html>