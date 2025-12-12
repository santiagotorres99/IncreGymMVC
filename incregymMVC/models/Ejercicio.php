<?php

class Ejercicio {

    public static function byRutina($pdo, $rutinaId) {
        $stmt = $pdo->prepare("SELECT * FROM ejercicios WHERE rutina_id=?");
        $stmt->execute([$rutinaId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($pdo, $data) {
        $stmt = $pdo->prepare("
            INSERT INTO ejercicios (rutina_id, nombre, imagen, series, descanso, video)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['rutina_id'],
            $data['nombre'],
            $data['imagen'],   
            $data['series'],
            $data['descanso'],
            $data['video']
        ]);
    }

    public static function update($pdo, $data) {
        $stmt = $pdo->prepare("
            UPDATE ejercicios 
            SET nombre=?, imagen=?, series=?, descanso=?, video=?
            WHERE id=?
        ");

        return $stmt->execute([
            $data['nombre'],
            $data['imagen'],
            $data['series'],
            $data['descanso'],
            $data['video'],
            $data['id']
        ]);
    }

    public static function delete($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM ejercicios WHERE id=?");
        return $stmt->execute([$id]);
    }
}