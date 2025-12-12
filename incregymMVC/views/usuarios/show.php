<div class="card p-4 shadow-sm">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold mb-0">
            <?= htmlspecialchars($usuario['nombre']) ?> <?= htmlspecialchars($usuario['apellidos']) ?>
        </h2>

        <a href="<?= $base ?>/index.php?url=usuarios/edit&id=<?= $usuario['id'] ?>" class="btn btn-primary btn-btn">
            ✏️ Editar usuario
        </a>
    </div>

    <p class="text-muted mb-1"><strong>DNI:</strong> <?= $usuario['dni'] ?></p>
    <p class="text-muted mb-1"><strong>Email:</strong> <?= $usuario['email'] ?></p>
    <p class="text-muted mb-1"><strong>Edad:</strong> <?= $usuario['edad'] ?></p>

    <hr>

    <!-- =============================== -->
    <!--      RUTINA ASIGNADA / CAMBIO   -->
    <!-- =============================== -->

    <h4 class="fw-bold">🏋️‍♂️ Rutina asignada</h4>

    <?php if (!$rutina): ?>

    <div class="alert alert-info">
        Este usuario todavía no tiene ninguna rutina asignada.
    </div>

    <!-- SELECT de rutinas -->
    <form action="<?= $base ?>/index.php?url=usuarios/asignarRutinaStore" method="POST" class="mt-3">

        <input type="hidden" name="usuario_id" value="<?= $usuario['id'] ?>">

        <label class="fw-bold mb-1">Seleccionar rutina</label>
        <select name="rutina_id" class="form-select mb-3" required>
            <option value="">-- Seleccione una rutina --</option>

            <?php foreach ($rutinas as $r): ?>
            <option value="<?= $r['id'] ?>">
                <?= htmlspecialchars($r['nombre']) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <button class="btn btn-primary">➕ Asignar rutina</button>
    </form>

    <?php else: ?>

    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="fw-bold mb-0"><?= htmlspecialchars($rutina['nombre']) ?></h5>

        <div class="d-flex gap-2">
            <a href="<?= $base ?>/index.php?url=usuarios/quitarRutina&id=<?= $usuario['id'] ?>"
                class="btn btn-danger btn-sm"
                onclick="return confirm('¿Seguro que quieres quitar la rutina del usuario?');">
                ❌ Quitar rutina
            </a>
        </div>
    </div>

    <p class="text-muted"><strong>Objetivo:</strong> <?= htmlspecialchars($rutina['objetivo']) ?></p>

    <!-- SELECT para cambiar rutina -->
    <form action="<?= $base ?>/index.php?url=usuarios/asignarRutinaStore" method="POST" class="mt-3">

        <input type="hidden" name="usuario_id" value="<?= $usuario['id'] ?>">

        <label class="fw-bold mb-1">Cambiar rutina</label>
        <select name="rutina_id" class="form-select mb-3" required>
            <option value="">-- Seleccione una rutina --</option>

            <?php foreach ($rutinas as $r): ?>
            <option value="<?= $r['id'] ?>" <?= ($rutina['id'] == $r['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($r['nombre']) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <button class="btn btn-primary btn-sm">🔄 Cambiar rutina</button>
    </form>

    <!-- LISTA DE EJERCICIOS -->
    <h5 class="mt-3 fw-bold">📋 Ejercicios</h5>

    <div class="row mt-2">
        <?php foreach ($ejercicios as $e): ?>
        <div class="col-md-6 mb-3">

            <div class="card p-2 shadow-sm">

                <?php if (!empty($e['imagen'])): ?>
                <img src="<?= $e['imagen'] ?>" class="img-fluid rounded"
                    style="max-height:150px; object-fit:cover; width:100%;">
                <?php endif; ?>

                <h6 class="fw-bold mt-2"><?= $e['nombre'] ?></h6>

                <p class="mb-1"><strong>Series:</strong> <?= $e['series'] ?></p>
                <p class="mb-1"><strong>Descanso:</strong> <?= $e['descanso'] ?></p>

                <a href="<?= $e['video'] ?>" class="btn btn-primary btn-sm mt-1" target="_blank">
                    ▶️ Ver vídeo
                </a>
            </div>

        </div>
        <?php endforeach; ?>
    </div>

    <?php endif; ?>

</div>