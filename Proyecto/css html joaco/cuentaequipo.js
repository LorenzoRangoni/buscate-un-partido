document.addEventListener("DOMContentLoaded", function () {

  let teamsData; // Declare teamsData

  const teamsContainer = document.getElementById("teams");
  const goalsFilterInput = document.getElementById("goalsFilter");
  const positionFilterSelect = document.getElementById("positionFilter");
  const trainingFrequencyFilterSelect = document.getElementById("trainingFrequencyFilter");
  const levelFilterSelect = document.getElementById("levelFilter");
  const teamDetailsModal = document.getElementById("teamDetailsModal");
  const positionChoiceSelect = document.getElementById("positionChoice");
  const closeButton = document.getElementById("closeButton");

  const api = {
    getTeams: () => {
      return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              const teamsData = JSON.parse(xhr.responseText);
              resolve(teamsData);
            } else {
              reject(new Error(`Error en la solicitud AJAX: ${xhr.status}`));
            }
          }
        };
        xhr.open("GET", "../../Basededatos/filtroequipo.php", true);
        xhr.send();
      });
    },
  };;
  
  
  
  
  

  function closeModal() {
    teamDetailsModal.style.display = "none";
  }

  function showTeamDetails(team) {
    const modalContent = document.querySelector(".modal-content");
    modalContent.innerHTML = `
      <img src="${team.logo}" alt="${team.name} Logo">
      <h2>${team.name}</h2>
      <p>Posición: ${team.position}</p>
      <p>Goles en la temporada: ${team.goals}</p>
      <p>Jugadores faltantes: ${team.missingPlayers ? team.missingPlayers.join(", ") : 'No hay información'}</p>
      <p>Capitán: ${team.captain.name}</p>
      <p>Teléfono del Capitán: ${team.captain.phone}</p>
      <p>Ubicación: ${team.location}</p>
      <p>Frecuencia de entrenamiento: ${team.trainingFrequency}</p>
      <p>Liga: ${team.league}</p>
      <p>Nivel de juego: ${team.skillLevel}</p>
      <p>Hora de entrenamiento: ${team.trainingTime}</p>
      <div id="positionOptions">
        <label for="positionChoice">Selecciona tu posición:</label>
        <select id="positionChoice">
          ${team.availablePositions.map(position => `<option value="${position}">${position}</option>`).join('')}
        </select>
        <button onclick="requestToJoin('${team.name}')">Solicitar unirse</button>
      </div>
      <button id="closeModalButton" onclick="closeModal()">Cerrar</button>
    `;
    teamDetailsModal.style.display = "flex";
    document.getElementById("closeModalButton").addEventListener("click", closeModal);
  }

  window.applyFilters = function () {
      if (!teamsData) {
        console.error('Error: teamsData is not defined.');
        return;
      }
    
    const searchInputValue = document.getElementById("searchInput").value.toLowerCase();
    const minGoals = parseInt(document.getElementById("goalsFilter").value) || 0;
    const selectedPosition = document.getElementById("positionFilter").value;
    const selectedTrainingFrequency = document.getElementById("trainingFrequencyFilter").value;
    const selectedLevel = document.getElementById("levelFilter").value;
  
    const filteredTeams = teamsData.filter((team) => {
      const teamNameLower = team.nombre_equipo.toLowerCase();
      console.log(teamNameLower);
      const isNameMatch = teamNameLower.includes(searchInputValue);
      const isPositionMatch = selectedPosition === "" || team.posicion_requerida === selectedPosition;
      const isGoalsMatch = team.goles >= minGoals;
      const isTrainingFrequencyMatch = selectedTrainingFrequency === "" || team.frecuencia_entrenamiento.includes(selectedTrainingFrequency);
      const isLevelMatch = selectedLevel === "";
  
      return isNameMatch && isPositionMatch && isGoalsMatch && isTrainingFrequencyMatch && isLevelMatch;
    });
  
    renderTeams(filteredTeams);
  };
  
  
  
  async function renderTeams(teamsData) {
    teamsContainer.innerHTML = "";
  
    teamsData.forEach((team) => {
      const teamCard = document.createElement("div");
      teamCard.classList.add("team-card");
  
      const teamStats = document.createElement("div");
      teamStats.classList.add("team-stats");
      teamStats.textContent = `Nombre de Equipo:  ${team.nombre_equipo} Goles: ${team.goles} liga: ${team.li} ` ;
  
      teamCard.appendChild(teamStats);
  
      teamCard.addEventListener("click", () => showTeamDetails(team));
  
      teamsContainer.appendChild(teamCard);
    });
  

    const mostSearchedTeam = getMostSearchedTeam(teamsData);
    if (mostSearchedTeam) {
      const mostSearchedTeamCard = document.createElement("div");
      mostSearchedTeamCard.classList.add("most-searched-team-card");
      mostSearchedTeamCard.innerHTML = `
        <h2>Equipo Más Buscado</h2>
        <p>${mostSearchedTeam.nombre_equipo}</p>
        <p>Goles: ${mostSearchedTeam.goles}</p>
      `;
      teamsContainer.appendChild(mostSearchedTeamCard);
    }
  }

  function getMostSearchedTeam(teams) {
    return teams.reduce((mostSearched, currentTeam) => {
      return currentTeam.goles > mostSearched.goles ? currentTeam : mostSearched;
    }, teams[0]);
  }

  // Aplicar el evento de clic a cada tarjeta del equipo
  const teamCards = document.querySelectorAll(".team-card");
  teamCards.forEach((card) => {
      card.addEventListener("click", () => {
          const teamIndex = Array.from(teamCards).indexOf(card);
          showTeamDetails(teamsData[teamIndex]);
      });
  });


  api.getTeams().then((data) => {
    teamsData = data;
    console.log(data);
    renderTeams(teamsData);
  });
});
