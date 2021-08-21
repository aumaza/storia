<?php 
// PAGOS
// =================================================================== //
// LISTADOS

/*
** funcion que carga la tabla de todos los pagos
*/


function listarPagos($conn){

if($conn)
{
	$sql = "SELECT * FROM st_pagos";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-financial-payment-mode.png"  class="img-reponsive img-rounded"> Pagos a Proveedores o Compras por Caja';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Fecha Pago/Compra</th>
            <th class='text-nowrap text-center'>Tipo Pago</th>
            <th class='text-nowrap text-center'>Descripcion</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['fecha_pago']."</td>";
			 echo "<td align=center>".$fila['tipo_pago']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</a></td>";
			 echo "<td align=center>$".$fila['importe']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_pago"><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   echo '<button type="submit" class="btn btn-danger btn-sm" name="del_pago"><img src="../../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Eliminar</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="add_pago">
			  <img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Pago</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Pagos:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}




// =============================================================================== //
// FORMULARIOS

/*
** formulario para agregar pagos
*/
function formAddPago(){

         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Agregar Nuevo Pago</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    
	    <div class="form-group">
        <label>Fecha de Pago:</label>
		<input type="date" class="form-control" name="fecha_pago" required>
            </div><hr>
            
            <div class="form-group">
                <label for="sel1">Tipo pago:</label>
                <select class="form-control" name="tipo_pago" required>
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="1">Pago a Proveedor</option>
                    <option value="2">Compra menor por Caja</option>
                </select>
            </div><hr>
            
            <div class="form-group">
	      <label>Descripción del Pago:</label>
		<input type="text" class="form-control" name="descripcion" placeholder="Ingrese breve descripcion del pago realizado" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Importe:</label>
		<input type="text" class="form-control" name="importe" placeholder="Ingrese el importe pagado. Para separar los decimales use un punto. Ejemplo 850.50" required>
            </div><hr>
            
                     
                 
            <button type="submit" class="btn btn-success btn-block" name="addPago">
                <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** formulario para editar pagos
*/
function formEditPago($id,$conn){

    $sql = "select * from st_pagos where id = '$id'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        $fecha = $row['fecha_pago'];
        $tipo_pago = $row['tipo_pago'];
        $descripcion = $row['descripcion'];
        $importe = $row['importe'];    
    }
         
         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Editar Pago</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" name="id" value="'.$id.'">
	    
	    <div class="form-group">
        <label>Fecha de Pago:</label>
		<input type="date" class="form-control" name="fecha_pago" value="'.$fecha.'" required>
            </div><hr>
            
            <div class="form-group">
                <label for="sel1">Tipo pago:</label>
                <select class="form-control" name="tipo_pago" required>
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="1" '.($tipo_pago == "Pago Proveedor" ? "selected" : ""). '>Pago a Proveedor</option>
                    <option value="2" '.($tipo_pago == "Compra Menor" ? "selected" : ""). '>Compra menor por Caja</option>
                </select>
            </div><hr>
            
            <div class="form-group">
	      <label>Descripción del Pago:</label>
		<input type="text" class="form-control" name="descripcion" value="'.$descripcion.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Importe:</label>
		<input type="text" class="form-control" name="importe" value="'.$importe.'" required>
            </div><hr>
            
                     
                 
            <button type="submit" class="btn btn-success btn-block" name="editPago">
                <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** funcion para eliminar un registro de pagos
*/
function formEliminarPago($id,$conn){

        $sql = "select * from st_pagos where id = '$id'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        while($fila = mysqli_fetch_array($query)){
                $descripcion = $fila['descripcion'];
            }
            
            echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-danger">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/status/security-low.png" /> Pagos - Eliminar Registro</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                <div class="alert alert-danger">
		  <img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por eliminar el registro correspondiente al Pago o Compra: <strong>'.$descripcion.'</strong></p>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="delete_pago">Aceptar</button><br>
            
            </form>
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block">Cancelar</button></a>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


// =============================================================================== //
// PERSISTENCIA

/*
** funcion que guardar pago
*/
function addPago($fecha_pago,$tipo_pago,$descripcion,$importe,$conn){

            
           $consulta = "INSERT INTO st_pagos".
            "(fecha_pago,tipo_pago,descripcion,importe)".
            "VALUES ".
        "('$fecha_pago',$tipo_pago,'$descripcion','$importe')";
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Pago Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Pago. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    
		    
}


/*
** funcion actualizar registro de pagos
*/
function updatePago($id,$fecha_pago,$tipo_pago,$descripcion,$importe,$conn){

        $sql = "update st_pagos set fecha_pago = '$fecha_pago', tipo_pago = '$tipo_pago', descripcion = '$descripcion', importe = '$importe' where id = '$id'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        
        if($query){
		    echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Registro Actualizado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
        }else{
                    echo "<br>";
                    echo '<div class="container">';
                    echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Actualizar el Registro. '  .mysqli_error($conn);
                    echo "</div>";
                    echo "</div>";
                }


}


/*
** funcion que elimina registro de pagos
*/
function deletePago($id,$conn){

    $sql = "delete from st_pagos where id = '$id'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    
    if($query){
		    echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Registro Eliminado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Eliminar el Registro.'  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }

}


// =================================================================== //

// CAJA
// =================================================================== //
// LISTADOS

/*
** funcion que carga la tabla de apertura de caja
*/


function listarEstadoCaja($conn){

if($conn)
{
	$sql = "SELECT * FROM st_caja";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-financial-payment-mode.png"  class="img-reponsive img-rounded"> Estado de Caja';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Fecha Apertura / Cierre</th>
            <th class='text-nowrap text-center'>Hora Apertura</th>
            <th class='text-nowrap text-center'>Hora Cierre</th>
            <th class='text-nowrap text-center'>Importe Apertura</th>
            <th class='text-nowrap text-center'>Importe Cierre</th>
            <th class='text-nowrap text-center'>Estado Caja</th>
            <th class='text-nowrap text-center'>Usuario Apertura</th>
            <th class='text-nowrap text-center'>Usuario Cierre</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['fecha']."</td>";
			 echo "<td align=center>".$fila['hora_apertura']."</td>";
			 echo "<td align=center>".$fila['hora_cierre']."</td>";
			 echo "<td align=center>$".$fila['importe_apertura']."</td>";
			 if($fila['importe_cierre'] == ''){
			 echo "<td align=center>$0.00</td>";
			 }else{
			 echo "<td align=center>$".$fila['importe_cierre']."</td>";
			 }
			 
			 echo "<td align=center>".$fila['estado_caja']."</td>";
			 echo "<td align=center>".$fila['usuario_apertura']."</td>";
			 echo "<td align=center>".$fila['usuario_cierre']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                    if($fila['estado_caja'] == 'Abierta'){
                   echo '<button type="submit" class="btn btn-warning btn-sm" name="cierre_caja">
                        <img src="../../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Cerrar Caja</button>';
                    }
                   echo '</form>';
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


// =============================================================================== //
// FORMULARIOS

/*
** formulario de apertura de caja
*/
function formAperturaCaja($conn,$nombre){
    
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    
    $sql_caja_cerrada = "select importe_cierre from st_caja where fecha = date_add(curdate(), interval -1 Day) and estado_caja = 'Cerrada'";
    mysqli_select_db($conn,'storia');
    $query_caja_cerrada = mysqli_query($conn,$sql_caja_cerrada);
    while($row_caja = mysqli_fetch_array($query_caja_cerrada)){
        $importe = $row_caja['importe_cierre'];
    }
    
    $sql_ventas = "select sum(importe) as total from st_ventas where tipo_pago = 'Efectivo' and estado_ticket = 'Cerrado' and fecha_venta = curdate()";
    mysqli_select_db($conn,'storia');
    $query_ventas = mysqli_query($conn,$sql_ventas);
    while($row_ventas = mysqli_fetch_array($query_ventas)){
        $total_ventas = $row_ventas['total'];
    }
    
    $sql_mesas = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate() and tipo_pago = 'Efectivo'";
    mysqli_select_db($conn,'storia');
    $query_mesas = mysqli_query($conn,$sql_mesas);
    while($row_mesas = mysqli_fetch_array($query_mesas)){
        $total_mesas = $row_mesas['total'];
    }
    
    $sql_pagos = "select sum(importe) as total from st_pagos where fecha_pago = curdate()";
    mysqli_select_db($conn,'storia');
    $query_pagos = mysqli_query($conn,$sql_pagos);
    while($row_pagos = mysqli_fetch_array($query_pagos)){
        $total_pagos = $row_pagos['total'];
    }
         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/status/dialog-password.png" /> Apertura Caja</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" name="caja_estado" value="1" required>
	    
	    <div class="form-group">
        <label>Fecha Actual:</label>
		<input type="date" class="form-control" name="fecha" value="'.$fecha_actual.'" readonly required>
            </div><hr>
            
        <div class="form-group">
        <label>Hora Actual:</label>
		<input type="time" class="form-control" name="hora" value="'.$hora_actual.'" readonly required>
            </div><hr>
            
        <div class="form-group">
        <label>Usuario:</label>
	<input type="text" class="form-control" name="usuario" value="'.$nombre.'" readonly required>
        </div><hr>
                 
           <div class="alert alert-info">
            <img class="img-reponsive img-rounded" src="../../icons/status/dialog-information.png" />
            El importe debería ser el mismo con el que cerró la caja el turno anterior o día anterior, si es correcto continue presionando <strong>Aceptar</strong>, si desea modificarlo puede hacerlo y a continuación presione <strong>Aceptar</strong>
           </div><hr>
           
            <div class="form-group">
	      <label>Importe:</label>
		<input type="text" class="form-control" name="importe" value="'.$importe.'" required>
            </div><hr>
            
                     
                 
            <button type="submit" class="btn btn-success btn-block" name="abrir_caja">
                <img src="../../icons/status/task-accepted.png"  class="img-reponsive img-rounded"> Aceptar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** formulario de apertura de caja
*/
function formCerrarCaja($id,$nombre,$conn){
    
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    
    $sql_caja = "select importe_apertura from st_caja where id = '$id'";
    mysqli_select_db($conn,'storia');
    $query_caja = mysqli_query($conn,$sql_caja);
    while($row_caja = mysqli_fetch_array($query_caja)){
        $importe_apertura = $row_caja['importe_apertura'];
    }
    
    $sql_ventas = "select sum(importe) as total from st_ventas where tipo_pago = 'Efectivo' and estado_ticket = 'Cerrado' and fecha_venta = curdate()";
    mysqli_select_db($conn,'storia');
    $query_ventas = mysqli_query($conn,$sql_ventas);
    while($row_ventas = mysqli_fetch_array($query_ventas)){
        $total_ventas = $row_ventas['total'];
    }
    
    $sql_mesas = "select sum(total) as total from st_mesas where estado = 'Cerrada' and fecha = curdate() and tipo_pago = 'Efectivo'";
    mysqli_select_db($conn,'storia');
    $query_mesas = mysqli_query($conn,$sql_mesas);
    while($row_mesas = mysqli_fetch_array($query_mesas)){
        $total_mesas = $row_mesas['total'];
    }
    
    $sql_pagos = "select sum(importe) as total from st_pagos where fecha_pago = curdate()";
    mysqli_select_db($conn,'storia');
    $query_pagos = mysqli_query($conn,$sql_pagos);
    while($row_pagos = mysqli_fetch_array($query_pagos)){
        $total_pagos = $row_pagos['total'];
    }
    $total_ingresos = $total_ventas + $total_mesas + $importe_apertura;
    $importe_cierre = $total_ingresos - $total_pagos;
    
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-danger">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/status/dialog-password.png" /> Cierre de Caja</div>
		  <div class="panel-body">
		  
        <div class="alert alert-info">
        <p align="justify"><img class="img-reponsive img-rounded" src="../../icons/status/dialog-information.png" />
        <strong>Antes de Cerrar la Caja verifique que el importe de cierre informado por el sistema es el mismo que posee en efectivo en la caja. De lo contrario verifique si ha cargado pagos a proveedores o compras menores por caja. Estos pagos deben estar registrados en el sistema para que el importe de cierre coincida con el efectivo en caja.</strong></p>
        </div><hr>
	
	    <form action="#" method="POST">
	    <input type="hidden" name="caja_estado" value="2" required>
	    <input type="hidden" name="id" value="'.$id.'" required>
	    
	    <div class="form-group">
        <label>Fecha Actual:</label>
		<input type="date" class="form-control" name="fecha" value="'.$fecha_actual.'" readonly required>
            </div><hr>
            
        <div class="form-group">
        <label>Hora Actual:</label>
		<input type="time" class="form-control" name="hora" value="'.$hora_actual.'" readonly required>
            </div><hr>
            
        <div class="form-group">
        <label>Usuario:</label>
	<input type="text" class="form-control" name="usuario" value="'.$nombre.'" readonly required>
        </div><hr>
                 
                       
            <div class="form-group">
	      <label>Importe Cierre:</label>
		<input type="text" class="form-control" name="importe" value="'.$importe_cierre.'" required>
            </div><hr>
            
                     
                 
            <button type="submit" class="btn btn-success btn-block" name="cerrar_caja">
                <img src="../../icons/status/task-accepted.png"  class="img-reponsive img-rounded"> Aceptar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


// =============================================================================== //
// PERSISTENCIA

/*
** funcion que guardar pago
*/
function openCaja($fecha,$hora_apertura,$importe_apertura,$estado_caja,$usuario,$conn){

	if(is_numeric($importe_apertura)){
            
           $consulta = "INSERT INTO st_caja".
            "(fecha,hora_apertura,importe_apertura,estado_caja,usuario_apertura)".
            "VALUES ".
        "('$fecha','$hora_apertura','$importe_apertura','$estado_caja','$usuario')";
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            
		    echo "<script>alert('Apertura realizada Exitosamente. Deberá Reiniciar sesión para terminar el proceso')</script>";
		    echo '<meta http-equiv="refresh" content="1;URL=../../logout.php"/>';
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al realizar la Apertura de Caja. Aguarde un instante...'  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
			    echo '<meta http-equiv="refresh" content="5;URL=../../logout.php"/>';
		    }
	}else{
	
			    echo "<script>alert('El importe debe ser un valor numérico. Reinicie la sesion y reintente...')</script>";
			    echo '<meta http-equiv="refresh" content="1;URL=../../logout.php"/>';
	
	}
		    
		    
}


/*
** funcion actualizar estado caja con cierre
*/
function closeCaja($id,$hora_cierre,$importe_cierre,$estado_caja,$usuario,$conn){

        if(is_numeric($importe_cierre)){
        
        $sql = "update st_caja set hora_cierre = '$hora_cierre', importe_cierre = '$importe_cierre', estado_caja = '$estado_caja', usuario_cierre = '$usuario' where id = '$id'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        
        if($query){
		    echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Caja Cerrada Satisfactoriamente. Aguarde un instante que se reiniciará la sesión';
		    echo "</div>";
		    echo "</div>";
		    echo '<meta http-equiv="refresh" content="5;URL=../../logout.php"/>';
        }else{
                    echo "<br>";
                    echo '<div class="container">';
                    echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al intentar Cerrar la Caja. '  .mysqli_error($conn);
                    echo "</div>";
                    echo "</div>";
                }
        }else{
        
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> El campo importe debe ser un valor numérico';
			    exit();
			    echo "</div>";
			    echo "</div>";
        
        }


}


// ========================================================================= //
// CONSULTA ESTADO DE CAJA
function queryEstadoCaja($conn){
  
  $fecha_actual = date("Y-m-d");

  $sql = "select estado_caja from st_caja where fecha = '$fecha_actual'";
  mysqli_select_db($conn,'storia');
  $query = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($query)){
  
    $estado = $row['estado_caja'];
  
  }
  
  if($estado == 'Abierta'){
  
      $flag = 1;
  }
  else if($estado == 'Cerrada'){
    
      $flag = 0;
  
  }
  
  return $flag;
  
  
}

?>
