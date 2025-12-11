<?php
require_once __DIR__ . '/../models/Horario.php';

class HorarioController
{
    public function index()
    {
        $pdo = Database::connect();

        // Fecha escogida (o hoy por defecto)
        $fecha = $_GET['fecha'] ?? date('Y-m-d');

        // Mapa nº de día → texto
        $map = [
            1 => 'lunes',
            2 => 'martes',
            3 => 'miercoles',
            4 => 'jueves',
            5 => 'viernes',
            6 => 'sabado',
            7 => 'domingo'
        ];
        $diaSemana = $map[(int)date('N', strtotime($fecha))];

        //clases del día para todos los monitores
        $clases = Horario::porDia($pdo, $diaSemana);

        $title = "Clases del día";
        $view  = __DIR__ . '/../views/horario/index.php';
        include __DIR__ . '/../views/layout.php';
    }

    public function semana()
    {
        $pdo = Database::connect();
        $grid = Horario::semanaCompleta($pdo);
        $diasSemana = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado"];
        $horas = ["10:00", "11:00", "12:00", "17:00", "18:00", "19:00", "20:00"];
        $title = "Calendario semanal";
        $view  = __DIR__ . '/../views/horario/semana.php';
        include __DIR__ . '/../views/layout.php';
    }

    public function updateApuntados()
    {
        $pdo = Database::connect();
        $id = $_POST['id'];
        $ap = intval($_POST['apuntados']);

        $stmt = $pdo->prepare("UPDATE horarios SET apuntados=? WHERE id=?");
        $stmt->execute([$ap, $id]);

        header("Location: index.php?url=horario/semana");
        exit;
    }

    public function updateEstado()
    {
        $pdo = Database::connect();
        $id = $_POST['id'];
        $estado = $_POST['estado'];

        $stmt = $pdo->prepare("UPDATE horarios SET estado=? WHERE id=?");
        $stmt->execute([$estado, $id]);

        header("Location: index.php?url=horario/semana");
        exit;
    }
    public function updateClase()
{
    $pdo = Database::connect();

    $id = $_POST['id'];
    $apuntados = intval($_POST['apuntados']);
    $estado = $_POST['estado'];

    $sql = "UPDATE horarios SET apuntados = ?, estado = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$apuntados, $estado, $id]);

    if (!empty($_POST['return']) && $_POST['return'] === 'semana') {
        header("Location: index.php?url=horario/semana");
    } else {
        $fecha = $_GET['fecha'] ?? date('Y-m-d');
        header("Location: index.php?url=horario/index&fecha=" . $fecha);
    }

    exit;
}
}