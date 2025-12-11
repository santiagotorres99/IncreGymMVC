<div class="card p-4">
    <h3 class="fw-bold text-danger">Eliminar usuario</h3>

    <p>¿Seguro que deseas eliminar a <strong><?= $usuario['nombre'] ?></strong>?</p>

    <form action="<?= $base ?>/index.php?url=usuarios/delete" method="POST">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <button class="btn btn-danger">Sí, eliminar</button>
        <a href="<?= $base ?>/index.php?url=usuarios" class="btn btn-secondary">Cancelar</a>

    </form>
</div>