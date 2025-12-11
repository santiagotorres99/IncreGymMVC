<div class="card p-4">

    <h2 class="fw-bold mb-3">Bienvenido, <?= htmlspecialchars($_SESSION['empleado']['nombre']) ?>!</h2>

    <p>Estas son tus actividades para hoy:</p>

    <?php if (empty($clasesHoy)): ?>
    <p class="text-muted">Hoy no tienes clases programadas.</p>
    <?php else: ?>
    <table class="table agenda-dia-table mt-3">
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
            <tr>
                <td><?= substr($c['hora'],0,5) ?></td>
                <td><?= htmlspecialchars($c['actividad']) ?></td>
                <td><?= (int)$c['duracion_min'] ?> min</td>
                <td><?= (int)$c['apuntados'] ?></td>
                <td><?= htmlspecialchars($c['estado']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>