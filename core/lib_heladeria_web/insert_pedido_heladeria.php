<?php session_start();
        
        include "../connection/connection.php";
        include "lib_heladeria_web.php";
                    
        $producto = mysqli_real_escape_string($conn,$_POST['producto']);
        $sabor_1 = mysqli_real_escape_string($conn,$_POST['sabor_1']);
        $sabor_2 = mysqli_real_escape_string($conn,$_POST['sabor_2']);
        $sabor_3 = mysqli_real_escape_string($conn,$_POST['sabor_3']);
        $sabor_4 = mysqli_real_escape_string($conn,$_POST['sabor_4']);
        $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
        $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        $importe = mysqli_real_escape_string($conn,$_POST['importe']);
        $cod_producto = mysqli_real_escape_string($conn,$_POST['cod_producto']);
        addPedidoHeladeriaWeb($cliente,$producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$lugar_venta,$modo_pago,$cod_producto,$importe,$conn)
  
?>
