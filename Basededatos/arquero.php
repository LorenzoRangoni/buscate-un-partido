
<?php 
include ("conexion_db.php");

$sql = "SELECT nombre, apellido, altura, numero_de_telefono_jugador, mail_del_jugador, peso, edad, habilidad, disponibilidad_horaria_jugador, sub, zona_residencial FROM formulario_jugadores WHERE posicion_jugador = 'arquero'";
$result = $conn->query($sql);

if (isset($_POST['buscar_horario'])) {
    $horario = $_POST['horario'];
    $sql = "SELECT nombre, apellido, altura, numero_de_telefono_jugador, mail_del_jugador, peso, edad, habilidad, disponibilidad_horaria_jugador, sub, zona_residencial FROM formulario_jugadores WHERE posicion_jugador = 'arquero' AND disponibilidad_horaria_jugador LIKE '%$horario%'";
    $result = $conn->query($sql);
}

// Manejo del formulario de búsqueda por zona
if (isset($_POST['buscar_zona'])) {
    $zona = $_POST['zona'];
    $sql = "SELECT nombre, apellido, altura, numero_de_telefono_jugador, mail_del_jugador, peso, edad, habilidad, disponibilidad_horaria_jugador, sub, zona_residencial FROM formulario_jugadores WHERE posicion_jugador = 'arquero' AND zona_residencial LIKE '%$zona%'";
    $result = $conn->query($sql);
}

// Si no se ha realizado ninguna búsqueda, mostrar todos los jugadores
if (!isset($_POST['buscar_horario']) && !isset($_POST['buscar_zona'])) {
    $sql = "SELECT nombre, apellido, altura, numero_de_telefono_jugador, mail_del_jugador, peso, edad, habilidad, disponibilidad_horaria_jugador, sub, zona_residencial FROM formulario_jugadores WHERE posicion_jugador = 'arquero";
    $result = $conn->query($sql);
}

if ($result->num_rows > 0) {
    // Mostrar los jugadores encontrados
    $salida= "<table>
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
        $salida.= "<tr>
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
    $salida.="</table>";
    echo $salida;
} else {
    echo "No se encontraron jugadores de Arquero.";
}



?>