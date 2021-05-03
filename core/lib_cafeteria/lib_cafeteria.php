<?php


//FORMULARIOS

/*
** funcion que carga la tabla de todas las ventas de cafeteria
*/


function ventasCafeteria($conn){

if($conn)
{
	$sql = "SELECT * FROM st_mesas where estado = 'Cerrada'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/apps/java.png"  class="img-reponsive img-rounded"> Administración de Ventas en Cafetería';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Mesa Número</th>
            <th class='text-nowrap text-center'>Estado</th>
            <th class='text-nowrap text-center'>Fecha</th>
            <th class='text-nowrap text-center'>Empleado</th>
            <th class='text-nowrap text-center'>Hora Apertura</th>
            <th class='text-nowrap text-center'>Hora Cierre</th>
            <th class='text-nowrap text-center'>Total</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['mesa_numero']."</td>";
			 echo "<td align=center>".$fila['estado']."</td>";
			 echo "<td align=center>".$fila['fecha']."</a></td>";
			 echo "<td align=center>".$fila['empleado']."</a></td>";
			 echo "<td align=center>".$fila['hora_apertura']."</a></td>";
			 echo "<td align=center>".$fila['hora_cierre']."</a></td>";
			 echo "<td align=center>$".$fila['total']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-success btn-sm" name="print_ticket"><img src="../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Ticket</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="ventas_fechas">
			  <img src="../icons/actions/view-calendar-day.png"  class="img-reponsive img-rounded"> Ventas por Fechas</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Ventas:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** funcion que carga visor de mesas
*/
function mesas($conn){
    
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
    
    echo '<div class="alert alert-success">
            <img src="../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesas</strong>: Estado de todas las Mesas
            </div><hr>    
    
    <div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">
            <img src="../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 1</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="1">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">
        
                    
            <button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>
            <button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			  
        </form>
        </div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-info">
        <div class="panel-heading">
            <img src="../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 2</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_2['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_2['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_2['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="2">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">
        
                    
            <button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>
            <button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			  
        </form>
        </div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-warning">
        <div class="panel-heading">
            <img src="../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 3</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_3['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_3['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_3['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="3">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">
        
                    
            <button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>
            <button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			 
        </form>
        </div>
      </div>
    </div>
  </div>
</div><hr><br>


<div class="container">    
  <div class="row">
    <div class="col-sm-4">
     <div class="panel panel-success">
        <div class="panel-heading">
            <img src="../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 4</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_4['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_4['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_4['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="4">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">
        
                    
            <button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>
            <button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			  
        </form>
        </div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-info">
        <div class="panel-heading">
            <img src="../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 5</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_5['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_5['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_5['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="5">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">
        
                    
            <button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>
            <button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			 
        </form>
        </div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-warning">
        <div class="panel-heading">
            <img src="../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 6</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_6['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_6['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_6['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="6">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">
        
                    
            <button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>
            <button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			  
        </form>
        </div>
      </div>
    </div>
  </div>
</div><br><br>';


}


/*
** funcion detalles de mesa
*/
function detallesMesa($mesa,$conn){
    
        
    echo '<div class="col-sm-10"> 
      <div class="panel panel-info">
        <div class="panel-heading">
            <img src="../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Detalles Mesa: </strong> '.$mesa.'
        </div><br>';
               
        if($conn){
        
        $consulta = "select id from st_mesas where mesa_numero = '$mesa' and estado = 'Abierta' and fecha = CURDATE()";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$consulta);
        while($row = mysqli_fetch_array($query)){
            $id = $row['id'];
        }
        
        $consulta_1 = "select sum(importe) as total from st_items_mesa where id_mesa_numero = '$id'";
        $resval = mysqli_query($conn,$consulta_1);
        while($rows = mysqli_fetch_array($resval)){
            $total = $rows['total'];
        }
        
        $sql = "SELECT * FROM st_items_mesa where id_mesa_numero = '$id'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	
            echo "<table class='table table-condensed' style='width:100%' id='myTable'>";
            echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Item</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['item']."</a></td>";
			 echo "<td align=center>$".$fila['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
                <input type="hidden" name="mesa_numero" value="'.$mesa.'">
                <input type="hidden" name="id_mesa" value="'.$id.'">
                
			<button type="submit" class="btn btn-default btn-sm" name="cerrar_mesa" data-toggle="tooltip" data-placement="right" title="Cálculo del total consumido y Cierre de Mesa">
			  <img src="../icons/actions/help-donate.png"  class="img-reponsive img-rounded"> Cerrar Mesa</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Items:  '.$count.' </button>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);
        
        
        echo '</div>
                <div class="panel-footer">
                    <p><strong>Total parcial</strong>: $'.$total.'</p>
                    </div>
                </div>
                </div>';

}


/*
** Abrir mesa
*/
function openTable($mesa,$nombre,$conn){

    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    $importe = 0.00;
    
    //$sql = "select * from st_mesas "
    
    echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/status/dialog-information.png" /> Apertura de Mesa</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	                  
            <div class="alert alert-success">
                <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> <strong>Atención!</strong>
            </div>
            
		    <div class="form-group">
              <label>Mesa Número:</label>
		     <input type="text" class="form-control" name="mesa_number" value="'.$mesa.'" readonly>
		     </div><hr>
		     
		    <div class="form-group">
              <label>Empleado:</label>
		    <input type="text" class="form-control" name="empleado" value="'.$nombre.'" readonly>
		    </div>
		    <hr>
		    
		    <div class="form-group">
              <label>Fecha:</label>
		    <input type="date" class="form-control" name="fecha" value="'.$fecha_actual.'" readonly>
		    </div>
		    <hr>
		    
		    <div class="form-group">
              <label>Hora:</label>
		    <input type="time" class="form-control" name="hora" value="'.$hora_actual.'" readonly>
		    </div>
		    <hr>
		    
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="abrir_mesa">Aceptar</button><br>
            
            </form>
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block">Cancelar</button></a>
            </div>
            </div>
            
            </div>
            </div>
            </div>';

}


/*
** formulario para carga de items en mesa
*/
function formAddItems($mesa,$conn){
    
       
    $consulta = "select id from st_mesas where mesa_numero = '$mesa' and estado = 'Abierta' and fecha = curdate()";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$consulta);
    while($fila = mysqli_fetch_array($query)){
        $id = $fila['id'];
    }
       
    $cant_rows = mysqli_num_rows($query);
    
    if($cant_rows == 0){
    
                echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Primero debe realizar la apertura de la Mesa';
			    echo "</div>";
			    echo "</div>";
    
    }else{
    

    echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-success">
            <div class="panel-heading">
                <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Items a la Mesa</div>
            <div class="panel-body">
            
            <form id="frmajax" method="POST">
            <input type="hidden" class="form-control" name="id_mesa" value="'.$id.'">
            
		    <div class="form-group">
              <label>Mesa Número:</label>
		     <input type="text" class="form-control" name="mesa_number" value="'.$mesa.'" readonly>
		     </div><hr>
		     
		    <div class="form-group">
		  <label for="sel1">Producto:</label>
		  <select class="form-control" name="item" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "select * from st_productos where cod_producto like 'cf%'";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[descripcion].'" >'.$valores[descripcion].'</option>';
				}
                }
			}

			mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
		    
		      
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
		    <p>Repita esta operación cuantas veces desee agregar items, si no desea agregar más, puede presionar Cancelar o Home.</p>
                </div><hr>
            
            <button id="insertar_item" class="btn btn-success btn-block" name="insertar_item">Aceptar</button><br>
            
            </form>
            <a href="main.php"><button type="button" class="btn btn-danger btn-block">Cancelar</button></a>
            </div>
            </div>
            
            </div>
            </div>
            </div>';

            }

}


/*
** formulario para cerrar mesa
*/
function formCloseMesa($id_mesa,$mesa,$conn){


    $sql = "select sum(importe) as total from st_items_mesa where id_mesa_numero = '$id_mesa'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        while($fila = mysqli_fetch_array($query)){
                $importe = $fila['total'];
        }
            
            echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-info">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/view-loan.png" /> Cálculo Final - Cierre de la Mesa: '.$mesa.'</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id_mesa" value="'.$id_mesa.'">
	      <input type="hidden" class="form-control" name="total" value="'.$importe.'">
            
                <div class="alert alert-danger">
		    <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por cerrar la mesa: <strong>'.$mesa.'</strong></p>
		    <p>Importe Final: $<strong>'.$importe.'</strong></p><hr>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="close_mesa">Aceptar</button><br>
            
            </form>
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block">Cancelar</button></a>
            </div>
            </div>
            
            </div>
            </div>
            </div>';





}

/*
** formulario de ticket para cierre de mesa
*/
function ticket($id_mesa,$conn){

    echo '<div class="col-sm-4"> 
            <div class="panel panel-info">
                <div class="panel-heading">
                    <img src="../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Ticket
                </div><br>';
               
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
	
            echo "<table class='table table-condensed' style='width:100%'>";
            echo "<thead>
		    <th class='text-nowrap text-center'>Item</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['item']."</a></td>";
			 echo "<td align=center>$".$fila['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);
        
        
        echo '</div>
                <div class="panel-footer">
                    <p><strong>Total</strong>: $'.$total.'</p>
                    <a href="../lib_cafeteria/print.php?file=print_ticket.php&id_mesa='.$id_mesa.'" target="_blank"><button type="button" class="btn btn-info btn-block">
                        <img src="../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir</button></a>
                </div>
                </div>';



}


/*
** modal detalle de pedidos en mesas
*/
function modal_detalles($mesa,$conn){
   
   if($conn){
   
  
   $mesa = "<script> document.getElementById.data().id; </script>";
   
   echo '<div id="myModal_Details" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalles de la Mesa '.$mesa.'</h4>
      </div>
      <div class="modal-body">
        <p><input type="text" class="form-control" name="id_mesa" id="id_mesa" value="id_mesa" readonly></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>';

}else{
    
    mysqli_error($conn);

}

}


/*
<script type="text/javascript">
  $(document).ready(function(e) {
  $('#myModal_Details').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data().id;
    $(e.currentTarget).find('#id_mesa').val(id); 
    window.location.href = window.location.href + "?mesa=id";
  });
});
  </script>
*/


// ================================================
// PERSISTENCIA

/*
** funcion que abre mesa en base de datos
*/
function aperturaMesa($mesa,$fecha,$hora,$empleado,$conn){
    
    $estado = 'Abierta';

    $consulta = "INSERT INTO st_mesas".
            "(mesa_numero,estado,fecha,empleado,hora_apertura)".
            "VALUES ".
        "('$mesa','$estado','$fecha','$empleado','$hora')";
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Apertura Satisfactoria.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema en la Apertura de la Mesa. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    
}

/*
** agregar intem en tabla 
*/
function addItems($id_mesa,$item,$conn){
    
    $sql = "select precio from st_productos where descripcion = '$item'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        $precio = $row['precio'];
    }
    
    
    $consulta = "INSERT INTO st_items_mesa".
            "(id_mesa_numero,item,importe)".
            "VALUES ".
        "('$id_mesa','$item','$precio')";
        mysqli_select_db($conn,'storia');
        echo mysqli_query($conn,$consulta);
                        

}


/*
** persistencia de cierre de mesa
*/
function closeMesa($id_mesa,$total,$conn){
    
    $hora_actual =  date("H:i:s");
    $estado = 'Cerrada';
        
    $sql = "update st_mesas set estado = '$estado', hora_cierre = '$hora_actual', total = '$total' where id = '$id_mesa'";
    mysqli_select_db($conn,'storia');
    $resp = mysqli_query($conn,$sql);
    
    if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Mesa Cerrada Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Cerrar la Venta. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
    



}




?>
