<?php

class AforoController
{
    /* ==========================================
       Mostrar aforo de una fecha (por defecto hoy)
    ========================================== */
    public function index()
    {
        $pdo = Database::connect();

        $fecha = $_GET['fecha'] ?? date('Y-m-d');

        // Horas de 08:00 a 23:00
        $horas = [];
        for ($h = 8; $h <= 23; $h++) {
            $horas[] = sprintf('%02d:00', $h);
        }

        // Cargar registros de esa fecha
        $stmt = $pdo->prepare("SELECT * FROM aforo WHERE fecha = ?");
        $stmt->execute([$fecha]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $datos = [];
        foreach ($rows as $row) {
            $datos[$row['hora']] = $row;
        }

        $title = "Aforo";
        $view  = __DIR__ . '/../views/aforo/index.php';

        include __DIR__ . '/../views/layout.php';
    }

    /* ==========================================
       Guardar aforo de una fecha
    ========================================== */
    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?url=aforo/index");
            exit;
        }

        $fecha    = $_POST['fecha'] ?? date('Y-m-d');
        $cardio   = $_POST['cardio']   ?? [];
        $maquinas = $_POST['maquinas'] ?? [];
        $peso     = $_POST['peso']     ?? [];

        $pdo = Database::connect();

        // Borrar registros anteriores de esa fecha
        $del = $pdo->prepare("DELETE FROM aforo WHERE fecha = ?");
        $del->execute([$fecha]);

        $empleadoId = $_SESSION['empleado']['id'] ?? null;

        $ins = $pdo->prepare("
            INSERT INTO aforo (fecha, hora, zona_cardio, zona_maquinas, zona_peso_libre, empleado_id)
            VALUES (?,?,?,?,?,?)
        ");

        for ($h = 8; $h <= 23; $h++) {
            $hora = sprintf('%02d:00', $h);

            $vCardio   = isset($cardio[$hora])   && $cardio[$hora]   !== '' ? (int)$cardio[$hora]   : 0;
            $vMaquinas = isset($maquinas[$hora]) && $maquinas[$hora] !== '' ? (int)$maquinas[$hora] : 0;
            $vPeso     = isset($peso[$hora])     && $peso[$hora]     !== '' ? (int)$peso[$hora]     : 0;

            // Si está todo a cero, no guardamos esa fila
            if ($vCardio === 0 && $vMaquinas === 0 && $vPeso === 0) {
                continue;
            }

            if ($vCardio   < 0) $vCardio   = 0;
            if ($vMaquinas < 0) $vMaquinas = 0;
            if ($vPeso     < 0) $vPeso     = 0;

            $ins->execute([$fecha, $hora, $vCardio, $vMaquinas, $vPeso, $empleadoId]);
        }

        header("Location: index.php?url=aforo/index&fecha=" . urlencode($fecha));
        exit;
    }
}