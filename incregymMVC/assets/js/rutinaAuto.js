document.addEventListener("DOMContentLoaded", () => {

    const objetivoSelect = document.getElementById("objetivo");
    const contenedor = document.getElementById("contenedor-ejercicios");

    if (!objetivoSelect) return; // Si no está en esta vista, no hace nada

    objetivoSelect.addEventListener("change", () => {
        const objetivo = objetivoSelect.value;

        if (objetivo.trim() === "") {
            contenedor.innerHTML = "";
            return;
        }

        // Llamada a API de ejercicios automáticos según objetivo
        fetch(baseUrl + "/api/rutina.php?objetivo=" + encodeURIComponent(objetivo))
            .then(res => res.json())
            .then(data => {
                contenedor.innerHTML = "";

                data.ejercicios.forEach((e, i) => {
                    const card = `
                        <div class="card p-3 mb-2">
                            <h6 class="fw-bold mb-2">Ejercicio ${i+1}: ${e.nombre}</h6>

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Series</label>
                                    <input type="text" name="series[]" class="form-control" value="${e.series}">
                                </div>

                                <div class="col-md-4">
                                    <label>Descanso</label>
                                    <input type="text" name="descanso[]" class="form-control" value="${e.descanso}">
                                </div>

                                <div class="col-md-4">
                                    <label>Video</label>
                                    <input type="text" name="video[]" class="form-control" value="${e.video}">
                                </div>
                            </div>

                            <input type="hidden" name="nombre_ejercicio[]" value="${e.nombre}">
                        </div>
                    `;
                    contenedor.innerHTML += card;
                });
            });
    });

});