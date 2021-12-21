<?php session_start();
        
        include "../connection/connection.php";
        include "lib_cafeteria.php";
                    
        $producto = mysqli_real_escape_string($conn,$_POST['producto']);
        $empleado = mysqli_real_escape_string($conn,$_POST['empleado']);
        $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
        $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
        $importe = mysqli_real_escape_string($conn,$_POST['precio']);
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        addProductos($producto,$empleado,$lugar_venta,$modo_pago,$importe,$cliente,$conn);
  
?>
