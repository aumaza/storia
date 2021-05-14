<?php

/*
** funcion que carga la tabla de todos los clientes
*/


function clientes($conn){

if($conn)
{
	$sql = "SELECT * FROM st_clientes";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Administración de Datos de Clientes / Empleados / Repartidores';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Cliente</th>
            <th class='text-nowrap text-center'>Email</th>
            <th class='text-nowrap text-center'>Dirección</th>
            <th class='text-nowrap text-center'>Localidad</th>
            <th class='text-nowrap text-center'>Teléfono</th>
            <th class='text-nowrap text-center'>Movil</th>
            <th class='text-nowrap text-center'>Tipo Usuario</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cliente_nombre']."</td>";
			 echo "<td align=center>"."<a href='mailto:".$fila['email']."'>".$fila['email']."</a></td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['telefono']."</td>";
			 echo "<td align=center>".$fila['movil']."</td>";
			 echo "<td align=center>".$fila['espacio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_cliente"><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form <action="#" method="POST">
			<button type="submit" class="btn btn-default btn-sm" name="add_cliente">
			  <img src="../../icons/actions/list-add-user.png"  class="img-reponsive img-rounded"> Agregar</button>
		      </form><br>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Clientes:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}


/*
** funcion que carga los datos de un cliente determinado
*/


function cliente($conn,$nombre){

if($conn)
{
	$sql = "SELECT * FROM st_clientes where cliente_nombre = '$nombre'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Administración de Datos de Cliente';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Nombre</th>
            <th class='text-nowrap text-center'>Email</th>
            <th class='text-nowrap text-center'>Dirección</th>
            <th class='text-nowrap text-center'>Localidad</th>
            <th class='text-nowrap text-center'>Teléfono</th>
            <th class='text-nowrap text-center'>Movil</th>
            <th class='text-nowrap text-center'>Tipo Usuario</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['cliente_nombre']."</td>";
			 echo "<td align=center>"."<a href='mailto:".$fila['email']."'>".$fila['email']."</a></td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['telefono']."</td>";
			 echo "<td align=center>".$fila['movil']."</td>";
			 echo "<td align=center>".$fila['espacio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_cliente"><img src="../../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   if($fila['espacio'] == 'cli'){
                    echo '<button type="submit" class="btn btn-success btn-sm" name="avatar"><img src="../../icons/actions/edit-image-face-recognize.png"  class="img-reponsive img-rounded"> Avatar</button>';
                   }
                   echo '</form>';
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
** formulario para agregar Clientes
*/
function formAddCliente(){

         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-8">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/actions/list-add-user.png" /> Agregar Nuevo Cliente / Empleado / Repartidor</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
            
            <div class="form-group">
              <label>Nombre del Cliente:</label>
		<input type="text" class="form-control" name="cliente" placeholder="Ingrese el Nombre del Cliente " required>
            </div><hr>
            
            <div class="form-group">
	      <label>Email:</label>
		<input type="email" class="form-control" name="email" placeholder="Ingrese el email del Cliente" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Dirección:</label>
		<input type="text" class="form-control" name="direccion" placeholder="Ingrese la dirección del Cliente" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Localidad:</label>
		<input type="text" class="form-control" name="localidad" placeholder="Ingrese la Localidad del Cliente" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Teléfono Fijo:</label>
		<input type="text" class="form-control" name="telefono" placeholder="Ingrese número de teléfono" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Teléfono Móvil:</label>
		<input type="text" class="form-control" name="movil" placeholder="Ingrese número de Móvil" required>
            </div><hr>
            
             <div class="form-group">
                <label for="sel1">Espacio:</label>
                <select class="form-control" name="espacio" required>
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="emp">Empleado</option>
                    <option value="cli">Cliente</option>
                    <option value="rep">Repartidor</option>
                </select>
            </div><hr> 
            
                 
            <button type="submit" class="btn btn-success btn-block" name="addCliente">
                <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
            </form>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}


/*
** formulario para editar Clientes
*/
function formEditCliente($id,$nombre,$conn){
        
        $sql = "select * from st_clientes where id = '$id'";
         mysqli_select_db($conn,'storia');
         $query = mysqli_query($conn,$sql);
         while($fila = mysqli_fetch_array($query)){
            $cliente = $fila['cliente_nombre'];
            $email = $fila['email'];
            $direccion = $fila['direccion'];
            $localidad = $fila['localidad'];
            $telefono = $fila['telefono'];
            $movil = $fila['movil'];
            $espacio = $fila['espacio'];
         }
         
       echo '<div class="container">
	      <div class="row">
		<div class="col-sm-10">
            
            <div class="panel panel-success">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../../icons/actions/list-add-user.png" /> Editar Cliente / Empleado / Repartidor</div>
		  <div class="panel-body">
	
	    <form action="#" method="POST">
	    <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
            <div class="form-group">
              <label>Nombre del Cliente / Empleado / Repartidor:</label>
		<input type="text" class="form-control" name="cliente" value="'.$cliente.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Email:</label>
		<input type="email" class="form-control" name="email" value="'.$email.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label>Dirección:</label>
		<input type="text" class="form-control" name="direccion" value="'.$direccion.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Localidad:</label>
		<input type="text" class="form-control" name="localidad" value="'.$localidad.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Teléfono Fijo:</label>
		<input type="text" class="form-control" name="telefono" value="'.$telefono.'" required>
            </div><hr>
            
            <div class="form-group">
	      <label">Teléfono Móvil:</label>
		<input type="text" class="form-control" name="movil" value="'.$movil.'" required>
            </div><hr>';
            
            if($nombre == 'Administrador'){
            
            echo '<div class="form-group">
                <label for="sel1">Espacio:</label>
                <select class="form-control" name="espacio" required>
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="emp" '.($espacio == "emp" ? "selected" : ""). '>Empleado</option>
                    <option value="cli" '.($espacio == "cli" ? "selected" : ""). '>Cliente</option>
                    <option value="rep" '.($espacio == "rep" ? "selected" : ""). '>Repartidor</option>
                </select>
            </div><hr>';
            
            }else if($nombre != 'Administrador'){
                       
                echo '<input type="hidden" class="form-control" name="espacio" value="'.$espacio.'" required>';
             
            }
                  
            echo '<button type="submit" class="btn btn-success btn-block" name="update_cliente">
                <img src="../../icons/devices/media-floppy.png"  class="img-reponsive img-rounded"> Guardar</button>
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
function addCliente($cliente,$email,$direccion,$localidad,$telefono,$movil,$espacio,$conn){

    $sql = "select cliente_nombre, email from st_clientes where cliente_nombre = '$cliente' or email = '$email'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    
    
          
    if($rows == 0){
            
           $consulta = "INSERT INTO st_clientes".
            "(cliente_nombre,email,direccion,localidad,telefono,movil,espacio)".
            "VALUES ".
        "('$cliente','$email','$direccion','$localidad','$telefono','$movil','$espacio')";
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$consulta);
            
            if($resp){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Cliente y Usuario Agregado Satisfactoriamente.';
		    newPass($conn,$cliente,$email,$espacio);
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Cliente. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    }else{
		    
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Ya existe registro de ese Cliente.';
			    echo "</div>";
			    echo "</div>";
			    exit;
		    
		    }

}


/*
** funcion actualizar registro de clientes
*/
function updateCliente($id,$cliente,$email,$direccion,$localidad,$telefono,$movil,$espacio,$conn){

        $sql = "update st_clientes set cliente_nombre = '$cliente', email = '$email', direccion = '$direccion', telefono = '$telefono', movil = '$movil', espacio = '$espacio' where id = '$id'";
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



///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// SECCION REGENERACION PASSWORD ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
/*
** Funcion para generar archivo de password
*/


function gentxt($usuario,$password){
  
  $fileName = "../../registro/gen_pass/$usuario.pass.txt"; 
    
  if (file_exists($fileName)){
  
  //echo "Archivo Existente...";
  //echo "Se actualizaran los datos...";
  $file = fopen($fileName, 'w+') or die("Se produjo un error al crear el archivo");
  
  fwrite($file, $password) or die("No se pudo escribir en el archivo");
  
  fclose($file);
	
	echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
  echo "<hr>";
  echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
 
  }else{
  
      //echo "Se Generará archivo de respaldo..."
      $file = fopen($fileName, 'w') or die("Se produjo un error al crear el archivo");
      fwrite($file, $password) or die("No se pudo escribir en el archivo");
      fclose($file);
	
        echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
        echo "<hr>";
        echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
       
  
  }
  
  
}


/*
** Funcion para generar nuevo archivo de password
*/


function genNewTxt($cliente,$password){
  
  $fileName = "../../registro/gen_pass/$cliente.pass.txt"; 
    
  if (file_exists($fileName)){
  
  //echo "Archivo Existente...";
  //echo "Se actualizaran los datos...";
  $file = fopen($fileName, 'w+') or die("Se produjo un error al crear el archivo");
  
  fwrite($file, $password) or die("No se pudo escribir en el archivo");
  
  fclose($file);
	
	echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
  echo "<hr>";
  echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
 
  }else{
  
      //echo "Se Generará archivo de respaldo..."
      $file = fopen($fileName, 'w') or die("Se produjo un error al crear el archivo");
      fwrite($file, $password) or die("No se pudo escribir en el archivo");
      fclose($file);
	
        echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
        echo "<hr>";
        echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
       
  
  }
  
  
}


/*
** Funcion para generar password aleatorio
*/

function genPass(){
    //Se define una cadena de caractares.
    //Os recomiendo desordenar las minúsculas, mayúsculas y números para mejorar la probabilidad.
    $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@";
    //Obtenemos la longitud de la cadena de caracteres
    $stringLong = strlen($string);
 
    //Definimos la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, puedes poner la longitud que necesites
    //Se debe tener en cuenta que cuanto más larga sea más segura será.
    $longPass=15;
 
    //Creamos la contraseña recorriendo la cadena tantas veces como hayamos indicado
    for($i=1 ; $i<=$longPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos = rand(0,$stringLong-1);
 
        //Vamos formando la contraseña con cada carácter aleatorio.
        $pass .= substr($string,$pos,1);
    }
    return $pass;
}

/*
** Funcion para blanquear password
*/

function resetPass($conn,$usuario){

  $password = genPass();
  
  $sql = "UPDATE st_usuarios SET password = '$password' where user = '$usuario'";
  
  $retval = mysqli_query($conn,$sql);
 
  
  if($retval){
    echo '<div class="container">
      <div class="row">
      <div class="col-md-6">';
    
    echo '<div class="alert alert-success" role="alert">';
    echo "Su Password fue blanqueada con Exito!";
    echo "<br>";
    gentxt($usuario,$password);
    
    echo "</div>";
    echo '</div>
	  </div>
	  </div>';
    
  }else{
    
    echo '<div class="container">
      <div class="row">
      <div class="col-md-6">';
    echo '<div class="alert alert-danger" role="alert">';
    echo "Error al Blanquear Password";
    echo "</div>";
     echo '</div>
	  </div>
	  </div>';
    
  }
   
}


/*
** Funcion para blanquear password
*/

function newPass($conn,$cliente,$email,$espacio){

  $password = genPass();
  $role = 1;
  
  $sql = "INSERT INTO st_usuarios".
            "(nombre,user,password,espacio,role)".
            "VALUES ".
        "('$cliente','$email','$password','$espacio','$role')";
  mysqli_select_db($conn,'storia');
  $retval = mysqli_query($conn,$sql);
 
  
  if($retval){
    echo '<div class="container">
      <div class="row">
      <div class="col-md-6">';
    
    echo '<div class="alert alert-success" role="alert">';
    echo "Usuario Generado con Exito!";
    echo "<br>";
    genNewTxt($cliente,$password);
    
    echo "</div>";
    echo '</div>
	  </div>
	  </div>';
    
  }else{
    
    echo '<div class="container">
      <div class="row">
      <div class="col-md-6">';
    echo '<div class="alert alert-danger" role="alert">';
    echo "Error al Generar Usuario";
    echo "</div>";
     echo '</div>
	  </div>
	  </div>';
    
  }
   
}


////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////// FIN SECCION GENERACION PASSWORD////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////


/*
* Funcion para cambiar avatar de usuario
*/
function uploadAvatar(){

    echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/svn-commit.png"  class="img-reponsive img-rounded"> Subir Archivo';
	echo '</div><br>';
	           
                          
	echo '
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                <strong>Seleccione el Archivo a Subir:</strong><br>
                <form action="main.php" method="POST" enctype="multipart/form-data">
                                
                <input type="file" name="file"><br>
                <button type="submit" name="submit"><span class="glyphicon glyphicon-cloud-upload"></span> Subir</button>
                </form>
                </div>
            </div>
	      </div>  
	    </div>
	  </div>';
}

function uploadFileAvatar($fileName,$nombre,$conn){

// File upload path
$targetDir = '../avatar/';
//$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//$destinationPath = '../../avatar/';

if(!empty($fileName)){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    
    if(in_array($fileType, $allowTypes)){
    
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
           
            
            // Insert image file name into database
           
           $sqlInsert = "UPDATE st_usuarios set avatar = '$targetFilePath' where nombre = '$nombre'";
			   mysqli_select_db($conn,'storia');
			  $insert = mysqli_query($conn,$sqlInsert);
           
           
            if($insert){
            
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /><strong> Base de Datos Actualizada. El Archivo '.$fileName. ' se ha subido correctamente..</strong>';
                          echo "</div><hr>";
                          //copy($fileName, "$destinationPath/$fileName");
                          //unlink($fileName);
                          //echo '<meta http-equiv="refresh" content="5;URL=../main/main.php "/>';
                          
                                           
            }else{
		  
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /><strong> El Archivo '.$fileName. ' se ha subido correctamente.</strong>';
                          echo "</div><hr>";
                          
            } 
        }else{
			  echo '<div class="alert alert-warning" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" /><strong> Ups. Hubo un error subiendo el Archivo.</strong>';
                          echo "</div><hr>";
                           
        }
    }else{
			  echo '<div class="alert alert-danger" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/dialog-cancel.png" /><strong> Ups, solo archivos con extensión: JPG, PNG, BMP, GIF son soportados.</strong>';
			  echo "</div><hr>";
                          
    }
}else{
			  echo '<div class="alert alert-info" role="alert">';
                          echo '<h1 class="panel-title text-left" contenteditable="true"><img class="img-reponsive img-rounded" src="../../icons/actions/system-reboot.png" /><strong> Por favor, seleccione al archivo a subir.</strong>';
                          echo "</div><hr>";
                          
}
}




?>
