document.addEventListener("DOMContentLoaded", function () {
  const teamsContainer = document.getElementById("teams");
  const goalsFilterInput = document.getElementById("goalsFilter");
  const positionFilterSelect = document.getElementById("positionFilter");
  const trainingFrequencyFilterSelect = document.getElementById("trainingFrequencyFilter");
  const levelFilterSelect = document.getElementById("levelFilter");

  let teamsData = [];

  // Simulación de API y datos de equipos
  const api = {
    getTeams: () => {
      return new Promise((resolve) => {
        // Simula una llamada a una API
        setTimeout(() => {
          resolve([
            { 
              name: "Real Madrid",
              logo: "real_madrid_logo.png",
              goals: 60,
              position: "Delantero",
              missingPlayers: ["Jugador1", "Jugador2"],
              captain: { name: "Sergio Ramos", phone: "+34 123 456 789" },
              location: "Madrid",
              trainingFrequency: "3 veces por semana",
              league: "La Liga",
              skillLevel: "Alto",
              trainingTime: "19:00"
            },
            { 
              name: "FC Barcelona",
              logo: "barcelona_logo.png",
              goals: 55,
              position: "Mediocampista Ofensivo",
              missingPlayers: ["Jugador3", "Jugador4"],
              captain: { name: "Lionel Messi", phone: "+34 987 654 321" },
              location: "Barcelona",
              trainingFrequency: "4 veces por semana",
              league: "La Liga",
              skillLevel: "Alto",
              trainingTime: "18:30"
            },
            { 
              name: "Manchester United",
              logo: "manchester_united_logo.png",
              goals: 50,
              position: "Defensa Central",
              missingPlayers: ["Jugador5", "Jugador6"],
              captain: { name: "Harry Maguire", phone: "+44 7890 123456" },
              location: "Manchester",
              trainingFrequency: "2 veces por semana",
              league: "Premier League",
              skillLevel: "Medio",
              trainingTime: "20:00"
            },
            // Agrega más equipos según sea necesario
          ]);
        }, 500);
      });
    },
  };

  // Función para renderizar equipos en la página
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

    // Mostrar equipo más buscado
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

  // Función para mostrar detalles del equipo
  function showTeamDetails(team) {
    const modal = document.getElementById("teamDetailsModal");
    const modalContent = document.getElementById("teamDetailsContent");
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
      <button onclick="requestToJoin('${team.name}')">Solicitar unirse</button>
      <button onclick="closeModal()">Cerrar</button>
    `;
    modal.style.display = "flex";
  }

  // Función para cerrar el modal
  function closeModal() {
    const modal = document.getElementById("teamDetailsModal");
    modal.style.display = "none";
  }

  // Función para solicitar unirse al equipo
  function requestToJoin(teamName) {
    alert(`Solicitud enviada para unirse al equipo ${teamName}`);
    closeModal();
  }

  // Función para obtener el equipo más buscado (simulación)
  function getMostSearchedTeam(teams) {
    // Simulación: Devolver el equipo con más goles (puedes ajustar esta lógica según tus criterios)
    return teams.reduce((mostSearched, currentTeam) => {
      return currentTeam.goals > mostSearched.goals ? currentTeam : mostSearched;
    }, teams[0]);
  }

  // Función para aplicar filtros
  window.applyFilters = function () {
    const minGoals = parseInt(goalsFilterInput.value) || 0;
    const selectedPosition = positionFilterSelect.value;
    const selectedTrainingFrequency = trainingFrequencyFilterSelect.value;
    const selectedLevel = levelFilterSelect.value;

    const filteredTeams = teamsData.filter((team) =>
      team.goals >= minGoals &&
      (selectedPosition === "" || team.position === selectedPosition) &&
      (selectedTrainingFrequency === "" || team.trainingFrequency === selectedTrainingFrequency) &&
      (selectedLevel === "" || team.skillLevel === selectedLevel)
    );

    renderTeams(filteredTeams);
  };

  // Llamada inicial para obtener y renderizar equipos
  api.getTeams().then((data) => {
    teamsData = data;
    renderTeams(teamsData);
  });
});
