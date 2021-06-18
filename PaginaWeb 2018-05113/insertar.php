<?php
include("conexion.php");

$nombre = $_POST["nombre"];
$codigo = $_POST["codigo"];
$grupo = $_POST["grupo"];
$precio = $_POST["precio"];
$imagen = $_FILES["imagen"]['tmp_name'];
$imgContenido = addslashes(file_get_contents($imagen));

$insertar = "INSERT INTO productos(nombre, grupo, precio, imagen, codigo) VALUE('$nombre','$grupo','$precio','$imgContenido','$codigo')";
$resultado = mysqli_query($conexion, $insertar);
if($resultado) {
    echo "<script> alert('Se ha insertado correctamente'); window.location='/familywebmarket/PaginaWeb/vista_administrador.php';</script>";
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