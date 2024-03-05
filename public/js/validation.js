//Crear una clase validation estática y abstracta que contenga un método que valide un email y la contraseña.

class Validation {

    static validatePassword(password) {
        if (password.length < 8 || !/[!@#$%^&*()-_+=]/.test(password) || !/[A-Z]/.test(password)){
            return false;
        }
        return true;
    }

    static validateUsername(username) {
        if (username.length < 3 || username.length > 20 || /\s/.test(username)) {
            return false;
        }
        return true;
    }

    static validateVictories(victories, num_match) {
        if (victories < 0 || victories > num_match) {
            return false;
        }
        return true;
    }
}


export default Validation;





