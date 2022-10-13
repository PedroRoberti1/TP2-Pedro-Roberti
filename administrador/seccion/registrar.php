<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <?php require '../partials/header.php' ?>

    <h1>Registrar</h1>
    <span>o <a href="login.php">Ingresa</a></span>
    <form action="registrar.php" method="POST">
            <input name="email" type="text" placeholder="Ingresa tu mail">
            <input name="clave" type="contraseña" class="form-control form-control-lg" placeholder="Ingresa tu contraseña"><br>
            <input type="submit" value="send">
    </form>

</body>

</html>