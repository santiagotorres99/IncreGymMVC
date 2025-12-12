<?php

/**
 * Devuelve el path base del proyecto (sin dominio) calculado
 * a partir del script que se esta ejecutando. Ej: "/incregymMVC".
 */
function base_path(): string
{
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    $dir = str_replace('\\', '/', dirname($scriptName));

    // Normalizar cuando la app esta en la raiz
    if ($dir === '/' || $dir === '\\' || $dir === '.' || $dir === '') {
        return '';
    }

    return rtrim($dir, '/');
}

