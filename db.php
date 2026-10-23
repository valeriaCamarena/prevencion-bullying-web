<?php
$host = "localhost";
$dbname = "prevencion_bullying";
$user = "root";
$password = ""; // Configuración local común de XAMPP; no usar así en producción.

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    // No mostrar detalles internos de la base de datos al visitante.
    exit("No fue posible conectar con la base de datos.");
}
?>
