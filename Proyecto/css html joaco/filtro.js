const players = [
    { 
        name: "Lionel Messi", 
        position: "Delantero", 
        age: 34,
        skill: "Regateo, Hacer caños, Gambetear, Penales",
        skillLevel: "Experto",
        phone: "123-456-7890",
        residence: "Barcelona",
        image: "jugadores/messi.png" 
    },
    { 
        name: "Cristiano Ronaldo", 
        position: "Delantero", 
        age: 36,
        skill: "Regateo, Hacer caños, Penales, Remate",
        skillLevel: "Experto",
        phone: "234-567-8901",
        residence: "Turín",
        image: "jugadoresimg/ronaldo.png" 
    },
    { 
        name: "Luka Modric", 
        position: "Centrocampista", 
        age: 35,
        skill: "Pases precisos, Recuperación de balón, Tiros de larga distancia",
        skillLevel: "Avanzado",
        phone: "345-678-9012",
        residence: "Madrid",
        image: "jugadoresimg/modric.png" 
    },
    { 
        name: "Sergio Ramos", 
        position: "Defensa", 
        age: 35,
        skill: "Defensa sólida, Juego aéreo, Liderazgo",
        skillLevel: "Avanzado",
        phone: "456-789-0123",
        residence: "Madrid",
        image: "jugadoresimg/ramos.png" 
    },
    { 
        name: "Alisson Becker", 
        position: "Portero", 
        age: 29,
        skill: "Paradas espectaculares, Juego de pies, Salidas rápidas",
        skillLevel: "Experto",
        phone: "567-890-1234",
        residence: "Liverpool",
        image: "jugadoresimg/alisson.png" 
    },
    { 
        name: "Neymar Jr.", 
        position: "Delantero", 
        age: 29,
        skill: "Dribbling, Regates, Tiros precisos",
        skillLevel: "Experto",
        phone: "678-901-2345",
        residence: "París",
        image: "jugadoresimg/neymar.png" 
    },
    { 
        name: "Kevin De Bruyne", 
        position: "Centrocampista", 
        age: 30,
        skill: "Pases creativos, Toma de decisiones, Tiros libres",
        skillLevel: "Avanzado",
        phone: "789-012-3456",
        residence: "Manchester",
        image: "jugadoresimg/debruyne.png" 
    },
    { 
        name: "Virgil van Dijk", 
        position: "Defensa", 
        age: 30,
        skill: "Marcaje fuerte, Juego aéreo, Recuperación de balón",
        skillLevel: "Avanzado",
        phone: "890-123-4567",
        residence: "Liverpool",
        image: "jugadoresimg/vandijk.png" 
    },
    { 
        name: "Jan Oblak", 
        position: "Portero", 
        age: 28,
        skill: "Paradas espectaculares, Salidas rápidas, Liderazgo defensivo",
        skillLevel: "Experto",
        phone: "901-234-5678",
        residence: "Madrid",
        image: "jugadoresimg/oblak.png" 
    },
    { 
        name: "Mohamed Salah", 
        position: "Delantero", 
        age: 29,
        skill: "Velocidad, Regates, Tiros precisos",
        skillLevel: "Experto",
        phone: "012-345-6789",
        residence: "Liverpool",
        image: "jugadoresimg/salah.png" 
    },
    { 
        name: "Bruno Fernandes", 
        position: "Centrocampista", 
        age: 27,
        skill: "Pases precisos, Tiros de larga distancia, Juego de posición",
        skillLevel: "Avanzado",
        phone: "123-456-7890",
        residence: "Manchester",
        image: "jugadoresimg/bruno.png" 
    },
    { 
        name: "Ruben Dias", 
        position: "Defensa", 
        age: 25,
        skill: "Defensa sólida, Marcaje, Juego aéreo",
        skillLevel: "Avanzado",
        phone: "234-567-8901",
        residence: "Manchester",
        image: "jugadoresimg/rubendias.png" 
    },
    { 
        name: "Ederson Moraes", 
        position: "Portero", 
        age: 28,
        skill: "Juego de pies, Salidas rápidas, Paradas espectaculares",
        skillLevel: "Experto",
        phone: "345-678-9012",
        residence: "Manchester",
        image: "jugadoresimg/ederson.png" 
    },
    { 
        name: "Karim Benzema", 
        position: "Delantero", 
        age: 33,
        skill: "Remates precisos, Juego de espaldas, Pases decisivos",
        skillLevel: "Experto",
        phone: "456-789-0123",
        residence: "Madrid",
        image: "jugadoresimg/benzema.png" 
    },
    { 
        name: "Jordan Henderson", 
        position: "Centrocampista", 
        age: 31,
        skill: "Recuperación de balón, Pases cortos, Liderazgo",
        skillLevel: "Avanzado",
        phone: "567-890-1234",
        residence: "Liverpool",
        image: "jugadoresimg/henderson.png" 
    }
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
    const modalPlayerSkill = document.getElementById("modalPlayerSkill");
    const modalPlayerLevel = document.getElementById("modalPlayerSkillLevel");
    const modalPlayerPhone = document.getElementById("modalPlayerPhone");
    const modalPlayerResidence = document.getElementById("modalPlayerResidence");
    const modalPlayerImage = document.getElementById("modalPlayerImage");

    modalPlayerName.textContent = player.name;
    modalPlayerPosition.textContent = `: ${player.position}`;
    modalPlayerAge.textContent = `Edad: ${player.age} `;
    modalPlayerSkill.textContent = `: ${player.skill}`;
    modalPlayerLevel.textContent = `: ${player.skillLevel}`;
    modalPlayerPhone.textContent = `: ${player.phone}`;
    modalPlayerResidence.textContent = `: ${player.residence}`;
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