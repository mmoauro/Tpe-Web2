document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    document.getElementById("form").addEventListener("submit", (e) => {
        let password = document.getElementById("password").value;
        let cPassword = document.getElementById("cPassword").value;
        let re = /([A-Z])([a-z]+)([0-9])/g;
        if (password != cPassword || password.length < 6 || !re.test(password)) {
            e.preventDefault();
            if (password != cPassword) {
                document.getElementById("bad").innerHTML = "Verifique la contrasena correctamente";
            }
            else {
                document.getElementById("bad").innerHTML = "Las contraseña debe tener un minimo de seis caracteres, al menos un numero, y al menos un caracter mayuscula.";
            }
        }
    });
});