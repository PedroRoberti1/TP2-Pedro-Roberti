<?php include("../Template/navbar.php"); ?>
<?php

$txtID=(isset($_POST['txtID']))?$_POST["txtID"]:"";

$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:'';
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:'';
$txtCrack=(isset($_POST['txtCrack']))?$_POST['txtCrack']:'';

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES["txtImagen"]['name']:"";
$accion=(isset($_POST['accion']))?$_POST["accion"]:"";

echo $txtID."<br/>";
echo $txtNombre."<br/>";
echo $txtEstado."<br/>";
echo $txtCrack."<br/>";
echo $txtImagen."<br/>";
echo $accion."<br/>"; 

$host="localhost";
$db="crackwatch";
$usuario="root";
$contrasenia="";

try {
        $conexion= new PDO("mysql:host=$host;dbname=$db",$usuario,$contrasenia);
        if($conexion) { echo "Conectado... a sistema";}
} catch (Exception $ex) {


    echo $ex->getMessage();
}

switch($accion){
    case "Agregar":


        $sentenciaSQL=$conexion->prepare("INSERT INTO `juegos` (`id`, `nombre_juego`, `imagen_juego`, `estado`, `crack_by`) VALUES (NULL, 'Call of duty', 'Imagen.jpg', 'Crackeado', 'Codex');");

        echo "Presionado boton agregar";

        $sentenciaSQL->execute();





        break;
    case "Modificar":
        echo "Presionado boton Modificar";
        break;
    
    case "Cancelar":
    echo "Presionado boton Cancelar";
    break;
}

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
                    <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class= "form-group">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
                </div>

                <div class= "form-group">
                    <label for="txtNombre">imagen: </label>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="NombreImagen">
                </div>

                <div class= "form-group">
                    <label for="txtEstado">Estado</label>
                    <input type="text" class="form-control" name="txtEstado" id="txtEstado" placeholder="Estado">
                </div>

                <div class= "form-group">
                    <label for="txtCrack">Crack by:</label>
                    <input type="text" class="form-control" name="txtCrack" id="txtCrack" placeholder="Crack by:">
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>Juego</td>
                <td>imagen.jpg</td>
                <td>Seleccionar | Borrar</td>
            </tr>
        </tbody>
    </table>
</div>




<?php include("../Template/footer.php"); ?>