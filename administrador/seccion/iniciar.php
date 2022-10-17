<?php

require "../config/db.php";

?>




<!DOCTYPE html>


<html>

<head>
    <meta charset="utf-8">
    <title>Iniciar</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <?php require '../partials/header.php' ?>

    <h1>Iniciar</h1>
    <span>o <a href="registrar.php">Registrar</a></span>

    <form action="iniciar.php" method="POST">
        <input name="email" type="text" placeholder="Ingresa tu mail">
        <input name="contraseña" type="password" placeholder="Ingresa tu contraseña">
        <input type="submit" value="Send">
    </form>
</body>

</html>