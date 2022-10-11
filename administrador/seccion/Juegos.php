<?php include("../Template/navbar.php"); ?>
<?php

$txtID=(isset($_POST['txtID']))?$_POST["txtID"]:"";

$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:'';
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:'';
$txtCrack=(isset($_POST['txtCrack']))?$_POST['txtCrack']:'';
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES["txtImagen"]['name']:"";
$accion=(isset($_POST['accion']))?$_POST["accion"]:"";

include("../config/db.php"); 




switch($accion){
    case "Agregar":

        $sentenciaSQL=$conexion->prepare("INSERT INTO `juegos` (`id`, `Nombre`, `Imagen`, `Estado`, `Crack_by:`) VALUES (NULL,:Nombre,:imagen,:Estado,:Crackby);");
        $sentenciaSQL->bindParam(':Nombre',$txtNombre);
        $sentenciaSQL->bindParam(':imagen',$txtImagen);
        $sentenciaSQL->bindParam(':Estado',$txtEstado);
        $sentenciaSQL->bindParam(':Crackby',$txtCrack);

        $sentenciaSQL->execute();

        break;
    case "Modificar":
        echo "Presionado boton Modificar";
        break;
    
    case "Cancelar":
    echo "Presionado boton Cancelar";
    break;

    case 'Seleccionar':

        $sentenciaSQL=$conexion->prepare('SELECT * FROM juegos WHERE id=:id');
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $juego=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$juego['Nombre'];
        $txtImagen=$juego['Imagen'];
        $txtEstado=$juego['Estado'];
        $txtCrack=$juego['Crack_by:'];
        // echo "Presionado boton Seleccionar";
        break;
    
    case 'Borrar':
        $sentenciaSQL=$conexion->prepare('DELETE FROM juegos WHERE id=:id');
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        // echo "Presionado boton Borrar";
        break;
}

$sentenciaSQL=$conexion->prepare('SELECT * FROM juegos');
$sentenciaSQL->execute();
$listaJuegos=$sentenciaSQL->fetchall(PDO::FETCH_ASSOC);
?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de libro
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class= "form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class= "form-group">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" class="form-control" value="<?php echo $txtNombre; ?>"  name="txtNombre" id="txtNombre" placeholder="Nombre">
                </div>

                <div class= "form-group">
                    <label for="txtNombre">imagen: </label>

                    <?php echo $txtImagen;?>

                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="NombreImagen">
                </div>

                <div class= "form-group">
                    <label for="txtEstado">Estado</label>
                    <input type="text" class="form-control" value="<?php echo $txtEstado; ?>" name="txtEstado" id="txtEstado" placeholder="Estado">
                </div>

                <div class= "form-group">
                    <label for="txtCrack">Crack by:</label>
                    <input type="text" class="form-control" value="<?php echo $txtCrack; ?>"  name="txtCrack" id="txtCrack" placeholder="Crack by:">
                </div>
                

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion"  value="Agregar"   class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion"  value="Modificar"  class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion"  value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>


            </form>
        </div>
    </div>




</div>
<div class="col-md-7">
    <table class="table table-border">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Crack by:</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaJuegos as $juego) { ?>
            <tr>
                <td><?php echo $juego['id']; ?></td>
                <td><?php echo $juego['Nombre']; ?></td>
                <td><?php echo $juego['Imagen']; ?></td>
                <td><?php echo $juego['Estado']; ?></td>
                <td><?php echo $juego['Crack_by:']; ?></td>

                <td>

                <form method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $juego['id']; ?>">

                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">

                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger">

                </form>


                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>




<?php include("../Template/footer.php"); ?>