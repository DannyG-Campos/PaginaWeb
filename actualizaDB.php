<?php
include("conexion.php");

$id = $_POST["codigociu"];
$nombreciu = $_POST["nombreciu"];
$estatusciu = $_POST["estatusciu"];

$actualizar = "UPDATE ciudades SET nombreciu = '$nombreciu', estatusciu = '$estatusciu' WHERE codigociu = '$id'";
$resultado = mysqli_query($conexion, $actualizar);

if($resultado) {
    echo "<script> alert('Se ha insertado correctamente'); window.location='/tarea_5_daweb';</script>";
}else if(isset($_POST["Cancelar"])){
    echo "<script> alert('No se pudo registrar'); window.history.go=(-1);</script>";
} else{
    echo "<script> alert('No se pudo registrar'); window.history.go=(-1);</script>";
}