<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formation = $_POST['formation'];
    $playerNames = $_POST['players'];

    // Aquí puedes guardar la formación y los nombres de los jugadores en la base de datos o realizar cualquier otra acción necesaria

    // Por ahora, solo muestra los datos como respuesta
    echo 'Formación: ' . $formation . '<br>';
    echo 'Nombres de jugadores:<br>';
    foreach ($playerNames as $index => $name) {
        echo 'Jugador ' . ($index + 1) . ': ' . $name . '<br>';
    }
} else {
    echo 'Error: Método no admitido';
}
?>
