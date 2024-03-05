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
            $('#password').after('<p class="error">The password must have at least 8 characters, including at least one special character and one uppercase letter.</p>');
        }

        else if (!Validation.validateUsername(username)) {

            $('#username').nextAll('.error').remove();
            //Crear un mensaje de error debajo del campo de usuario
            $('#username').after('<p class="error">The password must have at least 8 characters, including at least one special character and one uppercase letter.</p>');
        }

        else {
            //Si todo está bien, enviar el formulario
            this.submit();
        }
    });
});