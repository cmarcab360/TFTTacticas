//Importar la clase

import Validation from './validation.js';

// Evento para validar los campos
document.addEventListener('DOMContentLoaded', () => {
    $('#register-form').submit(function (event) {
        event.preventDefault();
        let password = $('#password').val();

        if (!Validation.validatePassword(password)) {

            $('#password').nextAll('.error').remove();
            //Crear un mensaje de error debajo del campo de contraseña
            $('#password').after('<p class="error">La contraseña debe tener al menos 8 caracteres, con al menos un carácter especial y una mayúscula</p>');
        }
            
            else {
                //Si todo está bien, enviar el formulario
                this.submit();
            }
    });
});