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

        $sentenciaSQL=$conexion->prepare("INSERT INTO `juegos` (`id`, `Nombre`, `Imagen`, `Estado`, `Crack_by`) VALUES (NULL,:Nombre,:Imagen,:Estado,:Crack_by);");
        $sentenciaSQL->bindParam(':Nombre',$txtNombre);

        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"Imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if($tmpImagen!=""){

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':Imagen',$nombreArchivo);

        $sentenciaSQL->bindParam(':Estado',$txtEstado);
        $sentenciaSQL->bindParam(':Crack_by',$txtCrack);

        $sentenciaSQL->execute();

        break;
    case "Modificar":

        $sentenciaSQL=$conexion->prepare('UPDATE juegos set Nombre=:Nombre WHERE id=:id');
        $sentenciaSQL->bindParam(':Nombre',$txtNombre);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();


        if ($txtImagen!="") {

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"Imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

            
            $sentenciaSQL=$conexion->prepare('SELECT Imagen FROM juegos WHERE id=:id');
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $juego=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($juego["Imagen"]) &&($juego["Imagen"]!="Imagen.jpg")){

                if(file_exists("../../img/".$juego["Imagen"])){

                    unlink("../../img/".$juego["Imagen"]);
                }
            }


            $sentenciaSQL=$conexion->prepare('UPDATE juegos set Imagen=:Imagen WHERE id=:id');
            $sentenciaSQL->bindParam(':Imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
        }

        if ($txtEstado!="") {
            $sentenciaSQL=$conexion->prepare('UPDATE juegos set Estado=:Estado WHERE id=:id');
            $sentenciaSQL->bindParam(':Estado',$txtEstado);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
        }
        if ($txtCrack!="") {
            $sentenciaSQL=$conexion->prepare('UPDATE juegos set Crack_by=:Crack_by WHERE id=:id');
            $sentenciaSQL->bindParam(':Crack_by',$txtCrack);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
        }
        header("Location:juegos.php");
        break;
    
    case "Cancelar":
        header("Location:juegos.php");
    break;

    case 'Seleccionar':

        $sentenciaSQL=$conexion->prepare('SELECT * FROM juegos WHERE id=:id');
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $juego=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$juego['Nombre'];
        $txtImagen=$juego['Imagen'];
        $txtEstado=$juego['Estado'];
        $txtCrack=$juego['Crack_by'];
        // echo "Presionado boton Seleccionar";
        break;
    
    case 'Borrar':
        


        $sentenciaSQL=$conexion->prepare('SELECT Imagen FROM juegos WHERE id=:id');
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $juego=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($juego["Imagen"]) &&($juego["Imagen"]!="Imagen.jpg")){

            if(file_exists("../../img/".$juego["Imagen"])){

                unlink("../../img/".$juego["Imagen"]);
            }
        }




        $sentenciaSQL=$conexion->prepare('DELETE FROM juegos WHERE id=:id');
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        header("Location:juegos.php");
        break;
}

$sentenciaSQL=$conexion->prepare('SELECT * FROM juegos');
$sentenciaSQL->execute();
$listaJuegos=$sentenciaSQL->fetchall(PDO::FETCH_ASSOC);
?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de juego
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class= "form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class= "form-group">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>"  name="txtNombre" id="txtNombre" placeholder="Nombre">
                </div>

                <div class= "form-group">
                    <label for="txtNombre">Imagen: </label>

                    <br/>

                    <?php

                    if($txtImagen!=""){  ?>

                    <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen;?>" width="100" alt="">    

                    <?php }    ?>

                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="NombreImagen">
                </div>

                <div class= "form-group">
                    <label for="txtEstado">Estado</label>
                    <input type="text" required class="form-control" value="<?php echo $txtEstado; ?>" name="txtEstado" id="txtEstado" placeholder="Estado">
                </div>

                <div class= "form-group">
                    <label for="txtCrack">Crack by:</label>
                    <input type="text" class="form-control" value="<?php echo $txtCrack; ?>"  name="txtCrack" id="txtCrack" placeholder="Crack by:">
                </div>
                

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disable":""; ?> value="Agregar"   class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" ($accion!="Seleccionar")?"disable":"";  value="Modificar"  class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" ($accion=="Seleccionar")?"disable":""; value="Cancelar" class="btn btn-info">Cancelar</button>
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

                <td>

                <img class="img-thumbnail rounded" src="../../img/<?php echo $juego['Imagen']; ?>" width="110" alt="">    
                
                </td>
                <td><?php echo $juego['Estado']; ?></td>
                <td><?php echo $juego['Crack_by']; ?></td>

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