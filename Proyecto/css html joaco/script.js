$(document).ready(function() {
    $("#formation").change(function() {
        const selectedFormation = $(this).val();
        const formationArray = selectedFormation.split("-");

        $("#team-formation").empty();
        for (let i = 1; i <= 11; i++) {
            let position = formationArray[i - 1];
            $("#team-formation").append(`<div class="formation-position" id="position${i}">${position}</div>`);
        }
    });

    $(".player-name").draggable({
        helper: "clone"
    });

    $("#team-formation").droppable({
        accept: ".player-name",
        drop: function(event, ui) {
            const playerName = ui.helper.val();
            const position = event.target.id;
            $(this).find("#" + position).text(playerName);
        }
    });

    $("#save-team").click(function() {
        const formation = $("#formation").val();
        const positions = [];
        for (let i = 1; i <= 11; i++) {
            positions.push({
                position: `position${i}`,
                player: $(`#position${i}`).text()
            });
        }

        $.ajax({
            url: 'guardar_equipo.php',
            type: 'POST',
            data: { formation, positions },
            success: function(response) {
                alert(response);
            },
            error: function() {
                alert("Error al guardar el equipo.");
            }
        });
    });
});
