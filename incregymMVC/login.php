<?php
session_start();

require_once __DIR__ . "/config/Database.php";
require_once __DIR__ . "/models/Empleado.php";

// Si ya hay sesión iniciada → entrar directo a index
if (isset($_SESSION['empleado'])) {
    header("Location: index.php");
    exit;
}

$error = "";

// ---------- LOGIN ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = trim($_POST['usuario'] ?? "");
    $password = trim($_POST['password'] ?? "");

    $pdo = Database::connect();

    // Buscar empleado por usuario
    $empleado = Empleado::findByUsuario($pdo, $usuario);

    if ($empleado && password_verify($password, $empleado['password'])) {

        // Guardar datos del empleado en sesión
        $_SESSION['empleado'] = [
            "id"       => $empleado['id'],
            "nombre"   => $empleado['nombre'],
            "apellido" => $empleado['apellido'],
            "usuario"  => $empleado['usuario'],
            "rol"      => $empleado['rol']
        ];

        /* ======================================================
           💾 RECORDAR USUARIO (COOKIE 30 DÍAS)
        ====================================================== */
        if (isset($_POST['recordarme'])) {
            setcookie("usuario_recordado", $usuario, time() + (30*24*60*60), "/");
        } else {
            setcookie("usuario_recordado", "", time() - 3600, "/");
        }

        header("Location: index.php");
        exit;

    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - The IncreGym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/login.js" defer></script>
</head>

<body class="login-bg">

    <div class="login-card text-center p-4">

        <!-- LOGO -->
        <img src="assets/img/logo.png" class="logo-login mb-3" alt="Logo IncreGym">

        <h2 class="login-title">
            <span class="white">Bienvenido a </span><span class="yellow">IncreGym</span>
        </h2>

        <?php if ($error): ?>
        <div class="alert alert-danger py-1"><?= $error ?></div>
        <?php endif; ?>

        <form method="post" class="mt-3">

            <!-- Usuario -->
            <input type="text" name="usuario" placeholder="Usuario" class="form-control mb-3"
                value="<?= isset($_COOKIE['usuario_recordado']) ? htmlspecialchars($_COOKIE['usuario_recordado']) : '' ?>"
                required>

            <!-- Contraseña + ojo -->
            <div class="input-wrapper">
                <input type="password" id="password" name="password" class="form-control login-input"
                    placeholder="Contraseña" required>

                <span class="toggle-password" onclick="togglePassword()">👁️</span>
            </div>

            <!-- Recordarme -->
            <div class="form-check text-start mt-2">
                <input class="form-check-input" type="checkbox" id="recordarme" name="recordarme"
                    <?= isset($_COOKIE['usuario_recordado']) ? 'checked' : '' ?>>
                <label class="form-check-label text-white" for="recordarme">
                    Recordarme
                </label>
            </div>

            <button class="btn btn-warning w-100 fw-bold mt-3">Iniciar sesión</button>
        </form>

    </div>

</body>

</html>