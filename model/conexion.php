<?php
$contrasena = "";
$usuario = "root";
$nombre_bd = "crud";

try {
    $bd = new PDO(
        'mysql:host=127.0.0.1;port=3307;dbname=' . $nombre_bd . ';charset=utf8',
        $usuario,
        $contrasena,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (Exception $e) {
    die("Problema con la conexión: " . $e->getMessage());
}
