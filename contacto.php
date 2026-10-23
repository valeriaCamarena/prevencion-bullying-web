<?php
require_once "db.php";
$confirmacion = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mensaje = trim($_POST["mensaje"] ?? "");

    if ($mensaje !== "" && mb_strlen($mensaje) <= 500) {
        $sql = "INSERT INTO mensajes (mensaje) VALUES (:mensaje)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["mensaje" => $mensaje]);
        $confirmacion = "Gracias. Tu mensaje de convivencia se guardó.";
    } else {
        $confirmacion = "Escribe un mensaje de hasta 500 caracteres.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de convivencia</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header><h1>Mensaje de convivencia</h1></header>
    <main>
        <section>
            <p>Escribe una idea general para promover el respeto. No incluyas nombres
            ni información privada ni describas casos reales.</p>

            <?php if ($confirmacion !== ""): ?>
                <p><?= htmlspecialchars($confirmacion, ENT_QUOTES, "UTF-8") ?></p>
            <?php endif; ?>

            <form method="post">
                <label for="mensaje">Tu mensaje (máximo 500 caracteres):</label><br>
                <textarea id="mensaje" name="mensaje" maxlength="500"
                    rows="5" required></textarea><br><br>
                <button type="submit">Guardar mensaje</button>
            </form>
            <p><a href="index.php">Volver al inicio</a></p>
        </section>
    </main>
</body>
</html>
