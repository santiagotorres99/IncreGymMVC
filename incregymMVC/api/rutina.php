<?php
require_once __DIR__ . '/../models/Rutina.php';

header("Content-Type: application/json; charset=utf-8");

$objetivo = $_GET["objetivo"] ?? "";

$datos = Rutina::autoGenerada($objetivo);

echo json_encode($datos);