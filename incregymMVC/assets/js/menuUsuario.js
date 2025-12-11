function toggleMenuUsuario() {
    const menu = document.getElementById("menuUsuario");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

document.addEventListener("click", function(e) {
    const top = document.querySelector(".usuario-top");
    const menu = document.getElementById("menuUsuario");

    if (!top.contains(e.target)) {
        menu.style.display = "none";
    }
});