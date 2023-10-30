
include("conexion_db.php");
let players = [];
const apiUrl = "../../Basededatos/filro.php";

function loadPlayersFromDatabase() {
   fetch(apiUrl)
       .then((response) => response.json())
       .then((data) => {
           players = data; // Asigna los datos de la base de datos a la variable players
           displayPlayers(players);
       })
       .catch((error) => console.error("Error al cargar jugadores: " + error));
}

// Llama a esta función para cargar jugadores al cargar la página
loadPlayersFromDatabase();

const playerList = document.getElementById("playerList");
const modal = document.getElementById("playerDetailsModal");

function displayPlayers(playersArray) {
    playerList.innerHTML = "";
    playersArray.forEach(player => {
        const listItem = document.createElement("li");
        listItem.textContent = player.name;
        listItem.addEventListener("click", () => {
            displayPlayerDetails(player);
        });
        playerList.appendChild(listItem);
    });
}

function displayPlayerDetails(player) {
    const modalPlayerName = document.getElementById("modalPlayerName");
    const modalPlayerPosition = document.getElementById("modalPlayerPosition");
    const modalPlayerAge = document.getElementById("modalPlayerAge");
    const modalPlayerResidence = document.getElementById("modalPlayerResidence");
    const modalPlayerImage = document.getElementById("modalPlayerImage");

    modalPlayerName.textContent = player.name;
    modalPlayerPosition.textContent = `Posición: ${player.position}`;
    modalPlayerAge.textContent = `Edad: ${player.age}`;
    modalPlayerResidence.textContent = `Zona de Residencia: ${player.residence}`;
    modalPlayerImage.src = player.image;
    modalPlayerImage.alt = player.name;

    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

function applyFilters() {
    const searchTerm = document.getElementById("searchInput").value.toLowerCase();
    const selectedPosition = document.getElementById("positionFilter").value.toLowerCase();
    const minAge = parseInt(document.getElementById("ageFilter").value) || 0;
    const residenceFilter = document.getElementById("residenceFilter").value.toLowerCase();

    const filteredPlayers = players.filter(player => 
        player.name.toLowerCase().includes(searchTerm) &&
        (selectedPosition === "" || player.position.toLowerCase() === selectedPosition) &&
        player.age >= minAge &&
        (residenceFilter === "" || player.residence.toLowerCase().includes(residenceFilter))
    );

    displayPlayers(filteredPlayers);
}

window.addEventListener("load", () => {
    displayPlayers(players);
});
