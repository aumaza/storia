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
            <link href="../../assets/img/storia-favicon.png" rel="icon">';
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
	
	
	
	
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Storia - Impresión de Ticket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../assets/img/storia-favicon.png" rel="icon">
  
  <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
  
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
#customers td {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: right;
  
}

</style>
  
  
  
  
</head>
<body>


<!-- primer bloque -->

<div>
   
   <?php 
   
   $id_mesa = $_GET['id_mesa'];
   
     
       if($conn){
        
             
        $consulta_1 = "select sum(importe) as total from st_items_mesa where id_mesa_numero = '$id_mesa'";
        $resval = mysqli_query($conn,$consulta_1);
        while($rows = mysqli_fetch_array($resval)){
            $total = $rows['total'];
        }
        
        $sql = "SELECT * FROM st_items_mesa where id_mesa_numero = '$id_mesa'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	
    echo '<table id="customers" style="width:100%">
            <tr>
                <th>Item</th>
                <th>Importe</th> 
            </tr>';
           
           while($fila = mysqli_fetch_array($resultado)){
    echo '<tr>
                <td>'.$fila['item'].'</td>
                <td>$'.$fila['importe'].'</td>
          </tr>';
            }
    echo '</table><hr>
          
          <p><strong>Total a Pagar:</strong> $'.$total.'</p><hr>';
            
    	
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);
      
    
   ?>  

</div>
 
<!-- end tercer bloque -->  



</body>
</html>
