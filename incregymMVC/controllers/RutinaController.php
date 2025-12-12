<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Rutina.php';
require_once __DIR__ . '/../models/Ejercicio.php';
require_once __DIR__ . '/../config/paths.php';

class RutinaController
{

    private $base;


    public function __construct()
    {
        $this->base = base_path();
    }

    public function index()
    {
        $pdo = Database::connect();
        $rutinas = Rutina::all($pdo);

        $title = "Rutinas";
        $view = __DIR__ . '/../views/rutinas/list.php';
        include __DIR__ . '/../views/layout.php';
    }

    public function create()
    {
        $objetivos = require __DIR__ . '/../config/objetivos.php';

        $title = "Crear rutina";
        $view = __DIR__ . '/../views/rutinas/create.php';
        include __DIR__ . '/../views/layout.php';
    }

    // -------------------------------------------------------------------------
    //  GUARDAR NUEVA RUTINA + SUS EJERCICIOS
    // -------------------------------------------------------------------------
    public function store()
    {
        $pdo = Database::connect();

        $nombre = trim($_POST['nombre'] ?? "");
        $objetivo = trim($_POST['objetivo'] ?? "");

        $stmt = $pdo->prepare("INSERT INTO rutinas (nombre, objetivo) VALUES (?, ?)");
        $stmt->execute([$nombre, $objetivo]);

        $rutinaId = $pdo->lastInsertId();

        $auto = Rutina::autoGenerada($objetivo);
        $ejercicios = $auto["ejercicios"] ?? [];

        foreach ($ejercicios as $e) {
            Ejercicio::create($pdo, [
                "rutina_id" => $rutinaId,
                "nombre" => $e["nombre"],
                "imagen" => $e["imagen"],
                "series" => $e["series"],
                "descanso" => $e["descanso"],
                "video" => $e["video"]
            ]);
        }

        header("Location: {$this->base}/index.php?url=rutinas/show&id={$rutinaId}");
        exit;
    }

    public function edit()
    {
        $pdo = Database::connect();

        $id = $_GET['id'] ?? null;
        if (!$id)
            die("Falta ID de rutina");

        $rutina = Rutina::find($pdo, $id);
        $ejercicios = Ejercicio::byRutina($pdo, $id);

        if (!$rutina)
            die("Rutina no encontrada");

        // Cargar objetivos desde config
        $objetivos = require __DIR__ . '/../config/objetivos.php';

        $title = "Editar rutina";
        $view = __DIR__ . '/../views/rutinas/edit.php';
        include __DIR__ . '/../views/layout.php';
    }

    public function show()
    {
        $pdo = Database::connect();

        $id = $_GET['id'] ?? null;
        if (!$id)
            die("ID no válido");

        $rutina = Rutina::find($pdo, $id);
        $ejercicios = Ejercicio::byRutina($pdo, $id);

        if (!$rutina)
            die("Rutina no encontrada");

        $title = "Rutina: " . $rutina['nombre'];
        $view = __DIR__ . '/../views/rutinas/show.php';
        include __DIR__ . '/../views/layout.php';
    }

    //  GUARDAR CAMBIOS DE RUTINA
    public function update()
    {
        $pdo = Database::connect();

        $id = $_POST['id'] ?? null;
        if (!$id)
            die("ID inválido");

        // Actualizar rutina
        Rutina::update($pdo, [
            'id' => $id,
            'nombre' => trim($_POST['nombre']),
            'objetivo' => trim($_POST['objetivo'])
        ]);


        foreach ($_POST['ejercicio_nombre'] as $ejercicioId => $nombre) {

    $imagenBD = $_POST['ejercicio_imagen_actual'][$ejercicioId] ?? null;

    // Si se subió nueva imagen
    if (!empty($_FILES['ejercicio_imagen']['name'][$ejercicioId])) {

        $nombreArchivo = time() . "_" . basename($_FILES['ejercicio_imagen']['name'][$ejercicioId]);
        $rutaDestino = __DIR__ . '/../public/img/ejercicios/' . $nombreArchivo;

        if (move_uploaded_file($_FILES['ejercicio_imagen']['tmp_name'][$ejercicioId], $rutaDestino)) {
            $imagenBD = "public/img/ejercicios/" . $nombreArchivo;
        }
    }

    Ejercicio::update($pdo, [
        "id"       => $ejercicioId,
        "nombre"   => trim($nombre),
        "series"   => trim($_POST['ejercicio_series'][$ejercicioId]),
        "descanso" => trim($_POST['ejercicio_descanso'][$ejercicioId]),
        "imagen"   => $imagenBD
    ]);
}

        // Eliminar ejercicios marcados
        if (!empty($_POST['eliminar'])) {
            foreach ($_POST['eliminar'] as $ejercicioId) {
                Ejercicio::delete($pdo, $ejercicioId);
            }
        }

        header("Location: {$this->base}/index.php?url=rutinas/edit&id=$id");
        exit;
    }

    // -------------------------------------------------------------------------
    //  AÑADIR NUEVO EJERCICIO
    // -------------------------------------------------------------------------
    public function addExercise() {
    $pdo = Database::connect();
    $rutinaId = $_POST['rutina_id'];

    // Carpeta pública
    $dirUploads = __DIR__ . '/../public/img/ejercicios/';

    if (!file_exists($dirUploads)) {
        mkdir($dirUploads, 0777, true);
    }

    $imagenBD = null;

    if (!empty($_FILES["imagen"]["name"])) {
        $nombreArchivo = time() . "_" . basename($_FILES["imagen"]["name"]);
        $rutaDestino = $dirUploads . $nombreArchivo;

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
            // Ruta pública correcta
            $imagenBD = "public/img/ejercicios/" . $nombreArchivo;
        }
    }

    Ejercicio::create($pdo, [
        "rutina_id" => $rutinaId,
        "nombre"    => trim($_POST['nombre']),
        "series"    => trim($_POST['series']),
        "descanso"  => trim($_POST['descanso']),
        "video"     => trim($_POST['video']),
        "imagen"    => $imagenBD
    ]);

    header("Location: {$this->base}/index.php?url=rutinas/edit&id=$rutinaId");
    exit;
}
    public function delete()
    {
        $pdo = Database::connect();

        $id = $_GET['id'] ?? null;
        if (!$id)
            die("ID de rutina inválido");

        // 1. Borrar ejercicios asociados
        $stmt = $pdo->prepare("DELETE FROM ejercicios WHERE rutina_id = ?");
        $stmt->execute([$id]);

        // 2. Borrar asignaciones de usuarios
        $stmt = $pdo->prepare("DELETE FROM usuarios_rutinas WHERE rutina_id = ?");
        $stmt->execute([$id]);

        // 3. Borrar rutina principal
        $stmt = $pdo->prepare("DELETE FROM rutinas WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: {$this->base}/index.php?url=rutinas");
        exit;
    }
}
