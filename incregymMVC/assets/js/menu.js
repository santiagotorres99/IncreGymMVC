document.addEventListener("DOMContentLoaded", () => {

    // --- MENÚ DESPLEGABLE ---
    const groups = document.querySelectorAll(".group");

    groups.forEach(group => {
        const btn = group.querySelector(".group-btn");
        const submenu = group.querySelector(".submenu");

        if (!btn || !submenu) return;

        btn.addEventListener("click", () => {
            submenu.classList.toggle("open");
        });
    });


    // --- CONFIRMACIÓN BORRADO USUARIOS ---
    const botonesBorrarUsuario = document.querySelectorAll(".btn-borrar");

    botonesBorrarUsuario.forEach(btn => {
        btn.addEventListener("click", (e) => {
            if (!confirm("⚠️ ¿Seguro que quieres borrar este usuario? Esta acción no se puede deshacer.")) {
                e.preventDefault();
            }
        });
    });


    // --- CONFIRMACIÓN BORRADO RUTINAS ---
    const botonesBorrarRutina = document.querySelectorAll(".btn-borrar-rutina");

    botonesBorrarRutina.forEach(btn => {
        btn.addEventListener("click", function(e) {
            e.preventDefault();

            const url = this.getAttribute("href");

            if (confirm("⚠️ ¿Seguro que quieres borrar esta rutina? Esta acción no se puede deshacer.")) {
                window.location.href = url;
            }
        });
    });

});

// --- CONFIRMACIÓN LOGOUT ---
function confirmarLogout(e) {
    e.preventDefault();

    if (confirm("¿Seguro que quieres cerrar sesión?")) {
        window.location.href = "/TrabajoFinal/incregymMVC/logout.php";
    }
}