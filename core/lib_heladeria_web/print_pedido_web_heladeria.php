<?php session_start();

    include "../connection/connection.php";
    include "../lib_core/lib_core.php";
         
        $usuario = $_SESSION['user'];
        $password = $_SESSION['pass'];
	
	$sql = "select nombre from st_usuarios where user = '$usuario' and password = '$password'";
	mysqli_select_db($conn,'storia');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
    if($usuario == null || $usuario = ''){
 
    echo '<!DOCTYPE html>
            <html lang="es">
            <head>
            <title>Storia</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="../../../assets/img/storia-favicon.png" rel="icon">';
            skeleton();
            echo '</head><body>';
            echo '<br><div class="container">
                    <div class="alert alert-danger" role="alert">';
            echo '<p align="center"><img src="../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> '.$usuario.' Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
            echo '<a href="../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><img src="../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
            echo "</div></div>";
            die();
            echo '</body></html>';
	}
	
	
   $id = $_GET['id'];
      
   setlocale(LC_TIME, 'es_ES.UTF-8');
   $fecha_actual = strftime("%A, %d de %B de %Y");
   //$fecha_1 = strftime("%d-%m-%Y",strtotime($fecha_desde));
   //$fecha_2 = strftime("%d-%m-%Y",strtotime($fecha_hasta));
   
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Storia - Pedido Web Heladería</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../assets/img/storia-favicon.png" rel="icon">
  <link rel="stylesheet" href="inf_heladeria.css" type="text/css">
   
  
</head>
<body>


<!-- primer bloque -->

<div>
   
   <div class="row">
    <br>
    <img src="../../assets/img/storia - logo - 1.png">
    <hr>
    <h1 align="center">HELADERÍA</h1>
    <h3 align="center">Pedido Web</h3>
    <p><strong>Fecha Emisión:</strong> <?php echo $fecha_actual; ?></p> 
    <hr>
   
   </div>
   
   
   
   <?php 
   
       
       if($conn){
        
        $sql = "SELECT * from st_ventas where id  = '$id'";
	  	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
    	while($rows = mysqli_fetch_array($resultado)){
            $producto = $rows['descripcion'];
            $sabor_1 = $rows['sabor_1'];
            $sabor_2 = $rows['sabor_2'];
            $sabor_3 = $rows['sabor_3'];
            $sabor_4 = $rows['sabor_4'];
            $tipo_pago = $rows['tipo_pago'];
            $fecha_venta = $rows['fecha_venta'];
            $cliente = $rows['cliente_nombre'];
            $importe = $rows['importe'];
    	}
    	
    	$fecha_pedido = strftime("%d-%m-%Y",strtotime($fecha_venta));
    	
    	$sql_cliente = "select direccion, movil from st_clientes where cliente_nombre = '$cliente'";
    	mysqli_select_db($conn,'storia');
    	$query = mysqli_query($conn,$sql_cliente);
    	while($fila = mysqli_fetch_array($query)){
            $direccion = $fila['direccion'];
            $movil = $fila['movil'];
    	}
	   
       
    echo '<div class="row">
             
            <p><strong>Producto</strong>: '.$producto.'</p>
            <p><strong>Fecha Pedido</strong>: '.$fecha_pedido.'</p><hr>
            <h3 align="center"><strong>Sabores Pedidos</strong></h3><hr>
            <p>'.$sabor_1.'</p>
            <p>'.$sabor_2.'</p>
            <p>'.$sabor_3.'</p>
            <p>'.$sabor_4.'</p><hr>
            <h3 align="center"><strong>Datos del Cliente</strong></h3><hr>
            <p><strong>Nombre</strong>: '.$cliente.'</p>
            <p><strong>Dirección</strong>: '.$direccion.'</p>
            <p><strong>Móvil</strong>: '.$movil.'</p><hr>
            <p><strong>Forma de Pago</strong>: '.$tipo_pago.'</p>
            <p><strong>Importe</strong>: $'.$importe.'</p>
            <p><img class="img-24" src="../icons/emotes/face-smile.png"> Gracias por tu Compra!!!</p>
           
            </div>';
         
         }else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);
      
    
   ?>  

</div>
 
<!-- end tercer bloque -->  



</body>
</html>
