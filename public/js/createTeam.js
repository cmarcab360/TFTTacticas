//Importar la clase

import Validation from "./validation.js";

// Evento para validar los campos
document.addEventListener("DOMContentLoaded", () => {
    $("#createTeam").submit(function (event) {
        event.preventDefault();
        let victories = $("#victories").val();
        let num_match = $("#num_match").val();

        if (!Validation.validateVictories(victories, num_match)) {
            $('#num_match').nextAll('.error').remove();
            $('#num_match').after('<p class="error">The number of victories cannot be equal to 0 or exceed the total number of matches played.</p>');
        } else {
            this.submit();
        }
    });
});

