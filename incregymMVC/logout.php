<?php
session_start();
session_unset();
session_destroy();
require_once __DIR__ . '/config/paths.php';
$base = base_path();
header("Location: {$base}/login.php");
exit;
