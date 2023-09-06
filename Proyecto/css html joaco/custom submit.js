    function validarFormulario() {
        var errors = [];

        // Realiza tus validaciones aquí

        if (errors.length > 0) {
            var errorContainer = document.getElementById("errorMessages");
            errorContainer.innerHTML = errors.join("<br>");
            errorContainer.style.color = "red";
            return false;
        }

        // Si no hay errores, redirige al usuario a la página de éxito
        window.location.href = "envio_exitoso.html";
        return true;
    }
