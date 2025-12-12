<div class="card p-4">
    <h3 class="fw-bold mb-3">Editar usuario</h3>

    <!-- ========================================================= -->
    <!-- 📌 FORMULARIO PARA EDITAR DATOS DEL USUARIO -->
    <!-- ========================================================= -->

    <form id="formUsuario" action="<?= $base ?>/index.php?url=usuarios/update" method="POST" novalidate>

        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <!-- NOMBRE -->
        <label>Nombre *</label>
        <input type="text" name="nombre" id="nombre" class="form-control"
            value="<?= htmlspecialchars($usuario['nombre']) ?>" maxlength="20">
        <div class="error-msg" id="error-nombre"></div>

        <!-- APELLIDOS -->
        <label class="mt-2">Apellidos *</label>
        <input type="text" name="apellidos" id="apellidos" class="form-control"
            value="<?= htmlspecialchars($usuario['apellidos']) ?>" maxlength="50">
        <div class="error-msg" id="error-apellidos"></div>

        <!-- DNI -->
        <label class="mt-2">DNI / NIE *</label>
        <input type="text" name="dni" id="dni" class="form-control" value="<?= htmlspecialchars($usuario['dni']) ?>"
            maxlength="9">
        <div class="error-msg" id="error-dni"></div>

        <!-- EDAD -->
        <label class="mt-2">Edad *</label>
        <input type="number" name="edad" id="edad" class="form-control"
            value="<?= htmlspecialchars($usuario['edad']) ?>">
        <div class="error-msg" id="error-edad"></div>

        <!-- OBJETIVO -->
        <label class="mt-2">Objetivo *</label>
        <select name="objetivo" id="objetivo" class="form-control">
            <option value="">-- Seleccione su SuperHéroe --</option>

            <?php foreach ($objetivos as $label): ?>
            <option value="<?= $label ?>" <?= $usuario['objetivo'] === $label ? 'selected' : '' ?>>
                <?= $label ?>
            </option>
            <?php endforeach; ?>
        </select>
        <div class="error-msg" id="error-objetivo"></div>

        <!-- EMAIL -->
        <label class="mt-2">Correo electrónico *</label>
        <input type="email" name="email" id="email" class="form-control"
            value="<?= htmlspecialchars($usuario['email']) ?>">
        <div class="error-msg" id="error-email"></div>

        <!-- PATOLOGÍAS -->
        <label class="mt-2">Patologías / lesiones</label>
        <textarea name="patologias" id="patologias" class="form-control" maxlength="200"
            rows="3"><?= htmlspecialchars($usuario['patologias']) ?></textarea>
        <div class="error-msg" id="error-patologias"></div>

        <!-- BOTONES -->
        <div class="mt-3 d-flex gap-2">
            <button class="btn btn-primary">Actualizar usuario</button>
            <button type="button" id="btnAtras" class="btn btn-danger">Atrás</button>

        </div>
    </form>


    <!-- ========================================================= -->
    <!-- 🏋️ RUTINA ASIGNADA (SI EXISTE) -->
    <!-- ========================================================= -->
    <hr class="my-4">

    <h4 class="fw-bold">🏋️ Rutina asignada</h4>

    <?php if ($rutinaActual): ?>
    <div class="p-3 mb-3 bg-light border rounded">

        <p class="mb-1">
            <strong>Rutina actual:</strong>
            <?= htmlspecialchars($rutinaActual['nombre']) ?>
        </p>

        <a href="<?= $base ?>/index.php?url=rutinas/show&id=<?= $rutinaActual['id'] ?>"
            class="btn btn-info btn-sm me-2">
            👀 Ver rutina
        </a>

        <!-- Quitar rutina -->
        <a href="<?= $base ?>/index.php?url=usuarios/quitarRutina&id=<?= $usuario['id'] ?>"
            class="btn btn-danger btn-sm">
            ❌ Quitar rutina
        </a>
    </div>

    <?php else: ?>
    <p class="text-muted">Este usuario aún no tiene una rutina asignada.</p>
    <?php endif; ?>


    <!-- ========================================================= -->
    <!-- 📌 ASIGNAR O CAMBIAR RUTINA -->
    <!-- ========================================================= -->

    <form action="<?= $base ?>/index.php?url=usuarios/asignarRutinaStore" method="POST" class="mt-3">

        <input type="hidden" name="usuario_id" value="<?= $usuario['id'] ?>">

        <label class="form-label fw-bold">Asignar o cambiar rutina</label>
        <select name="rutina_id" class="form-select" required>
            <option value="">-- Seleccione una rutina --</option>

            <?php foreach ($rutinas as $r): ?>
            <option value="<?= $r['id'] ?>">
                <?= htmlspecialchars($r['nombre']) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <button class="btn btn-primary mt-2">Guardar rutina</button>
    </form>
</div>