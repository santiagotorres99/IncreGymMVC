<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold mb-1"><?= htmlspecialchars($rutina['nombre']) ?></h2>
            <p class="text-muted mb-0"><strong>Objetivo:</strong> <?= htmlspecialchars($rutina['objetivo']) ?></p>
        </div>

        <a href="<?= $base ?>/index.php?url=rutinas/edit&id=<?= $rutina['id'] ?>" class="btn btn-primary">
            ✏️ Editar rutina
        </a>
    </div>

    <hr>

    <h4 class="fw-bold mb-3">📋 Ejercicios</h4>

    <?php if (empty($ejercicios)): ?>
    <div class="alert alert-warning">
        Esta rutina no tiene ejercicios. Puedes añadirlos desde el botón editar.
    </div>
    <?php endif; ?>


    <div class="row">
        <?php foreach ($ejercicios as $e): ?>

        <div class="col-md-6">
            <div class="card mb-3 p-3 shadow-sm">

                <!-- 🔥 IMAGEN DEL EJERCICIO (si existe) -->
                <?php if (!empty($e['imagen'])): ?>
                <img src="<?= htmlspecialchars($e['imagen']) ?>" class="img-fluid rounded mb-2"
                    style="max-height:150px; object-fit:cover; width:100%;">
                <?php endif; ?>

                <h5 class="fw-bold mb-2"><?= htmlspecialchars($e['nombre']) ?></h5>

                <p class="mb-1"><strong>Series:</strong> <?= htmlspecialchars($e['series']) ?></p>
                <p class="mb-1"><strong>Descanso:</strong> <?= htmlspecialchars($e['descanso']) ?></p>

                <a href="<?= htmlspecialchars($e['video']) ?>" target="_blank" class="btn btn-primary btn-sm mt-2">
                    ▶️ Ver video
                </a>

            </div>
        </div>

        <?php endforeach; ?>
    </div>

</div>