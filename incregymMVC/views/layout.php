<?php 
// Ruta base del proyecto
$base = "/Torres_SantiagoEzequiel_27/incregymMVC";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'IncreGym' ?></title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- CSS PRINCIPAL -->
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">

    <!-- JS -->
    <script>
    const baseUrl = "<?= $base ?>";
    </script>

    <script src="<?= $base ?>/assets/js/menu.js" defer></script>
    <script src="<?= $base ?>/assets/js/login.js" defer></script>
    <script src="<?= $base ?>/assets/js/menuUsuario.js" defer></script>
    <script src="<?= $base ?>/assets/js/validacionUsuario.js" defer></script>
    <script src="<?= $base ?>/assets/js/validacionEmpleado.js" defer></script>
    <script src="<?= $base ?>/assets/js/rutinaAuto.js" defer></script>
    <script src="<?= $base ?>/assets/js/asignarRutina.js" defer></script>
    <script src="<?= $base ?>/assets/js/logout.js" defer></script>
    <script src="<?= $base ?>/assets/js/rutinas.js" defer></script>
    <script src="<?= $base ?>/assets/js/rutinaPreview.js" defer></script>
    <script src="<?= $base ?>/assets/js/aforo.js" defer></script>
</head>

<body>

    <!-- BLOQUE DE EMPLEADO ARRIBA A LA DERECHA -->
    <?php if (isset($_SESSION['empleado'])): ?>
    <div class="usuario-top" onclick="toggleMenuUsuario()">
        <span class="usuario-nombre">
            <?= $_SESSION['empleado']['nombre'] . " " . $_SESSION['empleado']['apellido'] ?>
        </span>
        <span class="flecha">▼</span>

        <!-- MENÚ DESPLEGABLE -->
        <div class="menu-usuario" id="menuUsuario">
            <a href="<?= $base ?>/index.php?url=empleado/perfil">👤 Ver perfil</a>
            <a href="<?= $base ?>/logout.php">🚪 Cerrar sesión</a>
        </div>
    </div>
    <?php endif; ?>

    <div class="d-flex">

        <!-- SIDEBAR -->
        <div class="sidebar">

            <a href="<?= $base ?>/index.php?url=home/index">
                <img src="<?= $base ?>/assets/img/logo.png" class="logo-sidebar" />
            </a>

            <!-- INICIO -->
            <a href="<?= $base ?>/index.php?url=home/index" class="item inicio">🏠 Inicio</a>

            <!-- USUARIOS -->
            <div class="item group">
                <button class="group-btn">👥 Usuarios</button>

                <div class="submenu">
                    <a href="<?= $base ?>/index.php?url=usuarios/create">➕ Crear</a>
                    <a href="<?= $base ?>/index.php?url=usuarios">✏️ Editar</a>
                </div>
            </div>

            <!-- RUTINAS -->
            <div class="item group">
                <button class="group-btn">💪 Rutinas</button>

                <div class="submenu">
                    <a href="<?= $base ?>/index.php?url=rutinas/create">➕ Crear</a>
                    <a href="<?= $base ?>/index.php?url=rutinas">✏️ Editar</a>
                </div>
            </div>

            <!-- HORARIOS -->
            <div class="item group">
                <button class="group-btn">🕒 Horarios</button>

                <div class="submenu">
                    <a href="<?= $base ?>/index.php?url=horario/index">📅 Día</a>
                    <a href="<?= $base ?>/index.php?url=horario/semana">📆 Semana</a>
                </div>
            </div>

            <!-- AFORO -->
            <a class="item" href="<?= $base ?>/index.php?url=aforo">👥 Aforo</a>

        </div>

        <!-- CONTENIDO PRINCIPAL -->
        <main class=" flex-fill p-4">
            <?php include $view; ?>
        </main>

    </div>

</body>

</html>