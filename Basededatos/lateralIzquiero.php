<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partido</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #3498db;
            margin: 0;
        }

        .nav {
            background-color: #3498db;
            color: white;
            padding: 10px;
            text-align: right;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav__logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav__links {
            display: flex;
            gap: 20px;
        }

        .button {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border: 2px solid white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: white;
            color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0 50px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .search-form {
            margin: 20px 0;
            display: flex;
            flex-wrap: wrap;
        }

        .search-form label {
            margin-right: 10px;
        }

        .no-players-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #ec7063;
            color: white;
            border-radius: 8px;
            text-align: center;
        }

        .reset-button {
            background-color: #ec7063;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            margin-left: 10px;
            cursor: pointer;
        }

        .reset-button:hover {
            background-color: white;
            color: #ec7063;
        }

        .search-button {
            color: black;
        }
    </style>
</head>

<body>
    <!-- Texto Partido -->
    

    <!-- Header -->
    <nav class='nav'>
        <div class='container'>
            <div class='nav__logo'>
                <h2 class='nav__title'>Partido</h2>
            </div>
            <div class='nav__links'>
                <a href='index.php' class='button'>Inicio</a>
                <a href='Pagina_de_registroylogin.html' class='button'>Logearse</a>
                <a href='encontrarjugadores.html' class='button'>Encontrar jugador</a>
                <a href='registrarse2.html' class='button'>Formulario</a>
            </div>
        </div>
    </nav>

    <!-- Formulario de búsqueda por disponibilidad horaria -->
    <form class='search-form' method='post' style="text-align: left; margin: 20px;">
        <label for='horario'>Buscar por hora:</label>
        <input type='text' name='horario' id='horario' placeholder='Ingrese el horario'>
        <input type='submit' name='buscar_horario' value='Buscar' class='button search-button'>
        <button type='submit' name='reset_horario' class='reset-button'>Resetear Horario</button>
    </form>

    <!-- Formulario de búsqueda por zona -->
    <form class='search-form' method='post' style="text-align: left; margin: 20px;">
        <label for='zona'>Buscar por zona:</label>
        <input type='text' name='zona' id='zona' placeholder='Ingrese la zona'>
        <input type='submit' name='buscar_zona' value='Buscar' class='button search-button'>
        <button type='submit' name='reset_zona' class='reset-button'>Resetear Zona</button>
    </form>

<?php 
include("conexion_db.php");

$sql = "SELECT nombre, apellido, altura, numero_de_telefono_jugador, mail_del_jugador, peso, edad, habilidad, disponibilidad_horaria_jugador, sub, zona_residencial FROM formulario_jugadores WHERE posicion_jugador = 'Defensor Izquierdo'";
$result = $conn->query($sql);

if (isset($_POST['buscar_horario'])) {
    $horario = $_POST['horario'];
    $sql = "SELECT nombre, apellido, altura, numero_de_telefono_jugador, mail_del_jugador, peso, edad, habilidad, disponibilidad_horaria_jugador, sub, zona_residencial FROM formulario_jugadores WHERE posicion_jugador = 'Defensor Izquierdo' AND disponibilidad_horaria_jugador LIKE '%$horario%'";
    $result = $conn->query($sql);
}

// Manejo del formulario de búsqueda por zona
if (isset($_POST['buscar_zona'])) {
    $zona = $_POST['zona'];
    $sql = "SELECT nombre, apellido, altura, numero_de_telefono_jugador, mail_del_jugador, peso, edad, habilidad, disponibilidad_horaria_jugador, sub, zona_residencial FROM formulario_jugadores WHERE posicion_jugador = 'Defensor izquierdo' AND zona_residencial LIKE '%$zona%'";
    $result = $conn->query($sql);
}

// Si no se ha realizado ninguna búsqueda, mostrar todos los jugadores
if (!isset($_POST['buscar_horario']) && !isset($_POST['buscar_zona'])) {
    $sql = "SELECT nombre, apellido, altura, numero_de_telefono_jugador, mail_del_jugador, peso, edad, habilidad, disponibilidad_horaria_jugador, sub, zona_residencial FROM formulario_jugadores WHERE posicion_jugador = 'Defensor izquierdo'";
    $result = $conn->query($sql);
}

if ($result->num_rows > 0) {
    // Mostrar los jugadores encontrados
    echo "<table>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Disponibilidad Horaria</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Edad</th>
        <th>Sub</th>
        <th>Altura</th>
        <th>Peso</th>
        <th>Habilidad</th>
        <th>Zona</th>
        
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["nombre"] . "</td>
            <td>" . $row["apellido"] . "</td>
            <td>" . $row["disponibilidad_horaria_jugador"] . "</td>
            <td>" . $row["mail_del_jugador"] . "</td>
            <td>" . $row["numero_de_telefono_jugador"] . "</td>
            <td>" . $row["edad"] . "</td>
            <td>" . $row["sub"] . "</td>
            <td>" . $row["altura"] . "</td>
            <td>" . $row["peso"] . "</td>
            <td>" . $row["habilidad"] . "</td>
            <td>" . $row["zona_residencial"] . "</td>
 
        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron jugadores de Lateral Izquierdo.";
}



?>