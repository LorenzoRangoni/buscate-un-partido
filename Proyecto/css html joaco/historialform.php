<?php
session_start();
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
    <link rel="stylesheet" href="styles6.css">
    <nav class="nav container">
        <div class="nav__logo">
            <h2 class="nav__title">Partido</h2>
        </div>
        <div class="nav__links">
            <a href="index.php" class="button">Inicio</a>
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
    $sql = "SELECT * FROM formulario_jugadores WHERE id_jugador = '$user_id' ORDER BY fecha_registro_formulario_jugador $orden";
    $resultado = $mysqli->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Fecha de Envío</th><th>Posición</th><th>Acciones</th></tr>';

        while ($row = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td><button class="boton-fecha" onclick="mostrarPopup(\'' . $row["fecha_registro_formulario_jugador"] . '\', \'' . $row["posicion_jugador"] . '\', \'' . $row["nombre"] . '\', \'' . $row["altura"] . '\', \'' . $row["peso"] . '\', \'' . $row["numero_de_telefono_jugador"] . '\', \'' . $row["disponibilidad_horaria_jugador"] . '\', \'' . $row["mail_del_jugador"] . '\', \'' . $row["edad"] . '\', \'' . $row["sub"] . '\', \'' . $row["habilidad"] . '\', \'' . $row["zona_residencial"] . '\')">' . $row["fecha_registro_formulario_jugador"] . '</button></td>';
            echo '<td>' . $row["posicion_jugador"] . '</td>';
            echo '<td><a href="eliminarformulario.php?id=' . $row["id_formulario"] . '">Eliminar</a></td>';
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
        function mostrarPopup(fecha, posicion, nombre, altura, peso, telefono, disponibilidad, correo, edad, sub, habilidad, zona) {
            document.getElementById("overlay").style.display = "block";
            document.getElementById("popup").style.display = "block";
            document.getElementById("popup").innerHTML =
                '<p>Fecha de Envío: ' + fecha + '</p>' +
                '<p>Posición: ' + posicion + '</p>' +
                '<p>Nombre: ' + nombre + '</p>' +
                '<p>Altura: ' + altura + '</p>' +
                '<p>Peso: ' + peso + '</p>' +
                '<p>Teléfono: ' + telefono + '</p>' +
                '<p>Disponibilidad horaria: ' + disponibilidad + '</p>' +
                '<p>Correo: ' + correo + '</p>' +
                '<p>Edad: ' + edad + '</p>' +
                '<p>Sub: ' + sub + '</p>' +
                '<p>Habilidad: ' + habilidad + '</p>' +
                '<p>Zona Residencial: ' + zona + '</p>' +
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