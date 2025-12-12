<?php
session_start();
session_unset();
session_destroy();
header("Location: /Torres_SantiagoEzequiel_27/incregymMVC/login.php");
exit;