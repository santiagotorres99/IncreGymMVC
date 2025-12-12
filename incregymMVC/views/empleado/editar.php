<div class="card p-4 shadow-sm">

    <h2 class="fw-bold mb-4">✏️ Editar perfil</h2>

    <form action="<?= $base ?>/index.php?url=empleado/actualizar" method="post" enctype="multipart/form-data"
        id="formEmpleado">

        <div class="text-center mb-4">
            <img src="<?= !empty($empleado['foto']) 
                ? '/TrabajoFinal/incregymMVC/uploads/empleados/' . $empleado['foto'] 
                : $base . '/assets/img/default-user.png' ?>" class="perfil-foto">
        </div>

        <div class="mb-3">
            <label class="form-label">Cambiar foto</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre *</label>
            <input type="text" name="nombre" class="form-control" value="<?= $empleado['nombre'] ?>" required>
            <span class="error-msg">Introduce un nombre válido</span>
        </div>

        <div class="mb-3">
            <label class="form-label">Apellidos *</label>
            <input type="text" name="apellido" class="form-control" value="<?= $empleado['apellido'] ?>" required>
            <span class="error-msg">Introduce apellidos válidos</span>
        </div>

        <div class="mb-3">
            <label class="form-label">DNI *</label>
            <input type="text" name="dni" class="form-control" value="<?= $empleado['dni'] ?>" required>
            <span class="error-msg">Formato válido: 12345678A / X1234567A</span>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text" name="telefono" class="form-control" value="<?= $empleado['telefono'] ?>" required>
            <span class="error-msg">Debe ser un número de 9 cifras</span>
        </div>

        <div class="mb-3">
            <label class="form-label">Email *</label>
            <input type="email" name="email" class="form-control" value="<?= $empleado['email'] ?>" required>
            <span class="error-msg">Introduce un email válido</span>
        </div>

        <button class="btn-incre-primary mt-3">Guardar cambios</button>
        <a href="<?= $base ?>/index.php?url=empleado/perfil" class="btn-incre-back mt-3">Cancelar</a>

    </form>
</div>