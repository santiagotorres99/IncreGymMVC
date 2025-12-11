document.addEventListener("DOMContentLoaded", () => {

    const select = document.getElementById("selectRutina");
    const box = document.getElementById("vistaRutina");
    const nombre = document.getElementById("vistaNombre");
    const objetivo = document.getElementById("vistaObjetivo");
    const ejerciciosDiv = document.getElementById("vistaEjercicios");

    if (!select) return;

    select.addEventListener("change", () => {
        const id = select.value;

        if (!id) {
            box.style.display = "none";
            return;
        }

        fetch(`${baseUrl}/api/rutina.php?id=${id}`)
            .then(res => res.json())
            .then(data => {
                nombre.textContent = data.nombre;
                objetivo.textContent = "🎯 " + data.objetivo;

                let html = `<ul class="list-group">`;

                data.ejercicios.forEach(e => {
                    html += `
                        <li class="list-group-item">
                            <strong>${e.nombre}</strong><br>
                            Series: ${e.series}<br>
                            Descanso: ${e.descanso}<br>
                            <a href="${e.video}" target="_blank" class="btn btn-sm btn-primary mt-1">▶ Ver video</a>
                        </li>
                    `;
                });

                html += "</ul>";

                ejerciciosDiv.innerHTML = html;
                box.style.display = "block";
            });
    });

    // Mostrar rutina actual al cargar la página
    if (select.value !== "") {
        select.dispatchEvent(new Event("change"));
    }
});