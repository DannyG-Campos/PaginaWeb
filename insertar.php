<?php
include("conexion.php");

$nombreciu = $_POST["nombreciu"];
$estatusciu = $_POST["estatusciu"];

$insertar = "INSERT INTO ciudades(nombreciu, estatusciu) VALUE('$nombreciu','$estatusciu')";
$resultado = mysqli_query($conexion, $insertar);
if($resultado) {
    echo "<script> alert('Se ha insertado correctamente'); window.location='/tarea_5_daweb';</script>";
}else{
    echo "<script> alert('No se pudo registrar'); window.history.go=(-1);</script>";
}
?>


<table>
<thead>
                <tr >
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
</table>