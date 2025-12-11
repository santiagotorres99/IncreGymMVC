<div class="container mt-3">

    <h2 class="titulo-seccion">
        📅 Clases del día
    </h2>

    <!-- Selector de fecha -->
    <form method="GET" action="index.php" class="d-flex align-items-center gap-2 mb-4">
        <input type="hidden" name="url" value="horario/index">

        <label for="fecha" class="fw-bold">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?= $fecha ?>" class="form-control w-auto">

        <button class="btn btn-warning">Ir</button>
    </form>

    <?php if (empty($clases)): ?>
    <div class="alert alert-info">
        Hoy no hay clases programadas.
    </div>
    <?php else: ?>

    <div class="listado-clases-dia">

        <?php foreach ($clases as $c): ?>

        <?php
            $estadoClass = match ($c['estado']) {
                'realizada' => 'estado-realizada',
                'cancelada' => 'estado-cancelada',
                default     => 'estado-pendiente',
            };
        ?>

        <div class="clase-dia-item <?= $estadoClass ?>">

            <div class="clase-dia-hora">
                <?= substr($c['hora'], 0, 5) ?>
            </div>

            <div class="flex-grow-1 px-3">

                <div class="clase-dia-nombre">
                    <?= htmlspecialchars($c['actividad']) ?>
                </div>

                <div class="clase-dia-prof">
                    <?= htmlspecialchars($c['empleado_nombre'] . " " . $c['empleado_apellido']) ?>
                </div>

                <span class="clase-dia-duracion">
                    <?= $c['duracion_min'] ?> min
                </span>
            </div>

            <!-- ICONO -->
            <span class="estado-icon">
                <?php if ($c['estado'] === 'realizada'): ?>
                ✔️
                <?php elseif ($c['estado'] === 'cancelada'): ?>
                ❌
                <?php else: ?>
                ⏳
                <?php endif; ?>
            </span>

            <!-- PANEL DERECHA -->
            <div class="clase-dia-panel text-end">

                <form action="index.php?url=horario/updateClase" method="POST">
                    <input type="hidden" name="id" value="<?= $c['id'] ?>">
                    <input type="hidden" name="return" value="dia">

                    <!-- Apuntados -->
                    <input type="number" min="0" max="<?= $c['aforo_max'] ?>" name="apuntados"
                        value="<?= $c['apuntados'] ?>" class="form-control apuntados-input">
                    <small style="color: #FFD000;">Máx: <?= $c['aforo_max'] ?></small>

                    <!-- Estado -->
                    <select name="estado" class="form-select estado-select mt-2">
                        <option value="pendiente" <?= $c['estado']=='pendiente'?'selected':'' ?>>Pendiente</option>
                        <option value="realizada" <?= $c['estado']=='realizada'?'selected':'' ?>>Realizada</option>
                        <option value="cancelada" <?= $c['estado']=='cancelada'?'selected':'' ?>>Cancelada</option>
                    </select>

                    <button class="btn btn-warning btn-sm mt-2 w-100">Guardar</button>
                </form>

            </div>

        </div>
        <?php endforeach; ?>
    </div>

    <?php endif; ?>

</div>