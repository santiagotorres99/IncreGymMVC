<?php
class HomeController {
public function index()
{
    $pdo = Database::connect();
    $empleadoId = $_SESSION['empleado']['id'];

    $fecha = date('Y-m-d');
    $mapDias = [
        1 => 'lunes', 2 => 'martes', 3 => 'miercoles',
        4 => 'jueves', 5 => 'viernes', 6 => 'sabado', 7 => 'domingo'
    ];
    $diaSemana = $mapDias[(int)date('N')] ?? 'lunes';

    $clasesHoy = Horario::porEmpleadoYDia($pdo, $empleadoId, $diaSemana);

    $title = "Inicio";
    $view  = __DIR__ . '/../views/home.php';
    include __DIR__ . '/../views/layout.php';
}
}
?>