<?php
session_start();

require 'config/db.php';

if (isset($_SESSION['user_id'])) {
    $records = $conexion->prepare('SELECT id, email, clave FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $usuarios  = null;

    if (is_countable($results) > 0) {
        $usuarios = $results;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require 'partials/header.php' ?>

    <?php if (!empty($usuarios)) : ?>
        <br> Welcome. <?= $usuarios['email']; ?>
        <br>Te conectaste exitosamente
        <a href="./seccion/cerrar.php">
            Cerrar
        </a>
    <?php else : ?>
        <h1>Por favor, ingresa o registrate</h1>

        <a href="./seccion/iniciar.php">Iniciar</a> or
        <a href="./seccion/registrar.php">Registrarse</a>
    <?php endif; ?>
</body>

</html>