function validarFormulario() {
    var errors = [];



    if (errors.length > 0) {
        var errorContainer = document.getElementById("errorMessages");
        errorContainer.innerHTML = errors.join("<br>");
        errorContainer.style.color = "red";
        return false;
    }

    window.location.href = "envio_exitoso.html";
    return true;
}
