<?php
      session_start();
        $total = 0;

        if(isset($_REQUEST["add_to_cart"])){
                
            $producto = $_REQUEST['producto'];
            $precio = $_REQUEST['precio'];
            $cantidad = $_REQUEST["cantidad"];

            $_SESSION["carrito"][$producto]["precio"] = $precio; 
            $_SESSION["carrito"][$producto]["cantidad"] = $cantidad; 
            //sleep(0.2);

            header("location: ./paginaweb");

        }else if(isset($_REQUEST["vaciar"])){
            session_destroy();
            header("location: ./paginaweb");

        
        }else if(isset($_REQUEST["orden"])){
        session_destroy();
        header("location: ./paginaweb");

    }
    
        if(isset($_SESSION["carrito"])){
            foreach($_SESSION["carrito"] as $indice => $arreglo){
                $total +=$arreglo["cantidad"] * $arreglo["precio"];
                echo $arreglo["cantidad"]." ".$indice."<br>";
            }
            echo "Total RD$".$total;

 ?>
        <div class="contenedor_productos">
            <div class="tarjeta_producto">    
                <a href="orden.php?orden=true">Ordenar</a>
            </div>
            <div class="tarjeta_producto">
                <a href="carrito.php?vaciar=true">Vaciar</a>
            </div>  
        </div>
 <?php           
        }

       
        
    ?>
