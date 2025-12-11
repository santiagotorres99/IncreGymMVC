<div class="container mt-3">

    <h2 class="titulo-seccion">
        📅 Calendario semanal
    </h2>

    <div class="calendario-wrapper">

        <table class="table tabla-semanal">
            <thead>
                <tr>
                    <th>Hora</th>
                    <?php foreach ($diasSemana as $dia): ?>
                    <th><?= ucfirst($dia) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($horas as $hora): ?>
                <tr>
                    <!-- Columna de la hora -->
                    <td class="fw-bold align-middle">
                        <?= $hora ?>
                    </td>

                    <!-- Columnas por día -->
                    <?php foreach ($diasSemana as $dia): ?>
                    <td>
                        <?php if (!empty($grid[$hora][$dia])): ?>
                        <?php foreach ($grid[$hora][$dia] as $clase): ?>
                        <div class="clase-item">

                            <div class="clase-nombre">
                                <?= htmlspecialchars($clase['actividad']) ?>
                            </div>

                            <div class="clase-prof">
                                <?= htmlspecialchars($clase['nombre_empleado'] . ' ' . $clase['apellido_empleado']) ?>
                            </div>

                            <!-- FORMULARIO -->
                            <form action="index.php?url=horario/updateClase" method="POST">
                                <input type="hidden" name="id" value="<?= $clase['id'] ?>">

                                <!-- Apuntados -->
                                <input type="number" min="0" max="<?= (int)$clase['aforo_max'] ?>" name="apuntados"
                                    value="<?= htmlspecialchars($clase['apuntados']) ?>"
                                    class="form-control apuntados-input">
                                <small style="color:#FFD000;">
                                    Máx: <?= (int)$clase['aforo_max'] ?>
                                </small>

                                <!-- Estado -->
                                <select name="estado" class="form-select estado-select mt-2">
                                    <option value="pendiente" <?= $clase['estado']=='pendiente'?'selected':'' ?>>
                                        Pendiente</option>
                                    <option value="realizada" <?= $clase['estado']=='realizada'?'selected':'' ?>>
                                        Realizada</option>
                                    <option value="cancelada" <?= $clase['estado']=='cancelada'?'selected':'' ?>>
                                        Cancelada</option>
                                </select>

                                <button class="btn btn-warning btn-sm mt-2 w-100">
                                    Guardar
                                </button>
                            </form>

                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>