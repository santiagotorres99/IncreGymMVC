<?php

class Rutina {

    static function all($pdo) {
        $sql = "SELECT * FROM rutinas ORDER BY id";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    static function find($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM rutinas WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static function create($pdo, $data) {
        $stmt = $pdo->prepare("INSERT INTO rutinas (nombre, objetivo) VALUES (?, ?)");
        $stmt->execute([$data['nombre'], $data['objetivo']]);
        return $pdo->lastInsertId();
    }

    /**
     * -----------------------------------------------------------
     *   RUTINAS AUTOGENERADAS SEGÚN OBJETIVO
     * -----------------------------------------------------------
     */
    public static function autoGenerada($objetivo)
{
    $pdo = Database::connect();

    // Definir los nombres de los ejercicios según el objetivo
    $plantillas = [
        "💪 Mr Increíble: Hipertrofia / Aumento de masa muscular" => [
            "Press banca",
            "Sentadilla con barra",
            "Peso muerto",
            "Dominadas",
            "Press militar con Barra",
            "Fondos en paralelas",
            "Remo con barra"
        ],

        "❄️ Frozono: Tonificación" => [
            "Press militar mancuernas",
            "Zancadas caminando",
            "Remo en polea",
            "Curl bíceps barra",
            "Extensión tríceps polea",
            "Elevaciones laterales",
            "Crunch abdominal"
        ],

        "⚡ Dash: Atletas (pliometría, potencia)" => [
            "Saltos pliométricos al cajón",
            "Sprints 40m",
            "Salto lateral explosivo",
            "Skipping alto",
            "Saltos en profundidad",
            "Aceleraciones cortas",
            "Saltos con rodillas al pecho"
        ],

        "🔥 Elastic Girl: Pérdida de grasa + Flexibilidad" => [
            "Burpees",
            "Plancha dinámica",
            "Jumping jacks",
            "Mountain climbers",
            "Sentadilla con salto",
            "Estiramiento full body",
            "Salto cuerda"
        ],

        "🟣 Violeta: Adolescentes principiantes" => [
            "Sentadilla aire",
            "Fondos en banco",
            "Puente de glúteo",
            "Elevaciones laterales",
            "Remo mancuerna",
            "Crunch",
            "Plancha"
        ],

        "🏋️ Jack Jack: HYROX / CROSSFIT / IRONMAN" => [
            "Wall balls",
            "Empuje de trineo",
            "Farmer walks",
            "Burpee broad jump",
            "Remoergómetro 500m",
            "Kettlebell swings",
            "Carrera 1km"
        ],

        "🧓 Edna Moda: Recuperación funcional / +65" => [
            "Sentarse y levantarse",
            "Elevación de talones",
            "Marcha ligera en sitio",
            "Rotación suave de hombros",
            "Estiramiento de cuello",
            "Respiración diafragmática",
            "Estiramiento suave general"
        ]
    ];

    $lista = $plantillas[$objetivo] ?? [];
    $ejercicios = [];

    // Buscar cada ejercicio en la BBDD
    foreach ($lista as $nombre) {
        $stmt = $pdo->prepare("SELECT * FROM ejercicios WHERE nombre = ?");
        $stmt->execute([$nombre]);
        $ej = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($ej) {
            $ejercicios[] = $ej; // ya incluye imagen + video + series + descanso
        }
    }

    return ["ejercicios" => $ejercicios];
}

    static function update($pdo, $data) {
        $stmt = $pdo->prepare("UPDATE rutinas SET nombre=?, objetivo=? WHERE id=?");
        return $stmt->execute([$data['nombre'], $data['objetivo'], $data['id']]);
    }

    static function delete($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM rutinas WHERE id=?");
        return $stmt->execute([$id]);
    }
}