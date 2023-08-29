<!DOCTYPE html>
<html>
<head>
    <title>Envío Exitoso</title>
    <link rel="stylesheet" type="text/css" href="styles2.css">
</head>
<body>
    <h2>Formulario enviado correctamente</h2>
    
    <p id="message">Gracias por completar el formulario.</p>
    
    <script>
        var color = localStorage.getItem("color_picker");
        if (color) {
            document.getElementById("message").style.color = color;
        }
    </script>
</body>
</html>
