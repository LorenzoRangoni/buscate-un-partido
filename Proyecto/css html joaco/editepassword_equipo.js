document.addEventListener("DOMContentLoaded", function () {
    var editPasswordButton = document.getElementById("editPasswordButton");
    var editPasswordModal = document.getElementById("editPasswordModal");
    var closePasswordModal = document.getElementById("closePasswordModal");
    var editPasswordForm = document.getElementById("editPasswordForm");
    var currentPasswordInput = document.getElementById("currentPassword");
    var newPasswordInput = document.getElementById("newPassword");


editPasswordButton.addEventListener("click", function (event) {
    event.preventDefault();
    openEditPasswordModal("Editar Contraseña", "newPassword", "password");
});

closePasswordModal.addEventListener("click", function () {
    editPasswordModal.style.display = "none";
});

editPasswordForm.addEventListener("submit", function (event) {
    event.preventDefault();
    var currentPassword = currentPasswordInput.value;
    var newPassword = newPasswordInput.value;

    if (newPassword.length < 6 ) {
        document.getElementById('mensajealerta').innerHTML = '<p style="color: red;">La contraseña debe tener mas de 6 caracteres</p>'; 
    } else {    

    // Realiza una verificación previa del lado del cliente
    // Puedes agregar aquí más validaciones según tus necesidades

    // Envía la solicitud de actualización al servidor solo si la validación del cliente es exitosa
    const formData = new FormData();
    formData.append("currentPassword", currentPassword);
    formData.append("newPassword", newPassword);

    fetch("micuentapassword_equipo.php", {
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
            editPasswordModal.style.display = "none";
            // Puedes agregar más acciones después de cambiar la contraseña si es necesario
        } else {
            // Muestra el mensaje de error al usuario
            document.getElementById('mensajealerta').innerHTML = '<p style="color: red;">La contraseña actual es incorrecta</p>';
        }
    })
    .catch(error => {
        console.error("Error al enviar la solicitud al servidor: " + error);
    });
  }
});

function openEditPasswordModal(title, inputId, spanId) {

    document.getElementById("currentPassword").value = "";
    document.getElementById("newPassword").value = "";
    document.getElementById('mensajealerta').innerHTML = "";

    // Configura el título del modal
    document.getElementById("modalTitle").textContent = title;

    // Configura los campos de entrada
    currentPasswordInput.name = "currentPassword";
    newPasswordInput.name = inputId;

    // Muestra el modal
    editPasswordModal.style.display = "block";
}
});