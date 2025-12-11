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
    public static function autoGenerada($objetivo) {

        $todas = [

            // -------------------------------------------------------
            // 💪 MR INCREÍBLE — HIPERTROFIA / MASA MUSCULAR
            // -------------------------------------------------------
            "💪 Mr Increíble: Hipertrofia / Aumento de masa muscular" => [
                ["nombre" => "Press banca", "series" => "4x10", "descanso" => "90 seg", "video" => "https://youtu.be/rT7DgCr-3pg", "imagen" => "https://i.ytimg.com/vi/rT7DgCr-3pg/maxresdefault.jpg"],
                ["nombre" => "Sentadilla con barra", "series" => "4x8", "descanso" => "120 seg", "video" => "https://youtu.be/aclHkVaku9U", "imagen" => "https://i.ytimg.com/vi/aclHkVaku9U/maxresdefault.jpg"],
                ["nombre" => "Peso muerto", "series" => "3x6", "descanso" => "150 seg", "video" => "https://youtu.be/op9kVnSso6Q", "imagen" => "https://i.ytimg.com/vi/op9kVnSso6Q/maxresdefault.jpg"],
                ["nombre" => "Dominadas", "series" => "3x8", "descanso" => "90 seg", "video" => "https://youtu.be/eGo4IYlbE5g", "imagen" => "https://i.ytimg.com/vi/eGo4IYlbE5g/maxresdefault.jpg"],
                ["nombre" => "Press militar", "series" => "3x10", "descanso" => "60 seg", "video" => "https://youtu.be/B-aVuyhvLHU", "imagen" => "https://i.ytimg.com/vi/B-aVuyhvLHU/maxresdefault.jpg"],
                ["nombre" => "Fondos en paralelas", "series" => "3x10", "descanso" => "75 seg", "video" => "https://youtu.be/0326dy_-CzM", "imagen" => "https://i.ytimg.com/vi/0326dy_-CzM/maxresdefault.jpg"],
                ["nombre" => "Remo con barra", "series" => "4x8", "descanso" => "90 seg", "video" => "https://youtu.be/kBWAon7ItDw", "imagen" => "https://i.ytimg.com/vi/kBWAon7ItDw/maxresdefault.jpg"],
            ],

            // -------------------------------------------------------
            // ❄️ FROZONO — TONIFICACIÓN
            // -------------------------------------------------------
            "❄️ Frozono: Tonificación" => [
                ["nombre" => "Press militar mancuernas", "series" => "3x12", "descanso" => "60 seg", "video" => "https://youtu.be/B-aVuyhvLHU", "imagen" => "https://i.ytimg.com/vi/B-aVuyhvLHU/maxresdefault.jpg"],
                ["nombre" => "Zancadas caminando", "series" => "3x15", "descanso" => "60 seg", "video" => "https://youtu.be/QOVaHwm-Q6U", "imagen" => "https://i.ytimg.com/vi/QOVaHwm-Q6U/maxresdefault.jpg"],
                ["nombre" => "Remo en polea", "series" => "3x12", "descanso" => "60 seg", "video" => "https://youtu.be/pYcpY20QaE8", "imagen" => "https://i.ytimg.com/vi/pYcpY20QaE8/maxresdefault.jpg"],
                ["nombre" => "Curl bíceps barra", "series" => "3x12", "descanso" => "45 seg", "video" => "https://youtu.be/ykJmrZ5v0Oo", "imagen" => "https://i.ytimg.com/vi/ykJmrZ5v0Oo/maxresdefault.jpg"],
                ["nombre" => "Extensión tríceps polea", "series" => "3x12", "descanso" => "45 seg", "video" => "https://youtu.be/2-LAMcpzODU", "imagen" => "https://i.ytimg.com/vi/2-LAMcpzODU/maxresdefault.jpg"],
                ["nombre" => "Elevaciones laterales", "series" => "3x15", "descanso" => "45 seg", "video" => "https://youtu.be/kDqklk1ZESo", "imagen" => "https://i.ytimg.com/vi/kDqklk1ZESo/maxresdefault.jpg"],
                ["nombre" => "Crunch abdominal", "series" => "3x20", "descanso" => "30 seg", "video" => "https://youtu.be/Xyd_fa5zoEU", "imagen" => "https://i.ytimg.com/vi/Xyd_fa5zoEU/maxresdefault.jpg"],
            ],

            // -------------------------------------------------------
            // ⚡ DASH — ATLETAS / POTENCIA / PLIOMETRÍA
            // -------------------------------------------------------
            "⚡ Dash: Atletas (pliometría, potencia)" => [
                ["nombre" => "Saltos pliométricos al cajón", "series" => "5x5", "descanso" => "90 seg", "video" => "https://youtu.be/52r_Ul5k03g", "imagen" => "https://i.ytimg.com/vi/52r_Ul5k03g/maxresdefault.jpg"],
                ["nombre" => "Sprints 40m", "series" => "6 reps", "descanso" => "120 seg", "video" => "https://youtu.be/3okvF85bAQY", "imagen" => "https://i.ytimg.com/vi/3okvF85bAQY/maxresdefault.jpg"],
                ["nombre" => "Salto lateral explosivo", "series" => "4x10", "descanso" => "60 seg", "video" => "https://youtu.be/ZJYMC4_1uA8", "imagen" => "https://i.ytimg.com/vi/ZJYMC4_1uA8/maxresdefault.jpg"],
                ["nombre" => "Skipping alto", "series" => "4x30 seg", "descanso" => "45 seg", "video" => "https://youtu.be/4BOTvaRaDjI", "imagen" => "https://i.ytimg.com/vi/4BOTvaRaDjI/maxresdefault.jpg"],
                ["nombre" => "Saltos en profundidad", "series" => "4x6", "descanso" => "90 seg", "video" => "https://youtu.be/UWnJcsp5H8c", "imagen" => "https://i.ytimg.com/vi/UWnJcsp5H8c/maxresdefault.jpg"],
                ["nombre" => "Aceleraciones cortas", "series" => "6x20m", "descanso" => "60 seg", "video" => "https://youtu.be/2vSJMx9DaDE", "imagen" => "https://i.ytimg.com/vi/2vSJMx9DaDE/maxresdefault.jpg"],
                ["nombre" => "Saltos con rodillas al pecho", "series" => "4x12", "descanso" => "60 seg", "video" => "https://youtu.be/v5HBVhQ2bLc", "imagen" => "https://i.ytimg.com/vi/v5HBVhQ2bLc/maxresdefault.jpg"],
            ],

            // -------------------------------------------------------
            // 🔥 ELASTIC GIRL — PÉRDIDA DE GRASA + FLEXIBILIDAD
            // -------------------------------------------------------
            "🔥 Elastic Girl: Pérdida de grasa + Flexibilidad" => [
                ["nombre" => "Burpees", "series" => "3x15", "descanso" => "45 seg", "video" => "https://youtu.be/TU8QYVW0gDU", "imagen" => "https://i.ytimg.com/vi/TU8QYVW0gDU/maxresdefault.jpg"],
                ["nombre" => "Plancha dinámica", "series" => "3x40 seg", "descanso" => "45 seg", "video" => "https://youtu.be/pSHjTRCQxIw", "imagen" => "https://i.ytimg.com/vi/pSHjTRCQxIw/maxresdefault.jpg"],
                ["nombre" => "Jumping jacks", "series" => "3x50", "descanso" => "30 seg", "video" => "https://youtu.be/c4DAnQ6DtF8", "imagen" => "https://i.ytimg.com/vi/c4DAnQ6DtF8/maxresdefault.jpg"],
                ["nombre" => "Mountain climbers", "series" => "3x40 seg", "descanso" => "30 seg", "video" => "https://youtu.be/cnyTQDSE884", "imagen" => "https://i.ytimg.com/vi/cnyTQDSE884/maxresdefault.jpg"],
                ["nombre" => "Sentadilla aire", "series" => "3x20", "descanso" => "45 seg", "video" => "https://youtu.be/aclHkVaku9U", "imagen" => "https://i.ytimg.com/vi/aclHkVaku9U/maxresdefault.jpg"],
                ["nombre" => "Estiramiento full body", "series" => "10 min", "descanso" => "--", "video" => "https://youtu.be/Eml2xnoLpYE", "imagen" => "https://i.ytimg.com/vi/Eml2xnoLpYE/maxresdefault.jpg"],
                ["nombre" => "Salto cuerda", "series" => "3x2 min", "descanso" => "45 seg", "video" => "https://youtu.be/WC8NHP0uQ1Y", "imagen" => "https://i.ytimg.com/vi/WC8NHP0uQ1Y/maxresdefault.jpg"],
            ],

            // -------------------------------------------------------
            // 🟣 VIOLETA — ADOLESCENTES PRINCIPIANTES
            // -------------------------------------------------------
            "🟣 Violeta: Adolescentes principiantes" => [
                ["nombre" => "Sentadilla aire", "series" => "3x12", "descanso" => "60 seg", "video" => "https://youtu.be/aclHkVaku9U", "imagen" => "https://i.ytimg.com/vi/aclHkVaku9U/maxresdefault.jpg"],
                ["nombre" => "Fondos en banco", "series" => "3x10", "descanso" => "60 seg", "video" => "https://youtu.be/0326dy_-CzM", "imagen" => "https://i.ytimg.com/vi/0326dy_-CzM/maxresdefault.jpg"],
                ["nombre" => "Puente de glúteo", "series" => "3x12", "descanso" => "45 seg", "video" => "https://youtu.be/OU7b4tF0EWI", "imagen" => "https://i.ytimg.com/vi/OU7b4tF0EWI/maxresdefault.jpg"],
                ["nombre" => "Elevaciones laterales", "series" => "3x12", "descanso" => "45 seg", "video" => "https://youtu.be/kDqklk1ZESo", "imagen" => "https://i.ytimg.com/vi/kDqklk1ZESo/maxresdefault.jpg"],
                ["nombre" => "Remo mancuerna", "series" => "3x12", "descanso" => "45 seg", "video" => "https://youtu.be/kBWAon7ItDw", "imagen" => "https://i.ytimg.com/vi/kBWAon7ItDw/maxresdefault.jpg"],
                ["nombre" => "Crunch", "series" => "3x15", "descanso" => "45 seg", "video" => "https://youtu.be/Xyd_fa5zoEU", "imagen" => "https://i.ytimg.com/vi/Xyd_fa5zoEU/maxresdefault.jpg"],
                ["nombre" => "Plancha", "series" => "3x30 seg", "descanso" => "30 seg", "video" => "https://youtu.be/pSHjTRCQxIw", "imagen" => "https://i.ytimg.com/vi/pSHjTRCQxIw/maxresdefault.jpg"],
            ],

            // -------------------------------------------------------
            // 🏋️ JACK JACK — HYROX / CROSSFIT / IRONMAN
            // -------------------------------------------------------
            "🏋️ Jack Jack: HYROX / CROSSFIT / IRONMAN" => [
                ["nombre" => "Wall balls", "series" => "3x15", "descanso" => "60 seg", "video" => "https://youtu.be/52Qx2xbYlVw", "imagen" => "https://i.ytimg.com/vi/52Qx2xbYlVw/maxresdefault.jpg"],
                ["nombre" => "Calle de trineo (Sled push)", "series" => "3x20m", "descanso" => "120 seg", "video" => "https://youtu.be/NCzFSlT6Ul4", "imagen" => "https://i.ytimg.com/vi/NCzFSlT6Ul4/maxresdefault.jpg"],
                ["nombre" => "Farmer carry", "series" => "3x40m", "descanso" => "90 seg", "video" => "https://youtu.be/8QWRWUW_6Yo", "imagen" => "https://i.ytimg.com/vi/8QWRWUW_6Yo/maxresdefault.jpg"],
                ["nombre" => "Burpee broad jump", "series" => "3x10", "descanso" => "90 seg", "video" => "https://youtu.be/M0cXK2c0jYs", "imagen" => "https://i.ytimg.com/vi/M0cXK2c0jYs/maxresdefault.jpg"],
                ["nombre" => "Remo 500m", "series" => "3 rondas", "descanso" => "2 min", "video" => "https://youtu.be/RR6e-_3zJj4", "imagen" => "https://i.ytimg.com/vi/RR6e-_3zJj4/maxresdefault.jpg"],
                ["nombre" => "Kettlebell swings", "series" => "3x20", "descanso" => "60 seg", "video" => "https://youtu.be/1c0yaMxQ2PU", "imagen" => "https://i.ytimg.com/vi/1c0yaMxQ2PU/maxresdefault.jpg"],
                ["nombre" => "Carrera 1km", "series" => "1", "descanso" => "--", "video" => "https://youtu.be/3KquFZYi6L0", "imagen" => "https://i.ytimg.com/vi/3KquFZYi6L0/maxresdefault.jpg"],
            ],

            // -------------------------------------------------------
            // 🧓 EDNA MODA — +65 / REHABILITACIÓN FUNCIONAL
            // -------------------------------------------------------
            "🧓 Edna Moda: Recuperación funcional / +65" => [
                ["nombre" => "Sentarse y levantarse", "series" => "3x10", "descanso" => "60 seg", "video" => "https://youtu.be/E7j_8eupS50", "imagen" => "https://i.ytimg.com/vi/E7j_8eupS50/maxresdefault.jpg"],
                ["nombre" => "Elevación de puntas", "series" => "3x12", "descanso" => "60 seg", "video" => "https://youtu.be/QXxSx1TmI1c", "imagen" => "https://i.ytimg.com/vi/QXxSx1TmI1c/maxresdefault.jpg"],
                ["nombre" => "Marcha ligera en sitio", "series" => "3x1 min", "descanso" => "45 seg", "video" => "https://youtu.be/yNre2a0XdKE", "imagen" => "https://i.ytimg.com/vi/yNre2a0XdKE/maxresdefault.jpg"],
                ["nombre" => "Rotación suave de hombros", "series" => "3x15", "descanso" => "30 seg", "video" => "https://youtu.be/cwlrjIof98Y", "imagen" => "https://i.ytimg.com/vi/cwlrjIof98Y/maxresdefault.jpg"],
                ["nombre" => "Estiramiento de cuello", "series" => "3x30 seg", "descanso" => "20 seg", "video" => "https://youtu.be/4BOTvaRaDjI", "imagen" => "https://i.ytimg.com/vi/4BOTvaRaDjI/maxresdefault.jpg"],
                ["nombre" => "Respiración diafragmática", "series" => "5 min", "descanso" => "--", "video" => "https://youtu.be/6pj_sQxIW5g", "imagen" => "https://i.ytimg.com/vi/6pj_sQxIW5g/maxresdefault.jpg"],
                ["nombre" => "Estiramiento suave general", "series" => "10 min", "descanso" => "--", "video" => "https://youtu.be/MfHnJ_vQ9Oc", "imagen" => "https://i.ytimg.com/vi/MfHnJ_vQ9Oc/maxresdefault.jpg"],
            ]
        ];

        return [
            "ejercicios" => $todas[$objetivo] ?? []
        ];
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