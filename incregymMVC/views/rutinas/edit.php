<div class="card p-4">

    <h3 class="fw-bold mb-3">✏️ Editar rutina: <?= $rutina['nombre'] ?></h3>

    <!-- FORMULARIO PRINCIPAL (editar rutina + ejercicios) -->
    <form action="<?= $base ?>/index.php?url=rutinas/update" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $rutina['id'] ?>">

        <!-- Nombre -->
        <label class="mt-2"><strong>Nombre de la rutina *</strong></label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($rutina['nombre']) ?>" class="form-control mb-2">

        <!-- Objetivo -->
        <div class="mb-3">
            <label class="form-label"><strong>Objetivo *</strong></label>
            <select name="objetivo" class="form-select" required>
                <?php foreach ($objetivos as $obj): ?>
                <option value="<?= $obj ?>" <?= ($rutina['objetivo'] === $obj) ? 'selected' : '' ?>>
                    <?= $obj ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <h5 class="fw-bold mt-4">🏋️ Ejercicios de esta rutina</h5>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Ejercicio</th>
                    <th>Series</th>
                    <th>Descanso</th>
                    <th>Imagen</th>
                    <th>Video</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($ejercicios as $e): ?>
                <tr>
                    <!-- Nombre -->
                    <td>
                        <input type="text" name="ejercicio_nombre[<?= $e['id'] ?>]"
                            value="<?= htmlspecialchars($e['nombre']) ?>" class="form-control">
                    </td>

                    <!-- Series -->
                    <td>
                        <input type="text" name="ejercicio_series[<?= $e['id'] ?>]" value="<?= $e['series'] ?>"
                            class="form-control">
                    </td>

                    <!-- Descanso -->
                    <td>
                        <input type="text" name="ejercicio_descanso[<?= $e['id'] ?>]" value="<?= $e['descanso'] ?>"
                            class="form-control">
                    </td>

                    <!-- Imagen -->
                    <td style="width:220px;">

                        <!-- Vista previa si existe imagen -->
                        <?php  
                            $img = $e['imagen'];

                            if (!empty($img)) {

                                // Si es URL externa (http o https)
                                if (preg_match('/^https?:\/\//', $img)) {
                                    $ruta = $img;

                                // Si es imagen local subida por ti
                                } else {
                                    $ruta = "/Torres_SantiagoEzequiel_27/incregymMVC/" . $img;
                                }
                            ?>
                        <img src="<?= $ruta ?>"
                            style="width:100%; height:90px; object-fit:cover; border-radius:6px; margin-bottom:6px;">
                        <?php } ?>

                        <!-- Mantener imagen actual -->
                        <input type="hidden" name="ejercicio_imagen_actual[<?= $e['id'] ?>]"
                            value="<?= $e['imagen'] ?>">

                        <!-- Subir nueva imagen -->
                        <input type="file" name="ejercicio_imagen[<?= $e['id'] ?>]" class="form-control">
                    </td>

                    <!-- Video -->
                    <td>
                        <a href="<?= $e['video'] ?>" target="_blank" class="btn btn-info btn-sm w-100">
                            Ver video
                        </a>
                    </td>

                    <!-- Eliminar -->
                    <td class="text-center">
                        <input type="checkbox" name="eliminar[]" value="<?= $e['id'] ?>">
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button class="btn btn-primary mt-3 w-100">Guardar cambios</button>
    </form>

    <hr class="my-4">

    <!-- AÑADIR NUEVO EJERCICIO -->
    <h5 class="fw-bold">➕ Añadir nuevo ejercicio</h5>

    <form action="<?= $base ?>/index.php?url=rutinas/addExercise" method="POST" enctype="multipart/form-data"
        class="mt-3">

        <input type="hidden" name="rutina_id" value="<?= $rutina['id'] ?>">

        <div class="row">
            <div class="col-md-3">
                <label>Nombre *</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="col-md-2">
                <label>Series *</label>
                <input type="text" name="series" class="form-control" required>
            </div>

            <div class="col-md-2">
                <label>Descanso *</label>
                <input type="text" name="descanso" class="form-control" required>
            </div>

            <div class="col-md-2">
                <label>Imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>

            <div class="col-md-3">
                <label>Video (URL)</label>
                <input type="text" name="video" class="form-control">
            </div>
        </div>

        <button class="btn btn-primary mt-3 w-100">Añadir ejercicio</button>
    </form>

</div>