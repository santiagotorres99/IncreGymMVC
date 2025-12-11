document.addEventListener("DOMContentLoaded", () => {

    const select = document.getElementById("selectRutina");
    const preview = document.getElementById("preview");

    if (!select) return;

    select.addEventListener("change", function () {
        const id = this.value;

        if (id === "") {
            preview.style.display = "none";
            return;
        }

        fetch(baseUrl + `/api/rutina.php?id=` + id)
            .then(r => r.json())
            .then(data => {

                let html = `
                    <h4 class="fw-bold" style="color:#D72B1F;">${data.nombre}</h4>
                    <p><strong>Objetivo:</strong> ${data.objetivo}</p>
                    <div class="row">
                `;

                data.ejercicios.forEach(e => {
                    html += `
                        <div class="col-md-6">
                            <div class="card mb-3 shadow-sm" style="border:none; border-radius:12px;">
                                <img src="${e.imagen}" 
                                    class="img-fluid rounded-top"
                                    style="height:160px; object-fit:cover;">
                                <div class="p-2">
                                    <h6 class="fw-bold">${e.nombre}</h6>
                                    <p class="mb-1">Series: ${e.series}</p>
                                    <p class="mb-1">Descanso: ${e.descanso}</p>
                                    <a href="${e.video}" target="_blank" 
                                        class="btn btn-sm mt-1"
                                        style="background:#FF6A00; color:white;">
                                        ▶ Ver video
                                    </a>
                                </div>
                            </div>
                        </div>
                    `;
                });

                html += `</div>`;

                preview.innerHTML = html;
                preview.style.display = "block";
            });
    });

});