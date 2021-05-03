<?php

//FORMULARIOS

/*
** funcion que carga la tabla de todos los sabores
*/


function sabores($conn){

if($conn)
{
	$sql = "SELECT * FROM st_sabores";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/fill-color.png"  class="img-reponsive img-rounded"> Administración de Sabores';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Código Sabor</th>
            <th class='text-nowrap text-center'>Descripción</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cod_sabor']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</a></td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_sabor"><img src="../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   echo '<button type="submit" class="btn btn-danger btn-sm" name="del_sabor"><img src="../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Eliminar</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="add_sabor">
			  <img src="../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Sabor</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Sabores:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** formulario para agregar sabor
*/
function formAddSabor(){

         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Nuevo Sabor</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
            
                        
            <div class="form-group">
              <label>Código de Sabor:</label>
		<input type="text" class="form-control" name="cod_sabor" maxlength="4" minlength="4" placeholder="Ingrese el código numérico del producto" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Descripción del Sabor:</label>
		<input type="text" class="form-control" name="descripcion" placeholder="Ingrese la descripcion del Sabor" required>
            </div><hr>
            
                 
            <button type="submit" class="btn btn-success btn-block" name="addSabor">
                <img src="../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}



/*
** formulario para editar producto
*/
function formEditSabor($id,$conn){
        
        $sql = "select * from st_sabores where id = '$id'";
         mysqli_select_db($conn,'storia');
         $query = mysqli_query($conn,$sql);
         while($fila = mysqli_fetch_array($query)){
            $cod_sabor = $fila['cod_sabor'];
            $descripcion = $fila['descripcion'];
            }
         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar Sabor</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                        
            <div class="form-group">
              <label>Código de Sabor:</label>
		<input type="text" class="form-control" name="cod_sabor"  value="'.$cod_sabor.'" readonly required>
            </div><hr>
            
            <div class="form-group">
	      <label>Descripción del Sabor:</label>
		<input type="text" class="form-control" name="descripcion" value="'.$descripcion.'" required>
            </div><hr>
            
                 
            <button type="submit" class="btn btn-success btn-block" name="editSabor">
                <img src="../icons/actions/document-save-as.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** funcion para eliminar un registro de sabores
*/
function formEliminarSabor($id,$conn){

        $sql = "select * from st_sabores where id = '$id'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        while($fila = mysqli_fetch_array($query)){
                $sabor = $fila['descripcion'];
            }
            
            echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-danger">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/status/security-low.png" /> Sabores - Eliminar Registro</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                <div class="alert alert-danger">
		  <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por eliminar el registro: <strong>'.$sabor.'</strong></p>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="delete_sabor">Aceptar</button><br>
            
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
** funcion que agrega Producto
*/
function addSabor($cod_sabor,$descripcion,$conn){

    $codigo_sabor = 'sb'.$cod_sabor;

    $sql = "select cod_sabor, descripcion from st_sabores where cod_sabor = '$codigo_sabor' or descripcion = '$descripcion'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    
    
          
    if($rows == 0){
            
           $consulta = "INSERT INTO st_sabores".
            "(cod_sabor,descripcion)".
            "VALUES ".
        "('$codigo_sabor','$descripcion')";
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Sabor Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Sabor. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    }else{
		    
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Ya existe registro de ese Sabor.';
			    echo "</div>";
			    echo "</div>";
			    exit;
		    
		    }

}


/*
** funcion actualizar registro de clientes
*/
function updateSabor($id,$descripcion,$conn){

        $sql = "update st_sabores set descripcion = '$descripcion' where id = '$id'";
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
** funcion que elimina registro de sabores
*/
function deleteSabor($id,$conn){

    $sql = "delete from st_sabores where id = '$id'";
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
