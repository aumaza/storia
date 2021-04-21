<?php

//FORMULARIOS

/*
** funcion que carga la tabla de todas las ventas de heladeria
*/


function ventasHeladeria($conn){

if($conn)
{
	$sql = "SELECT * FROM st_ventas where espacio = 'heladeria'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/fill-color.png"  class="img-reponsive img-rounded"> Administración de Ventas en Heladería';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Código Producto</th>
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
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cod_producto']."</td>";
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
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_venta"><img src="../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   echo '<button type="submit" class="btn btn-danger btn-sm" name="del_venta"><img src="../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Eliminar</button>';
                   echo '<button type="submit" class="btn btn-success btn-sm" name="ticket_venta"><img src="../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Ticket</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="add_venta">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Nueva Venta</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Ventas:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}



/*
** formulario para agregar venta
*/
function formAddVenta($conn){
       
       
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Nueva Venta</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
            
            <div class="form-group">
		  <label for="sel1">Producto:</label>
		  <select class="form-control" name="producto" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_productos order by descripcion ASC";
		      mysqli_select_db($conn,'storia');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[descripcion].'" >'.$valores[descripcion].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
            
            <div class="form-group">
		  <label for="sel1">Sabor 1:</label>
		  <select class="form-control" name="sabor_1" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
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

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
             <div class="form-group">
		  <label for="sel1">Sabor 2:</label>
		  <select class="form-control" name="sabor_2" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
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

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
		
		 <div class="form-group">
		  <label for="sel1">Sabor 3:</label>
		  <select class="form-control" name="sabor_3" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
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

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
		
		 <div class="form-group">
		  <label for="sel1">Sabor 4:</label>
		  <select class="form-control" name="sabor_4" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
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
               echo '<option value="'.$valores[cliente_nombre].'" >'.$valores[cliente_nombre].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
            <div class="form-group">
            <label for="sel1">Lugar de Venta:</label>
            <select class="form-control" name="lugar_venta">
                <option value="" disabled selected>Seleccionar</option>
                <option value="Web">Web</option>
                <option value="Local">Local</option>
                </select>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Modo de Pago:</label>
            <select class="form-control" name="modo_pago">
                <option value="" disabled selected>Seleccionar</option>
                <option value="MP">Mercado Pago</option>
                <option value="Efectivo">Efectivo</option>
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
               echo '<option value="'.$valores[cliente_nombre].'" >'.$valores[cliente_nombre].'</option>';
				}
                }
			}

			mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
            
                 
            <button type="submit" class="btn btn-success btn-block" name="addVenta">
                <img src="../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Terminar</button>
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
            <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar Venta</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
            <div class="form-group">
		  <label for="sel1">Producto:</label>
		  <select class="form-control" name="producto" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM st_productos order by descripcion ASC";
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
		  <option value="" disabled selected>Seleccionar</option>';
		    
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
		  <option value="" disabled selected>Seleccionar</option>';
		    
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
		  <option value="" disabled selected>Seleccionar</option>';
		    
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
		  <option value="" disabled selected>Seleccionar</option>';
		    
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
            <label for="sel1">Lugar de Venta:</label>
            <select class="form-control" name="lugar_venta">
                <option value="" disabled selected>Seleccionar</option>
                <option value="Web" '.($fila['lugar_venta'] == "Web" ? "selected" : ""). '>Web</option>
                <option value="Local" '.($fila['lugar_venta'] == "Local" ? "selected" : ""). '>Local</option>
                </select>
            </div><hr>
            
            <div class="form-group">
            <label for="sel1">Modo de Pago:</label>
            <select class="form-control" name="modo_pago">
                <option value="" disabled selected>Seleccionar</option>
                <option value="MP" '.($fila['tipo_pago'] == "MP" ? "selected" : ""). '>Mercado Pago</option>
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
            
                 
            <button type="submit" class="btn btn-success btn-block" name="editVenta">
                <img src="../icons/actions/document-save-as.png"  class="img-reponsive img-rounded"> Actualizar</button>
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
		<img class="img-reponsive img-rounded" src="../icons/status/security-low.png" /> Ventas - Eliminar Registro</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                <div class="alert alert-danger">
		  <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por eliminar el registro: <strong>'.$producto.'</strong></p>
		    <p>Venta realizada por: <strong>'.$empleado.'</strong></p>
		    <p>Fecha: <strong>'.$fecha.'</strong></p><hr>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="delete_venta">Aceptar</button><br>
            
            </form>
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block">Cancelar</button></a>
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
                importe)".
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
          '$importe')";
        
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
          
              
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Venta Agregada Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Agregar la Venta. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		   
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
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Venta Actualizada Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Actualizar la Venta. '  .mysqli_error($conn);
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
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Registro Eliminado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Eliminar el Registro.'  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }

}


?>
