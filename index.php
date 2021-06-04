<?php 
   include("conexion.php");
   $productos = 'SELECT * FROM productos';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>FamilyWebMarket</title>
</head>

<body>
<?php 
    require "NavBar.php";
    include "grupo_articulo.php";
  ?>

 

 
   





<div class="filterDiv all"> 
    
    <?php $resultado = mysqli_query($conexion, $productos); while($row = mysqli_fetch_assoc($resultado)) { ?>
        
        
    <div class="contenedor_productos">
        <div class="tarjeta_producto">
            <form method="post" action="">
                <div class="thumbnail">
                    <img src="data: image/png;base64,<?php 
                       
                          echo base64_encode($row['imagen']); 
                        
                    
                   ?>"/>
                    <div class="caption">
                        <h4 class="text-info text-center"><?php echo $row['nombre']?></h4>
                        <h4 class="text-danger text-center">RD$ <?php echo $row['precio']?></h4>
                        <input type="text" name="quantity" class="form-control" value="1" />
                        <p class='text-center'>
                        <input type="submit" name="add_to_cart" class="btn btn-success " value="Agregar al carro" /></p>
                        
                        <input type="hidden" name="hidden_name" value="nombre" />
                        <input type="hidden" name="hidden_price" value="precio" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php  } mysqli_free_result($resultado)?>

</div>


<a class="btn-abrir-insertar" id="btn-abrir-popup" >AGREGAR</a>



<div class="overlay" id="overlay">
			<div class="popup" id="popup">
				<a href="#"  class="btn-cerrar-popup"><i class="fas fa-"></i></a>
               
				<h3>NUEVO PRODUCTO</h3>
				
				<form action="insertar.php" method="POST" enctype="multipart/form-data">
					<div class="contenedor-inputs">
                    
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" >
                        <input type="text" name="codigo" id="codigo" placeholder="Código">
                        <input type="text" name="grupo" id="grupo" placeholder="Grupo Artículo">
                        <input type="number" name="precio" id="precio" placeholder="Precio">
                        <input class="form-control" type="file" name="imagen" id="imagen" placeholder="Imagen" multiple>

					</div>

					<input id="btn_insertar" name="btn_insertar" type="submit" class="btn-submit" value="Insertar" >
                    <input id="btn-cerrar-popup" type="button" class="btn-submit-cancelar" value="Cancelar">
                   
				</form>
			</div>
		</div>    
       
<!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->

  <script src="popup.js"></script>
</body>
