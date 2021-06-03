<?php session_start();
        
        include "../connection/connection.php";
        include "../lib_cafeteria/lib_cafeteria.php";
                        
                                
        $producto = mysqli_real_escape_string($conn,$_POST['producto']);
        $empleado = mysqli_real_escape_string($conn,$_POST['empleado']);
        $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
        $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        $cantidad = mysqli_real_escape_string($conn,$_POST['cantidad']);
        addProductosCafeLocal($producto,$empleado,$lugar_venta,$modo_pago,$cliente,$cantidad,$conn);
  
?>
