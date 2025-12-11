document.addEventListener("DOMContentLoaded", () => {
    console.log("Aforo JS cargado ✔");

    const inputs = document.querySelectorAll(".aforo-input");

    inputs.forEach(input => {
        const max = parseInt(input.dataset.max);
        const warn = input.parentElement.querySelector(".aforo-warning");

        function check() {
            const value = parseInt(input.value);

            if (!isNaN(value) && value > max) {
                input.classList.add("aforo-excedido");
                warn.classList.remove("d-none");
            } else {
                input.classList.remove("aforo-excedido");
                warn.classList.add("d-none");
            }
        }

        input.addEventListener("input", check);
        check(); // Comprobación inicial
    });
});