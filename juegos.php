<?php include("template/navbar.php");?>

<?php

include ("administrador/config/db.php");

$sentenciaSQL=$conexion->prepare('SELECT * FROM juegos');
$sentenciaSQL->execute();
$listaJuegos=$sentenciaSQL->fetchall(PDO::FETCH_ASSOC);
?>

<?php foreach($listaJuegos as $juego) {?>
<div class="col-md-3">

<div class="card">

    <img class="card-img-top" src="./img/<?php echo $juego['Imagen']; ?>" alt="">

    <div class="card-body">
        <h1 class="card-title"><?php echo $juego['Nombre']; ?></h1>
        <h5 class="card-title"><?php echo $juego['Estado']; ?></h5>
        <h6 class="card-title">Crack by:<?php echo $juego['Crack_by']; ?></h6>
</div>

</div>

</div> 

<?php } ?>




<?php include("template/footer.php");?>