<div class="card p-4 shadow-sm text-center cambiar-foto-card">

    <h2 class="fw-bold mb-4">📸 Cambiar foto</h2>

    <div class="foto-actual-container">
        <img src="<?= !empty($empleado['foto'])
            ? '/TrabajoFinal/incregymMVC/uploads/empleados/' . $empleado['foto']
            : $base . '/assets/img/default-user.png' ?>" class="foto-actual">
    </div>

    <form action="<?= $base ?>/index.php?url=empleado/subirFoto" method="post" enctype="multipart/form-data"
        class="mt-4">

        <label class="form-label fw-bold">Selecciona una nueva foto</label>
        <input type="file" name="foto" class="form-control mb-3" accept="image/*" required>

        <button class="btn btn-primary mt-2">Guardar foto</button>
        <a href="<?= $base ?>/index.php?url=empleado/perfil" class="btn btn-danger mt-2">Cancelar</a>

    </form>

</div>