<?php

class EmpleadoController
{
    /* ==========================================================
       PERFIL DEL EMPLEADO
    ========================================================== */
    public function perfil()
    {
        $id = $_SESSION['empleado']['id'];

        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id=?");
        $stmt->execute([$id]);
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

        $title = "Perfil del empleado";
        $view = __DIR__ . '/../views/empleado/perfil.php';
        include __DIR__ . '/../views/layout.php';
    }

    /* ==========================================================
       FORMULARIO EDITAR
    ========================================================== */
    public function editar()
    {
        $id = $_SESSION['empleado']['id'];

        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id=?");
        $stmt->execute([$id]);
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

        $title = "Editar perfil";
        $view = __DIR__ . '/../views/empleado/editar.php';
        include __DIR__ . '/../views/layout.php';
    }

    /* ==========================================================
       ACTUALIZAR DATOS + FOTO (desde editar perfil)
    ========================================================== */
    public function actualizar()
    {
        $id = $_SESSION['empleado']['id'];

        $nombre   = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $dni      = trim($_POST['dni']);
        $telefono = trim($_POST['telefono']);
        $email    = trim($_POST['email']);

        if (!$nombre || !$apellido || !$dni || !$telefono || !$email) {
            die("Todos los campos son obligatorios.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Email inválido.");
        }

        // DNI o NIE
        if (
            !preg_match("/^[0-9]{8}[A-Za-z]$/", $dni) &&
            !preg_match("/^[XYZxyz][0-9]{7}[A-Za-z]$/", $dni)
        ) {
            die("DNI/NIE incorrecto. Formato inválido.Ej: 12345678A o Y1234567Q");
        }

        if (!preg_match("/^[0-9]{9}$/", $telefono)) {
            die("Teléfono inválido.");
        }

        $pdo = Database::connect();

        /* ============================
           FOTO (opcional)
        ============================= */
        $stmtActual = $pdo->prepare("SELECT foto FROM empleados WHERE id=?");
        $stmtActual->execute([$id]);
        $empleadoActual = $stmtActual->fetch(PDO::FETCH_ASSOC);
        $fotoActual = $empleadoActual['foto'];

        $fotoFinal = $fotoActual;

        if (!empty($_FILES['foto']['name'])) {
            $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nombreArchivo = "empleado_" . $id . "." . $extension;

            $uploadDir = __DIR__ . '/../uploads/empleados/';
            $uploadPath = $uploadDir . $nombreArchivo;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadPath)) {
                $fotoFinal = $nombreArchivo;
                $_SESSION['empleado']['foto'] = $nombreArchivo;
            }
        }

        // Guardar cambios
        $stmt = $pdo->prepare("
            UPDATE empleados
            SET nombre=?, apellido=?, dni=?, telefono=?, email=?, foto=?
            WHERE id=?
        ");

        $stmt->execute([$nombre, $apellido, $dni, $telefono, $email, $fotoFinal, $id]);

        // Actualizar sesión
        $_SESSION['empleado']['nombre'] = $nombre;
        $_SESSION['empleado']['apellido'] = $apellido;
        $_SESSION['empleado']['email'] = $email;

        header("Location: index.php?url=empleado/perfil");
        exit;
    }

    /* ==========================================================
       VISTA CAMBIAR FOTO
    ========================================================== */
    public function cambiarFoto()
    {
        $id = $_SESSION['empleado']['id'];

        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id=?");
        $stmt->execute([$id]);
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

        $title = "Cambiar foto";
        $view = __DIR__ . '/../views/empleado/cambiarFoto.php';
        include __DIR__ . '/../views/layout.php';
    }

    /* ==========================================================
       SUBIR NUEVA FOTO (solo foto)
    ========================================================== */
    public function subirFoto()
    {
        $id = $_SESSION['empleado']['id'];

        if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== 0) {
            die("No se subió ninguna foto.");
        }

        $archivo = $_FILES['foto'];
        $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'webp'];

        if (!in_array($extension, $permitidas)) {
            die("Formato no permitido.");
        }

        $nombreFinal = "empleado_" . $id . "." . $extension;

        $uploadDir = __DIR__ . '/../uploads/empleados/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadPath = $uploadDir . $nombreFinal;

        move_uploaded_file($archivo['tmp_name'], $uploadPath);

        // Guardar en BD
        $pdo = Database::connect();
        $stmt = $pdo->prepare("UPDATE empleados SET foto=? WHERE id=?");
        $stmt->execute([$nombreFinal, $id]);

        // Actualizar sesión
        $_SESSION['empleado']['foto'] = $nombreFinal;

        header("Location: index.php?url=empleado/perfil");
        exit;
    }
}