document.addEventListener("DOMContentLoaded", function() {
    var newDataInput = document.getElementById("newData");
    var editUsernameButton = document.getElementById("editUsernameButton");
    var editEmailButton = document.getElementById("editEmailButton");
    var editPasswordButton = document.getElementById("editPasswordButton");
    var editModal = document.getElementById("editModal");
    var editEmailModal = document.getElementById("editEmailModal");
    var editPasswordModal = document.getElementById("editPasswordModal");
    var closeModals = document.querySelectorAll(".close");

    function openEditUsernameModal() {
        openEditModal("Editar Nombre de Usuario", "newData", "username", editModal);
    }

    function openEditEmailModal() {
        openEditModal("Editar Correo Electrónico", "newEmail", "email", editEmailModal);
    }

    function openEditPasswordModal() {
        openEditModal("Editar Contraseña", "newPassword", "password", editPasswordModal);
    }

    editUsernameButton.addEventListener("click", function(event) {
        event.preventDefault();
        openEditUsernameModal();
    });

    editEmailButton.addEventListener("click", function(event) {
        event.preventDefault();
        openEditEmailModal();
    });

    editPasswordButton.addEventListener("click", function(event) {
        event.preventDefault();
        openEditPasswordModal();
    });

    closeModals.forEach(function(closeModal) {
        closeModal.addEventListener("click", function() {
            editModal.style.display = "none";
            editEmailModal.style.display = "none";
            editPasswordModal.style.display = "none";
        });
    });

    function openEditModal(title, inputId, spanId, modal) {
        document.getElementById("modalTitle").textContent = title;
        newDataInput.name = inputId;
        var currentDataSpan = document.getElementById(spanId);
        newDataInput.value = currentDataSpan.textContent;
        modal.style.display = "block";
    }
});
