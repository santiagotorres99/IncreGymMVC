<div class="card p-4">

    <h3 class="fw-bold mb-3">Asignar rutina a <?= htmlspecialchars($usuario['nombre']) ?></h3>

    <form action="<?= $base ?>/index.php?url=usuarios/guardarAsignacion" method="POST">

        <input type="hidden" name="usuario_id" value="<?= $usuario['id'] ?>">

        <!-- RUTINAS DISPONIBLES -->
        <label class="mt-2 fw-bold">Seleccione una rutina</label>
        <select name="rutina_id" class="form-control" required>
            <option value="">-- Seleccione una rutina --</option>

            <?php foreach ($rutinas as $r): ?>
            <option value="<?= $r['id'] ?>">
                <?= htmlspecialchars($r['nombre']) ?> — <?= htmlspecialchars($r['objetivo']) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <!-- BOTONES -->
        <div class="mt-3 d-flex gap-2">
            <a href="<?= $base ?>/index.php?url=usuarios" class="btn btn-danger">Cancelar</a>
            <button class="btn btn-primary">Asignar rutina</button>
        </div>
    </form>

</div>