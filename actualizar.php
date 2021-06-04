<?php
   include("conexion.php");
   $id = $_GET["id"];
   $paises = "SELECT * FROM ciudades WHERE codigociu = $id";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Actualizar</title>
</head>
<body>
    <h1>Actualizar Ciudad</h1>


    <div class="datagrid">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
           
            <tbody>
                <?php 
                    $i = 3;
                    $resultado = mysqli_query($conexion, $paises);
                    while($row = mysqli_fetch_assoc($resultado)) {   
                ?>
                <tr>
                    <form action="actualizaDB.php" method="POST">
                    <td> <input name="codigociu" type="hidden" value="<?php echo $row['codigociu'] ?>"></td>
                    <td><input name="nombreciu" type="text" value="<?php echo $row['nombreciu'] ?>"></td>
                    <td><input name="estatusciu" type="text" value="<?php echo $row['estatusciu'] ?>"></td>
                    <td><input name="Actualizar" type="submit" class="btn-submit" value="Actualizar">
                   <!-- <input type="button" class="btn-submit-cancelar" value="Cancelar">--></td>
                    
                    </form>
                </tr>
                <?php $i++; } mysqli_free_result($resultado)?>
            </tbody>

           
        </table>
    </div>
                
       
    <script src="popup.js"></script>
</body>
