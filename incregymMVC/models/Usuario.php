<?php

class Usuario {

    public static function all($pdo) {
        return $pdo->query("SELECT * FROM usuarios ORDER BY id ASC")
           ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function getNextId($pdo) {
        $ids = $pdo->query("SELECT id FROM usuarios ORDER BY id ASC")->fetchAll(PDO::FETCH_COLUMN);
        $expected = 1;

        foreach ($ids as $id) {
            if ($id != $expected) return $expected;
            $expected++;
        }

        return $expected;
    }

    public static function create(PDO $pdo, array $data) {
    $sql = "INSERT INTO usuarios (nombre, apellidos, dni, edad, objetivo, email, patologias)
            VALUES (:nombre, :apellidos, :dni, :edad, :objetivo, :email, :patologias)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        ":nombre"     => $data["nombre"],
        ":apellidos"  => $data["apellidos"],
        ":dni"        => $data["dni"],
        ":edad"       => $data["edad"],
        ":objetivo"   => $data["objetivo"],
        ":email"      => $data["email"],
        ":patologias" => $data["patologias"]
    ]);
}

    public static function update($pdo, $data) {
        $sql = "UPDATE usuarios SET 
            nombre = :nombre,
            apellidos = :apellidos,
            dni = :dni,
            edad = :edad,
            objetivo = :objetivo,
            email = :email,
            patologias = :patologias
            WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public static function delete($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }
}