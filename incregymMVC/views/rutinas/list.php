<div class="card p-4">
    <h3 class="fw-bold mb-3">🏋️ Rutinas</h3>

    <a href="<?= $base ?>/index.php?url=rutinas/create" class="btn btn-primary mb-3">
        ➕ Crear nueva rutina
    </a>

    <?php if (empty($rutinas)): ?>
    <div class="alert alert-warning">No hay rutinas creadas aún.</div>
    <?php else: ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Objetivo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($rutinas as $r): ?>
            <tr>
                <td><?= $r['nombre'] ?></td>
                <td><?= $r['objetivo'] ?></td>

                <td class="d-flex gap-2">

                    <!-- VER RUTINA -->
                    <a href="<?= $base ?>/index.php?url=rutinas/show&id=<?= $r['id'] ?>" class="btn btn-info btn-sm">
                        👁 Ver
                    </a>

                    <!-- EDITAR -->
                    <a href="<?= $base ?>/index.php?url=rutinas/edit&id=<?= $r['id'] ?>" class="btn btn-primary btn-sm">
                        ✏️ Editar
                    </a>

                    <!-- BORRAR (con confirmación desde menu.js) -->
                    <a href="<?= $base ?>/index.php?url=rutinas/delete&id=<?= $r['id'] ?>"
                        class="btn btn-danger btn-sm btn-borrar-rutina">
                        🗑 Borrar
                    </a>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php endif; ?>

</div>