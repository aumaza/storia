<?php

/*
** funcion que carga la tabla de todos los productos
*/


function productos($conn){

if($conn)
{
	$sql = "SELECT * FROM st_productos";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/feed-subscribe.png"  class="img-reponsive img-rounded"> Administración de Productos';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Código Producto</th>
            <th class='text-nowrap text-center'>Producto</th>
            <th class='text-nowrap text-center'>Precio</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cod_producto']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</a></td>";
			 echo "<td align=center>".$fila['precio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_producto"><img src="../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   echo '<button type="submit" class="btn btn-danger btn-sm" name="del_producto"><img src="../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Eliminar</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="add_producto">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Producto</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Clientes:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}



/*
** formulario para agregar producto
*/
function formAddProducto(){

         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Nuevo Producto</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
            
            <div class="form-group">
                <label for="sel1">Ambito del Producto:</label>
                <select class="form-control" name="tipo" required>
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="hd">Heladería</option>
                    <option value="cf">Cafetería</option>
                    <option value="ks">Kiosko</option>
                </select>
            </div><hr>
            
            <div class="form-group">
              <label>Código del Producto:</label>
		<input type="text" class="form-control" name="cod_producto" maxlength="4" minlength="4" placeholder="Ingrese el código numérico del producto" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Descripción del Producto:</label>
		<input type="text" class="form-control" name="descripcion" placeholder="Ingrese la descripcion del producto" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Precio:</label>
		<input type="text" class="form-control" name="precio" placeholder="Ingrese el valor del producto. Para separar los decimales use un punto. Ejemplo 850.50" required>
            </div><hr>
            
                     
                 
            <button type="submit" class="btn btn-success btn-block" name="addProducto">
                <img src="../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** formulario para agregar producto
*/
function formEditProducto($id,$conn){
        
        $sql = "select * from st_productos where id = '$id'";
         mysqli_select_db($conn,'storia');
         $query = mysqli_query($conn,$sql);
         while($fila = mysqli_fetch_array($query)){
            $cod_producto = $fila['cod_producto'];
            $descripcion = $fila['descripcion'];
            $precio = $fila['precio'];
            }
         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar Producto</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                       
            <div class="form-group">
              <label>Código del Producto:</label>
		<input type="text" class="form-control" name="cod_producto" maxlength="4" minlength="4" value="'.$cod_producto.'" readonly required>
            </div><hr>
            
            <div class="form-group">
	      <label>Descripción del Producto:</label>
		<input type="text" class="form-control" name="descripcion" value="'.$descripcion.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Precio:</label>
		<input type="text" class="form-control" name="precio" value="'.$precio.'" required>
            </div><hr>
            
                     
                 
            <button type="submit" class="btn btn-success btn-block" name="editProducto">
                <img src="../icons/actions/document-save-as.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** funcion que agrega Producto
*/
function addProducto($tipo,$cod_producto,$descripcion,$precio,$conn){

    $codigo_producto = $tipo.$cod_producto;

    $sql = "select cod_producto, descripcion from st_productos where cod_producto = '$codigo_producto' or descripcion = '$descripcion'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    
    
          
    if($rows == 0){
            
           $consulta = "INSERT INTO st_productos".
            "(cod_producto,descripcion,precio)".
            "VALUES ".
        "('$codigo_producto','$descripcion','$precio')";
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Producto Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Producto. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    }else{
		    
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Ya existe registro de ese Producto.';
			    echo "</div>";
			    echo "</div>";
			    exit;
		    
		    }

}


/*
** funcion actualizar registro de clientes
*/
function updateProducto($id,$descripcion,$precio,$conn){

        $sql = "update st_productos set descripcion = '$descripcion', precio = '$precio' where id = '$id'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        
        if($query){
		    echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Registro Actualizado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
        }else{
                    echo "<br>";
                    echo '<div class="container">';
                    echo '<div class="alert alert-warning" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Actualizar el Registro. '  .mysqli_error($conn);
                    echo "</div>";
                    echo "</div>";
                }


}


/*
** funcion para eliminar un registro de productos
*/
function formEliminarProducto($id,$conn){

        $sql = "select * from st_productos where id = '$id'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        while($fila = mysqli_fetch_array($query)){
                $producto = $fila['descripcion'];
            }
            
            echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-danger">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/status/security-low.png" /> Productos - Eliminar Registro</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                <div class="alert alert-danger">
		  <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por eliminar el registro: <strong>'.$producto.'</strong></p>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="delete_producto">Aceptar</button><br>
            
            </form>
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block">Cancelar</button></a>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** funcion que elimina registro de productos
*/
function deleteProducto($id,$conn){

    $sql = "delete from st_productos where id = '$id'";
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
