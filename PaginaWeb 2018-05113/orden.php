<?php
      session_start();
      require "NavBar.php";
  
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>FamilyWebMarket</title>
</head>
<form method="post" action="carrito.php">
    <div class="thumbnail">
        <div class="caption">
            <input type="hidden" name="producto" value='<?php $arreglo["cantidad"]." ".$indice."<br>";?>'>
            <input type="hidden" name="precio" value="<?php echo "Total RD$".$total;?>" />
        </div>
    </div>
</form>
        

<?php
      $total = 0;

        if(isset($_SESSION["carrito"])){
            foreach($_SESSION["carrito"] as $indice => $arreglo){
                $total +=$arreglo["cantidad"] * $arreglo["precio"];
                echo "<h4>".$arreglo["cantidad"]." ".$indice."<h4>";                     
            }
            echo "<br><h3><strong>Total RD$".$total."<strong><h3><br><br>";
        }
// -------------- Lista de compras
        if(isset($_REQUEST["add_to_cart"])){
                
            $producto = $_REQUEST['producto'];
            $precio = $_REQUEST['precio'];
            $cantidad = $_REQUEST["cantidad"];
            $_SESSION["carrito"][$producto]["precio"] = $precio; 
            $_SESSION["carrito"][$producto]["cantidad"] = $cantidad; 
            header("location: ");

        }else if(isset($_REQUEST["vaciar"])){
            session_destroy();
            header("location: ./paginaweb");

        }
        
    ?>
    <form method="post" action="">
    <div class="thumbnail">
        <div class="caption">
            <input type="hidden" name="id_pedido" value="">
            <input type="text" name="nombre_cliente" placeholder="Nombre" value=""><br><br>
            <input style="width:500px" type="text" name="dirección_cliente" placeholder="Direccion" value=""/><br><br>
            <input type="text" name="telefono_cliente" placeholder="Telefono" value=""/><br><br>
            <input type="submit" name="vaciar" class="btn btn-success " value="Pedir Orden" />

        </div>
    </div>
</form>