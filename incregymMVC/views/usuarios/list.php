<?php
// ICONOS POR OBJETIVO
$iconosObjetivos = [
    "Mr Increíble: Hipertrofia / Aumento de masa muscular" => "💪",
    "Frozono: Tonificación" => "❄️",
    "Dash: Atletas (pliometría, potencia)" => "⚡",
    "Elastic Girl: Pérdida de grasa + Flexibilidad" => "🔥",
    "Violeta: Adolescentes principiantes" => "🌸",
    "Jack Jack: HYROX / CROSSFIT / IRONMAN" => "🏋️‍♂️",
    "Edna Moda: Recuperación funcional / +65" => "🧓"
];
?>

<div class="card p-4">
    <h3 class="fw-bold mb-3">👥 Usuarios</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Objetivo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($usuarios as $u): ?>

            <?php 
                // Buscar icono
                $icono = $iconosObjetivos[$u['objetivo']] ?? "🎯";
            ?>

            <tr>
                <td><?= $u['nombre'] ?></td>
                <td><?= $u['apellidos'] ?></td>

                <td>
                    <?= $icono ?>
                    <strong><?= $u['objetivo'] ?></strong>
                </td>

                <td>
                    <a href="<?= $base ?>/index.php?url=usuarios/show&id=<?= $u['id'] ?>"
                        class="btn btn-info btn-sm">Ver</a>

                    <a href="<?= $base ?>/index.php?url=usuarios/edit&id=<?= $u['id'] ?>"
                        class="btn btn-warning btn-sm">Editar</a>

                    <a href="<?= $base ?>/index.php?url=usuarios/delete&id=<?= $u['id'] ?>"
                        class="btn btn-danger btn-sm btn-borrar">Borrar</a>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>