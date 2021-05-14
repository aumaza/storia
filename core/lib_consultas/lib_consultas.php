<?php

/*
** vista rápida de todas las mesas
*/
function vistaMesas($conn){

    $fecha_actual = date("Y-m-d");
    
    // consulta para la mesa 1
    $consulta_1 = "select * from st_mesas where mesa_numero = 1 and fecha = '$fecha_actual' and estado = 'Abierta'";
    mysqli_select_db($conn,'storia');
    $resp_1 = mysqli_query($conn,$consulta_1);
    $row = mysqli_fetch_assoc($resp_1);
    
    // consulta para la mesa 2
    $consulta_2 = "select * from st_mesas where mesa_numero = 2 and fecha = '$fecha_actual' and estado = 'Abierta'";
    mysqli_select_db($conn,'storia');
    $resp_2 = mysqli_query($conn,$consulta_2);
    $row_2 = mysqli_fetch_assoc($resp_2);
    
    // consulta para la mesa 3
    $consulta_3 = "select * from st_mesas where mesa_numero = 3 and fecha = '$fecha_actual' and estado = 'Abierta'";
    mysqli_select_db($conn,'storia');
    $resp_3 = mysqli_query($conn,$consulta_3);
    $row_3 = mysqli_fetch_assoc($resp_3);
    
    // consulta para la mesa 4
    $consulta_4 = "select * from st_mesas where mesa_numero = 4 and fecha = '$fecha_actual' and estado = 'Abierta'";
    mysqli_select_db($conn,'storia');
    $resp_4 = mysqli_query($conn,$consulta_4);
    $row_4 = mysqli_fetch_assoc($resp_4);
    
    // consulta para la mesa 5
    $consulta_5 = "select * from st_mesas where mesa_numero = 5 and fecha = '$fecha_actual' and estado = 'Abierta'";
    mysqli_select_db($conn,'storia');
    $resp_5 = mysqli_query($conn,$consulta_5);
    $row_5 = mysqli_fetch_assoc($resp_5);
    
    // consulta para la mesa 6
    $consulta_6 = "select * from st_mesas where mesa_numero = 6 and fecha = '$fecha_actual' and estado = 'Abierta'";
    mysqli_select_db($conn,'storia');
    $resp_6 = mysqli_query($conn,$consulta_6);
    $row_6 = mysqli_fetch_assoc($resp_6);
    
    // =============================================================================== //
    // CONSULTA DE ITEMS PARA CADA MESA
    // Consultas para la mesa 1
    
        $request_1 = "select id from st_mesas where mesa_numero = 1 and estado = 'Abierta' and fecha = CURDATE()";
        mysqli_select_db($conn,'storia');
        $query_1 = mysqli_query($conn,$request_1);
        while($rows_1 = mysqli_fetch_array($query_1)){
            $id_1 = $rows_1['id'];
        }
        
        $consult_1 = "select sum(importe) as total from st_items_mesa where id_mesa_numero = '$id_1'";
        $resval_1 = mysqli_query($conn,$consult_1);
        while($fila_1 = mysqli_fetch_array($resval_1)){
            $total_1 = $fila_1['total'];
        }
        
        $sql_1 = "SELECT * FROM st_items_mesa where id_mesa_numero = '$id_1'";
    	mysqli_select_db($conn,'storia');
    	$resultado_1 = mysqli_query($conn,$sql_1);
        $count_1;
        
    echo '<div class="alert alert-success">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesas</strong>: Vista rápida del estado de todas las Mesas
            </div><hr>    
    
    <div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 1</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row['empleado'].'</p>
        <hr>';
       
       echo "<table class='table table-condensed'>";
       echo "<thead>
		    <th class='text-nowrap text-center'>Item</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($linea_1 = mysqli_fetch_array($resultado_1)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$linea_1['item']."</a></td>";
			 echo "<td align=center>$".$linea_1['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count_1++;
		}

		echo "</table><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Items:  '.$count_1.' </button>';
		
     
        
        echo '</div>
                <div class="panel-footer">
                    <p><strong>Total parcial</strong>: $'.$total_1.'</p>
                </div>';
        echo '</div></div>';
           
    // Consultas para la mesa 2
    
        $request_2 = "select id from st_mesas where mesa_numero = 2 and estado = 'Abierta' and fecha = CURDATE()";
        mysqli_select_db($conn,'storia');
        $query_2 = mysqli_query($conn,$request_2);
        while($rows_2 = mysqli_fetch_array($query_2)){
            $id_2 = $rows_2['id'];
        }
        
        $consult_2 = "select sum(importe) as total from st_items_mesa where id_mesa_numero = '$id_2'";
        $resval_2 = mysqli_query($conn,$consult_2);
        while($fila_2 = mysqli_fetch_array($resval_2)){
            $total_2 = $fila_2['total'];
        }
        
        $sql_2 = "SELECT * FROM st_items_mesa where id_mesa_numero = '$id_2'";
    	mysqli_select_db($conn,'storia');
    	$resultado_2 = mysqli_query($conn,$sql_2);
        $count_2;
    
    
    echo '<div class="col-sm-4"> 
      <div class="panel panel-info">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 2</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_2['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_2['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_2['empleado'].'</p>
        <hr>';
        
        echo "<table class='table table-condensed'>";
       echo "<thead>
		    <th class='text-nowrap text-center'>Item</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($linea_2 = mysqli_fetch_array($resultado_2)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$linea_2['item']."</a></td>";
			 echo "<td align=center>$".$linea_2['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count_2++;
		}

		echo "</table><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Items:  '.$count_2.' </button>';
		
     
        
        echo '</div>
                <div class="panel-footer">
                    <p><strong>Total parcial</strong>: $'.$total_2.'</p>
                </div>
      </div>
    </div>';
    
    
    // Consultas para la mesa 3
    
        $request_3 = "select id from st_mesas where mesa_numero = 3 and estado = 'Abierta' and fecha = CURDATE()";
        mysqli_select_db($conn,'storia');
        $query_3 = mysqli_query($conn,$request_3);
        while($rows_3 = mysqli_fetch_array($query_3)){
            $id_3 = $rows_3['id'];
        }
        
        $consult_3 = "select sum(importe) as total from st_items_mesa where id_mesa_numero = '$id_3'";
        $resval_3 = mysqli_query($conn,$consult_3);
        while($fila_3 = mysqli_fetch_array($resval_3)){
            $total_3 = $fila_3['total'];
        }
        
        $sql_3 = "SELECT * FROM st_items_mesa where id_mesa_numero = '$id_3'";
    	mysqli_select_db($conn,'storia');
    	$resultado_3 = mysqli_query($conn,$sql_3);
        $count_3;
    
    echo '<div class="col-sm-4"> 
      <div class="panel panel-warning">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 3</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_3['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_3['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_3['empleado'].'</p>
        <hr>';
        
        echo "<table class='table table-condensed'>";
       echo "<thead>
		    <th class='text-nowrap text-center'>Item</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($linea_3 = mysqli_fetch_array($resultado_3)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$linea_3['item']."</a></td>";
			 echo "<td align=center>$".$linea_3['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count_3++;
		}

		echo "</table><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Items:  '.$count_3.' </button>';
		
     
        
        echo '</div>
                <div class="panel-footer">
                    <p><strong>Total parcial</strong>: $'.$total_3.'</p>
                </div>
  </div>
</div>
</div><hr><br>


<div class="container">    
  <div class="row">
    <div class="col-sm-4">
     <div class="panel panel-success">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 4</strong>
        </div>';
        
        // Consultas para la mesa 4
    
        $request_4 = "select id from st_mesas where mesa_numero = 4 and estado = 'Abierta' and fecha = CURDATE()";
        mysqli_select_db($conn,'storia');
        $query_4 = mysqli_query($conn,$request_4);
        while($rows_4 = mysqli_fetch_array($query_4)){
            $id_4 = $rows_4['id'];
        }
        
        $consult_4 = "select sum(importe) as total from st_items_mesa where id_mesa_numero = '$id_4'";
        $resval_4 = mysqli_query($conn,$consult_4);
        while($fila_4 = mysqli_fetch_array($resval_4)){
            $total_4 = $fila_4['total'];
        }
        
        $sql_4 = "SELECT * FROM st_items_mesa where id_mesa_numero = '$id_4'";
    	mysqli_select_db($conn,'storia');
    	$resultado_4 = mysqli_query($conn,$sql_4);
        $count_4;
        
        echo '<div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_4['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_4['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_4['empleado'].'</p>
        <hr>';
        
        echo "<table class='table table-condensed'>";
       echo "<thead>
		    <th class='text-nowrap text-center'>Item</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($linea_4 = mysqli_fetch_array($resultado_4)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$linea_4['item']."</a></td>";
			 echo "<td align=center>$".$linea_4['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count_4++;
		}

		echo "</table><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Items:  '.$count_4.' </button>';
		
     
        
        echo '</div>
                <div class="panel-footer">
                    <p><strong>Total parcial</strong>: $'.$total_4.'</p>
                </div>
        
      </div>
    </div>';
    
    // Consultas para la mesa 5
    
        $request_5 = "select id from st_mesas where mesa_numero = 5 and estado = 'Abierta' and fecha = CURDATE()";
        mysqli_select_db($conn,'storia');
        $query_5 = mysqli_query($conn,$request_5);
        while($rows_5 = mysqli_fetch_array($query_5)){
            $id_5 = $rows_5['id'];
        }
        
        $consult_5 = "select sum(importe) as total from st_items_mesa where id_mesa_numero = '$id_5'";
        $resval_5 = mysqli_query($conn,$consult_5);
        while($fila_5 = mysqli_fetch_array($resval_5)){
            $total_5 = $fila_5['total'];
        }
        
        $sql_5 = "SELECT * FROM st_items_mesa where id_mesa_numero = '$id_5'";
    	mysqli_select_db($conn,'storia');
    	$resultado_5 = mysqli_query($conn,$sql_5);
        $count_5;
    
    echo '<div class="col-sm-4"> 
      <div class="panel panel-info">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 5</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_5['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_5['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_5['empleado'].'</p>
        <hr>';
        
        echo "<table class='table table-condensed'>";
       echo "<thead>
		    <th class='text-nowrap text-center'>Item</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($linea_5 = mysqli_fetch_array($resultado_5)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$linea_5['item']."</a></td>";
			 echo "<td align=center>$".$linea_5['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count_5++;
		}

		echo "</table><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Items:  '.$count_5.' </button>';
		
     
        
        echo '</div>
                <div class="panel-footer">
                    <p><strong>Total parcial</strong>: $'.$total_5.'</p>
                </div>
        
      </div>
    </div>';
    
    // Consultas para la mesa 6
    
        $request_6 = "select id from st_mesas where mesa_numero = 6 and estado = 'Abierta' and fecha = CURDATE()";
        mysqli_select_db($conn,'storia');
        $query_6 = mysqli_query($conn,$request_6);
        while($rows_6 = mysqli_fetch_array($query_6)){
            $id_6 = $rows_6['id'];
        }
        
        $consult_6 = "select sum(importe) as total from st_items_mesa where id_mesa_numero = '$id_6'";
        $resval_2 = mysqli_query($conn,$consult_6);
        while($fila_6 = mysqli_fetch_array($resval_2)){
            $total_6 = $fila_6['total'];
        }
        
        $sql_6 = "SELECT * FROM st_items_mesa where id_mesa_numero = '$id_6'";
    	mysqli_select_db($conn,'storia');
    	$resultado_6 = mysqli_query($conn,$sql_6);
        $count_6;
    
    
    echo '<div class="col-sm-4"> 
      <div class="panel panel-warning">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 6</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_6['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_6['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_6['empleado'].'</p>
        <hr>';
        
        echo "<table class='table table-condensed'>";
       echo "<thead>
		    <th class='text-nowrap text-center'>Item</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($linea_6 = mysqli_fetch_array($resultado_6)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$linea_6['item']."</a></td>";
			 echo "<td align=center>$".$linea_6['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count_6++;
		}

		echo "</table><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Items:  '.$count_6.' </button>';
		
     
        
        echo '</div>
                <div class="panel-footer">
                    <p><strong>Total parcial</strong>: $'.$total_6.'</p>
                </div>
        
      </div>
    </div>
  </div>
</div><br><br>';

}






?>
