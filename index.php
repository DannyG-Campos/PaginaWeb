<?php 
   include("conexion.php");
   $paises = 'SELECT * FROM ciudades';
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

    <title>Document</title>
</head>
<body>
    
  <?php require "NavBar.php";
    include "grupo_articulo.php";
  ?>
    
 <div>

 <?php
  include "producto.php";
 ?>
 </div>
   
<!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
<div class="container">

    <?php 
          $i = 3;
          $resultado = mysqli_query($conexion, $paises);
          while($row = mysqli_fetch_assoc($resultado)) {   
    ?>
      <div class="filterDiv cars"> 
      <img src="./src/imagenes/grupo_articulo/bebidas.jpg" alt="">
      <h4 class="promo-banner-subtitle"><?php echo $row['nombreciu'] ?></h4>
    </div>


    <?php $i++; } mysqli_free_result($resultado)?>

  

  <div>
    <div class="filterDiv cars"> 
        <img src="./src/imagenes/grupo_articulo/bebidas.jpg" alt="">
        <h4 class="promo-banner-subtitle">Bebidas</h4>
    </div>
  </div>
  



  <div class="filterDiv colors fruits">Orange</div>
  <div class="filterDiv cars">Volvo</div>
  <div class="filterDiv colors">Red</div>
  <div class="filterDiv cars animals">Mustang</div>
  <div class="filterDiv colors">Blue</div>
  <div class="filterDiv animals">Cat</div>
  <div class="filterDiv animals">Dog</div>
  <div class="filterDiv fruits">Melon</div>
  <div class="filterDiv fruits animals">Kiwi</div>
  <div class="filterDiv fruits">Banana</div>
  <div class="filterDiv fruits">Lemon</div>
  <div class="filterDiv animals">Cow</div>
</div>



            


<!--

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
            <tr <?php if($i%2==0) echo "class='alt'"; ?>>
                <td><?php echo $row['codigociu'] ?></td>
                <td><?php echo $row['nombreciu'] ?></td>
                <td><?php echo $row['estatusciu'] ?></td>
                <td colspan="4">
                    <ul>
                        <li>
                            <a href="actualizar.php?id=<?php echo $row["codigociu"]; ?>" ><i><img src="lapiz.png" /></i></a>
                        </li>
                        <li>
                            <a href="eliminar.php?id=<?php echo $row["codigociu"]; ?>" class="elimina_registro"><i><img src="trash.png" /></i></a>
                        </li>
                    </ul>
                </td>
            </tr>
            <?php $i++; } mysqli_free_result($resultado)?>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="4">
                    <div id="paging">
                        <ul>
                            <li>
                                <a class="btn-abrir-insertar" id="btn-abrir-popup" >
                                    <span>Insertar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
  </div>

                -->
  <script src="popup.js"></script>
</body>
