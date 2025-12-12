function confirmarLogout(e) {
    e.preventDefault();

    if (confirm("¿Seguro que quieres cerrar sesión?")) {
        const base = (typeof baseUrl !== "undefined") ? baseUrl : "";
        window.location.href = `${base}/logout.php`;
    }
}
