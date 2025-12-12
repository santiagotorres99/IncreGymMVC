<div class="card p-4">
    <h3 class="fw-bold text-danger">Eliminar rutina</h3>

    <p>¿Seguro que quieres eliminar <strong><?= $rutina['nombre'] ?></strong>?</p>

    <form action="<?= $base ?>/index.php?url=rutinas/destroy" method="POST">
        <input type="hidden" name="id" value="<?= $rutina['id'] ?>">

        <button class="btn btn-danger">Sí, eliminar</button>
        <a class="btn btn-secondary" href="<?= $base ?>/index.php?url=rutinas">Cancelar</a>
    </form>
</div>
