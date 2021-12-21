<?php session_start();
      include "../connection/connection.php";
      include "../lib_heladeria/lib_heladeria.php";
                        
        
        $nro_ticket = mysqli_real_escape_string($conn,$_POST['nro_ticket']);
        
        $producto = mysqli_real_escape_string($conn,$_POST['producto']);
        $descripcion_producto = substr($producto, 7);
        
        $prefijo = substr($producto, 0, 2);
        
        $sabor_1 = mysqli_real_escape_string($conn,$_POST['sabor_1']);
        $sabor_2 = mysqli_real_escape_string($conn,$_POST['sabor_2']);
        $sabor_3 = mysqli_real_escape_string($conn,$_POST['sabor_3']);
        $sabor_4 = mysqli_real_escape_string($conn,$_POST['sabor_4']);
        $cantidad = mysqli_real_escape_string($conn,$_POST['cantidad']);
        $empleado = mysqli_real_escape_string($conn,$_POST['empleado']);
        $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
        $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        
               
        if($prefijo == 'hd'){
        
            addVentaHeladeriaGeneral($descripcion_producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$empleado,$lugar_venta,$modo_pago,$cliente,$nro_ticket,$conn);
        
        }
        else if(($prefijo == 'cf') || ($prefijo == 'ks')){
        
            addVentaCafeGeneral($descripcion_producto,$empleado,$cantidad,$lugar_venta,$modo_pago,$cliente,$nro_ticket,$conn);
            
        }
       
  
        
  
?>
