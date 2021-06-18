<?php
   include("conexion.php");
   $id = $_GET["id"];
   $producto = "SELECT * FROM productos WHERE id = $id";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Actualizar</title>
</head>
<body>
    <div class="container">
        <form class="well form-horizontal" action="actualizaDB.php" method="POST" enctype="multipart/form-data">
            <!-- Form Name -->
            <legend><h2><b>Actualizar Producto</b></h2></legend><br>
            <?php 
                $i = 3;
                $resultado = mysqli_query($conexion, $producto);
                while($row = mysqli_fetch_assoc($resultado)) {   
            ?>
            <!-- Text input-->
     
            <div class="form-group">    
                <label class="col-md-4 control-label">Descripción</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <input name="nombre" type="text" value="<?php echo $row['nombre'] ?>">
                        <input name="id" type="hidden" value="<?php echo $row['id'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">    
                <label class="col-md-4 control-label">Código</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <input name="codigo" type="text" value="<?php echo $row['codigo'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">    
                <label class="col-md-4 control-label">Precio</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <input name="precio" type="numeric" value="<?php echo $row['precio'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group"> 
                <label class="col-md-4 control-label">Grupo</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <select name="grupo" class="form-control selectpicker">
                            <option value="<?php echo $row['grupo'] ?>"><?php echo $row['grupo'] ?></option>
                            <option>Aceites</option>
                            <option>Leches</option>
                            <option >Bebidas</option>
                            <option >Salsas</option>
                            <option >Pastas</option>
                            <option >Panes</option>
                            <option >Granos</option>
                            <option >Begetales</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">    
                <label class="col-md-4 control-label">Imagen</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                    <img src="data: image/png;base64,<?php echo base64_encode($row['imagen']);?>"/>

                        <input value="<?php echo base64_encode($row['imagen']);?>" class="form-control" type="file" name="imagen" id="imagen_act" placeholder="Imagen" multiple>
                    </div>
                </div>
            </div>
            <?php $i++; } mysqli_free_result($resultado)?>
                
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4"><br>
                    <input name="Actualizar" type="submit" class="btn btn-warning" value="Actualizar" >
                </div>
            </div>
        </form>
 
    </div>
                

    <!--<tr>
                    <form action="actualizaDB.php" method="POST">
                    <td> <input name="id" type="hidden" value="<?php echo $row['id'] ?>"></td>
                    <td><input name="nombre" type="text" value="<?php echo $row['nombre'] ?>"></td>
                    <td><input name="codigo" type="text" value="<?php echo $row['codigo'] ?>"></td>
                    <td><input name="precio" type="numeric" value="<?php echo $row['precio'] ?>"></td>
                    <td><input name="grupo" type="text" value="<?php echo $row['grupo'] ?>"></td>
                    <td><input class="form-control" type="file" name="imagen" id="imagen" placeholder="Imagen" multiple></td>
                    <td><input name="Actualizar" type="submit" class="btn-submit" value="Actualizar">
                    <input type="button" class="btn-submit-cancelar" value="Cancelar"></td>
                    
                    </form>
                </tr>
                    -->
            <!-- Button -->



       
    <script src="popup.js"></script>
</body>
</html>
