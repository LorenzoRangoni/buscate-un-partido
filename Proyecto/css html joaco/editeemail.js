document.addEventListener("DOMContentLoaded", function() {
    var editUsernameButton = document.getElementById("editUsernameButton");
    var editEmailButton = document.getElementById("editEmailButton");
    var editPasswordButton = document.getElementById("editPasswordButton");

    
    var closeModal = document.getElementById("closeModal");

    editUsernameButton.addEventListener("click", function(event) {
        event.preventDefault();
        openEditModal("Editar Nombre de Usuario", "newData", "username");
    });

    editEmailButton.addEventListener("click", function(event) {
        event.preventDefault();
        openEditModal("Editar Correo Electrónico", "newEmail", "email");
    });

    editPasswordButton.addEventListener("click", function(event) {
        event.preventDefault();
        openEditModal("Editar Contraseña", "newPassword", "password");
    });

    closeModal.addEventListener("click", function() {
        editModal.style.display = "none";
    });

    function openEditModal(title, inputId, spanId) {
        // Configura el título del modal
        console.log("Abriendo modal:", title, inputId, spanId);
        document.getElementById("modalTitle").textContent = title;

        // Configura el campo de entrada
        var newDataInput = document.getElementById("newData");
        newDataInput.name = inputId;  // Cambia el nombre del campo según la operación

        // Configura el campo de visualización actual
        var currentDataSpan = document.getElementById(spanId);
        newDataInput.value = currentDataSpan.textContent;

        // Muestra el modal
        document.getElementById("editEmailModal").style.display = "block";
    }

    var editForm = document.getElementById("editForm");
    var newDataInput = document.getElementById("newData");
    

    editForm.addEventListener("submit", function(event) {
        event.preventDefault();
        var newData = newDataInput.value;

        // Envía la solicitud de actualización al servidor
        const formData = new FormData();
        formData.append("newData", newData);

        fetch("micuentaemail.php", {
            method: "POST",
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            // No necesitas verificar la respuesta aquí, ya que no imprimes "success" desde el servidor
            return response.text();
        })
        .catch(error => {
            console.error("Error al enviar la solicitud al servidor: " + error);
        })
        .finally(() => {
            // Cierra el modal después de procesar la solicitud
            document.getElementById("editEmailModal").style.display = "none";
            // Actualiza la interfaz de usuario con el nuevo dato sin recargar la página
            document.getElementById("username").textContent = newData;
        });
    });
});
