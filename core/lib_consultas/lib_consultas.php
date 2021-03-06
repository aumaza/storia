<?php

/*
** funcion que carga la tabla de todos los mensajes de consultas de clientes
*/


function mensajesClientes($conn){

if($conn)
{
	$sql = "SELECT * FROM st_mensajes";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/mail-flag.png"  class="img-reponsive img-rounded"> Mensajes de Clientes';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Email</th>
            <th class='text-nowrap text-center'>Mensaje</th>
            <th class='text-nowrap text-center'>Fecha Envio</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>"."<a href='mailto:".$fila['email']."'>".$fila['email']."</a></td>";
			 echo "<td align=center>".$fila['mensaje']."</td>";
			 echo "<td align=center>".$fila['fecha']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form action="#" method="POST">';
                echo '<input type="hidden" name="id"  value="'.$fila['id'].'">';
                    
                    if($fila['estado'] == 'No Leido'){
                    
                   echo '<button type="submit" class="btn btn-success btn-sm" name="mensaje_leido"><img src="../../icons/actions/mail-replied.png"  class="img-reponsive img-rounded"> Marcar Respondido</button>';
                                     
                   }
                   else if($fila['estado'] == 'Leido'){
                        echo '<img src="../../icons/actions/games-endturn.png"  class="img-reponsive img-rounded" data-toggle="tooltip" data-placement="right" title="Mensaje Respondido">';
                   }
                echo '</form>';   
                   
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Mensajes:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** funcion que carga la tabla de todos llas ventas por empleado
*/
function ventasPorEmpleado($conn){

if($conn)
{
	$sql = "select empleado, fecha_venta, count(empleado) as cantidad from st_ventas where estado_ticket = 'Cerrado' group by empleado, fecha_venta";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-process-own.png"  class="img-reponsive img-rounded"> Cantidad de Ventas por Empleado';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Empleado</th>
            <th class='text-nowrap text-center'>Fecha Venta</th>
            <th class='text-nowrap text-center'>Cantidad</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['empleado']."</td>";
			 echo "<td align=center>".$fila['fecha_venta']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** funcion que carga la tabla de todos llas ventas por empleado
*/
function comprasPorCliente($conn){

if($conn)
{
	$sql = "select cliente_nombre, fecha_venta, count(cliente_nombre) as cantidad from st_ventas where estado_ticket = 'Cerrado' group by cliente_nombre, fecha_venta";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-process-own.png"  class="img-reponsive img-rounded"> Cantidad de Compras por Cliente';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Fecha Compra</th>
            <th class='text-nowrap text-center'>Cantidad</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['cliente_nombre']."</td>";
			 echo "<td align=center>".$fila['fecha_venta']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form action="#" method="POST">
                <button type="submit" class="btn btn-default btn-sm" name="preferidos_cliente" data-toggle="tooltip" data-placement="right" title="Productos Preferidos de los Clientes">
                <img src="../../icons/actions/rating.png"  class="img-reponsive img-rounded"> Productos Preferidos</button>
              </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** funcion que carga la tabla de los productos preferidos por clientes
*/
function preferidosCliente($conn){

if($conn)
{
	$sql = "select cliente_nombre, descripcion, count(descripcion) as cantidad from st_ventas where estado_ticket = 'Cerrado' group by descripcion order by cantidad DESC";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/rating.png"  class="img-reponsive img-rounded"> Productos Preferidos por Cliente';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Producto</th>
            <th class='text-nowrap text-center'>Cantidad</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['cliente_nombre']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** funcion que carga la tabla de todas las ventas por espacio
*/
function espaciosVentas($conn){

if($conn)
{
	$sql = "select espacio, fecha_venta, sum(importe) as total from st_ventas where estado_ticket = 'Cerrado' group by espacio, fecha_venta";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-investment.png"  class="img-reponsive img-rounded"> Cantidad de Ventas por Espacios (Helader??a / Caf??)';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Espacio</th>
            <th class='text-nowrap text-center'>Fecha Venta</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['espacio']."</td>";
			 echo "<td align=center>".$fila['fecha_venta']."</td>";
			 echo "<td align=center>$".$fila['total']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}

/*
** actualizacion de estado de lectura y respuesta en los mensajes de los usuarios
*/
function lecturaMensaje($id,$conn){

    $sql = "update st_mensajes set estado = 'Leido' where id = '$id'";
    mysqli_select_db($conn,'storia');
    $resp = mysqli_query($conn,$sql);
    
    if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Estado de Mensaje Actualizado Correctamente.';
		    echo "</div>";
		    echo "</div>";
		    
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al actualizar el estado del mensaje. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }

}




/*
** vista r??pida de todas las mesas
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
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesas</strong>: Vista r??pida del estado de todas las Mesas
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

/*
** funcion que carga pastillas con informacion en espacio de cliente
*/
function tabletsInfoCliente($conn,$nombre){
    
    // an??lisis para helader??a
	$sql_heladeria_1 = "select count(id) as cantidad from st_ventas where espacio = 'heladeria' and fecha_venta = curdate() and cliente_nombre = '$nombre'";
	mysqli_select_db($conn,'storia');
	$query_heladeria_1 = mysqli_query($conn,$sql_heladeria_1);
	while($rows_1 = mysqli_fetch_array($query_heladeria_1)){
	      $cantidad_hoy = $rows_1['cantidad'];
    }
	
	$sql_heladeria_2 = "select count(id) as cantidad from st_ventas where espacio = 'heladeria' and cliente_nombre = '$nombre'";
	mysqli_select_db($conn,'storia');
	$query_heladeria_2 = mysqli_query($conn,$sql_heladeria_2);
	while($rows_2 = mysqli_fetch_array($query_heladeria_2)){
	      $cantidad_total = $rows_2['cantidad'];
    }
    
    $sql_heladeria_3 = "select sum(importe) as total from st_ventas where espacio = 'heladeria' and fecha_venta = curdate() and cliente_nombre = '$nombre'";
	mysqli_select_db($conn,'storia');
	$query_heladeria_3 = mysqli_query($conn,$sql_heladeria_3);
	while($rows_3 = mysqli_fetch_array($query_heladeria_3)){
	      $total_hoy_heladeria = $rows_3['total'];
    }
    
    $sql_heladeria_4 = "select sum(importe) as total from st_ventas where espacio = 'heladeria' and cliente_nombre = '$nombre'";
	mysqli_select_db($conn,'storia');
	$query_heladeria_4 = mysqli_query($conn,$sql_heladeria_4);
	while($rows_4 = mysqli_fetch_array($query_heladeria_4)){
	      $total_heladeria = $rows_4['total'];
    }
	
	// ========================================================================================================================//
	
	// an??lisis para cafeter??a
	$sql_cafe_1 = "select count(id) as cantidad from st_ventas where espacio = 'cafeteria' and fecha_venta = curdate() and cliente_nombre = '$nombre'";
	mysqli_select_db($conn,'storia');
	$query_cafe_1 = mysqli_query($conn,$sql_cafe_1);
	while($rows_5 = mysqli_fetch_array($query_cafe_1)){
	      $cantidad_hoy_cafe = $rows_5['cantidad'];
    }
	
	$sql_cafe_2 = "select count(id) as cantidad from st_ventas where espacio = 'cafeteria' and cliente_nombre = '$nombre'";
	mysqli_select_db($conn,'storia');
	$query_cafe_2 = mysqli_query($conn,$sql_cafe_2);
	while($rows_6 = mysqli_fetch_array($query_cafe_2)){
	      $cantidad_total_cafe = $rows_6['cantidad'];
    }
    
    $sql_cafe_3 = "select sum(importe) as total from st_ventas where espacio = 'cafeteria' and fecha_venta = curdate() and cliente_nombre = '$nombre'";
	mysqli_select_db($conn,'storia');
	$query_cafe_3 = mysqli_query($conn,$sql_cafe_3);
	while($rows_7 = mysqli_fetch_array($query_cafe_3)){
	      $total_hoy_cafe = $rows_7['total'];
    }
    
    $sql_cafe_4 = "select sum(importe) as total from st_ventas where espacio = 'cafeteria' and cliente_nombre = '$nombre'";
	mysqli_select_db($conn,'storia');
	$query_cafe_4 = mysqli_query($conn,$sql_cafe_4);
	while($rows_8 = mysqli_fetch_array($query_cafe_4)){
	      $total_cafe = $rows_8['total'];
    }
    
    echo '<div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4><img class="img-reponsive img-rounded" src="../../icons/actions/im-aim.png" /> Pedidos Helader??a</h4><hr>
            <p>Hoy: <span class="label label-success">'.$cantidad_hoy.'</span></p> 
            <p>Totales: <span class="label label-primary">'.$cantidad_total.'</span></p>
          </div>
        </div>
        
        <div class="col-sm-3">
         <div class="well">
            <h4><img class="img-reponsive img-rounded" src="../../icons/actions/im-aim.png" /> Pedidos a Confiter??a</h4><hr>
            <p>Hoy: <span class="label label-success">'.$cantidad_hoy_cafe.'</span></p> 
            <p>Totales: <span class="label label-primary">'.$cantidad_total_cafe.'</span></p>
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="well">
            <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Consumo Helader??a</h4><hr>
            <p>Hoy: <span class="label label-warning">$'.$total_hoy_heladeria.'</span></p> 
            <p>Acumulado: <span class="label label-info">$'.$total_heladeria.'</span></p>
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="well">
            <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Consumo Confiter??a</h4><hr>
            <p>Hoy: <span class="label label-warning">$'.$total_hoy_cafe.'</span></p>
            <p>Acumulado: <span class="label label-info">$'.$total_cafe.'</span></p>
          </div>
        </div>
      </div><hr>';


}


/*
** carga de estadisticas para espacio de administrador
*/
function analytics($conn){

   
    // total ventas en el d??a de la fecha
    $sql_mesas_hoy = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate()";
    mysqli_select_db($conn,'storia');
    $query_1 = mysqli_query($conn,$sql_mesas_hoy);
    while($rows_1 = mysqli_fetch_array($query_1)){
        $mesas_hoy = $rows_1['total'];
    }
    
    $sql_ventas_hoy = "select sum(importe) as total from st_ventas where fecha_venta = curdate()";
    mysqli_select_db($conn,'storia');
    $query_ventas_hoy = mysqli_query($conn,$sql_ventas_hoy);
    while($rows_ventas_hoy = mysqli_fetch_array($query_ventas_hoy)){
        $ventas_hoy = $rows_ventas_hoy['total'];
    }
    
    $total_ventas_hoy = $mesas_hoy + $ventas_hoy;
    
    // total ventas acumulado
    $sql_2 = "select ((select sum(importe) from st_ventas) + (select sum(total) from st_mesas where estado = 'Cerrada')) as total";
    mysqli_select_db($conn,'storia');
    $query_2 = mysqli_query($conn,$sql_2);
    while($rows_2 = mysqli_fetch_array($query_2)){
        $total_ventas_acumulado = $rows_2['total'];
    }
    
    // ================================================================================ //
    // CANTIDAD PEDIDOS HELADERIA WEB
    // ================================================================================ //
    // TOTAL PEDIDOS WEB HELADERIA EN EL DIA DE LA FECHA
    $sql_pedidos_web_hel_hoy = "select count(lugar_venta) as cantidad from st_ventas where espacio = 'heladeria' and lugar_venta = 'Web' and                            fecha_venta = curdate()";
    mysqli_select_db($conn,'storia');
    $query_pedidos_web_hel_hoy = mysqli_query($conn,$sql_pedidos_web_hel_hoy);
    while($row_pedido_web_hel_hoy = mysqli_fetch_array($query_pedidos_web_hel_hoy)){
        $cantidad_pedidos_hel_web_hoy = $row_pedido_web_hel_hoy['cantidad'];
    }
    // TOTAL PEDIDOS WEB HELADERIA
    $sql_pedidos_web_hel = "select count(lugar_venta) as cantidad from st_ventas where espacio = 'heladeria' and lugar_venta = 'Web'";
    mysqli_select_db($conn,'storia');
    $query_pedidos_web_hel = mysqli_query($conn,$sql_pedidos_web_hel);
    while($row_pedido_web_hel = mysqli_fetch_array($query_pedidos_web_hel)){
        $cantidad_pedidos_hel_web = $row_pedido_web_hel['cantidad'];
        }
        
    // ================================================================================ //
    // CANTIDAD PEDIDOS HELADERIA EN LOCAL
    // ================================================================================ //
    // TOTAL PEDIDOS EN LOCAL HELADERIA EN EL DIA DE LA FECHA
    $sql_pedidos_local_hel_hoy = "select count(lugar_venta) as cantidad from st_ventas where espacio = 'heladeria' and lugar_venta = 'Local' and fecha_venta = curdate()";
    mysqli_select_db($conn,'storia');
    $query_pedidos_local_hel_hoy = mysqli_query($conn,$sql_pedidos_local_hel_hoy);
    while($row_pedido_local_hel_hoy = mysqli_fetch_array($query_pedidos_local_hel_hoy)){
        $cantidad_pedidos_local_hel_hoy = $row_pedido_local_hel_hoy['cantidad'];
    }
    // TOTAL PEDIDOS EN LOCAL HELADERIA
    $sql_pedidos_local_hel = "select count(lugar_venta) as cantidad from st_ventas where espacio = 'heladeria' and lugar_venta = 'Local'";
    mysqli_select_db($conn,'storia');
    $query_pedidos_local_hel = mysqli_query($conn,$sql_pedidos_local_hel);
    while($row_pedido_local_hel = mysqli_fetch_array($query_pedidos_local_hel)){
        $cantidad_pedidos_hel_local = $row_pedido_local_hel['cantidad'];
        }
    
    // ================================================================================ //
    // CANTIDAD PEDIDOS CAFE WEB
    // ================================================================================ //
    // TOTAL PEDIDOS WEB CAFE EN EL DIA DE LA FECHA
    $sql_pedidos_web_cafe_hoy = "select count(lugar_venta) as cantidad from st_ventas where espacio = 'cafeteria' and lugar_venta = 'Web' and                            fecha_venta = curdate()";
    mysqli_select_db($conn,'storia');
    $query_pedidos_web_cafe_hoy = mysqli_query($conn,$sql_pedidos_web_cafe_hoy);
    while($row_pedido_web_cafe_hoy = mysqli_fetch_array($query_pedidos_web_cafe_hoy)){
        $cantidad_pedidos_cafe_web_hoy = $row_pedido_web_cafe_hoy['cantidad'];
    }
    // TOTAL PEDIDOS CAFE HELADERIA
    $sql_pedidos_web_cafe = "select count(lugar_venta) as cantidad from st_ventas where espacio = 'cafeteria' and lugar_venta = 'Web'";
    mysqli_select_db($conn,'storia');
    $query_pedidos_web_cafe = mysqli_query($conn,$sql_pedidos_web_cafe);
    while($row_pedido_web_cafe = mysqli_fetch_array($query_pedidos_web_cafe)){
        $cantidad_pedidos_cafe_web = $row_pedido_web_cafe['cantidad'];
        }
        
    // ================================================================================ //
    // CANTIDAD PEDIDOS CAFE EN LOCAL
    // ================================================================================ //
    // TOTAL PEDIDOS EN LOCAL CAFE EN EL DIA DE LA FECHA
    $sql_pedidos_local_cafe_hoy = "select count(lugar_venta) as cantidad from st_ventas where espacio = 'cafeteria' and lugar_venta = 'Local' and fecha_venta = curdate()";
    mysqli_select_db($conn,'storia');
    $query_pedidos_local_cafe_hoy = mysqli_query($conn,$sql_pedidos_local_cafe_hoy);
    while($row_pedido_local_cafe_hoy = mysqli_fetch_array($query_pedidos_local_cafe_hoy)){
        $cantidad_pedidos_cafe_local_hoy = $row_pedido_local_cafe_hoy['cantidad'];
    }
    // TOTAL PEDIDOS CAFE
    $sql_pedidos_local_cafe = "select count(lugar_venta) as cantidad from st_ventas where espacio = 'cafeteria' and lugar_venta = 'Local'";
    mysqli_select_db($conn,'storia');
    $query_pedidos_local_cafe = mysqli_query($conn,$sql_pedidos_local_cafe);
    while($row_pedido_local_cafe = mysqli_fetch_array($query_pedidos_local_cafe)){
        $cantidad_pedidos_cafe_local = $row_pedido_local_cafe['cantidad'];
        }
    
    
    // ================================================================================ //
    // VENTAS HELADERIA WEB
    // ================================================================================ //
    // total ventas hoy en heladeria
    $sql_3 = "select sum(importe) as total from st_ventas where fecha_venta = curdate() and espacio = 'heladeria' and lugar_venta = 'Web'";
    mysqli_select_db($conn,'storia');
    $query_3 = mysqli_query($conn,$sql_3);
    while($rows_3 = mysqli_fetch_array($query_3)){
        $total_ventas_hoy_heladeria_web = $rows_3['total'];
    }
    // total ventas acumulado en heladeria
    $sql_4 = "select sum(importe) as total from st_ventas where espacio = 'heladeria' and lugar_venta = 'Web'";
    mysqli_select_db($conn,'storia');
    $query_4 = mysqli_query($conn,$sql_4);
    while($rows_4 = mysqli_fetch_array($query_4)){
        $total_ventas_acumulado_heladeria_web = $rows_4['total'];
    }
    // ================================================================================ //
    // VENTAS HELADERIA LOCAL
    // ================================================================================ //
    // total ventas hoy en heladeria
    $sql_heladeria_hoy_local = "select sum(importe) as total from st_ventas where fecha_venta = curdate() and espacio = 'heladeria' and lugar_venta = 'Local'";
    mysqli_select_db($conn,'storia');
    $query_heladeria_hoy_local = mysqli_query($conn,$sql_heladeria_hoy_local);
    while($rows_heladeria_hoy_local = mysqli_fetch_array($query_heladeria_hoy_local)){
        $total_ventas_hoy_heladeria_local = $rows_heladeria_hoy_local['total'];
    }
    // total ventas acumulado en heladeria
    $sql_heladeria_local = "select sum(importe) as total from st_ventas where espacio = 'heladeria' and lugar_venta = 'Local'";
    mysqli_select_db($conn,'storia');
    $query_heladeria_local = mysqli_query($conn,$sql_heladeria_local);
    while($rows_heladeria_local = mysqli_fetch_array($query_heladeria_local)){
        $total_ventas_acumulado_heladeria_local = $rows_heladeria_local['total'];
    }
    
    // ================================================================================ //
    // VENTAS CAFE WEB
    // ================================================================================ //
    // total ventas hoy en cafeteria via web
    $sql_cafe_web_hoy = "select sum(importe) as total from st_ventas where fecha_venta = curdate() and espacio = 'cafeteria' and lugar_venta = 'Web'";
    mysqli_select_db($conn,'storia');
    $query_cafe_web_hoy = mysqli_query($conn,$sql_cafe_web_hoy);
    while($rows_cafe_web_hoy = mysqli_fetch_array($query_cafe_web_hoy)){
        $total_ventas_cafe_web_hoy = $rows_cafe_web_hoy['total'];
    }
    // total ventas en cafeteria via web
    $sql_cafe_web = "select sum(importe) as total from st_ventas where espacio = 'cafeteria' and lugar_venta = 'Web'";
    mysqli_select_db($conn,'storia');
    $query_cafe_web = mysqli_query($conn,$sql_cafe_web);
    while($rows_cafe_web = mysqli_fetch_array($query_cafe_web)){
        $total_ventas_cafe_web = $rows_cafe_web['total'];
    }
    // ================================================================================ //
    // VENTAS CAFE LOCAL
    // ================================================================================ //
    // total ventas hoy en cafeteria via web
    $sql_cafe_local_hoy = "select sum(importe) as total from st_ventas where fecha_venta = curdate() and espacio = 'cafeteria' and lugar_venta = 'Local'";
    mysqli_select_db($conn,'storia');
    $query_cafe_local_hoy = mysqli_query($conn,$sql_cafe_local_hoy);
    while($rows_cafe_local_hoy = mysqli_fetch_array($query_cafe_local_hoy)){
        $total_ventas_cafe_local_hoy = $rows_cafe_local_hoy['total'];
    }
    // total ventas en cafeteria via web
    $sql_cafe_local = "select sum(importe) as total from st_ventas where espacio = 'cafeteria' and lugar_venta = 'Local'";
    mysqli_select_db($conn,'storia');
    $query_cafe_local = mysqli_query($conn,$sql_cafe_local);
    while($rows_cafe_local = mysqli_fetch_array($query_cafe_local)){
        $total_ventas_cafe_local = $rows_cafe_local['total'];
    }
    
    // ================================================================================ //
    // calculos para MESA x MESA
    // ================================================================================ //
    // mesa 1 en el dia de la fecha
    $sql_mesa_1 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate() and mesa_numero = 1";
    mysqli_select_db($conn,'storia');
    $query_mesa_1 = mysqli_query($conn,$sql_mesa_1);
    while($rows_mesa_1 = mysqli_fetch_array($query_mesa_1)){
        $total_ventas_hoy_mesa_1 = $rows_mesa_1['total'];
    }
    // mesa 2 en el dia de la fecha
    $sql_mesa_2 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate() and mesa_numero = 2";
    mysqli_select_db($conn,'storia');
    $query_mesa_2 = mysqli_query($conn,$sql_mesa_2);
    while($rows_mesa_2 = mysqli_fetch_array($query_mesa_2)){
        $total_ventas_hoy_mesa_2 = $rows_mesa_2['total'];
    }
    // mesa 3 en el dia de la fecha
    $sql_mesa_3 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate() and mesa_numero = 3";
    mysqli_select_db($conn,'storia');
    $query_mesa_3 = mysqli_query($conn,$sql_mesa_3);
    while($rows_mesa_3 = mysqli_fetch_array($query_mesa_3)){
        $total_ventas_hoy_mesa_3 = $rows_mesa_3['total'];
    }
    // mesa 4 en el dia de la fecha
    $sql_mesa_4 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate() and mesa_numero = 4";
    mysqli_select_db($conn,'storia');
    $query_mesa_4 = mysqli_query($conn,$sql_mesa_4);
    while($rows_mesa_4 = mysqli_fetch_array($query_mesa_4)){
        $total_ventas_hoy_mesa_4 = $rows_mesa_4['total'];
    }
    // mesa 5 en el dia de la fecha
    $sql_mesa_5 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate() and mesa_numero = 5";
    mysqli_select_db($conn,'storia');
    $query_mesa_5 = mysqli_query($conn,$sql_mesa_5);
    while($rows_mesa_5 = mysqli_fetch_array($query_mesa_5)){
        $total_ventas_hoy_mesa_5 = $rows_mesa_5['total'];
    }
    // mesa 6 en el dia de la fecha
    $sql_mesa_6 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate() and mesa_numero = 6";
    mysqli_select_db($conn,'storia');
    $query_mesa_6 = mysqli_query($conn,$sql_mesa_6);
    while($rows_mesa_6 = mysqli_fetch_array($query_mesa_6)){
        $total_ventas_hoy_mesa_6 = $rows_mesa_6['total'];
    }
    // ================================================================================ //
    // total mesas
    // mesa 1 total
    $sql_table_1 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and mesa_numero = 1";
    mysqli_select_db($conn,'storia');
    $query_table_1 = mysqli_query($conn,$sql_table_1);
    while($rows_table_1 = mysqli_fetch_array($query_table_1)){
        $total_ventas_mesa_1 = $rows_table_1['total'];
    }
    // mesa 2 total
    $sql_table_2 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and mesa_numero = 2";
    mysqli_select_db($conn,'storia');
    $query_table_2 = mysqli_query($conn,$sql_table_2);
    while($rows_table_2 = mysqli_fetch_array($query_table_2)){
        $total_ventas_mesa_2 = $rows_table_2['total'];
    }
    // mesa 3 total
    $sql_table_3 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and mesa_numero = 3";
    mysqli_select_db($conn,'storia');
    $query_table_3 = mysqli_query($conn,$sql_table_3);
    while($rows_table_3 = mysqli_fetch_array($query_table_3)){
        $total_ventas_mesa_3 = $rows_table_3['total'];
    }
    // mesa 4 total
    $sql_table_4 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and mesa_numero = 4";
    mysqli_select_db($conn,'storia');
    $query_table_4 = mysqli_query($conn,$sql_table_4);
    while($rows_table_4 = mysqli_fetch_array($query_table_4)){
        $total_ventas_mesa_4 = $rows_table_4['total'];
    }
    // mesa 5 total
    $sql_table_5 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and mesa_numero = 5";
    mysqli_select_db($conn,'storia');
    $query_table_5 = mysqli_query($conn,$sql_table_5);
    while($rows_table_5 = mysqli_fetch_array($query_table_5)){
        $total_ventas_mesa_5 = $rows_table_5['total'];
    }
    // mesa 6 total
    $sql_table_6 = "select sum(total) as total from st_mesas where estado = 'Cerrada' and mesa_numero = 6";
    mysqli_select_db($conn,'storia');
    $query_table_6 = mysqli_query($conn,$sql_table_6);
    while($rows_table_6 = mysqli_fetch_array($query_table_6)){
        $total_ventas_mesa_6 = $rows_table_6['total'];
    }
    
    // ================================================================================ //
    // calculos para TOTALES DE MESAS
    // ================================================================================ //
    // CALCULO TOTAL PARA TODAS LAS MESAS HOY
    $sql_mesas_hoy = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate()";
    mysqli_select_db($conn,'storia');
    $query_mesas_hoy = mysqli_query($conn,$sql_mesas_hoy);
    while($rows_mesas_hoy = mysqli_fetch_array($query_mesas_hoy)){
        $total_mesas_hoy = $rows_mesas_hoy['total'];
    }
    // CALCULO TOTAL PARA TODAS LAS MESAS
    $sql_mesas = "select sum(total) as total from st_mesas where estado = 'Cerrada'";
    mysqli_select_db($conn,'storia');
    $query_mesas = mysqli_query($conn,$sql_mesas);
    while($rows_mesas = mysqli_fetch_array($query_mesas)){
        $total_mesas = $rows_mesas['total'];
    }
    
    // ================================================================================== //
    // ANALISIS DE SABORES MAS PEDIDOS
    // ================================================================================== //
    $sql_sabores = "SELECT sabor, COUNT(sabor) total FROM (SELECT sabor_1 sabor FROM st_ventas where espacio = 'heladeria' UNION ALL SELECT sabor_2 sabor FROM st_ventas where espacio = 'heladeria' UNION ALL SELECT sabor_3 sabor FROM st_ventas where espacio = 'heladeria' UNION ALL SELECT sabor_4 sabor FROM st_ventas where espacio = 'heladeria') T group by sabor having count(*)>1 order by total DESC limit 5";
    mysqli_select_db($conn,'storia');
    $query_sabores = mysqli_query($conn,$sql_sabores);
    
    // ================================================================================== //
    // ANALISIS DE PRODUCTOS DE HELADERIA MAS PEDIDOS
    // ================================================================================== //
    $sql_helados = "select descripcion, count(descripcion) as cantidad  from  st_ventas  where  espacio = 'heladeria'  group by descripcion having count(descripcion)>1 order by descripcion limit 5;";
    mysqli_select_db($conn,'storia');
    $query_helados = mysqli_query($conn,$sql_helados);


        echo '<div class="col-sm-12">
                <div class="well">
                    <h4><img class="img-reponsive img-rounded" src="../../icons/actions/office-chart-pie.png" /> Estad??sticas Generales</h4>
                    <p>Aqu?? est??n presentadas todas las estad??sticas del negocio</p>
                </div>
                
                <div class="row">
                    <div class="col-sm-3">
                    <div class="well">
                        <h4><img class="img-reponsive img-rounded" src="../../icons/actions/im-aim.png" /> Pedidos Web Helader??a</h4>
                        <p>Hoy: <span class="label label-success">'.$cantidad_pedidos_hel_web_hoy.'</span></p> 
                        <p>Acumulados: <span class="label label-warning">'.$cantidad_pedidos_hel_web.'</span></p>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="well">
                        <h4><img class="img-reponsive img-rounded" src="../../icons/actions/im-aim.png" /> Pedidos Web Confiter??a</h4>
                        <p>Hoy: <span class="label label-success">'.$cantidad_pedidos_cafe_web_hoy.'</span></p> 
                        <p>Acumulados: <span class="label label-warning">'.$cantidad_pedidos_cafe_web.'</span></p> 
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="well">
                        <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Ventas Web Helader??a</h4>
                        <p>Hoy: <span class="label label-success">$'.$total_ventas_hoy_heladeria_web.'</span></p>
                        <p>Acumulado: <span class="label label-warning">$'.$total_ventas_acumulado_heladeria_web.'</span></p>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="well">
                    <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Ventas Web Caf??</h4>
                        <p>Hoy: <span class="label label-success">$'.$total_ventas_cafe_web_hoy.'</span></p> 
                        <p>Acumulado: <span class="label label-warning">$'.$total_ventas_cafe_web.'</span></p> 
                    </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-3">
                    <div class="well">
                        <h4><img class="img-reponsive img-rounded" src="../../icons/actions/im-aim.png" /> Pedidos Local Helader??a</h4>
                        <p>Hoy: <span class="label label-success">'.$cantidad_pedidos_local_hel_hoy.'</span></p> 
                        <p>Acumulados: <span class="label label-warning">'.$cantidad_pedidos_hel_local.'</span></p>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="well">
                        <h4><img class="img-reponsive img-rounded" src="../../icons/actions/im-aim.png" /> Pedidos Local Confiter??a</h4>
                        <p>Hoy: <span class="label label-success">'.$cantidad_pedidos_cafe_local_hoy.'</span></p> 
                        <p>Acumulados: <span class="label label-warning">'.$cantidad_pedidos_cafe_local.'</span></p> 
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="well">
                        <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Ventas Local Helader??a</h4>
                        <p>Hoy: <span class="label label-success">$'.$total_ventas_hoy_heladeria_local.'</span></p>
                        <p>Acumulado: <span class="label label-warning">$'.$total_ventas_acumulado_heladeria_local.'</span></p>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="well">
                    <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Ventas Local Caf??</h4>
                        <p>Hoy: <span class="label label-success">$'.$total_ventas_cafe_local_hoy.'</span></p> 
                        <p>Acumulado: <span class="label label-warning">$'.$total_ventas_cafe_local.'</span></p> 
                    </div>
                    </div>
                </div>
               
               <div class="row">
                    <div class="col-sm-4">
                    <div class="well">
                    <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Ventas Mesas Hoy</h4>
                        <p>Mesa 1: <span class="label label-success">$'.$total_ventas_hoy_mesa_1.'</span></p> 
                        <p>Mesa 2: <span class="label label-warning">$'.$total_ventas_hoy_mesa_2.'</span></p> 
                        <p>Mesa 3: <span class="label label-success">$'.$total_ventas_hoy_mesa_3.'</span></p>
                        <p>Mesa 4: <span class="label label-warning">$'.$total_ventas_hoy_mesa_4.'</span></p> 
                        <p>Mesa 5: <span class="label label-success">$'.$total_ventas_hoy_mesa_5.'</span></p>
                        <p>Mesa 6: <span class="label label-warning">$'.$total_ventas_hoy_mesa_6.'</span></p> 
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="well">
                    <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Ventas Mesas Acumulado</h4>
                        <p>Mesa 1: <span class="label label-success">$'.$total_ventas_mesa_1.'</span></p> 
                        <p>Mesa 2: <span class="label label-warning">$'.$total_ventas_mesa_2.'</span></p> 
                        <p>Mesa 3: <span class="label label-success">$'.$total_ventas_mesa_3.'</span></p>
                        <p>Mesa 4: <span class="label label-warning">$'.$total_ventas_mesa_4.'</span></p> 
                        <p>Mesa 5: <span class="label label-success">$'.$total_ventas_mesa_5.'</span></p>
                        <p>Mesa 6: <span class="label label-warning">$'.$total_ventas_mesa_6.'</span></p>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="well">
                    <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-income-categories.png" /> Total Mesas</h4>
                        <p>Hoy: <span class="label label-success">$'.$total_mesas_hoy.'</span></p>
                        <p>Acumulado: <span class="label label-warning">$'.$total_mesas.'</span></p> 
                        
                    </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-8">
                    <div class="well">
                    <h4><img class="img-reponsive img-rounded" src="../../icons/actions/games-highscores.png" /> Sabores - Los 5 m??s Pedidos</h4> 
                    
                                                  
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Sabores</th>
                            <th>Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>';
                        
                        while($row_sabores = mysqli_fetch_array($query_sabores)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td class='text-nowrap text-center'>".$row_sabores['sabor']."</a></td>";
                        echo "<td class='text-nowrap text-center'>".$row_sabores['total']."</a></td>";
                        echo "<td class='text-nowrap'>";
                        echo "</td>";
                        }
                         
                        echo '</tbody>
                            </table>
                                       
                    </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="well">
                           <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-income-categories.png" /> Total Ventas</h4>
                            <p>Hoy: <span class="label label-success">$'.$total_ventas_hoy.'</span></p>  
                            
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-8">
                        <div class="well">
                            
                           <h4><img class="img-reponsive img-rounded" src="../../icons/actions/games-highscores.png" /> Helader??a - Los 5 m??s Comprados</h4> 
                    
                                                  
                        <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>';
                        
                        while($row_helados = mysqli_fetch_array($query_helados)){
                        // Listado normal
                        echo "<tr>";
                        echo "<td class='text-nowrap text-center'>".$row_helados['descripcion']."</a></td>";
                        echo "<td class='text-nowrap text-center'>".$row_helados['cantidad']."</a></td>";
                        echo "<td class='text-nowrap'>";
                        echo "</td>";
                        }
                         
                        echo '</tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="well">
                            <h4><img class="img-reponsive img-rounded" src="../../icons/actions/view-income-categories.png" /> Total Ventas</h4>
                            <p>Acumulado: <span class="label label-success">$'.$total_ventas_acumulado.'</span></p> 
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
            </div>';

}


/*
** carga de tablas con total ventas del d??a y acumuladas
*/
function ventas($conn){

    // total ventas en el d??a de la fecha
    $sql_mesas_hoy = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate()";
    mysqli_select_db($conn,'storia');
    $query_1 = mysqli_query($conn,$sql_mesas_hoy);
    while($rows_1 = mysqli_fetch_array($query_1)){
        $mesas_hoy = $rows_1['total'];
    }
    
    $sql_ventas_hoy = "select sum(importe) as total from st_ventas where fecha_venta = curdate()";
    mysqli_select_db($conn,'storia');
    $query_ventas_hoy = mysqli_query($conn,$sql_ventas_hoy);
    while($rows_ventas_hoy = mysqli_fetch_array($query_ventas_hoy)){
        $ventas_hoy = $rows_ventas_hoy['total'];
    }
    
    $total_ventas_hoy = $mesas_hoy + $ventas_hoy;
    
    // total ventas acumulado
    $sql_2 = "select ((select sum(importe) from st_ventas) + (select sum(total) from st_mesas where estado = 'Cerrada')) as total";
    mysqli_select_db($conn,'storia');
    $query_2 = mysqli_query($conn,$sql_2);
    while($rows_2 = mysqli_fetch_array($query_2)){
        $total_ventas_acumulado = $rows_2['total'];
    }


    echo '<div class="container">
    
            <div class="col-sm-9">
            
            <div class="well">
                
               
                    <h2><img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Total Ventas</h2>
                    <p>Discrimimaci??n de Ventas sobre el d??a de la Fecha y el acumulado</p>            
                
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Total Diario</th>
                            <th>Total Acumulado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-nowrap text-center">$'.$total_ventas_hoy.'</td>
                            <td class="text-nowrap text-center">$'.$total_ventas_acumulado.'</td>
                        </tr>
                        </tbody>
                    </table>
             
                
            </div>
               
    
        </div>
        </div>
        
        <div class="container">
        <div class="col-sm-9">
        
        <div class="well">';
        
        espaciosVentas($conn);
        
        echo '</div>
        
        </div>
        </div>
        ';



}




?>
