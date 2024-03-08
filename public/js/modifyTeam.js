//Importar la clase

import Validation from "./validation.js";

// Evento para validar los campos
document.addEventListener("DOMContentLoaded", () => {
    $("#modifyTeam").submit(function (event) {
        event.preventDefault();
        let victories = $("#modifyVictories").val();
        let num_match = $("#modifyNumMatch").val();

        if (!Validation.validateVictories(victories, num_match)) {
            $('#myTeam').nextAll('.error').remove();
            $('#myTeam').after('<p class="error">The number of victories cannot be equal to 0 or exceed the total number of matches played.</p>');
        } else {
            this.submit();
        }
    });
});
