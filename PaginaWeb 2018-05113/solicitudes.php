<?php

    $orden_pedido= 0;
    $total = 0;

    
    $total = 0;
    echo $_REQUEST["procesar"];
    if(isset($_REQUEST["procesar"])){
        
        session_destroy();
        header("location: ./paginaweb");
        session_start();
        $id_pedido = $_REQUEST['id_pedido'];
        $nombre_cliente = $_REQUEST['nombre_cliente'];
        $dirección_cliente = $_REQUEST['dirección_cliente'];
        $telefono_cliente = $_REQUEST["telefono_cliente"];

        $_SESSION["pedido"][$id_pedido]["nombre_cliente"] = $nombre_cliente; 
        $_SESSION["pedido"][$id_pedido]["dirección_cliente"] = $dirección_cliente; 
        $_SESSION["pedido"][$id_pedido]["telefono_cliente"] = $telefono_cliente; 

        //sleep(0.2);

        header("location: ./paginaweb");

    }else if(isset($_REQUEST["procesar"])){
        session_destroy();
        header("location: ./paginaweb");

    
    }else if(isset($_REQUEST["orden"])){
    session_destroy();
    header("location: ./paginaweb");

}

if(isset($_SESSION["pedido"])){
    foreach($_SESSION["pedido"] as $indice => $arreglo){
        echo "<h4>".$arreglo["nombre_cliente"]." ".$indice."<h4>";                     
    }

        
    }

        ?>
<form method="post" action="">

    <div class="thumbnail">
        <div class="caption">
            <input type="hidden" name="id_pedido" value="<?php echo $orden_pedido ?>">
            <input type="hidden" name="nombre_cliente" placeholder="Nombre" value=""><br><br>
            <input style="width:500px" type="hidden" name="dirección_cliente" placeholder="Direccion" value=""/><br><br>
            <input type="hidden" name="telefono_cliente" placeholder="Telefono" value=""/><br><br>

        </div>
    </div>
</form>