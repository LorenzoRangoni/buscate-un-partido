document.addEventListener("DOMContentLoaded", function() {
    var editUsernameButton = document.getElementById("editUsernameButton");
    var editModal = document.getElementById("editModal");
    var closeModal = document.getElementById("closeModal");
    var editForm = document.getElementById("editForm");
    var newDataInput = document.getElementById("newData");

    editUsernameButton.addEventListener("click", function(event) {
        event.preventDefault();
        openEditModal("Editar Nombre de Usuario", "newData", "username");
    });

    closeModal.addEventListener("click", function() {
        editModal.style.display = "none";
    });

    editForm.addEventListener("submit", function(event) {
        event.preventDefault();
        var newData = newDataInput.value;

        // Envía la solicitud de actualización al servidor
        const formData = new FormData();
        formData.append("newData", newData);

        fetch("micuenta.php", {
            method: "POST",
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .catch(error => {
            console.error("Error al enviar la solicitud al servidor: " + error);
        })
        .finally(() => {
            // Cierra el modal después de procesar la solicitud
            editModal.style.display = "none";
            // Actualiza la interfaz de usuario con el nuevo dato sin recargar la página
            document.getElementById("username").textContent = newData;
        });
    });

    function openEditModal(title, inputId, spanId) {
        // Configura el título del modal
        document.getElementById("modalTitle").textContent = title;

        // Configura el campo de entrada
        newDataInput.name = inputId;

        // Configura el campo de visualización actual
        var currentDataSpan = document.getElementById(spanId);
        newDataInput.value = currentDataSpan.textContent;

        // Muestra el modal
        editModal.style.display = "block";
    }
});
