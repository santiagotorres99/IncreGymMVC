<div class="card p-4">
    <h3 class="fw-bold mb-3">➕ Crear nueva rutina</h3>

    <p class="text-muted">
        Selecciona un objetivo y se generará automáticamente una rutina base con 7 ejercicios.
        Luego podrás editarla a tu gusto.
    </p>

    <!-- FORMULARIO -->
    <form method="POST" action="<?= $base ?>/index.php?url=rutinas/store" id="formCrearRutina">

        <!-- NOMBRE -->
        <label class="fw-bold mt-2">Nombre de la rutina *</label>
        <input type="text" name="nombre" id="nombre" class="form-control mb-2" required>

        <!-- OBJETIVO -->
        <label class="fw-bold mt-2">Selecciona un objetivo *</label>
        <select name="objetivo" id="objetivo" class="form-control" required>
            <option value="">-- Selecciona objetivo --</option>

            <?php foreach ($objetivos as $o): ?>
            <option value="<?= $o ?>"><?= $o ?></option>
            <?php endforeach; ?>
        </select>

        <small class="text-muted">Al elegir un objetivo se cargarán automáticamente los ejercicios.</small>

        <hr class="my-4">

        <!-- EJERCICIOS GENERADOS -->
        <h5 class="fw-bold">Ejercicios generados automáticamente</h5>
        <p class="text-muted mb-2">Podrás editarlos luego desde el panel.</p>

        <div id="contenedor-ejercicios">
            <!-- Aquí se cargan los ejercicios JS -->
        </div>

        <hr>

        <button class="btn btn-primary w-100">Guardar rutina</button>
    </form>
</div>