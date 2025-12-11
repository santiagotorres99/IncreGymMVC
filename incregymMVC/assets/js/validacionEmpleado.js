document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("formEmpleado");
    if (!form) return;

    const inputs = form.querySelectorAll("input[required]");
    
    form.addEventListener("submit", (e) => {
        let valido = true;

        inputs.forEach(input => {
            const errorMsg = input.nextElementSibling;

            // Ocultar error por defecto
            errorMsg.classList.remove("active");
            input.classList.remove("input-error");

            const valor = input.value.trim();

            // VALIDACIONES INDIVIDUALES
            if (valor === "") {
                marcarError(input, errorMsg);
                valido = false;
            }

            // Validación DNI
            if (input.name === "dni") {
                const regexDniNie = /^(?:[0-9]{8}[A-Za-z]|[XYZ][0-9]{7}[A-Za-z])$/;
                if (!regexDniNie.test(valor)) {
                    marcarError(input, errorMsg);
                    valido = false;
                }
            }

            // Teléfono español de 9 dígitos
            if (input.name === "telefono") {
                if (!/^[0-9]{9}$/.test(valor)) {
                    marcarError(input, errorMsg);
                    valido = false;
                }
            }

            // Email
            if (input.name === "email") {
                const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!regexEmail.test(valor)) {
                    marcarError(input, errorMsg);
                    valido = false;
                }
            }
        });

        if (!valido) {
            e.preventDefault();

            // Hacer scroll al primer error
            const primerError = form.querySelector(".input-error");
            primerError.scrollIntoView({ behavior: "smooth", block: "center" });
        }
    });

    function marcarError(input, msg) {
        msg.classList.add("active");
        input.classList.add("input-error");
    }
});