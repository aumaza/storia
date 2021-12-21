<?php


// =================================================================== //
// LISTADOS //
// =================================================================== //

/*
** funcion que carga la tabla de todas las entregas en el dia de la fecha
*/
function entregasHoy($conn,$nombre){

if($conn)
{
	$sql = "SELECT * FROM st_repartos where repartidor = '$nombre' and fecha_entrega = curdate() and estado = 'En Camino'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-calendar-day.png"  class="img-reponsive img-rounded"> Mis Entregas del día hoy';
	echo '</div><br>';

            echo "<div class='table-responsive'>
                    <table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Producto</th>
            <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Dirección</th>
            <th class='text-nowrap text-center'>Celular</th>
            <th class='text-nowrap text-center'>Forma Pago</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th class='text-nowrap text-center'>Estado</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['cliente']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['movil']."</td>";
			 echo "<td align=center>".$fila['forma_pago']."</td>";
			 echo "<td align=center>$".$fila['importe']."</td>";
			 if($fila['estado'] == 'Entregado'){
			 echo "<td align=center style='background-color: #abebc6'>".$fila['estado']."</td>";
			 }
			 if($fila['estado'] == 'No Entregado'){
			 echo "<td align=center style='background-color:red'>".$fila['estado']."</td>";
			 }
			 if($fila['estado'] == 'No Responde'){
			 echo "<td align=center style='background-color: #bb8fce'>".$fila['estado']."</td>";
			 }
			 if($fila['estado'] == 'En Camino'){
			 echo "<td align=center style='background-color: #aed6f1'>".$fila['estado']."</td>";
			 }
			 if($fila['estado'] == 'En Preparación'){
			 echo "<td align=center style='background-color: #edbb99'>".$fila['estado']."</td>";
			 }
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-xs" name="detalle_venta"><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Detalles</button>';
                   echo '<button type="submit" class="btn btn-warning btn-xs" name="cambiar_estado_entrega"><img src="../../icons/actions/system-switch-user.png"  class="img-reponsive img-rounded"> Estado</button>';
                   echo '<button type="submit" class="btn btn-success btn-xs" name="print_entrega"><img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Entrega</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table></div>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad a Entregar:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}

/*
** funcion que carga la tabla de todas las entregas realizadas por repartidor
*/
function misEntregas($conn,$nombre){

if($conn)
{
	$sql = "SELECT * FROM st_repartos where repartidor = '$nombre' and estado <> 'En Camino'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-calendar-day.png"  class="img-reponsive img-rounded"> Mis Entregas Realizadas';
	echo '</div><br>';

            echo "<div class='table-responsive'>
                    <table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Producto</th>
            <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Dirección</th>
            <th class='text-nowrap text-center'>Celular</th>
            <th class='text-nowrap text-center'>Forma Pago</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th class='text-nowrap text-center'>Fecha Entregado</th>
            <th class='text-nowrap text-center'>Hora Entregado</th>
            <th class='text-nowrap text-center'>Estado</th>
            <th class='text-nowrap text-center'>Envío a Cobrar</th>
            <th class='text-nowrap text-center'>Monto</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['cliente']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['movil']."</td>";
			 echo "<td align=center>".$fila['forma_pago']."</td>";
			 echo "<td align=center>$".$fila['importe']."</td>";
			 echo "<td align=center>".$fila['fecha_entrega']."</td>";
			 echo "<td align=center>".$fila['hora_entrega']."</td>";
			 if($fila['estado'] == 'Entregado'){
			 echo "<td align=center style='background-color: #abebc6'>".$fila['estado']."</td>";
			 }
			 if($fila['estado'] == 'No Entregado'){
			 echo "<td align=center style='background-color:red'>".$fila['estado']."</td>";
			 }
			 if($fila['estado'] == 'No Responde'){
			 echo "<td align=center style='background-color: #bb8fce'>".$fila['estado']."</td>";
			 }
			 if($fila['estado'] == 'En Camino'){
			 echo "<td align=center style='background-color: #aed6f1'>".$fila['estado']."</td>";
			 }
			 if($fila['estado'] == 'En Preparación'){
			 echo "<td align=center style='background-color: #edbb99'>".$fila['estado']."</td>";
			 }
			 echo "<td align=center>".$fila['envio_pago']."</td>";
			 echo "<td align=center>$".$fila['valor_envio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-warning btn-xs" name="cambiar_estado_entrega"><img src="../../icons/actions/system-switch-user.png"  class="img-reponsive img-rounded"> Estado</button>';
                   echo '<button type="submit" class="btn btn-success btn-xs" name="print_entrega"><img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Entrega</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table></div>";
		echo "<br>";
		echo '<form <action="#" method="POST">';
                    echo '<button type="submit" class="btn btn-default btn-xs" name="calculo_total_entregas"><img src="../../icons/actions/view-bank-account.png"  class="img-reponsive img-rounded"> A Cobrar</button>';
                   echo '</form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Entregas:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


// =================================================================== //
// FORMULARIOS //
// =================================================================== //


/*
** fomulario de asignacion de repartidor
*/
function formAsignarRepartidor($id,$conn){

    $sql_venta = "select * from st_ventas where id = '$id'";
    mysqli_select_db($conn,'storia');
    $query_venta = mysqli_query($conn,$sql_venta);
    while($rows = mysqli_fetch_array($query_venta)){
        $producto = $rows['descripcion'];
        $cliente = $rows['cliente_nombre'];
        $tipo_pago = $rows['tipo_pago'];
        $importe = $rows['importe'];
        $fecha = $rows['fecha_venta'];
        $hora = $rows['hora_venta'];
    }
    
    $sql_cliente = "select * from st_clientes where cliente_nombre = '$cliente'";
    $query_cliente = mysqli_query($conn,$sql_cliente);
    while($row_cliente = mysqli_fetch_array($query_cliente)){
        $direccion = $row_cliente['direccion'];
        $movil = $row_cliente['movil'];
    }
    
       
    echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/im-aim.png" /> Asignación de Pedido a Repartidor</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" name="id" value="'.$id.'">
	                
            <div class="form-group">
            <label for="usr">Producto:</label>
            <input type="text" class="form-control" name="producto" value="'.$producto.'" readonly>
            </div>
            
            <div class="form-group">
            <label for="usr">Cliente:</label>
            <input type="text" class="form-control" name="cliente" value="'.$cliente.'" readonly>
            </div>
            
             <div class="form-group">
            <label for="usr">Dirección:</label>
            <input type="text" class="form-control" name="direccion" value="'.$direccion.'" readonly>
            </div>
            
            <div class="form-group">
            <label for="usr">Celular:</label>
            <input type="text" class="form-control" name="movil" value="'.$movil.'" readonly>
            </div>
            
            <div class="form-group">
            <label for="usr">Tipo Pago:</label>
            <input type="text" class="form-control" name="tipo_pago" value="'.$tipo_pago.'" readonly>
            </div>
            
            <div class="form-group">
            <label for="usr">Importe:</label>
            <input type="text" class="form-control" name="importe" value="'.$importe.'" readonly>
            </div><hr>
            
            <div class="form-group">
            <label for="usr">Fecha Pedido:</label>
            <input type="date" class="form-control" name="fecha" value="'.$fecha.'" readonly>
            </div>
            
            <div class="form-group">
            <label for="usr">Hora Pedido:</label>
            <input type="time" class="form-control" name="hora" value="'.$hora.'" readonly>
            </div><hr>
            
            
            <div class="form-group">
		  <label for="sel1">Repartidor:</label>
		  <select class="form-control" name="repartidor" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_clientes where espacio = 'rep'";
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
            
                 
            <button type="submit" class="btn btn-success btn-xs btn-block" name="asignar_rep">
                <img src="../../icons/actions/dialog-ok.png"  class="img-reponsive img-rounded"> Asignar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';

}

/*
** formulario de cambio de estado de la entrega
*/
function formCambioEstadoEntrega($id,$conn){

    $sql_reparto = "select * from st_repartos where id = '$id'";
    mysqli_select_db($conn,'storia');
    $query_reparto = mysqli_query($conn,$sql_reparto);
    while($rows = mysqli_fetch_array($query_reparto)){
        $producto = $rows['descripcion'];
        $cliente = $rows['cliente'];
        $direccion = $rows['direccion'];
        $movil = $rows['movil'];
        $tipo_pago = $rows['forma_pago'];
        $importe = $rows['importe'];
        $fecha = $rows['fecha_entrega'];
        $estado = $rows['estado'];
        $id_venta = $rows['id_venta'];
    }
    
    
          
    
    echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/system-switch-user.png" /> Cambiar Estado de Entrega</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" name="id" value="'.$id.'">
	    <input type="hidden" name="id_venta" value="'.$id_venta.'">
	                
	                      
            <div class="form-group">
            <label for="usr">Producto:</label>
            <input type="text" class="form-control" name="producto" value="'.$producto.'" readonly>
            </div>
            
            <div class="form-group">
            <label for="usr">Cliente:</label>
            <input type="text" class="form-control" name="cliente" value="'.$cliente.'" readonly>
            </div>
            
             <div class="form-group">
            <label for="usr">Dirección:</label>
            <input type="text" class="form-control" name="direccion" value="'.$direccion.'" readonly>
            </div>
            
            <div class="form-group">
            <label for="usr">Celular:</label>
            <input type="text" class="form-control" name="movil" value="'.$movil.'" readonly>
            </div>
            
            <div class="form-group">
            <label for="usr">Tipo Pago:</label>
            <input type="text" class="form-control" name="tipo_pago" value="'.$tipo_pago.'" readonly>
            </div>
            
            <div class="form-group">
            <label for="usr">Importe:</label>
            <input type="text" class="form-control" name="importe" value="'.$importe.'" readonly>
            </div><hr>
            
            <div class="form-group">
            <label for="usr">Fecha Pedido:</label>
            <input type="date" class="form-control" name="fecha" value="'.$fecha.'" readonly>
            </div><hr>
                                    
             <div class="form-group">
            <label for="sel1">Estado:</label>
            <select class="form-control" id="sel1" name="estado">
                <option value="" disabled selected>Seleccionar</option>
                <option value="Entregado" '.($estado == "Entregado" ? "selected" : ""). '>Entregado</option>
                <option value="No Entregado" '.($estado == "No Entregado" ? "selected" : ""). '>No Entregado</option>
                <option value="No responde" '.($estado == "No Responde" ? "selected" : ""). '>No Responde</option>
                <option value="En Camino" '.($estado == "En Camino" ? "selected" : ""). '>En Camino</option>
            </select>
            </div><hr>           
                 
            <button type="submit" class="btn btn-primary btn-xs btn-block" name="cambiar_estado_pedido">
                <img src="../../icons/actions/system-switch-user.png"  class="img-reponsive img-rounded"> Cambiar Estado Entrega</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';

}



// ===================================================================================== //
// PERSISTENCIA
// ===================================================================================== //

/*
** persistencia de asignacion de pedido a repartidor
*/
function addPedidoRepartidor($id_venta,$producto,$cliente,$direccion,$movil,$tipo_pago,$importe,$fecha,$hora,$repartidor,$conn){

    $estado = 'En Camino';
    
    $consulta = "INSERT INTO st_repartos".
              "(id_venta,descripcion,cliente,direccion,movil,forma_pago,importe,fecha_entrega,hora_entrega,repartidor,estado)".
            "VALUES ".
        "('$id_venta','$producto','$cliente','$direccion','$movil','$tipo_pago','$importe','$fecha','$hora','$repartidor','$estado')";
        
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
    
    $consulta_1 = "update st_ventas set estado_entrega = '$estado' where id = '$id_venta'";
    mysqli_select_db($conn,'storia');
    $resp_1 = mysqli_query($conn,$consulta_1);
          
              
            if($resp && $resp_1){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Entrega Asignada Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al intentar asignar la entrega. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }


}


/*
** cambiar estado de entrega en base de datos
*/
function updateEstadoEntrega($id,$id_venta,$estado,$conn){
    
        
    if($estado == 'Entregado'){
        $valor_envio = 80.00;
        $envio_pago = 'Si';
        $hora_actual =  date("H:i:s");
    }else{
        $valor_envio = 00.00;
        $envio_pago = 'No';
        $hora_actual =  date("H:i:s");
    }
    
    $sql_reparto = "update st_repartos set estado = '$estado', valor_envio = '$valor_envio', envio_pago = '$envio_pago', hora_entrega = '$hora_actual' where id = '$id'";
    mysqli_select_db($conn,'storia');
    $query_reparto = mysqli_query($conn,$sql_reparto);
    
    $sql_venta = "update st_ventas set estado_entrega = '$estado' where id = '$id_venta'";
    mysqli_select_db($conn,'storia');
    $query_venta = mysqli_query($conn,$sql_venta);
    
    if($query_reparto && $query_venta){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Estado Actualizado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Actualizar el Estado. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }



}


?>
