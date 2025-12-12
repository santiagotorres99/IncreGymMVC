function confirmarLogout(e) {
    e.preventDefault();

    if (confirm("¿Seguro que quieres cerrar sesión?")) {
        window.location.href = "/Torres_SantiagoEzequiel_27/incregymMVC/logout.php";
    }
}