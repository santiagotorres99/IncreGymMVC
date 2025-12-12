<div class="card p-4 shadow-sm">

    <h2 class="fw-bold mb-3">👤 Perfil del empleado</h2>

    <div class="text-center mb-4">
        <?php if (!empty($empleado['foto'])): ?>
        <img src="/TrabajoFinal/incregymMVC/uploads/empleados/<?= $empleado['foto'] ?>" class="perfil-foto">
        <?php else: ?>
        <img src="/TrabajoFinal/incregymMVC/assets/img/default-user.png" class="perfil-foto">
        <?php endif; ?>
    </div>

    <p><strong>Nombre:</strong> <?= htmlspecialchars($empleado['nombre']) ?></p>
    <p><strong>Apellidos:</strong> <?= htmlspecialchars($empleado['apellido']) ?></p>
    <p><strong>DNI:</strong> <?= htmlspecialchars($empleado['dni']) ?></p>
    <p><strong>Teléfono:</strong> <?= htmlspecialchars($empleado['telefono']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($empleado['email']) ?></p>
    <p><strong>Usuario:</strong> <?= htmlspecialchars($empleado['usuario']) ?></p>
    <p><strong>Rol:</strong> <?= htmlspecialchars($empleado['rol']) ?></p>

    <div class="mt-4 d-flex gap-3">
        <a href="<?= $base ?>/index.php?url=empleado/cambiarFoto" class="btn-incre-edit">Cambiar foto</a>
        <a href="<?= $base ?>/index.php?url=empleado/editar" class="btn-incre-primary">Editar perfil</a>
    </div>

</div>