document.addEventListener("DOMContentLoaded", function() {
    var editEmailButton = document.getElementById("editEmailButton");
    var editModal = document.getElementById("editEmailModal");
    var closeModal = document.getElementById("closeEmailModal");
    var editEmailForm = document.getElementById("editEmailForm");
    var newEmailInput = document.getElementById("newEmail");

    editEmailButton.addEventListener("click", function(event) {
        event.preventDefault();
        openEditModal("Editar Correo Electrónico", "newEmail", "email");
    });
    
    closeModal.addEventListener("click", function() {
        editModal.style.display = "none";
    });

    editEmailForm.addEventListener("submit", function(event) {
        event.preventDefault();
        var newEmail = newEmailInput.value;

        // Realiza una verificación previa del lado del cliente
        // Puedes agregar aquí más validaciones según tus necesidades

        // Envía la solicitud de actualización al servidor solo si la validación del cliente es exitosa
        const formData = new FormData();
        formData.append("newEmail", newEmail);

        fetch("micuentaemail.php", {
            method: "POST",
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then(data => {
            if (data === "success") {
                // Cierra el modal después de procesar la solicitud
                editModal.style.display = "none";
                // Actualiza la interfaz de usuario con el nuevo dato sin recargar la página
                document.getElementById("email").textContent = newEmail;
            } else {
                // Muestra el mensaje de error al usuario
                document.getElementById('mensajealerta').innerHTML='<p style="color: red;"> Correo electronico ya registrado </p>';

            }
        })
        .catch(error => {
            console.error("Error al enviar la solicitud al servidor: " + error);
        });
    });

    function openEditModal(title, inputId, spanId) {
        // Configura el título del modal
        document.getElementById("modalTitle").textContent = title;

        // Configura el campo de entrada
        newEmailInput.name = inputId;

        // Configura el campo de visualización actual
        var currentEmailSpan = document.getElementById(spanId);
        newEmailInput.value = currentEmailSpan.textContent;

        // Muestra el modal
        editModal.style.display = "block";
    }
});
