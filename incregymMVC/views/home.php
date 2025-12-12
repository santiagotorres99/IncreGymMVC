<div class="card p-4">

    <h2 class="fw-bold mb-3">Bienvenido, <?= htmlspecialchars($_SESSION['empleado']['nombre']) ?>!</h2>

    <p>Estas son tus actividades para hoy:</p>

    <?php if (empty($clasesHoy)): ?>
    <p class="text-muted">Hoy no tienes clases programadas.</p>
    <?php else: ?>

    <table class="table tabla-home">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Actividad</th>
                <th>Duración</th>
                <th>Apuntados</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($clasesHoy as $c): ?>

            <?php 
            $estadoClass = match ($c['estado']) {
                'realizada' => 'fila-realizada',
                'cancelada' => 'fila-cancelada',
                default     => 'fila-pendiente',
            };

            $icono = match ($c['estado']) {
                'realizada' => '✔️',
                'cancelada' => '❌',
                default     => '⏳'
            };
        ?>

            <tr class="<?= $estadoClass ?>">
                <td class="col-hora"><?= substr($c['hora'], 0, 5) ?></td>

                <td class="col-actividad"><?= htmlspecialchars($c['actividad']) ?></td>

                <td><?= $c['duracion_min'] ?> min</td>

                <td><?= $c['apuntados'] ?></td>

                <td class="col-estado"><?= $icono . " " . $c['estado'] ?></td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

    <?php endif; ?>
</div>