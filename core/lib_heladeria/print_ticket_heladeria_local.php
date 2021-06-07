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
	
	setlocale(LC_TIME, 'es_ES.UTF-8');
   $fecha_actual = strftime("%A, %d de %B de %Y");
	
	
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Storia - Impresión de Ticket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../assets/img/storia-favicon.png" rel="icon">
  <link rel="stylesheet" href="css_ticket_heladeria.css" type="text/css">
  
</head>
<body>


<!-- primer bloque -->

<div class="col-left">
   
   <div class="col-left">
    <br>
    <p class="p-center"><img src="../../assets/img/storia - logo - 1.png"></p>
    <hr>
    <p class="p-center">Ticket</p>
    <p class="p-center"><strong>Fecha Emisión:</strong> <?php echo $fecha_actual; ?></p> 
    <hr>
    </div>
   
   
   <?php 
   
   $cliente = $_GET['cliente'];
   $lugar_venta = $_GET['lugar_venta'];
   
     
       if($conn){
        
             
        $consulta_1 = "select cliente_nombre, descripcion, importe, fecha_venta from st_ventas where espacio = 'heladeria' and lugar_venta = '$lugar_venta' and fecha_venta = curdate() and cliente_nombre = '$cliente'";
        $resval = mysqli_query($conn,$consulta_1);
                
        $sql = "select sum(importe) as total from st_ventas where espacio = 'heladeria' and lugar_venta = '$lugar_venta' and fecha_venta = curdate() and cliente_nombre = '$cliente'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
    	while($row = mysqli_fetch_array($resultado)){
            $total = $row['total'];
    	}
	//mostramos fila x fila
	$count = 0;
	
   
    echo '<div class="col-left">';    
    echo '<table id="customers" style="width:100%">
            <tr>
                <th>Cliente</th>
                <th>Item</th>
                <th>Importe</th> 
            </tr>';
           
           while($fila = mysqli_fetch_array($resval)){
    echo '<tr>
                <td>'.$fila['cliente_nombre'].'</td>
                <td>'.$fila['descripcion'].'</td>
                <td>$'.$fila['importe'].'</td>
          </tr>';
            }
    echo '</table><hr>
          </div>
          
          <div class="col-left">
          <p class="p-center"><strong>Total a Pagar:</strong> $'.$total.'</p><hr>
          <p class="p-center"><img class="img-24" src="../icons/emotes/face-wink.png"> Gracias por Visitarnos!!!</p>
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
