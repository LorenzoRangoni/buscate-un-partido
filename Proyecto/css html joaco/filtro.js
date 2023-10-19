const players = [
    { 
        name: "Lionel Messi", 
        position: "Delantero", 
        age: 34,
        residence: "Barcelona",
        image: "jugadores/messi.png" 
    },
    { 
        name: "Cristiano Ronaldo", 
        position: "Delantero", 
        age: 36,
        residence: "Turín",
        image: "jugadoresimg/ronaldo.png" 
    },
    { 
        name: "Luka Modric", 
        position: "Centrocampista", 
        age: 35,
        residence: "Madrid",
        image: "jugadoresimg/modric.png" 
    },
    { 
        name: "Sergio Ramos", 
        position: "Defensa", 
        age: 35,
        residence: "Madrid",
        image: "jugadoresimg/ramos.png" 
    },
    { 
        name: "Alisson Becker", 
        position: "Portero", 
        age: 29,
        residence: "Liverpool",
        image: "jugadoresig" 
    }
    // Agrega más jugadores aquí si es necesario
];

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
