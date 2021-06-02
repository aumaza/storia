<?php session_start();
        
        include "../connection/connection.php";
        include "../lib_heladeria/lib_heladeria.php";
                        
                                
        $producto = mysqli_real_escape_string($conn,$_POST['producto']);
        $sabor_1 = mysqli_real_escape_string($conn,$_POST['sabor_1']);
        $sabor_2 = mysqli_real_escape_string($conn,$_POST['sabor_2']);
        $sabor_3 = mysqli_real_escape_string($conn,$_POST['sabor_3']);
        $sabor_4 = mysqli_real_escape_string($conn,$_POST['sabor_4']);
        $empleado = mysqli_real_escape_string($conn,$_POST['empleado']);
        $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
        $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
                       
       addVentaHeladeriaLocal($producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$empleado,$lugar_venta,$modo_pago,$cliente,$conn);
  
?>
