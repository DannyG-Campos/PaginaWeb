<?php
include("conexion.php");
$id = $_GET["id"];


$eliminar = "DELETE FROM productos WHERE id = $id";


$resultado = mysqli_query($conexion, $eliminar);

if($resultado) {
    header("location: index.php");
} else{
    echo "<script> alert('No se pudo registrar'); window.history.go=(-1);</script>";
}