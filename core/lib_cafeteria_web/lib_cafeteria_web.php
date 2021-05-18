<?php

/*
** formulario para agregar venta
*/
function formVentaWebCaffe($conn,$nombre){
       
       
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nuevo Pedido de Confitería</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
            
            <div class="form-group">
		  <label for="sel1">Producto:</label>
		  <select class="form-control" name="producto" required>
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
            
                 
            <button type="submit" class="btn btn-success btn-block" name="add_pedido_cafeteria">
                <img src="../../icons/actions/go-next-view.png"  class="img-reponsive img-rounded"> Comenzar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
// ** formulario de cierre de pedido cafe
*/
function formFinalizarPedidoCafe($cliente,$producto,$lugar_venta,$modo_pago,$conn){

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
                        <img class="img-reponsive img-rounded" src="../../icons/actions/games-endturn.png" /> Finalizar Pedido de Cafetería</div>
                    <div class="panel-body">
		  
                    <form id="pedido_cafe_ajax" method="POST">
                    <input type="hidden" name="cod_producto" value="'.$cod_producto.'">
                    
                    <div class="form-group">
                    <label for="email">Producto:</label>
                    <input type="text" class="form-control" name="producto" value="'.$producto.'" readonly required>
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
                
                                
                echo '<button type="button" class="btn btn-primary btn-block" name="end_pedido_cafe" id="end_pedido_cafe">
                    <img src="../../icons/actions/dialog-ok.png"  class="img-reponsive img-rounded"> Finalizar Pedido</button>
                </form>
                
                </div>
                </div>
                </div>
                </div>
                </div>';

}


/*
** persistencia de datos en base para pedido de cafetería
*/
function addPedidoCafeWeb($cliente,$producto,$lugar_venta,$modo_pago,$cod_producto,$importe,$conn){

       
    $espacio = 'cafeteria';
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    
          $consulta = "INSERT INTO st_ventas".
              "(cod_producto,
                descripcion,
                espacio,
                lugar_venta,
                tipo_pago,
                fecha_venta,
                hora_venta,
                cliente_nombre,
                importe)".
            "VALUES ".
        "('$codigo_producto',
          '$producto',
          '$espacio',
          '$lugar_venta',
          '$modo_pago',
          '$fecha_actual',
          '$hora_actual',
          '$cliente',
          '$importe')";
        
        mysqli_select_db($conn,'storia');
        echo mysqli_query($conn,$consulta);

}


/*
** muestra los pedidos realizados por el cliente
*/
function pedidosClienteCafe($conn,$nombre){

    if($conn)
{
	$sql = "SELECT * FROM st_ventas where espacio = 'cafeteria' and cliente_nombre = '$nombre'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/fill-color.png"  class="img-reponsive img-rounded"> Mis Pedidos de Cafetería';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Producto</th>
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
			 echo "<td align=center>".$fila['lugar_venta']."</a></td>";
			 echo "<td align=center>".$fila['tipo_pago']."</a></td>";
			 echo "<td align=center>".$fila['fecha_venta']."</a></td>";
			 echo "<td align=center>".$fila['hora_venta']."</a></td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</a></td>";
			 echo "<td align=center>$".$fila['importe']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-success btn-sm" name="ticket_venta"><img src="../../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Pedido</button>';
                   echo '</form>';
			 echo "</td>";
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


?>
