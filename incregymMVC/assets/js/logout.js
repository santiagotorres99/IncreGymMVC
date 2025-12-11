function confirmarLogout(e) {
    e.preventDefault();

    if (confirm("¿Seguro que quieres cerrar sesión?")) {
        window.location.href = "/TrabajoFinal/incregymMVC/logout.php";
    }
}