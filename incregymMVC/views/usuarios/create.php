<div class="card p-4">
    <h3 class="fw-bold mb-3">Crear usuario</h3>

    <form id="formUsuario" action="<?= $base ?>/index.php?url=usuarios/store" method="POST" novalidate>

        <!-- NOMBRE -->
        <label>Nombre *</label>
        <input type="text" name="nombre" id="nombre" class="form-control" maxlength="20">
        <div class="error-msg" id="error-nombre"></div>

        <!-- APELLIDOS -->
        <label class="mt-2">Apellidos *</label>
        <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="50">
        <div class="error-msg" id="error-apellidos"></div>

        <!-- DNI -->
        <label class="mt-2">DNI / NIE *</label>
        <input type="text" name="dni" id="dni" class="form-control" maxlength="9">
        <div class="error-msg" id="error-dni"></div>

        <!-- EDAD -->
        <label class="mt-2">Edad *</label>
        <input type="number" name="edad" id="edad" class="form-control">
        <div class="error-msg" id="error-edad"></div>

        <!-- OBJETIVO -->
        <label class="mt-2">Objetivo *</label>
        <select name="objetivo" id="objetivo" class="form-control">
            <option value="">-- Seleccione su SuperHéroe --</option>

            <?php foreach ($objetivos as $label): ?>
            <option value="<?= $label ?>" <?= isset($usuario) && $usuario['objetivo'] === $label ? 'selected' : '' ?>>
                <?= $label ?>
            </option>
            <?php endforeach; ?>
        </select>

        <div class="error-msg" id="error-objetivo"></div>

        <!-- EMAIL -->
        <label class="mt-2">Correo electrónico *</label>
        <input type="email" name="email" id="email" class="form-control">
        <div class="error-msg" id="error-email"></div>

        <!-- PATOLOGÍAS -->
        <label class="mt-2">Patologías / lesiones</label>
        <textarea name="patologias" id="patologias" class="form-control" maxlength="200" rows="3"></textarea>
        <div class="error-msg" id="error-patologias"></div>

        <!-- BOTONES -->
        <div class="mt-3 d-flex gap-2">
            <a href="<?= $base ?>/index.php?url=usuarios" class="btn btn-secondary">Atrás</a>
            <button class="btn btn-success">Guardar usuario</button>
        </div>
    </form>
</div>