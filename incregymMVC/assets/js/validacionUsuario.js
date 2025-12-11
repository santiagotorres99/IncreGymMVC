document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("formUsuario");
    if (!form) return;

    // ✔ Limpiar error al escribir
    document.querySelectorAll("input, select, textarea").forEach(campo => {
        campo.addEventListener("input", () => {
            campo.classList.remove("input-error");
            const divError = document.getElementById("error-" + campo.id);
            if (divError) {
                divError.textContent = "";
                divError.classList.remove("active");
            }
        });
    });

    form.addEventListener("submit", function(e) {

        // limpiar errores anteriores
        document.querySelectorAll(".error-msg").forEach(el => {
        el.textContent = "";
        el.classList.remove("active");
        });
        document.querySelectorAll(".input-error").forEach(el => el.classList.remove("input-error"));

        let errores = [];

        const campos = {
            nombre: document.getElementById("nombre"),
            apellidos: document.getElementById("apellidos"),
            dni: document.getElementById("dni"),
            edad: document.getElementById("edad"),
            objetivo: document.getElementById("objetivo"),
            email: document.getElementById("email"),
            patologias: document.getElementById("patologias")
        };

        // VALIDACIONES
        if (campos.nombre.value.trim().length === 0 || campos.nombre.value.trim().length > 20)
            errores.push({ campo: "nombre", mensaje: "El nombre es obligatorio y no puede superar 20 caracteres." });

        if (campos.apellidos.value.trim().length === 0 || campos.apellidos.value.trim().length > 50)
            errores.push({ campo: "apellidos", mensaje: "Los apellidos son obligatorios y no pueden superar 50 caracteres." });

        if (campos.dni.value.trim().length !== 9)
            errores.push({ campo: "dni", mensaje: "El DNI/NIE debe tener exactamente 9 caracteres." });

        if (isNaN(parseInt(campos.edad.value)) || parseInt(campos.edad.value) < 16)
            errores.push({ campo: "edad", mensaje: "La edad mínima es 16 años." });

        if (campos.objetivo.value === "")
            errores.push({ campo: "objetivo", mensaje: "Debe seleccionar un objetivo." });

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(campos.email.value.trim()))
            errores.push({ campo: "email", mensaje: "Introduzca un correo electrónico válido." });

        if (campos.patologias.value.trim().length > 200)
            errores.push({ campo: "patologias", mensaje: "Las patologías no pueden superar los 200 caracteres." });

        // Mostrar errores
        if (errores.length > 0) {
            e.preventDefault();

            errores.forEach(err => {
                const input = campos[err.campo];
                const msg = document.getElementById("error-" + err.campo);

                input.classList.add("input-error");
                msg.textContent = err.mensaje;
                msg.classList.add("active");
            });

            const primerCampo = campos[errores[0].campo];
            primerCampo.scrollIntoView({ behavior: "smooth", block: "center" });
            primerCampo.focus();
            return;
        }
    });

    // Botón atrás
    const btnAtras = document.getElementById("btnAtras");
    if (btnAtras) {
        btnAtras.addEventListener("click", () => {
            if (confirm("¿Seguro que quieres salir? No se aplicarán los cambios no guardados.")) {
                window.location.href = "/incregymMVC/?url=usuarios";
            }
        });
    }

});