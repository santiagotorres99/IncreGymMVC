<?php

class Empleado
{
    public static function findByUsuario(PDO $pdo, string $usuario): ?array
    {
        $sql = "SELECT * FROM empleados WHERE usuario = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}