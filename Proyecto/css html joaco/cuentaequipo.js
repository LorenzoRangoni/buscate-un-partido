document.addEventListener("DOMContentLoaded", function () {
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
        xhr.open("GET", "filtroequipo.php", true);
        xhr.send();
      });
    },
  };;
  
  
  
  // Resto del código...
  

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
      <p>Jugadores faltantes: ${team.missingPlayers.join(", ")}</p>
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
    const searchInputValue = document.getElementById("searchInput").value.toLowerCase();
    const minGoals = parseInt(document.getElementById("goalsFilter").value) || 0;
    const selectedPosition = document.getElementById("positionFilter").value;
    const selectedTrainingFrequency = document.getElementById("trainingFrequencyFilter").value;
    const selectedLevel = document.getElementById("levelFilter").value;
  
    const filteredTeams = teamsData.filter((team) => {
      const teamNameLower = team.name.toLowerCase();
      const isNameMatch = teamNameLower.includes(searchInputValue);
      const isPositionMatch = selectedPosition === "" || team.position === selectedPosition;
      const isGoalsMatch = team.goals >= minGoals;
      const isTrainingFrequencyMatch = selectedTrainingFrequency === "" || team.trainingFrequency.includes(selectedTrainingFrequency);
      const isLevelMatch = selectedLevel === "" || team.skillLevel === selectedLevel;
  
      return isNameMatch && isPositionMatch && isGoalsMatch && isTrainingFrequencyMatch && isLevelMatch;
    });
  
    renderTeams(filteredTeams);
  };
  
  
  

  async function renderTeams(teamsData) {
    teamsContainer.innerHTML = "";

    teamsData.forEach((team) => {
      const teamCard = document.createElement("div");
      teamCard.classList.add("team-card");

      const logo = document.createElement("img");
      logo.src = team.logo;
      logo.alt = `${team.name} Logo`;
      logo.classList.add("team-logo");
      logo.addEventListener("click", () => showTeamDetails(team));

      const teamStats = document.createElement("div");
      teamStats.classList.add("team-stats");
      teamStats.textContent = `Goles: ${team.goals}`;

      teamCard.appendChild(logo);
      teamCard.appendChild(teamStats);

      teamsContainer.appendChild(teamCard);
    });

    const mostSearchedTeam = getMostSearchedTeam(teamsData);
    if (mostSearchedTeam) {
      const mostSearchedTeamCard = document.createElement("div");
      mostSearchedTeamCard.classList.add("most-searched-team-card");
      mostSearchedTeamCard.innerHTML = `
        <h2>Equipo Más Buscado</h2>
        <img src="${mostSearchedTeam.logo}" alt="${mostSearchedTeam.name} Logo">
        <p>${mostSearchedTeam.name}</p>
        <p>Goles: ${mostSearchedTeam.goals}</p>
      `;
      teamsContainer.appendChild(mostSearchedTeamCard);
    }
  }

  function getMostSearchedTeam(teams) {
    return teams.reduce((mostSearched, currentTeam) => {
      return currentTeam.goals > mostSearched.goals ? currentTeam : mostSearched;
    }, teams[0]);
  }

  api.getTeams().then((data) => {
    teamsData = data;
    renderTeams(teamsData);
  });
});
