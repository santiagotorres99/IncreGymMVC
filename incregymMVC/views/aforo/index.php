<?php
// Límites de aforo por zona
$MAX_CARDIO = 25;
$MAX_MAQ    = 35;
$MAX_PESO   = 40;
?>

<div class="card p-4 shadow-sm aforo-card">

    <div class="mb-3">
        <h2 class="fw-bold mb-3">👥 Aforo por zonas</h2>

        <!-- Selector de fecha -->
        <form method="get" class="d-flex align-items-center gap-2 mt-2">
            <input type="hidden" name="url" value="aforo/index">
            <label class="form-label mb-0">Fecha:</label>
            <input type="date" name="fecha" class="form-control" style="width: 170px;"
                value="<?= htmlspecialchars($fecha) ?>">
            <button class="btn btn-primary btn-sm">Ir</button>
        </form>
    </div>

    <p class="text-muted mb-3">
        Rellenar el aforo manual de cada zona por cada hora. Si se supera el máximo, el campo se marcará en rojo y
        verás
        un ⚠.
    </p>

    <form method="post" action="<?= $base ?>/index.php?url=aforo/guardar" id="formAforo">
        <input type="hidden" name="fecha" value="<?= htmlspecialchars($fecha) ?>">

        <div class="table-responsive">
            <table class="table aforo-table align-middle">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Zona cardio<br><small>Máx <?= $MAX_CARDIO ?></small></th>
                        <th>Zona máquinas<br><small>Máx <?= $MAX_MAQ ?></small></th>
                        <th>Peso libre<br><small>Máx <?= $MAX_PESO ?></small></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($horas as $hora): 
        $row = $datos[$hora] ?? null;
        $valorCardio = $row['zona_cardio']      ?? '';
        $valorMaq    = $row['zona_maquinas']    ?? '';
        $valorPeso   = $row['zona_peso_libre']  ?? '';
    ?>
                    <tr>
                        <td class="fw-bold"><?= $hora ?></td>

                        <!-- Zona cardio -->
                        <td>
                            <div class="aforo-cell">
                                <input type="number" class="form-control aforo-input" name="cardio[<?= $hora ?>]"
                                    value="<?= htmlspecialchars($valorCardio) ?>" min="0" data-max="<?= $MAX_CARDIO ?>">

                                <span class="aforo-warning d-none" data-tooltip="Aforo máximo superado">⚠</span>
                            </div>
                        </td>

                        <!-- Zona máquinas -->
                        <td>
                            <div class="aforo-cell">
                                <input type="number" class="form-control aforo-input" name="maquinas[<?= $hora ?>]"
                                    value="<?= htmlspecialchars($valorMaq) ?>" min="0" data-max="<?= $MAX_MAQ ?>">

                                <span class="aforo-warning d-none" data-tooltip="Aforo máximo superado">⚠</span>
                            </div>
                        </td>

                        <!-- Zona peso libre -->
                        <td>
                            <div class="aforo-cell">
                                <input type="number" class="form-control aforo-input" name="peso[<?= $hora ?>]"
                                    value="<?= htmlspecialchars($valorPeso) ?>" min="0" data-max="<?= $MAX_PESO ?>">

                                <span class="aforo-warning d-none" data-tooltip="Aforo máximo superado">⚠</span>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-3 d-flex gap-2">
            <button class="btn btn-primary">Guardar cambios</button>
            <a href="<?= $base ?>/index.php?url=home/index" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>