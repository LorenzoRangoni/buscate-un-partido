

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
        console.log(player.posicion_jugador);
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
    const modalPlayerPhone= document.getElementById("modalPlayerPhone");
    const modalPlayerSkill= document.getElementById("modalPlayerSkill");
    const modalPlayerHour= document.getElementById("modalPlayerHour");
    const modalPlayerMail= document.getElementById("modalPlayerMail");
    const modalPlayerAltura= document.getElementById("modalPlayerAltura");
    const modalPlayerPeso= document.getElementById("modalPlayerPeso");
   

    modalPlayerName.textContent = player.nombre;
    modalPlayerPosition.textContent = ` ${player.posicion_jugador}`;
    modalPlayerAge.textContent = ` ${player.edad}`;
    modalPlayerResidence.textContent = `${player.zona_residencial}`;
    modalPlayerPhone.textContent = `${player.numero_de_telefono_jugador}`;
    modalPlayerSkill.textContent = `${player.habilidad}`;
    modalPlayerHour.textContent = `${player.disponibilidad_horaria_jugador}`;
    modalPlayerMail.textContent = `${player.mail_del_jugador}`;
    modalPlayerAltura.textContent = `${player.altura}`;
    modalPlayerPeso.textContent = `${player.peso}`;




    
    //modalPlayerImage.src = player.image;
   

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
    

    const filteredPlayers = players.filter((player) => { 
        const xnombre  = player.nombre.toLowerCase().includes(searchTerm);
        const xposici = (selectedPosition === "" || player.posicion_jugador.trim().toLowerCase() === selectedPosition);
        const xedad = (player.edad >= minAge) ;
        const xresi = (residenceFilter === "" || player.zona_residencial.toLowerCase().includes(residenceFilter));
        console.log('Filtro:' +  player.nombre.toLowerCase() + ':' + player.posicion_jugador.trim().toLowerCase() + ':'+ xposici + ':' + selectedPosition+ ':' + player.zona_residencial.toLowerCase());
        return xnombre && xposici && xresi && xedad ;
   });

    

    displayPlayers(filteredPlayers);
}

window.addEventListener("load", () => {
    displayPlayers(players);
});
