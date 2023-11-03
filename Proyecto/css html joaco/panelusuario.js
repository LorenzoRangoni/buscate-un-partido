document.addEventListener("DOMContentLoaded", function() {
    var editUsernameButton = document.getElementById("editUsernameButton");
    var editEmailButton = document.getElementById("editEmailButton");
    var editPasswordButton = document.getElementById("editPasswordButton");
    var editResidenceButton = document.getElementById("editResidenceButton");
    var editLevelButton = document.getElementById("editLevelButton");
    var editPositionButton = document.getElementById("editPositionButton");

    var editModal = document.getElementById("editModal");
    var editEmailModal = document.getElementById("editEmailModal");
    var editPasswordModal = document.getElementById("editPasswordModal");
    var editResidenceModal = document.getElementById("editResidenceModal");
    var editLevelModal = document.getElementById("editLevelModal");
    var editPositionModal = document.getElementById("editPositionModal");

    var closeModal = document.getElementById("closeModal");
    var closeEmailModal = document.getElementById("closeEmailModal");
    var closePasswordModal = document.getElementById("closePasswordModal");
    var closeResidenceModal = document.getElementById("closeResidenceModal");
    var closeLevelModal = document.getElementById("closeLevelModal");
    var closePositionModal = document.getElementById("closePositionModal");

    var newDataInput = document.getElementById("newData");
    var newEmailInput = document.getElementById("newEmail");
    var newPasswordInput = document.getElementById("newPassword");
    var newResidenceInput = document.getElementById("newResidence");
    var newLevelSelect = document.getElementById("newLevel");
    var newPositionSelect = document.getElementById("newPosition");

    editUsernameButton.addEventListener("click", function() {
        editModal.style.display = "block";
        document.getElementById("modalTitle").textContent = "Editar Nombre de Usuario";
    });

    editEmailButton.addEventListener("click", function() {
        editEmailModal.style.display = "block";
        document.getElementById("modalTitle").textContent = "Editar Correo Electrónico";
    });

    editPasswordButton.addEventListener("click", function() {
        editPasswordModal.style.display = "block";
        document.getElementById("modalTitle").textContent = "Editar Contraseña";
    });

    editResidenceButton.addEventListener("click", function() {
        editResidenceModal.style.display = "block";
        document.getElementById("modalTitle").textContent = "Editar Zona de Residencia";
    });

    editLevelButton.addEventListener("click", function() {
        editLevelModal.style.display = "block";
        document.getElementById("modalTitle").textContent = "Editar Nivel de Juego";
    });

    editPositionButton.addEventListener("click", function() {
        editPositionModal.style.display = "block";
        document.getElementById("modalTitle").textContent = "Editar Posición";
    });

    closeModal.addEventListener("click", function() {
        editModal.style.display = "none";
    });

    closeEmailModal.addEventListener("click", function() {
        editEmailModal.style.display = "none";
    });

    closePasswordModal.addEventListener("click", function() {
        editPasswordModal.style.display = "none";
    });

    closeResidenceModal.addEventListener("click", function() {
        editResidenceModal.style.display = "none";
    });

    closeLevelModal.addEventListener("click", function() {
        editLevelModal.style.display = "none";
    });

    closePositionModal.addEventListener("click", function() {
        editPositionModal.style.display = "none";
    });

    document.getElementById("editForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var newData = newDataInput.value;
        // Implementa la lógica para guardar el nuevo dato aquí
        // ...
        editModal.style.display = "none";
    });

    document.getElementById("editEmailForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var newEmail = newEmailInput.value;
        
        editEmailModal.style.display = "none";
    });

    document.getElementById("editPasswordForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var newPassword = newPasswordInput.value;
       
        editPasswordModal.style.display = "none";
    });

    document.getElementById("editResidenceForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var newResidence = newResidenceInput.value;
        
        editResidenceModal.style.display = "none";
    });

    document.getElementById("editLevelForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var newLevel = newLevelSelect.value;
       
        editLevelModal.style.display = "none";
    });

    document.getElementById("editPositionForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var newPosition = newPositionSelect.value;
        
        editPositionModal.style.display = "none";
    });
});
