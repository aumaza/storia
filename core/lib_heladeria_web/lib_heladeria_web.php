<?php

/*
** formulario para agregar venta
*/
function formVentaWeb($conn,$nombre){
       
       
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nuevo Pedido de Heladería</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
            
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
               echo '<option value="'.$valores[descripcion].'" >'.$valores[descripcion].'</option>';
				}
                }
			}
			  
		 echo '</select>
		</div><hr>
            
            
            <div class="form-group">
		  <label for="sel1">Sabor 1:</label>
		  <select class="form-control" name="sabor_1" required>
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
		  <select class="form-control" name="sabor_2" required>
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
		  <select class="form-control" name="sabor_3" required>
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
		  <select class="form-control" name="sabor_4" required>
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
            <label for="sel1">Lugar / Modo de Venta:</label>
            <input type="text" class="form-control" name="lugar_venta" value="Web" readonly required>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Tipo de Pago:</label>
            <select class="form-control" name="modo_pago">
                <option value="" disabled selected>Seleccionar</option>
                <option value="MP">Mercado Pago</option>
                <option value="Efectivo">Efectivo</option>
                </select>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Cliente:</label>
            <input type="text" class="form-control" name="cliente" value="'.$nombre.'" readonly required>
            </div><hr>
            
                 
            <button type="submit" class="btn btn-success btn-block" name="add_pedido_heladeria">
                <img src="../../icons/actions/go-next-view.png"  class="img-reponsive img-rounded"> Comenzar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}

/*
** formulario de cierre de pedido heladeria
*/
function formFinalizarPedidoHeladeria($cliente,$producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$lugar_venta,$modo_pago,$conn){

    $sql = "select cod_producto, precio from st_productos where descripcion = '$producto'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    while($fila = mysqli_fetch_array($query)){
        $cod_producto = $fila['cod_producto'];
        $importe = $fila['precio'];
    }


    echo '<div class="container">
            <div class="row">
                <div class="col-sm-10">
            
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/games-endturn.png" /> Finalizar Pedido de Heladería</div>
                    <div class="panel-body">
		  
                    <form id="pedido_heladeria_ajax" method="POST">
                    <input type="hidden" name="cod_producto" value="'.$cod_producto.'">
                    
                    <div class="form-group">
                    <label for="email">Producto:</label>
                    <input type="text" class="form-control" name="producto" value="'.$producto.'" readonly required>
                    </div>
                
                <div class="form-group">
                    <label for="pwd">Sabor 1:</label>
                    <input type="text" class="form-control" name="sabor_1" value="'.$sabor_1.'" readonly required>
                </div>
                
                <div class="form-group">
                    <label for="pwd">Sabor 2:</label>
                    <input type="text" class="form-control" name="sabor_2" value="'.$sabor_2.'" readonly required>
                </div>
                
                <div class="form-group">
                    <label for="pwd">Sabor 3:</label>
                    <input type="text" class="form-control" name="sabor_3" value="'.$sabor_3.'" readonly required>
                </div>
                
                <div class="form-group">
                    <label for="pwd">Sabor 4:</label>
                    <input type="text" class="form-control" name="sabor_4" value="'.$sabor_4.'" readonly required>
                </div>
                
                <div class="form-group">
                    <label for="pwd">Tipo Compra:</label>
                    <input type="text" class="form-control" name="lugar_venta" value="'.$lugar_venta.'" readonly required>
                </div>
                
                <div class="form-group">
                    <label for="pwd">Cliente:</label>
                    <input type="text" class="form-control" name="cliente" value="'.$cliente.'" readonly required>
                </div>';
                
                if($modo_pago == 'MP'){
                
                    echo '<input type="hidden" name="modo_pago" value="'.$modo_pago.'">';
                    echo '<div class="form-group">
                            <label for="pwd">Importe:</label>
                            <input type="text" class="form-control" name="importe" value="'.$importe.'" readonly required>
                            </div><hr>';
                
                }if($modo_pago == 'Efectivo'){
                
                    echo '<input type="hidden" name="modo_pago" value="'.$modo_pago.'">';
                    echo '<div class="form-group">
                            <label for="pwd">Importe:</label>
                            <input type="text" class="form-control" name="importe" value="'.$importe.'" readonly required>
                            </div><hr>';
                
                }
                
                echo '<div class="alert alert-info">
                        <p align="center">
                        <img src="../../icons/actions/help-about.png"  class="img-reponsive img-rounded">
                            Antes de Finalizar verifique que los datos ingresados son los deseados</p>
                      </div>';
                
                                
                echo '<button type="button" class="btn btn-primary btn-block" name="end_pedido_heladeria" id="end_pedido_heladeria">
                    <img src="../../icons/actions/dialog-ok.png"  class="img-reponsive img-rounded"> Finalizar Pedido</button>
                </form>
                
                </div>
                </div>
                </div>
                </div>
                </div>';

}

/*
** persistencia de datos en base para pedido de heladería
*/
function addPedidoHeladeriaWeb($cliente,$producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$lugar_venta,$modo_pago,$cod_producto,$importe,$conn){

       
    $espacio = 'heladeria';
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    $estado_entrega = 'En Preparación';
    
          $consulta = "INSERT INTO st_ventas".
              "(cod_producto,
                descripcion,
                espacio,
                sabor_1,
                sabor_2,
                sabor_3,
                sabor_4,
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
          '$lugar_venta',
          '$modo_pago',
          '$fecha_actual',
          '$hora_actual',
          '$cliente',
          '$importe',
          '$estado_entrega')";
        
        mysqli_select_db($conn,'storia');
        echo mysqli_query($conn,$consulta);

}

/*
** muestra los pedidos realizados por el cliente
*/
function pedidosCliente($conn,$nombre){

    if($conn)
{
	$sql = "SELECT * FROM st_ventas where espacio = 'heladeria' and cliente_nombre = '$nombre'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/fill-color.png"  class="img-reponsive img-rounded"> Mis Pedidos de Heladería';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
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
            <th class='text-nowrap text-center'>Estado Pedido</th>
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
			 echo "<td align=center style='background-color: #aed6f1'>".$fila['estado_entrega']."</a></td>";
			 }
			 if($fila['estado_entrega'] == 'En Preparación'){
			 echo "<td align=center style='background-color: #edbb99'>".$fila['estado_entrega']."</a></td>";
			 }
			 echo "<td class='text-nowrap'>";
			 
            echo '<a href="../../lib_heladeria_web/print.php?file=print_pedido_web_heladeria.php&id='.$fila['id'].'" target="_blank"><button type="button" class="btn btn-success btn-xs"><img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Pedido</button></a>';
                   
            if($fila['estado_entrega'] != 'En Preparación'){
                   
                   echo '<a data-toggle="modal" data-target="#quien-viene" href="#" data-id="'.$fila['id'].'" class="btn btn-info btn-sm openBtn"><span class="glyphicon glyphicon-question-sign"></span> Quién Viene?</a>';
                  
            }
                   
			 echo "</td></tr>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Pedidos:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);




}


/*
** carga modal con datos del repartirdor
*/
function modalRepartidor(){
    
       
   echo '<!-- Modal -->
  <div class="modal fade" id="quien-viene" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tu Pedido lo lleva</h4>
        </div>
        <div class="modal-body">
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
        </div>
      </div>
      
    </div>
  </div>';

}


?>
