//Importar la clase

import Validation from './validation.js';

// Evento para validar los campos
document.addEventListener('DOMContentLoaded', () => {
    $('#register-form').submit(function (event) {
        event.preventDefault();
        let username = $('#username').val();
        let password = $('#password').val();

        if (!Validation.validatePassword(password)) {

            $('#password').nextAll('.error').remove();
            //Crear un mensaje de error debajo del campo de contraseña
            $('#password').after('<p class="error">La contraseña debe tener al menos 8 caracteres, con al menos un carácter especial y una mayúscula</p>');
        }

        else if (!Validation.validateUsername(username)) {

            $('#username').nextAll('.error').remove();
            //Crear un mensaje de error debajo del campo de usuario
            $('#username').after('<p class="error">El nombre de usuario debe tener entre 3 y 20 caracteres y no puede tener espacios</p>');
        }

        else {
            //Si todo está bien, enviar el formulario
            this.submit();
        }
    });
});