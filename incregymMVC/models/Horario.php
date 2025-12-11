<?php

class Horario
{
    public static function porEmpleadoYDia(PDO $pdo, int $empleadoId, string $diaSemana): array
    {
        $sql = "SELECT h.*, a.nombre AS actividad, a.duracion_min
                FROM horarios h
                JOIN actividades a ON a.id = h.actividad_id
                WHERE h.empleado_id = ? AND h.dia_semana = ?
                ORDER BY h.hora";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$empleadoId, $diaSemana]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function semanaCompleta(PDO $pdo): array
{
    $sql = "SELECT h.*,
                   a.nombre       AS actividad,
                   a.duracion_min,
                   a.aforo_max,
                   e.nombre       AS nombre_empleado,
                   e.apellido     AS apellido_empleado
            FROM horarios h
            JOIN actividades a ON a.id = h.actividad_id
            JOIN empleados   e ON e.id = h.empleado_id
            ORDER BY h.hora";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // grid[hora]['lunes'][] = row
    $grid = [];
    foreach ($rows as $row) {
        $hora = substr($row['hora'], 0, 5); // "10:00"
        $dia  = $row['dia_semana'];         // "lunes", "martes", ...
        $grid[$hora][$dia][] = $row;
    }

    return $grid;
}
    
    public static function porDia(PDO $pdo, string $diaSemana): array
{
    $sql = "
        SELECT h.*, 
               a.nombre AS actividad,
               a.duracion_min,
               a.aforo_max,
               e.nombre AS empleado_nombre,
               e.apellido AS empleado_apellido
        FROM horarios h
        JOIN actividades a ON a.id = h.actividad_id
        JOIN empleados e   ON e.id = h.empleado_id
        WHERE h.dia_semana = ?
        ORDER BY h.hora
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$diaSemana]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}