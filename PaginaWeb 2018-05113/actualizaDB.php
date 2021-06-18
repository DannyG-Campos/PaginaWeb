<?php
include("conexion.php");

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$codigo = $_POST["codigo"];
$grupo = $_POST["grupo"];
$precio = $_POST["precio"];
$imagen = $_FILES["imagen"]['tmp_name'];
$imgContenido = addslashes(file_get_contents($imagen));


$actualizar = "UPDATE productos SET nombre = '$nombre', grupo = '$grupo',  precio = '$precio',  imagen = '$imgContenido', codigo = '$codigo'
 WHERE id = '$id'";
$resultado = mysqli_query($conexion, $actualizar);

if($resultado) {
    echo "<script> alert('Se ha insertado correctamente'); window.location='/familywebmarket/PaginaWeb/vista_administrador.php'; </script>";
}else if(isset($_POST["Cancelar"])){
    echo "<script> alert('No se pudo registrar'); window.history.go=(-1);</script>";
} else{
    echo "<script> alert('No se pudo registrar'); window.history.go=(-1);</script>";
}