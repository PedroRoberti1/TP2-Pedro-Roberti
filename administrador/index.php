
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bienvendio a CrackWatch</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <?php require 'partials/header.php' ?>

    <?php if (!empty($user)) : ?>
        <br> Welcome. <?= $user['email']; ?>
        <br>You are Successfully Logged In
        <a href="logout.php">
            Logout
        </a>
    <?php else : ?>
        <h1>Por favor inicia sesion o crea una cuenta para acceder a esta seccion</h1>

        <a href="./seccion/iniciar.php">Iniciar</a> or
        <a href="./seccion/registrar.php">Registrarse</a>
    <?php endif; ?>
</body>

</html>