<?php
session_start();
session_unset();
session_destroy();
header("Location: /TrabajoFinal/incregymMVC/login.php");
exit;