
<?php
include ("administrador/config/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CrackWatch</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="juegos.php">Juegos</a>
                    </li>

                    <?php $url="http://". $_SERVER["HTTP_HOST"]."/tp-2"?>
                    <li class="nav-item">
                    <a class="nav-item nav-link" href="<?php echo $url."/administrador/index.php";?>">Iniciar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <br/><br/>
        <div class="row">