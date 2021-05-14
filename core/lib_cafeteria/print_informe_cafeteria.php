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
	
	
   $mesa_numero = $_GET['mesa_numero'];
   $fecha_desde = $_GET['fecha_desde'];
   $fecha_hasta = $_GET['fecha_hasta'];
   
   setlocale(LC_TIME, 'es_ES.UTF-8');
   $fecha_actual = strftime("%A, %d de %B de %Y");
   $fecha_1 = strftime("%d-%m-%Y",strtotime($fecha_desde));
   $fecha_2 = strftime("%d-%m-%Y",strtotime($fecha_hasta));
   
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Storia - Informe Total Cafetería/title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../assets/img/storia-favicon.png" rel="icon">
  <link rel="stylesheet" href="inf_cafe.css" type="text/css">
   
  
</head>
<body>


<!-- primer bloque -->

<div>
   
   <div class="row">
    <br>
    <img src="../../assets/img/storia - logo - 1.png">
    <hr>
    <h1 align="center">Informe Total Ventas Cafetería</h1>
    <p><strong>Fecha Emisión:</strong> <?php echo $fecha_actual; ?></p> 
    <hr>
   
   </div>
   
   
   
   <?php 
   
       
       if($conn){
        
             
        if($mesa_numero == 'Todas'){
	
       $sql = "SELECT sum(total) as total FROM st_mesas where estado = 'Cerrada' and fecha between '$fecha_desde' and '$fecha_hasta'";
	
	}else{
	
        $sql = "SELECT sum(total) as total, mesa_numero FROM st_mesas where estado = 'Cerrada' and mesa_numero = '$mesa_numero' and fecha between '$fecha_desde' and '$fecha_hasta'";
        
	}
	
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
    
       
    echo '<div class="row">
            <div class="col-center">
            <table id="customers" style="width:100%">
            <tr>
                <th>Mesa Número</th>
                <th>Total</th> 
            </tr>';
           
           while($fila = mysqli_fetch_array($resultado)){
    echo '<tr>';
                if($mesa_numero == 'Todas'){
                    echo '<td>'.$mesa_numero.'</td>';
                }else{
                echo '<td>'.$fila['mesa_numero'].'</td>';
                }
                echo '<td>$'.$fila['total'].'</td>
          </tr>';
            }
    echo '</table>
            </div>
            <hr>
            <p> <strong>Período de fechas analizados:</strong> ('.$fecha_1.') a  ('.$fecha_2.')</p>
            <hr>
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
