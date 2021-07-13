<?php


//FORMULARIOS

/*
** funcion que carga la tabla de todas las ventas de cafeteria en mesas
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
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/apps/java.png"  class="img-reponsive img-rounded"> Administración de Ventas en Cafetería';
	echo '</div><br>';

            echo "<div class='table-responsive'>
                    <table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center' hidden>ID</th>
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
			 echo "<td align=center hidden>".$fila['id']."</td>";
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
                    if($fila['estado'] == 'Cerrada'){
                   echo '<button type="submit" class="btn btn-success btn-sm" name="print_ticket">
                            <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Ticket</button>';
                   }
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table></div>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="filtro_cafeteria">
			  <img src="../../icons/actions/view-calendar-day.png"  class="img-reponsive img-rounded"> Filtros Mesas Cerradas</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Cajas Cerradas:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** funcion que carga la tabla de todas las ventas de cafeteria via web
*/


function ventasCafeteriaWeb($conn){

if($conn)
{
	$sql = "SELECT * FROM st_ventas where espacio = 'cafeteria' and lugar_venta = 'Web'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/apps/java.png"  class="img-reponsive img-rounded"> Administración de Ventas Web en Cafetería';
	echo '</div><br>';

            echo "<div class='table-responsive'>
                    <table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center' hidden>ID</th>
		    <th class='text-nowrap text-center'>Producto</th>
            <th class='text-nowrap text-center'>Modo de Pago</th>
            <th class='text-nowrap text-center'>Fecha Pedido</th>
            <th class='text-nowrap text-center'>Hora Pedido</th>
            <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th class='text-nowrap text-center'>Estado Entrega</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center hidden>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['tipo_pago']."</td>";
			 echo "<td align=center>".$fila['fecha_venta']."</a></td>";
			 echo "<td align=center>".$fila['hora_venta']."</a></td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</a></td>";
			 echo "<td align=center>$".$fila['importe']."</a></td>";
			 if($fila['estado_entrega'] == 'Entregado'){
			 echo "<td align=center style='background-color: #abebc6'>".$fila['estado_entrega']."</a></td>";
			 }
			 if($fila['estado_entrega'] == 'No Entregado'){
			 echo "<td align=center style='background-color:red'>".$fila['estado_entrega']."</a></td>";
			 }
			 if($fila['estado_entrega'] == 'No Responde'){
			 echo "<td align=center style='background-color: #bb8fce'>".$fila['estado_entrega']."</a></td>";
			 }
			 if($fila['estado_entrega'] == 'En Camino'){
			 echo "<td align=center style='background-color: #aed6f1 '>".$fila['estado_entrega']."</a></td>";
			 }
			 if($fila['estado_entrega'] == 'En Preparación'){
			 echo "<td align=center style='background-color: #edbb99'>".$fila['estado_entrega']."</a></td>";
			 }
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   if(($fila['lugar_venta'] != 'Local') && ($fila['estado_entrega'] != 'Entregado')){
                   echo '<button type="submit" class="btn btn-warning btn-xs" name="asignar_repartidor"><img src="../../icons/actions/im-aim.png"  class="img-reponsive img-rounded"> Asignar Repartidor</button>';
                   }
                   echo '</form>';
                   echo '<a href="../../lib_cafeteria/print.php?file=print_pedido_web_cafeteria.php&id='.$fila['id'].'" target="_blank"><button type="button" class="btn btn-success btn-xs"><img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Pedido</button></a>';
             echo "</td>";
			 $count++;
		}

		echo "</table></div>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Pedidos:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** funcion que carga la tabla de todas las ventas de cafeteria via web
*/


function ventasCafeteriaLocal($conn){

if($conn)
{
	$sql = "SELECT * FROM st_ventas where espacio = 'cafeteria' and lugar_venta <> 'Web' and estado_ticket = 'Cerrado'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/apps/java.png"  class="img-reponsive img-rounded"> Administración de Ventas en Local Cafetería';
	echo '</div><br>';

            echo "<div class='table-responsive'>
                    <table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center' hidden>ID</th>
		    <th class='text-nowrap text-center'>Producto</th>
		    <th class='text-nowrap text-center'>Cantidad</th>
            <th class='text-nowrap text-center'>Modo de Pago</th>
            <th class='text-nowrap text-center'>Fecha Pedido</th>
            <th class='text-nowrap text-center'>Hora Pedido</th>
            <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th class='text-nowrap text-center'>Nro. Ticket</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center hidden>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td align=center>".$fila['tipo_pago']."</td>";
			 echo "<td align=center>".$fila['fecha_venta']."</a></td>";
			 echo "<td align=center>".$fila['hora_venta']."</a></td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</a></td>";
			 echo "<td align=center>$".$fila['importe']."</a></td>";
			 echo "<td align=center>".$fila['nro_ticket']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 
			 echo "</td>";
			 $count++;
		}

		echo "</table></div>";
		echo "<br>";
		echo '<a data-toggle="precios_cafeteria" data-target="#precios_cafeteria" href="#" class="btn btn-success btn-sm openCafe"><span class="glyphicon glyphicon-usd"></span> Precios Cafetería</a><br><br>';
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
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesas</strong>: Estado de todas las Mesas
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
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="1">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">';
        
        if($row['estado'] == 'Abierta'){
                    
         echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa" disabled>
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
        }else{
            
            echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
        
        }
        
          echo '<button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			  
        </form>
        </div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-info">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 2</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_2['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_2['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_2['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="2">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">';
        
        if($row_2['estado'] == 'Abierta'){
                   
        echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa" disabled>
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
        }else{
            
            echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
        
        }
        echo '<button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			  
        </form>
        </div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-warning">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 3</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_3['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_3['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_3['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="3">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">';
        
        if($row_3['estado'] == 'Abierta'){
                    
         echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa" disabled>
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
        
        }else{
            
            echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
            
        }
			  
         echo '<button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			 
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
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 4</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_4['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_4['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_4['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="4">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">';
        
        if($row_4['estado'] == 'Abierta'){
                    
        echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa" disabled>
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
        }else{
            
            echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
        
        }
         echo '<button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			  
        </form>
        </div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-info">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 5</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_5['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_5['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_5['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="5">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">';
        
        if($row_5['estado'] == 'Abierta'){
                    
        echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa" disabled>
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
        }else{
        
            echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>'; 
        
        }
         echo '<button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			 
        </form>
        </div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-warning">
        <div class="panel-heading">
            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Mesa 6</strong>
        </div>
        <div class="panel-body">
        <p><strong>Fecha</strong>: '.$row_6['fecha'].'</p>
        <p><strong>Hora Apertura</strong>: '.$row_6['hora_apertura'].'</p>
        <p><strong>Empleado</strong>: '.$row_6['empleado'].'</p>
        <hr>
        <form action="#" method="POST">
        <input type="hidden" name="mesa_number" value="6">
            
            <button type="submit" class="btn btn-info btn-block" name="details_mesa" data-toggle="tooltip" data-placement="right" title="Detalles de Pedidos de la Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Detalles</button>
       
        </div>
        <div class="panel-footer">';
        
        if($row_6['estado'] == 'Abierta'){
                    
            echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa" disabled>
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
			  
        }else{
        
            echo '<button type="submit" class="btn btn-success btn-block" name="open_mesa" data-toggle="tooltip" data-placement="right" title="Apertura de Mesa">
			  <img src="../../icons/places/folder-green.png"  class="img-reponsive img-rounded"> Abrir</button>';
        
        }
         
         echo '<button type="submit" class="btn btn-default btn-block" name="add_producto_mesa" data-toggle="tooltip" data-placement="right" title="Agregar Comanda">
			  <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pedido</button>
			  
        </form>
        </div>
      </div>
    </div>
  </div>
</div><br><br>';


}

/*
** formulario para agregar venta de cafeteria en local
*/
function formAddVentaCafeteriaLocal($conn){
       
       
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nueva Venta Cafetería en Local</div>
		  <div class="panel-body">
	
	    <form id="fr_cafeteria_local_ajax" method="POST">
	    
	    <div class="form-group">
		  <label for="sel1">Cliente:</label>
		  <select class="form-control" name="cliente" required id="cliente" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_clientes where espacio = 'cli' order by cliente_nombre ASC ";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cliente_nombre].'" >'.$valores[dni].' - '.$valores[cliente_nombre].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
		<p>Si el Cliente no se encuentra en la base presione el botón "Nuevo Cliente" para darlo de alta</p>
		<!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#newCliente">Nuevo Cliente</button>
		<hr>
            
            <div class="form-group">
		  <label for="sel1">Producto:</label>
		  <select class="form-control" name="producto" id="producto" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_productos where cod_producto like 'cf%' order by descripcion ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[descripcion].'" >'.$valores[descripcion].'</option>';
				}
                }
			}
			  
		 echo '</select>
		</div><hr>
		
		<div class="form-group">
        <label for="usr">Cantidad:</label>
        <input type="number" class="form-control" name="cantidad" id="cantidad" value="1" required>
        </div><hr>
            
            
		 <div class="form-group">
		  <label for="sel1">Empleado:</label>
		  <select class="form-control" name="empleado" id="empleado" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_clientes where espacio = 'emp' order by cliente_nombre ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cliente_nombre].'" >'.$valores[cliente_nombre].'</option>';
				}
                }
			}
            
            echo '</select>
                    </div><hr>
            
            <div class="form-group">
            <label for="sel1">Lugar / Modo de Venta:</label>
            <select class="form-control" name="lugar_venta" id="lugar_venta" required>
                <option value="" disabled selected>Seleccionar</option>
                <option value="Local">Local</option>
                <option value="WhatsApp">WhatsApp</option>
                <option value="Telefonica">Telefónica</option>
                </select>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Tipo de Pago:</label>
            <select class="form-control" name="modo_pago" id="modo_pago" required>
                <option value="" disabled selected>Seleccionar</option>
                <option value="Tarjeta Credito">Tarjeta Crédito</option>
                <option value="Tarjeta Debito">Tarjeta Débito</option>
                <option value="Efectivo">Efectivo</option>
                </select>
            </div><hr>
            
                 
            <button type="button" class="btn btn-success btn-xs btn-block" name="addVentaCafeteria" id="add_venta_cafeteria_local">
                <img src="../../icons/actions/dialog-ok.png"  class="img-reponsive img-rounded"> Aceptar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** formulario para agregar venta de cafeteria en local
*/
function formFinalVentaCafeteriaLocal($producto,$empleado,$lugar_venta,$modo_pago,$cliente,$conn){
       
       $sql = "select precio from st_productos where descripcion = '$producto'";
       mysqli_select_db($conn,'storia');
       $query = mysqli_query($conn,$sql);
       while($row = mysqli_fetch_array($query)){
            $precio = $row['precio'];
       }
       
       
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Terminar Venta Cafetería en Local</div>
		  <div class="panel-body">
	
	    <form id="frcafeajax" method="POST">
            
             
            <div class="form-group">
                <label for="email">Producto:</label>
                <input type="text" class="form-control" name="producto" value="'.$producto.'" readonly>
            </div>
            
            <div class="form-group">
                <label for="pwd">Empleado:</label>
                <input type="text" class="form-control" name="empleado" value="'.$empleado.'" readonly>
            </div>
            
            <div class="form-group">
                <label for="pwd">Lugar de Venta:</label>
                <input type="text" class="form-control" name="lugar_venta" value="'.$lugar_venta.'" readonly>
            </div>
            
            <div class="form-group">
                <label for="pwd">Modo Pago:</label>
                <input type="text" class="form-control" name="modo_pago" value="'.$modo_pago.'" readonly>
            </div>
            
            <div class="form-group">
                <label for="pwd">Precio:</label>
                <input type="text" class="form-control" name="precio" value="'.$precio.'" readonly>
            </div>
            
            <div class="form-group">
                <label for="pwd">Cliente:</label>
                <input type="text" class="form-control" name="cliente" value="'.$cliente.'" readonly>
            </div>
                 
            <button id="add_venta_cafeteria" class="btn btn-success btn-xs btn-block" name="add_venta_cafeteria">
                <img src="../../icons/actions/dialog-ok.png"  class="img-reponsive img-rounded"> Terminar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** funcion detalles de mesa
*/
function detallesMesa($mesa,$conn){
    
               
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
	
            echo '<div class="col-sm-10"> 
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Detalles Mesa: </strong> '.$mesa.'<br>' .$row_number.'
                        </div><br>';
	
            echo "<table class='table table-condensed' style='width:100%' id='myTable'>";
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
			 echo '<form <action="#" method="POST">
                   <input type="hidden" name="id" value="'.$fila['id'].'">
                
                    <button type="submit" class="btn btn-danger btn-xs" name="eliminar_item_mesa" data-toggle="tooltip" data-placement="right" title="Eliminar Item">
                    <img src="../../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Eliminar</button>
		      </form><br>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
                <input type="hidden" name="mesa_numero" value="'.$mesa.'">
                <input type="hidden" name="id_mesa" value="'.$id.'">
                
			<button type="submit" class="btn btn-default btn-sm" name="cerrar_mesa" data-toggle="tooltip" data-placement="right" title="Cálculo del total consumido y Cierre de Mesa">
			  <img src="../../icons/actions/help-donate.png"  class="img-reponsive img-rounded"> Cerrar Mesa</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Items:  '.$count.' </button>';
		

    mysqli_close($conn);
        
        
        echo '</div>
                <div class="panel-footer">
                    <p><strong>Total parcial</strong>: $'.$total.'</p>
                </div>';
        echo '</div></div>';
                
        }else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

}


/*
** Abrir mesa
*/
function openTable($mesa,$nombre,$conn){

    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    $importe = 0.00;
    
   
    
    echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/status/dialog-information.png" /> Apertura de Mesa</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	                  
            <div class="alert alert-success">
                <img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> <strong>Atención!</strong>
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
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Primero debe realizar la apertura de la Mesa';
			    echo "</div>";
			    echo "</div>";
    
    }else{
    

    echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-success">
            <div class="panel-heading">
                <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Agregar Items a la Mesa</div>
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
		      $query = "select * from st_productos";
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
		<img class="img-reponsive img-rounded" src="../../icons/actions/view-loan.png" /> Cálculo Final - Cierre de la Mesa: '.$mesa.'</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id_mesa" value="'.$id_mesa.'">
	      <input type="hidden" class="form-control" name="total" value="'.$importe.'">
            
                <div class="alert alert-danger">
		    <img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
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
** formulario para eliminar item de una mesa
*/
function formEliminarItem($id,$conn){


    $sql = "select * from st_items_mesa where id = '$id'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        while($fila = mysqli_fetch_array($query)){
                $item = $fila['item'];
        }
            
            echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-info">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/actions/edit-table-delete-row.png" /> Eliminar Item</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id" value="'.$id.'">
	                  
                <div class="alert alert-danger">
		    <img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por eliminar el item: <strong>'.$item.'</strong></p>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="delete_item">Aceptar</button><br>
            
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
                    <img src="../../icons/apps/preferences-web-browser-cookies.png"  class="img-reponsive img-rounded"> <strong>Ticket
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
                    <a href="../../lib_cafeteria/print.php?file=print_ticket.php&id_mesa='.$id_mesa.'" target="_blank"><button type="button" class="btn btn-info btn-block">
                        <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir</button></a>
                </div>
                </div>';

}


/*
** calculo de vendido en cafeteria 
*/
function filtrosCafeteria(){

        echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-success">
            <div class="panel-heading">
                <img class="img-reponsive img-rounded" src="../../icons/actions/view-bank-account.png" /> Calcular Recaudado en Cafetería</div>
            <div class="panel-body">
            
            <form action="#" method="POST">
                        
		     <div class="form-group">
                <label for="sel1">Mesa Número:</label>
                <select class="form-control" name="mesa_numero">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="1">Mesa 1</option>
                    <option value="2">Mesa 2</option>
                    <option value="3">Mesa 3</option>
                    <option value="4">Mesa 4</option>
                    <option value="5">Mesa 5</option>
                    <option value="6">Mesa 6</option>
                    <option value="Todas">Todas</option>
                </select>
                </div><hr>
		     
		                
		    <div class="form-group">
              <label>Fecha Desde:</label>
		     <input type="date" class="form-control" name="fecha_desde" required>
		     </div><hr>
		     
		     <div class="form-group">
              <label>Fecha Hasta:</label>
		     <input type="date" class="form-control" name="fecha_hasta" required>
		     </div><hr>
		    
		      
		    <p>Seleccione la Mesa deseada y el período entre fechas por el cual desea calcular ventas</p>
		    </div><hr>
            
            <button class="btn btn-success btn-block" name="calculo_cafeteria">
                <img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok.png" /> Calcular</button><br>
            
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';

}
 
/*
** funcion que devuelve el calculo de totales de cafeteria
*/
function totalCafeteria($mesa_numero,$fecha_desde,$fecha_hasta,$conn){

    if($conn)
{
		
	if($mesa_numero == 'Todas'){
	
       $sql = "SELECT sum(total) as total FROM st_mesas where estado = 'Cerrada' and fecha between '$fecha_desde' and '$fecha_hasta'";
	
	}else{
	
        $sql = "SELECT sum(total) as total, mesa_numero FROM st_mesas where estado = 'Cerrada' and mesa_numero = '$mesa_numero' and fecha between '$fecha_desde' and '$fecha_hasta'";
        
	}
	
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/apps/java.png"  class="img-reponsive img-rounded"> Total de Ventas entre '.$fecha_desde.' y '.$fecha_hasta.' para la/s Mesa/s: '.$mesa_numero.'';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center' hidden>ID</th>
		    <th class='text-nowrap text-center'>Mesa Número</th>
            <th class='text-nowrap text-center'>Total</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center hidden>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['mesa_numero']."</td>";
			 echo "<td align=center>$".$fila['total']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../../lib_cafeteria/print.php?file=print_informe_cafeteria.php&mesa_numero='.$mesa_numero.'&fecha_desde='.$fecha_desde.'&fecha_hasta='.$fecha_hasta.'" target="_blank">
                    <button type="button" class="btn btn-success btn-sm" name="print_ticket">
                    <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Informe</button></a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);




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
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Apertura Satisfactoria.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema en la Apertura de la Mesa. '  .mysqli_error($conn);
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
** agregar intem en tabla 
*/
function addProductos($producto,$empleado,$lugar_venta,$modo_pago,$importe,$cliente,$conn){
    
    $sql = "select cod_producto from st_productos where descripcion = '$producto'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        $cod_producto = $row['cod_producto'];
    }
    
    $espacio = 'cafeteria';
    $fecha_actual = date("Y-m-d");
    $hora_actual =  date("H:i:s");
    
    $consulta = "INSERT INTO st_ventas".
            "(cod_producto,descripcion,espacio,empleado,lugar_venta,tipo_pago,fecha_venta,hora_venta,cliente_nombre,importe)".
            "VALUES ".
        "('$cod_producto','$producto','$espacio','$empleado','$lugar_venta','$modo_pago','$fecha_actual','$hora_actual','$cliente','$importe')";
        mysqli_select_db($conn,'storia');
        echo mysqli_query($conn,$consulta);
                        

}


function addProductosCafeLocal($producto,$empleado,$lugar_venta,$modo_pago,$cliente,$cantidad,$conn){
    
    $sql = "select cod_producto, precio from st_productos where descripcion = '$producto'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        $cod_producto = $row['cod_producto'];
        $importe = $row['precio'];
    }
    
    $espacio = 'cafeteria';
    $fecha_actual = date("Y-m-d");
    $hora_actual =  date("H:i:s");
    $total = $importe * $cantidad;
    
    $consulta = "INSERT INTO st_ventas".
            "(cod_producto,descripcion,cantidad,espacio,empleado,lugar_venta,tipo_pago,fecha_venta,hora_venta,cliente_nombre,importe)".
            "VALUES ".
        "('$cod_producto','$producto','$cantidad','$espacio','$empleado','$lugar_venta','$modo_pago','$fecha_actual','$hora_actual','$cliente','$total')";
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
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Mesa Cerrada Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Cerrar la Venta. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
  
}

/*
** persistencia de cierre de mesa
*/
function deleteItem($id,$conn){
    
           
    $sql = "delete from st_items_mesa where id = '$id'";
    mysqli_select_db($conn,'storia');
    $resp = mysqli_query($conn,$sql);
    
    if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Item Eliminado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al eliminar el item. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
  
}

/*
** modal que carga los precios de heladeria
*/
function modalPreciosCafeteria(){


    echo '<!-- Modal -->
  <div class="modal fade" id="precios_cafeteria" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Confitería</h4>
        </div>
        <div class="modal-body">
          
          
        
       </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>';


}


?>
