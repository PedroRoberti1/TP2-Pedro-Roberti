<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: iniciar.php');
}


require "../config/db.php";

if (!empty($_POST['email']) && !empty($_POST['clave'])) {
    $records = $conexion->prepare('SELECT id, email, clave FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (is_countable($results)  > 0 && password_verify($_POST['clave'], $results['clave'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: ../inicio.php');
    } else {
        $message = 'Error al autentificar, las credenciales no coinciden.';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <?php require '../partials/header.php' ?>

    <?php if (!empty($message)) : ?>
        <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Ingresar</h1>
    <span>o <a href="registrar.php">Registrarse</a></span>

    <form action="iniciar.php" method="POST">
        <input name="email" type="email" placeholder="Enter your email">
        <input name="clave" type="password" placeholder="Enter your clave">
        <input type="submit" value="Submit">
    </form>
</body>

</html>