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
    <link rel="stylesheet" href="carruse.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>FamilyWebMarket</title>
</head>

<body>
    
<div class="sidenav navbar-dark bg-dark carrito">
    <div style="display: inline-flex; " class="bg-dark   sticky-top">
        <img  class= "imgc" style="width: 50px;" src="./src/imagenes/carrito.png">
        <h3>Carrito</h3>
    </div>
    <div class="lista_carrito">
        <?php
            include "carrito.php";
        ?>
    </div> 

  

</div>
<?php 
        require "NavBar.php";
    ?> 
     <!-- carrusel inicio --> 
 <h1>Ofertas</h1> <!-- Título --> 
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> <!-- contenedor del carrusel  --> 
  <div class="carousel-inner">
    <div class="carousel-item active"> <!-- activación del carrusel --> 
      <img class="d-block w-100" src="img1/Guineo.jpg" alt="Guineo">
      <div class="carousel-caption d-none d-md-block">
    <h5>RD$4</h5> <!-- Precio oferta --> 
    <p class="antes">Antes RD$5</p> <!-- precio normal --> 
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img1/Platano.jpg" alt="Platano">
      <div class="carousel-caption d-none d-md-block">
    <h5>RD$8</h5> <!-- Precio oferta -->
    <p class="antes">Antes RD$10</p> <!-- precio normal --> 
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img1/Salami.jpg" alt="Salami">
      <div class="carousel-caption d-none d-md-block">
    <h5>RD$250</h5> <!-- Precio oferta -->
    <p class="antes">Antes RD$300</p> <!-- precio normal --> 
  </div>
    </div>
  <div class="carousel-item">
      <img class="d-block w-100" src="img1/Yuca.jpg" alt="Yuca">
      <div class="carousel-caption d-none d-md-block">
    <h5>Libra RD$20</h5> <!-- Precio oferta -->
    <p class="antes">Antes RD$25</p> <!-- precio normal --> 
  </div>
    </div>
  <div class="carousel-item">
      <img class="d-block w-100" src="img1/Aceite.jpg" alt="Aceite">
      <div class="carousel-caption d-none d-md-block">
    <h5>RD$200</h5> <!-- Precio oferta -->
    <p class="antes">Antes RD$225</p> <!-- precio normal --> 
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span> <!-- botón de anterior imagen --> 
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span> <!-- botón de siguiente imagen --> 
  </a>
</div>
   <!-- carrusel fin --> 
    <div class="main">
        <?php 
            include "grupo_articulo.php";
        ?> 
        <div class="contenedor_producto_principal">
        <!----------------Este recorre los datos en la base de la tabla productos--------------->
            <?php $resultado = mysqli_query($conexion, $productos); $grupoArt = []; while($row = mysqli_fetch_assoc($resultado)) { ?>
                <div class="filterDiv <?php echo strtolower($row['grupo'])?>">
                    <div class="contenedor_productos">
                        <div class="tarjeta_producto">
                            <form method="post" action="carrito.php">
                                <div class="thumbnail">
                                    <img src="data: image/png;base64,<?php echo base64_encode($row['imagen']);?>"/>
                                    <div class="caption">
                                        <h4 class="text-info text-center"><?php echo $row['nombre']?></h4>
                                        <h4 class="text-danger text-center">RD$ <?php echo $row['precio']?></h4>
                                        <input type="number" name="cantidad" class="form-control" value="1" />
                                        <input type="submit" name="add_to_cart" class="btn btn-success " value="Agregar al carro" /></p>
                                        <input type="hidden" name="producto" value="<?php echo $row['nombre']?>">
                                        <input type="hidden" name="precio" value="<?php echo $row['precio']?>" />
                                    </div>
                                   
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            <?php } mysqli_free_result($resultado)?>
        </div>

        
    </div>
    <div>
        
    </div>
    


<a class="btn-abrir-insertar" id="btn-abrir-popup" ></a>
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
       
<script src="popup.js"></script>
</body>
<!-- carrusel inicio --> 
<h1>Articulos</h1>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <div class="carousel-item active">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/aceites1.jpg" alt="aceites1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/bebidas1.jpg" alt="bebidas1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/conservas1.jpg" alt="conservas1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/granos1.jpg" alt="granos1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/leches1.jpg" alt="leches1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/panes1.jpg" alt="panes1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/pastas1.png" alt="pastas">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/salsas1.jpg" alt="salsas1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/vegetales-verduras1.jpg" alt="vegetales-verduras1">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/imagenes/grupo_articulo-c/vegetales1.jpg" alt="vegetales1">
            </div> 
  </div>
</div>
   <!-- carrusel fin -->
<div class="creadores"><br>
<div class="spam">
<spam class="c-a">Create By</spam> <spam class="c-b">Carlos Moran Rosario</spam> <spam class="c-a">&</spam> 
<spam class="c-b">Ezequiel Duarte Lantigua</spam> <spam class="c-a"> — </spam> <spam class="c-b">&#169;</spam> 
<spam class="c-a">2021</spam> <spam class="c-a">Family Web Market</spam>
</div><br>
</div>