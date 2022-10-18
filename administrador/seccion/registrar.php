<?php

require "../config/db.php";

?>

<?php

$message = '';

if (!empty($_POST['email']) && !empty($_POST['clave'])) {
    $sql = "INSERT INTO usuarios (email, clave) VALUES (:email, :clave)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);
    $stmt->bindParam(':clave', $clave);

    if ($stmt->execute()) {
        $message = 'Successfully created new user';
    } else {
        $message = 'Sorry there must have been an issue creating your account';
    }
}
?>
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

    <?php if (!empty($message)) : ?>
        <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>o <a href="iniciar.php">Ingresa</a></span>


    <form action="registrar.php" method="POST">
        <input name="email" type="email" placeholder="Enter your email">
        <input name="clave" type="password" placeholder="Enter your clave">
        <br> <br> <br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>