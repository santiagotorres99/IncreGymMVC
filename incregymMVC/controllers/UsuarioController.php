<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Rutina.php';
require_once __DIR__ . '/../models/Ejercicio.php';
require_once __DIR__ . '/../models/UsuarioRutina.php';

class UsuarioController {

    private string $base;

    public function __construct() {
        $this->base = "/TrabajoFinal/incregymMVC";
    }

    // Listado
    public function index() {
        $pdo = Database::connect();
        $usuarios = Usuario::all($pdo);

        $title = "Usuarios";
        $view  = __DIR__ . '/../views/usuarios/list.php';
        include __DIR__ . '/../views/layout.php';
    }

    // Ver usuario
    public function show() {
    $pdo = Database::connect();

    $id = $_GET['id'] ?? null;
    if (!$id) {
        die("ID inválido");
    }

    $usuario = Usuario::find($pdo, $id);
    if (!$usuario) {
        die("Usuario no encontrado");
    }

    // Rutina asignada
    $rutina = UsuarioRutina::obtenerRutina($pdo, (int)$id);

    // TODAS las rutinas disponibles (las oficiales + las creadas en BD)
    $rutinas = Rutina::all($pdo);

    // Ejercicios de la rutina actual
    $ejercicios = $rutina ? Ejercicio::byRutina($pdo, $rutina['id']) : [];

    $title = "Usuario";
    $view  = __DIR__ . '/../views/usuarios/show.php';
    include __DIR__ . '/../views/layout.php';
}

    // Formulario asignar rutina
    public function asignarRutina() {
        $pdo = Database::connect();
        $usuarioId = $_GET['id'] ?? null;

        if (!$usuarioId) die("ID inválido");

        $usuario = Usuario::find($pdo, $usuarioId);
        if (!$usuario) die("Usuario no encontrado");

        $rutinas = Rutina::all($pdo);

        $title = "Asignar rutina";
        $view  = __DIR__ . '/../views/usuarios/asignarRutina.php';
        include __DIR__ . '/../views/layout.php';
    }

    // Guardar asignación
    public function asignarRutinaStore() {
        $pdo = Database::connect();

        $usuarioId = $_POST['usuario_id'] ?? null;
        $rutinaId  = $_POST['rutina_id'] ?? null;

        if (!$usuarioId || !$rutinaId) die("Datos incompletos");

        UsuarioRutina::asignar($pdo, (int)$usuarioId, (int)$rutinaId);

        header("Location: {$this->base}/index.php?url=usuarios/show&id={$usuarioId}");
        exit;
    }

    // Quitar rutina
    public function quitarRutina() {
        $pdo = Database::connect();
        $usuarioId = $_GET['id'] ?? null;

        if (!$usuarioId) die("ID inválido");

        UsuarioRutina::quitar($pdo, (int)$usuarioId);

        header("Location: {$this->base}/index.php?url=usuarios/show&id={$usuarioId}");
        exit;
    }

    // Editar usuario
    public function edit() {
        $pdo = Database::connect();

        $id = $_GET['id'] ?? null;
        if (!$id) die("ID inválido");

        $usuario = Usuario::find($pdo, $id);
        if (!$usuario) die("Usuario no encontrado");

        $objetivos = require __DIR__ . '/../config/objetivos.php';

        $rutinaActual = UsuarioRutina::obtenerRutina($pdo, (int)$id);
        $rutinas = Rutina::all($pdo);

        $title = "Editar usuario";
        $view  = __DIR__ . '/../views/usuarios/edit.php';
        include __DIR__ . '/../views/layout.php';
    }

    // Actualizar usuario
    public function update() {
        $pdo = Database::connect();

        $data = [
            "id"         => $_POST['id'],
            "nombre"     => trim($_POST['nombre']),
            "apellidos"  => trim($_POST['apellidos']),
            "dni"        => trim($_POST['dni']),
            "edad"       => (int)$_POST['edad'],
            "objetivo"   => trim($_POST['objetivo']),
            "email"      => trim($_POST['email']),
            "patologias" => trim($_POST['patologias']),
        ];

        Usuario::update($pdo, $data);

        header("Location: {$this->base}/index.php?url=usuarios/show&id={$data['id']}");
        exit;
    }

    // Crear usuario (formulario)
    public function create() {
        $pdo = Database::connect();
        $objetivos = require __DIR__ . '/../config/objetivos.php';

        $title = "Crear usuario";
        $view  = __DIR__ . '/../views/usuarios/create.php';
        include __DIR__ . '/../views/layout.php';
    }

    // Guardar nuevo usuario
    public function store() {
        $pdo = Database::connect();

        $data = [
            "nombre"     => trim($_POST['nombre']),
            "apellidos"  => trim($_POST['apellidos']),
            "dni"        => trim($_POST['dni']),
            "edad"       => (int)$_POST['edad'],
            "objetivo"   => trim($_POST['objetivo']),
            "email"      => trim($_POST['email']),
            "patologias" => trim($_POST['patologias']),
        ];

        Usuario::create($pdo, $data);

        header("Location: {$this->base}/index.php?url=usuarios");
        exit;
    }

    // ELIMINAR usuario (nuevo método añadido)
    public function delete() {
        $pdo = Database::connect();

        $id = $_GET['id'] ?? null;
        if (!$id) die("ID inválido");

        // Primero eliminar su rutina asignada
        UsuarioRutina::quitar($pdo, (int)$id);

        // Luego eliminar el usuario
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: {$this->base}/index.php?url=usuarios");
        exit;
    }
}