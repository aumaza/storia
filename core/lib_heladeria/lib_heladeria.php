<?php

//FORMULARIOS

/*
** funcion que carga la tabla de todas las ventas de heladeria
*/


function ticketsCerrados($conn){

if($conn)
{
	$sql = "SELECT * FROM st_ventas where estado_ticket = 'Cerrado' group by nro_ticket order by nro_ticket DESC";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-task.png"  class="img-reponsive img-rounded"> Consulta de Tickets Cerrados';
	echo '</div><br>';

            echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Empleado</th>
            <th class='text-nowrap text-center'>Canal Venta</th>
            <th class='text-nowrap text-center'>Modo Pago</th>
            <th class='text-nowrap text-center'>Fecha Venta</th>
            <th class='text-nowrap text-center'>Hora Venta</th>
            <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Nro. Ticket</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['empleado']."</td>";
			 echo "<td align=center>".$fila['lugar_venta']."</td>";
			 echo "<td align=center>".$fila['tipo_pago']."</td>";
			 echo "<td align=center>".$fila['fecha_venta']."</td>";
			 echo "<td align=center>".$fila['hora_venta']."</td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</td>";
			 echo "<td align=center>".$fila['nro_ticket']."</td>";
			 echo "<td class='text-nowrap'>";
			                   
                   echo '<a href="../../lib_heladeria/print.php?file=print_ticket_cerrado.php&nro_ticket='.$fila[nro_ticket].'" target="_blank"><button type="button" class="btn btn-success btn-xs btn-block"><img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Ticket</button></a>';
                    
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Tickets Cerrados:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}



/*
** funcion que carga la tabla de todas las ventas de heladeria
*/


function ventasHeladeriaLocal($conn){

if($conn)
{
	$sql = "SELECT * FROM st_ventas where espacio = 'heladeria' and lugar_venta <> 'Web' and fecha_venta = curdate() order by hora_venta DESC";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/fill-color.png"  class="img-reponsive img-rounded"> Administración de Ventas en Local Heladería';
	echo '</div><br>';

            echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Producto</th>
            <th class='text-nowrap text-center'>Sabor I</th>
            <th class='text-nowrap text-center'>Sabor II</th>
            <th class='text-nowrap text-center'>Sabor III</th>
            <th class='text-nowrap text-center'>Sabor IV</th>
            <th class='text-nowrap text-center'>Empleado</th>
            <th class='text-nowrap text-center'>Canal Venta</th>
            <th class='text-nowrap text-center'>Modo Pago</th>
            <th class='text-nowrap text-center'>Fecha Venta</th>
            <th class='text-nowrap text-center'>Hora Venta</th>
            <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['descripcion']."</a></td>";
			 echo "<td align=center>".$fila['sabor_1']."</a></td>";
			 echo "<td align=center>".$fila['sabor_2']."</a></td>";
			 echo "<td align=center>".$fila['sabor_3']."</a></td>";
			 echo "<td align=center>".$fila['sabor_4']."</a></td>";
			 echo "<td align=center>".$fila['empleado']."</a></td>";
			 echo "<td align=center>".$fila['lugar_venta']."</a></td>";
			 echo "<td align=center>".$fila['tipo_pago']."</a></td>";
			 echo "<td align=center>".$fila['fecha_venta']."</a></td>";
			 echo "<td align=center>".$fila['hora_venta']."</a></td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</a></td>";
			 echo "<td align=center>$".$fila['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form  action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   
                   if(($fila['estado_entrega'] == "En Preparacion") || ($fila['estado_entrega'] == 5)){ 
                   
                   echo '<button type="submit" class="btn btn-primary btn-xs" name="edit_venta"><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   
                   echo '<button type="submit" class="btn btn-danger btn-xs" name="del_venta"><img src="../../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Eliminar</button>';
                   
                   echo '<button type="submit" class="btn btn-warning btn-xs" name="estado_entrega" data-toggle="tooltip" data-placement="right" title="Marcar como entregado"><img src="../../icons/status/task-complete.png"  class="img-reponsive img-rounded"> Marcar Entrega</button>';
                   
                   
                   }
                   else if(($fila['estado_entrega'] == "Entregado") || ($fila['estado_entrega'] == 1)){
                    
                    echo '<img src="../../icons/actions/games-endturn.png"  class="img-reponsive img-rounded" data-toggle="tooltip" data-placement="right" title="Producto Entregado">';
                   
                   }
                   echo '</form>';
                   
                   echo '<a href="../../lib_heladeria/print.php?file=print_pedido_local_heladeria.php&id='.$fila['id'].'" target="_blank"><button type="button" class="btn btn-success btn-xs btn-block"><img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Pedido</button></a>';
                   
                   
                   
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a data-toggle="precios_heladeria" data-target="#precios_heladeria" href="#" class="btn btn-success btn-sm openHelado"><span class="glyphicon glyphicon-usd"></span> Precios Heladería</a><br><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Ventas:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}

/*
** funcion que carga la tabla de todas las ventas de heladeria
*/


function ventasHeladeriaWeb($conn){

if($conn)
{
	$sql = "SELECT * FROM st_ventas where espacio = 'heladeria' and lugar_venta = 'Web'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/fill-color.png"  class="img-reponsive img-rounded"> Administración de Ventas Web en Heladería';
	echo '</div><br>';

            echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Producto</th>
            <th class='text-nowrap text-center'>Sabor I</th>
            <th class='text-nowrap text-center'>Sabor II</th>
            <th class='text-nowrap text-center'>Sabor III</th>
            <th class='text-nowrap text-center'>Sabor IV</th>
            <th class='text-nowrap text-center'>Canal Venta</th>
            <th class='text-nowrap text-center'>Modo Pago</th>
            <th class='text-nowrap text-center'>Fecha Venta</th>
            <th class='text-nowrap text-center'>Hora Venta</th>
            <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th class='text-nowrap text-center'>Estado Entrega</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['descripcion']."</a></td>";
			 echo "<td align=center>".$fila['sabor_1']."</a></td>";
			 echo "<td align=center>".$fila['sabor_2']."</a></td>";
			 echo "<td align=center>".$fila['sabor_3']."</a></td>";
			 echo "<td align=center>".$fila['sabor_4']."</a></td>";
			 echo "<td align=center>".$fila['lugar_venta']."</a></td>";
			 echo "<td align=center>".$fila['tipo_pago']."</a></td>";
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
			 if($fila['estado_entrega'] == 'En Preparacion'){
			 echo "<td align=center style='background-color: #edbb99'>".$fila['estado_entrega']."</a></td>";
			 }
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   if($fila['estado_entrega'] != 'Entregado'){
                   echo '<button type="submit" class="btn btn-warning btn-xs" name="asignar_repartidor"><img src="../../icons/actions/im-aim.png"  class="img-reponsive img-rounded"> Asignar Repartidor</button>';
                   
                   }
                   echo '</form>';
                   
                   if($fila['estado_entrega'] != 'Entregado'){
                   echo '<a href="../../lib_heladeria/print.php?file=print_pedido_web_heladeria.php&id='.$fila['id'].'" target="_blank"><button type="button" class="btn btn-success btn-xs"><img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Pedido</button></a>';
                   }
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Ventas:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** formulario para agregar venta de heladeria en local
*/
function formAddVentaGeneral($conn){
       
       
       $sql = "select estado_ticket, max(nro_ticket) as ultimo_ticket from st_ventas where estado_ticket = 'Cerrado'";
       mysqli_select_db($conn,'storia');
       $qry = mysqli_query($conn,$sql);
       while($row = mysqli_fetch_array($qry)){
            $ultimo_ticket = $row['ultimo_ticket'];
            $estado_ticket = $row['estado_ticket'];
       }
       
       if(($estado_ticket == 'Cerrado') || ($estado_ticket == '') || ($estado_ticket == 'NULL')){
       
            $nro_ticket = $ultimo_ticket + 1;
        
       }
       if($estado_ticket == 'Abierto'){
       
            $nro_ticket = $ultimo_ticket;
       
       }
           
       
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nueva Venta</div>
		  <div class="panel-body">
		  
		  
		  <form id="consultar_importe_parcial_ajax" method="POST">
		  
		   <input type="hidden" class="form-control" name="nro_ticket" value="'.$nro_ticket.'">
		   
		   <div class="form-group">
            <label for="usr">Importe Parcial:</label>
            <input type="text" class="form-control" id="importe_parcial" readonly>
            </div>
               
        <button type="submit" class="btn btn-default btn-sm" id="consultar_importe" data-toggle="tooltip" data-placement="right" title="Consulta de importe parcial en ticket actual">Consultar Importe Parcial</button>
        
        </form>
        <hr>
	
	    <form id="fr_venta_general_ajax"  method="POST">
	        
	    <div class="form-group">
        <label for="usr">Nro. Ticket:</label>
        <input type="text" class="form-control" name="nro_ticket" value="'.$nro_ticket.'" id="nro_ticket" readonly>
        </div><hr>
	    
	    
	     <div class="form-group">
		  <label for="sel1">Cliente:</label>
		  <select class="form-control" name="cliente" id="cliente" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_clientes where espacio = 'cli' order by cliente_nombre ASC ";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
                echo '<option value="'.$valores[cliente_nombre].'" '.("'.1STORIA.'" == "'.$valores[cliente_nombre].'" ? "selected" : "").'>'.$valores[dni].' - '.$valores[cliente_nombre].'</option>';
               //echo '<option value="'.$valores[cliente_nombre].'" >'.$valores[dni].' - '.$valores[cliente_nombre].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div>
		<p>Si el Cliente no se encuentra en la lista desplegable presione el botón "Nuevo Cliente" para darlo de alta</p>
		<!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#newCliente">Nuevo Cliente</button>
		<hr>
		
		            
            <div class="form-group">
		  <label for="sel1">Producto:</label>
		  <select class="form-control" name="producto" id="producto">
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_productos order by descripcion ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cod_producto].'-'.$valores[descripcion].'" >'.$valores[descripcion].'</option>';
				}
                }
			}
			  
		 echo '</select>
		</div><hr>
            
            
            <div class="form-group">
		  <label for="sel1">Sabor 1:</label>
		  <select class="form-control" name="sabor_1" id="sabor_1" >
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Sabor 2:</label>
		  <select class="form-control" name="sabor_2" id="sabor_2" >
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Sabor 3:</label>
		  <select class="form-control" name="sabor_3" id="sabor_3" >
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Sabor 4:</label>
		  <select class="form-control" name="sabor_4" id="sabor_4" >
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
        <input type="number" class="form-control" name="cantidad" min="1" value="1" id="cantidad">
        </div><hr>
		
		 <div class="form-group">
		  <label for="sel1">Empleado:</label>
		  <select class="form-control" name="empleado" id="empleado">
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
            <select class="form-control" name="modo_pago" id="modo_pago">
                <option value="" disabled selected>Seleccionar</option>
                <option value="Tarjeta Credito">Tarjeta Crédito</option>
                <option value="Tarjeta Debito">Tarjeta Débito</option>
                <option value="Efectivo">Efectivo</option>
                </select>
            </div><hr>
            
            <div class="alert alert-info">
            <p align="center"><img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded"> Si ya no va a ingresar más productos para este cliente, para imprimir el ticket presione "Cerrar Ticket e Imprimir", recuerde que una vez que presione este botón el ticket correspondiente será cerrado.</p>
            </div><hr>
            
            <button type="submit" class="btn btn-danger btn-xs btn-block" name="ticket_local" data-toggle="tooltip" data-placement="right" title="Presione aquí para cerrar venta e imprimir el ticket">
                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Cerrar Ticket e Imprimir</button><hr>
                
            <button type="button" class="btn btn-success btn-xs btn-block" name="addVenta" id="add_venta_general" data-toggle="tooltip" data-placement="right" title="Presione aquí para agregar items al ticket actual">
                <img src="../../icons/actions/dialog-ok.png"  class="img-reponsive img-rounded"> Agregar Producto</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}




/*
** formulario para agregar venta de heladeria en local
*/
function formAddVenta($conn){
       
       
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nueva Venta Heladería</div>
		  <div class="panel-body">
	
	    <form id="fr_heladeria_local_ajax" action="#" method="POST">
	    
	     <div class="form-group">
		  <label for="sel1">Cliente:</label>
		  <select class="form-control" name="cliente" id="cliente" required>
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
		<p>Si el Cliente no se encuentra en la lista desplegable presione el botón "Nuevo Cliente" para darlo de alta</p>
		<!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#newCliente">Nuevo Cliente</button>
		<hr>
            
            <div class="form-group">
		  <label for="sel1">Producto:</label>
		  <select class="form-control" name="producto" id="producto">
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_productos where cod_producto like 'hd%' order by descripcion ASC";
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
		  <label for="sel1">Sabor 1:</label>
		  <select class="form-control" name="sabor_1" id="sabor_1" >
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Sabor 2:</label>
		  <select class="form-control" name="sabor_2" id="sabor_2" >
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Sabor 3:</label>
		  <select class="form-control" name="sabor_3" id="sabor_3" >
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Sabor 4:</label>
		  <select class="form-control" name="sabor_4" id="sabor_4" >
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Empleado:</label>
		  <select class="form-control" name="empleado" id="empleado">
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
            <select class="form-control" name="modo_pago" id="modo_pago">
                <option value="" disabled selected>Seleccionar</option>
                <option value="Tarjeta Credito">Tarjeta Crédito</option>
                <option value="Tarjeta Debito">Tarjeta Débito</option>
                <option value="Efectivo">Efectivo</option>
                </select>
            </div><hr>
            
            <div class="alert alert-info">
            <p align="center">Si ya no va a ingresar más productos para este cliente, para imprimir el ticket presione "Imprimir Ticket"</p>
            </div><hr>
            
            <button type="submit" class="btn btn-default btn-xs btn-block" name="ticket_heladeria_local" onclick="ActivarTiempo()">
                <img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Ticket</button><hr>
                
            <button type="button" class="btn btn-success btn-xs btn-block" name="addVenta" id="add_venta_heladeria_local">
                <img src="../../icons/actions/dialog-ok.png"  class="img-reponsive img-rounded"> Terminar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}

/*
** formulario para agregar venta de heladeria en local
*/
function formAddVentaLocal($conn){
       
       
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nueva Venta Heladería</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    
	     <div class="form-group">
		  <label for="sel1">Cliente:</label>
		  <select class="form-control" name="cliente" id="cliente" required>
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
		<p>Si el Cliente no se encuentra en la lista desplegable presione el botón "Nuevo Cliente" para darlo de alta</p>
		<!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#newCliente">Nuevo Cliente</button>
		<hr>
            
            <div class="form-group">
		  <label for="sel1">Producto:</label>
		  <select class="form-control" name="producto" id="producto" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_productos where cod_producto like 'hd%' order by descripcion ASC";
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
		  <label for="sel1">Sabor 1:</label>
		  <select class="form-control" name="sabor_1" id="sabor_1" required>
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Sabor 2:</label>
		  <select class="form-control" name="sabor_2" id="sabor_2" required>
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Sabor 3:</label>
		  <select class="form-control" name="sabor_3" id="sabor_3" required>
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
		  <label for="sel1">Sabor 4:</label>
		  <select class="form-control" name="sabor_4" id="sabor_4" required>
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
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
                
            <button type="submit" class="btn btn-success btn-xs btn-block" name="addVenta">
                <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Terminar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}

/*
** formulario para editar venta
*/

function formEditVenta($id,$conn){
       
       $sql = "select * from st_ventas where id = '$id'";
         mysqli_select_db($conn,'storia');
         $query = mysqli_query($conn,$sql);
         $fila = mysqli_fetch_assoc($query);
       
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/document-edit.png" /> Editar Venta</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
            <div class="form-group">
		  <label for="sel1">Producto:</label>
		  <select class="form-control" name="producto" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_productos where cod_producto like 'hd%' order by descripcion ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[descripcion].'" '.("'.$fila[descripcion].'" == "'.$valores[descripcion].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
            
            <div class="form-group">
		  <label for="sel1">Sabor 1:</label>
		  <select class="form-control" name="sabor_1" required>
		  <option value="" disabled selected>Seleccionar</option>
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[descripcion].'" '.("'.$fila[sabor_1].'" == "'.$valores[descripcion].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
             <div class="form-group">
		  <label for="sel1">Sabor 2:</label>
		  <select class="form-control" name="sabor_2" required>
		  <option value="" disabled selected>Seleccionar</option>
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[descripcion].'" '.("'.$fila[sabor_2].'" == "'.$valores[descripcion].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
		
		 <div class="form-group">
		  <label for="sel1">Sabor 3:</label>
		  <select class="form-control" name="sabor_3" required>
		  <option value="" disabled selected>Seleccionar</option>
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[descripcion].'" '.("'.$fila[sabor_3].'" == "'.$valores[descripcion].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
		
		 <div class="form-group">
		  <label for="sel1">Sabor 4:</label>
		  <select class="form-control" name="sabor_4" required>
		  <option value="" disabled selected>Seleccionar</option>
		  <option value="Ninguno" selected>Ninguno</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_sabores order by descripcion ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               
               echo '<option value="'.$valores[descripcion].'" '.("'.$fila[sabor_4].'" == "'.$valores[descripcion].'" ? "selected" : "").'>'.$valores[descripcion].'</option>';
               
                }
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
		
		 <div class="form-group">
		  <label for="sel1">Empleado:</label>
		  <select class="form-control" name="empleado" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_clientes where espacio = 'emp' order by cliente_nombre ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cliente_nombre].'" '.("'.$fila[empleado].'" == "'.$valores[cliente_nombre].'" ? "selected" : "").'>'.$valores[cliente_nombre].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
            <div class="form-group">
            <label for="sel1">Lugar / Modo de Venta:</label>
            <select class="form-control" name="lugar_venta">
                <option value="" disabled selected>Seleccionar</option>
                <option value="Web" '.($fila['lugar_venta'] == "Web" ? "selected" : ""). '>Web</option>
                <option value="Local" '.($fila['lugar_venta'] == "Local" ? "selected" : ""). '>Local</option>
                <option value="WhatsApp" '.($fila['lugar_venta'] == "WhatsApp" ? "selected" : ""). '>WhatsApp</option>
                <option value="Telefonica" '.($fila['lugar_venta'] == "Telefónica" ? "selected" : ""). '>Telefónica</option>
                </select>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Tipo de Pago:</label>
            <select class="form-control" name="modo_pago">
                <option value="" disabled selected>Seleccionar</option>
                <option value="Tarjeta Credito" '.($fila['tipo_pago'] == "Tarjeta Credito" ? "selected" : ""). '>Tarjeta Crédito</option>
                <option value="Tarjeta Debito" '.($fila['tipo_pago'] == "Tarjeta Debito" ? "selected" : ""). '>Tarjeta Débito</option>
                <option value="Efectivo" '.($fila['tipo_pago'] == "Efectivo" ? "selected" : ""). '>Efectivo</option>
                </select>
            </div><hr>
            
            <div class="form-group">
		  <label for="sel1">Cliente:</label>
		  <select class="form-control" name="cliente" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_clientes where espacio = 'cli' order by cliente_nombre ASC ";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cliente_nombre].'" '.("'.$fila[cliente_nombre].'" == "'.$valores[cliente_nombre].'" ? "selected" : "").'>'.$valores[cliente_nombre].'</option>';
				}
                }
			}

			mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
                 
            <button type="submit" class="btn btn-success btn-xs btn-block" name="editVenta">
                <img src="../../icons/actions/document-save-as.png"  class="img-reponsive img-rounded"> Actualizar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** funcion para eliminar un registro de ventas
*/
function formEliminarVenta($id,$conn){

        $sql = "select * from st_ventas where id = '$id'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        while($fila = mysqli_fetch_array($query)){
                $producto = $fila['descripcion'];
                $empleado = $fila['empleado'];
                $fecha = $fila['fecha_venta'];
            }
            
            echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-danger">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/status/security-low.png" /> Ventas - Eliminar Registro</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                <div class="alert alert-danger">
		  <img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por eliminar el registro: <strong>'.$producto.'</strong></p>
		    <p>Venta realizada por: <strong>'.$empleado.'</strong></p>
		    <p>Fecha: <strong>'.$fecha.'</strong></p><hr>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-xs btn-block" name="delete_venta">Aceptar</button><br>
            
            </form>
	      <a href="main.php"><button type="button" class="btn btn-danger btn-xs btn-block">Cancelar</button></a>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}




// PERSISTENCIA
/*
** funcion que agrega nueva venta
*/
function addVentaHeladeria($producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$empleado,$lugar_venta,$modo_pago,$cliente,$conn){

   
    $sql = "select cod_producto, precio from st_productos where descripcion = '$producto'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($query)){
        $codigo_producto = $rows['cod_producto'];
        $importe = $rows['precio'];
    }
    
    $estado_entrega = '5';
    $espacio = 'heladeria';
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    
          $consulta = "INSERT INTO st_ventas".
              "(cod_producto,
                descripcion,
                espacio,
                sabor_1,
                sabor_2,
                sabor_3,
                sabor_4,
                empleado,
                lugar_venta,
                tipo_pago,
                fecha_venta,
                hora_venta,
                cliente_nombre,
                importe,
                estado_entrega)".
            "VALUES ".
        "('$codigo_producto',
          '$producto',
          '$espacio',
          '$sabor_1',
          '$sabor_2',
          '$sabor_3',
          '$sabor_4',
          '$empleado',
          '$lugar_venta',
          '$modo_pago',
          '$fecha_actual',
          '$hora_actual',
          '$cliente',
          '$importe',
          '$estado_entrega')";
        
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
          
              
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Venta Agregada Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Agregar la Venta. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		   
}

/*
** funcion que agrega nueva venta
*/
function addVentaHeladeriaLocal($producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$empleado,$lugar_venta,$modo_pago,$cliente,$conn){

   
    $sql = "select cod_producto, precio from st_productos where descripcion = '$producto'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($query)){
        $importe = $rows['precio'];
        $cod_producto = $rows['cod_producto'];
    }
    
    $estado_entrega = '5';
    $espacio = 'heladeria';
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    
          $consulta = "INSERT INTO st_ventas".
              "(cod_producto,descripcion,espacio,sabor_1,sabor_2,sabor_3,sabor_4,empleado,lugar_venta,tipo_pago,fecha_venta,hora_venta,cliente_nombre,importe,estado_entrega)".
            "VALUES ".
        "('$cod_producto','$producto','$espacio','$sabor_1','$sabor_2','$sabor_3','$sabor_4','$empleado','$lugar_venta','$modo_pago',
          '$fecha_actual','$hora_actual','$cliente','$importe','$estado_entrega')";
        
        mysqli_select_db($conn,'storia');
        echo mysqli_query($conn,$consulta);
       
      
}


/*
** funcion que agrega nueva venta
*/
function addVentaHeladeriaGeneral($descripcion_producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$empleado,$lugar_venta,$modo_pago,$cliente,$nro_ticket,$conn){

   
    $sql = "select cod_producto, precio from st_productos where descripcion = '$descripcion_producto'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($query)){
        $importe = $rows['precio'];
        $cod_producto = $rows['cod_producto'];
    }
    
    $estado_entrega = '5';
    $estado_ticket = 'Abierto';
    $espacio = 'heladeria';
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    
          $consulta = "INSERT INTO st_ventas".
              "(cod_producto,descripcion,espacio,sabor_1,sabor_2,sabor_3,sabor_4,empleado,lugar_venta,tipo_pago,fecha_venta,hora_venta,cliente_nombre,importe,nro_ticket,estado_ticket,estado_entrega)".
            "VALUES ".
        "('$cod_producto','$descripcion_producto','$espacio','$sabor_1','$sabor_2','$sabor_3','$sabor_4','$empleado','$lugar_venta','$modo_pago','$fecha_actual','$hora_actual','$cliente','$importe','$nro_ticket','$estado_ticket','$estado_entrega')";
        
        mysqli_select_db($conn,'storia');
        echo mysqli_query($conn,$consulta);
       
      
}


/*
** funcion que agrega nueva venta
*/
function addVentaCafeGeneral($descripcion_producto,$empleado,$cantidad,$lugar_venta,$modo_pago,$cliente,$nro_ticket,$conn){

   
    $sql = "select cod_producto, precio from st_productos where descripcion = '$descripcion_producto'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($query)){
        $importe = $rows['precio'];
        $cod_producto = $rows['cod_producto'];
    }
    
    $estado_entrega = '5';
    $estado_ticket = 'Abierto';
    $espacio = 'cafeteria';
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    
    $importe = $importe * $cantidad;
    
$consulta = "INSERT INTO st_ventas".
 "(cod_producto,
   descripcion,
   espacio,
   empleado,
   cantidad,
   lugar_venta,
   tipo_pago,
   fecha_venta,
   hora_venta,
   cliente_nombre,
   importe,
   nro_ticket,
   estado_ticket,
   estado_entrega)".
 "VALUES ".
 "('$cod_producto',
   '$descripcion_producto',
   '$espacio',
   '$empleado',
   '$cantidad',
   '$lugar_venta',
   '$modo_pago',
   '$fecha_actual',
   '$hora_actual',
   '$cliente',
   '$importe',
   '$nro_ticket',
   '$estado_ticket',
   '$estado_entrega')";
        
        mysqli_select_db($conn,'storia');
        echo mysqli_query($conn,$consulta);
       
      
}


/*
** funcion que actualiza una venta
*/
function updateVentaHeladeria($id,$producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$empleado,$lugar_venta,$modo_pago,$cliente,$conn){

   
    $sql = "select cod_producto, precio from st_productos where descripcion = '$producto'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($query)){
        $codigo_producto = $rows['cod_producto'];
        $importe = $rows['precio'];
    }
    
    $espacio = 'heladeria';
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    
          $consulta = "update st_ventas set cod_producto = '$codigo_producto', descripcion = '$producto', espacio = '$espacio', sabor_1 = '$sabor_1', sabor_2 = '$sabor_2', sabor_3 = '$sabor_3', sabor_4 = '$sabor_4', empleado = '$empleado', lugar_venta = '$lugar_venta', tipo_pago = '$modo_pago', fecha_venta = '$fecha_actual', hora_venta = '$hora_actual', cliente_nombre = '$cliente', importe = '$importe' where id = '$id'";
        
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
          
              
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Venta Actualizada Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Actualizar la Venta. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		   
}

/*
** actualizacion de estado en la entrega de producto de heladeria en local
*/
function updateEntregaHelado($id,$conn){

    $sql = "update st_ventas set estado_entrega = 'Entregado' where id = '$id'";
    mysqli_select_db($conn,'storia');
    $resp = mysqli_query($conn,$sql);
    
    if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Estado de Entrega modificado Correctamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Modificar el estado de la entrega. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }


}


/*
** funcion que elimina registro de sabores
*/
function deleteVenta($id,$conn){

    $sql = "delete from st_ventas where id = '$id'";
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


/*
** genera ticket de venta heladeria en local
*/
function ticketHeladeriaLocal($cliente,$lugar_venta,$nro_ticket,$conn){
            
            $sql = "update st_ventas set estado_ticket = 'Cerrado' where nro_ticket = '$nro_ticket'";
            mysqli_select_db($conn,'storia');
            $query = mysqli_query($conn,$sql);
            
            
            
            echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<p><img class="img-reponsive img-rounded" src="../../icons/actions/edit-select.png" /> Seleccione el tipo de ticket que desea imprimir</p><hr>';
		    
		    echo '<a href="../../lib_heladeria/print.php?file=print_ticket_heladeria_local.php&cliente='.$cliente.'&lugar_venta='.$lugar_venta.'&nro_ticket='.$nro_ticket.'" target="_blank"><button type="button" class="btn btn-default"><img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Ticket Cliente</button></a>';
		        
		    echo "</div>";
		    echo "</div>";
		        
		    

}

// ======================================================================= //
// BUSQUEDAS AVANZADA HELADERIA - RESULTADOS
// ======================================================================= //
/*
** funcion que devuelve el resultado de la busqueda avanzada en HELADERIA
** recibe como parámetros @fecha_desde, @fecha_hasta y @modo_pago (efectivo, tarjeta debito, tarjeta credito)
*/
function resultadoBusquedaHeladeria($fecha_desde,$fecha_hasta,$modo_pago,$conn){

	$sql = "select cod_producto, descripcion, empleado, tipo_pago, fecha_venta, hora_venta, importe, nro_ticket 
			  from st_ventas 
			  where fecha_venta BETWEEN '$fecha_desde' AND '$fecha_hasta'
			  and tipo_pago = '$modo_pago' 
			  and estado_ticket = 'Cerrado' 
			  and cod_producto like 'hd%'";
	
	$query = mysqli_query($conn,$sql);
	
	
	$total = 0;
	  echo '<div class="panel panel-success" >
			<div class="panel-heading"><span class="pull-center ">
		  <img src="../../icons/actions/quickopen-function.png"  class="img-reponsive img-rounded"> Resultado Búsqueda Avanzada Heladería';
	  echo '</div><br>';
  
			  echo "<div class='table-responsive'>
					  <table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
				echo "<thead>
			  <th class='text-nowrap text-center'>Producto</th>
			  <th class='text-nowrap text-center'>Empleado</th>
			  <th class='text-nowrap text-center'>Modo de Pago</th>
			  <th class='text-nowrap text-center'>Fecha Pedido</th>
			  <th class='text-nowrap text-center'>Hora Pedido</th>
			  <th class='text-nowrap text-center'>Importe</th>
			  <th class='text-nowrap text-center'>Nro. Ticket</th>
			  <th>&nbsp;</th>
			  </thead>";
  
  
	  while($fila = mysqli_fetch_array($query)){
				// Listado normal
			   echo " <tr>";
		 	   echo "<td align=center>".$fila['descripcion']."</td>";
		 	   echo "<td align=center>".$fila['empleado']."</td>";
			   echo "<td align=center>".$fila['tipo_pago']."</td>";
			   echo "<td align=center>".$fila['fecha_venta']."</a></td>";
			   echo "<td align=center>".$fila['hora_venta']."</a></td>";
			   echo "<td align=center>$".$fila['importe']."</a></td>";
			   echo "<td align=center>".$fila['nro_ticket']."</a></td>";
			   echo "<td class='text-nowrap'>";
			   echo "</td>";
			   $total += $fila['importe'];
		  }
  
		  echo "</table></div>";
		  echo '<br>';
		  echo '<button type="button" class="btn btn-primary">Importe Total sobre Filtrado:  $'.$total.' </button>';
		  echo '</div>';
		  
  
	  mysqli_close($conn);
  
  }


// ===================================================================================== // 
// MODALES //
// ===================================================================================== //

/*
** modal que carga los precios de heladeria
*/
function modalPreciosHeladeria(){


    echo '<!-- Modal -->
  <div class="modal fade" id="precios_heladeria" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Heladería</h4>
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

/*
** MODAL CARGA BUSQUEDA AVANZADA CAFE
*/
function modalBusquedaHeladeria(){

	echo '<div id="busqueda_avanzada_heladeria" class="modal fade" role="dialog">
	  <div class="modal-dialog">
  
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">
		<img class="img-reponsive img-rounded" src="../../icons/actions/edit-find-project.png" /> Búsqueda Avanzada</h4>
		</div>
		
		<div class="modal-body">
		  
		<div class="container-fluid">
		  <div class="alert alert-success">
		  <p align="justify">Seleccione el Modo de Pago y las fechas entre las que desea filtrar la búsqueda</p>
		  </div><hr>
		  
		  <form action="#" method="POST">
			
			<div class="form-group">
		  <label for="email">Fecha Desde:</label>
		  <input type="date" class="form-control" id="fecha_desde" name="fecha_desde">
			</div>
			
			<div class="form-group">
		  <label for="pwd">Fecha Hasta:</label>
		  <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta">
			</div>
			
			 <div class="form-group">
		  <label for="sel1">Modo de Pago:</label>
		  <select class="form-control" id="sel1" name="modo_pago">
			<option value="" selected disabled>Seleccionar</option>
			<option value="Efectivo">Efectivo</option>
			<option value="Tarjeta Debito">Tarjeta Débito</option>
			<option value="Tarjeta Credito">Tarjeta Crédito</option>
		  </select>
			</div><hr>
			
			<button type="submit" class="btn btn-success btn-block" name="search_helado">
		  <img class="img-reponsive img-rounded" src="../../icons/actions/edit-find.png" /> Buscar</button>
		  </form>
		</div>
		  
		  
		</div>
		
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">
		<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-close.png" /> Cerrar</button>
		</div>
	  </div>
  
	</div>
  </div>';
    
  
  }


?>
