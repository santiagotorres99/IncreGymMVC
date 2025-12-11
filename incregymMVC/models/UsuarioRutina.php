<?php

class UsuarioRutina
{
    // Obtener la última rutina asignada a un usuario
    public static function obtenerRutina(PDO $pdo, int $usuarioId): ?array
    {
        $sql = "SELECT r.*, ur.fecha_asignacion
                FROM usuarios_rutinas ur
                JOIN rutinas r ON r.id = ur.rutina_id
                WHERE ur.usuario_id = ?
                ORDER BY ur.fecha_asignacion DESC
                LIMIT 1";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuarioId]);
        $rutina = $stmt->fetch(PDO::FETCH_ASSOC);

        return $rutina ?: null;
    }

    // Asignar (o cambiar) rutina
    public static function asignar(PDO $pdo, int $usuarioId, int $rutinaId): void
{
    // Usamos transacción para evitar errores de FK intermedios
    $pdo->beginTransaction();

    try {
        // 1. Comprobamos que el usuario existe
        $checkU = $pdo->prepare("SELECT id FROM usuarios WHERE id = ?");
        $checkU->execute([$usuarioId]);
        if (!$checkU->fetch()) {
            throw new Exception("El usuario $usuarioId no existe.");
        }

        // 2. Comprobamos que la rutina existe
        $checkR = $pdo->prepare("SELECT id FROM rutinas WHERE id = ?");
        $checkR->execute([$rutinaId]);
        if (!$checkR->fetch()) {
            throw new Exception("La rutina $rutinaId no existe.");
        }

        // 3. Eliminamos rutina anterior (si existe)
        $del = $pdo->prepare("DELETE FROM usuarios_rutinas WHERE usuario_id = ?");
        $del->execute([$usuarioId]);

        // 4. Insertamos la nueva
        $stmt = $pdo->prepare(
            "INSERT INTO usuarios_rutinas (usuario_id, rutina_id, fecha_asignacion)
             VALUES (?, ?, NOW())"
        );
        $stmt->execute([$usuarioId, $rutinaId]);

        $pdo->commit();

    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

    // Quitar cualquier rutina del usuario
    public static function quitar(PDO $pdo, int $usuarioId): void
    {
        $stmt = $pdo->prepare("DELETE FROM usuarios_rutinas WHERE usuario_id = ?");
        $stmt->execute([$usuarioId]);
    }
}