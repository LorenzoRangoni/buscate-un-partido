<!DOCTYPE html>
<html>
<head>
    <title>Envío Exitoso</title>
    <link rel="stylesheet" type="text/css" href="styles2.css">
</head>
<body>
    <h2>Formulario enviado correctamente</h2>
    
 
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["color_picker"])) {
            $color = $_POST["color_picker"];
        }
    ?>
    <p style="color: <?php echo $color; ?>">Gracias por completar el formulario.</p>
 
</body>
</html>
