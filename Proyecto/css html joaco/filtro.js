

let players = [];
const apiUrl = "../../Basededatos/filtro.php";

function loadPlayersFromDatabase() {
   fetch(apiUrl)
       .then((response) => response.json())
       .then((data) => {
           console.log(data)
           players = data; 
           console.log(players);
           displayPlayers(players);
       })
       //.then(response => response.json())
       //.then(response => console.log(JSON.stringify(response)))
       .catch((error) => console.error("Error al cargar jugadores: " + error));
}


loadPlayersFromDatabase();

const playerList = document.getElementById("playerList");
const modal = document.getElementById("playerDetailsModal");

function displayPlayers(playersArray) {
    playerList.innerHTML = "";
    playersArray.forEach(player => {
        const listItem = document.createElement("li");
        console.log(player.nombre);
        listItem.textContent = player.nombre;
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

    modalPlayerName.textContent = player.nombre;
    modalPlayerPosition.textContent = ` ${player.posicion_jugador}`;
    modalPlayerAge.textContent = ` ${player.edad}`;
    modalPlayerResidence.textContent = `Zona de Residencia: ${player.habilidad}`;
    //modalPlayerImage.src = player.image;
    modalPlayerImage.alt = player.nombre;

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
        player.nombre.toLowerCase().includes(searchTerm) &&
        (selectedPosition === "" || player.posicion_jugador.toLowerCase() === selectedPosition) &&
        player.edad >= minAge &&
        (residenceFilter === "" || player.habilidad.toLowerCase().includes(residenceFilter))
    );

    displayPlayers(filteredPlayers);
}

window.addEventListener("load", () => {
    displayPlayers(players);
});
