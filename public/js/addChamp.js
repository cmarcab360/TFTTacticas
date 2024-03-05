//Importar la clase

import Validation from './validation.js';

// Evento para validar los campos
document.addEventListener('DOMContentLoaded', () => {
    $('#createTeam').submit(function (event) {
        event.preventDefault();
        let victories = $('#victories').val();
        let num_match = $('#num_match').val();

        if (!Validation.validateVictories(victories, num_match)) {

            //Crear un mensaje de error debajo del campo de contraseña
            $('#num_match').nextAll('.error').remove();
            $('#num_match').after('<p class="error">El número de victorias no puede ser menor a 0 ni mayor que el número de partidas jugadas</p>');
        }

        else {

            this.submit();
        }
    });
});