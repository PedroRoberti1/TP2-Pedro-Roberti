<?php $host="localhost";
$db="crackwatch";
$usuario="root";
$contrasenia="";

try {
        $conexion= new PDO("mysql:host=$host;dbname=$db",$usuario,$contrasenia);

} catch (PDOException $e) {


    die("Connected failed: ".$e->getMessage());
}

?>