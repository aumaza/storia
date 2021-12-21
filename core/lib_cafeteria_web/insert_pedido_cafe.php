<?php session_start();
        
        include "../connection/connection.php";
        include "lib_cafeteria_web.php";
                    
        $producto = mysqli_real_escape_string($conn,$_POST['producto']);
        $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
        $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        $importe = mysqli_real_escape_string($conn,$_POST['importe']);
        $cod_producto = mysqli_real_escape_string($conn,$_POST['cod_producto']);
        addPedidoCafeWeb($cliente,$producto,$lugar_venta,$modo_pago,$cod_producto,$importe,$conn);
  
?>
