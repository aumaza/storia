<?php

/*
** carga de todos los usuarios
*/

function usuarios($conn){

if($conn)
{
	$sql = "SELECT * FROM st_usuarios";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Administración de Usuarios - Cambiar Permisos';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Nombre</th>
            <th class='text-nowrap text-center'>Usuario</th>
            <th class='text-nowrap text-center'>Avatar</th>
            <th class='text-nowrap text-center'>Role</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['user']."</td>";
			 echo "<td align=center>".$fila['avatar']."</td>";
			 echo "<td align=center>".$fila['role']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                    if($fila['user'] != 'root'){
                     echo '<button type="submit" class="btn btn-warning btn-sm" name="allow_user"><img src="../../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Cambiar Permisos</button>';
                     }
             echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Usuarios:  '.$count.' </button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}


/*
** funcion formulario de edicion de permisos de usuario
*/

function formEditRole($id,$conn){

      $sql = "select * from st_usuarios where id = '$id'";
      mysqli_select_db($conn,'storia');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);
      

      echo   '<h2>Cambiar Permisos</h2><hr>
	      
	      <form action="main.php" method="POST">
	      <input type="hidden" id="id" name="id" value="'.$id.'" />
   
         
	  <div class="input-group">
	    <span class="input-group-addon">Nombre y Apellido</span>
	    <input id="text" type="text" class="form-control" value="'.$fila['nombre'].'" name="nombre" value="" readonly required>
	  </div>
	
	  <div class="input-group">
	    <span class="input-group-addon">Usuario</span>
	    <input id="text" type="text" class="form-control" name="user" value="'.$fila['user'].'" readonly required>
	  </div><hr>
	  
	   <div class="form-group">
        <label for="sel1">Seleccione Permiso:</label>
        <select class="form-control" id="sel1" name="role" required>
            <option value="" disabled selected>Seleccionar</option>
            <option value="1" '.($fila['role'] == "1" ? "selected" : ""). '>Usuario Habilitado</option>
            <option value="0" '.($fila['role'] == "0" ? "selected" : ""). '>Usuario Deshabilitado</option>
            </select>
        </div> 
	  <br>
	
	  <button type="submit" class="btn btn-success btn-block" name="roles"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded">  Cambiar Permiso</button><br><hr>
	  </form>';
	  
}


/*
* Funcion para cambiar los permisos de los usuarios al sistema
*/

function cambiarPermisos($id,$role,$conn){

  $sql = "UPDATE st_usuarios set role = '$role' where id = '$id'";
  mysqli_select_db($conn,'storia');
  $retval = mysqli_query($conn,$sql);
  
  if($retval){
    
    echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo '<img class="img-reponsive img-rounded" src="../../icons/actions/dialog-ok-apply.png" /> Permiso Actualizado Satisfactoriamente';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
  
	  }else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un Error al intentar cambiar permisos. Intente Nuevamente! ' .mysqli_error($conn);
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
 
}


/*
** listar usuarios  (entorno de usuario)
*/
function loadUserPass($conn,$nombre){

if($conn){
	
	$sql = "SELECT * FROM st_usuarios where nombre = '$nombre'";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-success" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/view-refresh.png"  class="img-reponsive img-rounded"> Cambiar Password';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Usuario</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['user']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                    <button type="submit" class="btn btn-warning btn-sm" name="user_pass"><img src="../../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Cambiar Password</button>';
             echo '</form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}

/*
** funcion formulario de edicion de password de usuario
*/

function formEditPassword($id,$conn){

      $sql = "select * from st_usuarios where id = '$id'";
      mysqli_select_db($conn,'storia');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);
      

      echo   '<h2>Cambiar Password</h2><hr>
	      
	      <form action="main.php" method="POST">
	      <input type="hidden" id="id" name="id" value="'.$id.'" />
   
         
	  <div class="input-group">
	    <span class="input-group-addon">Nombre y Apellido</span>
	    <input id="text" type="text" class="form-control" value="'.$fila['nombre'].'" name="nombre" readonly required>
	  </div>
	
	  <div class="input-group">
	    <span class="input-group-addon">Usuario</span>
	    <input id="text" type="text" class="form-control" name="user"  value="'.$fila['user'].'" readonly required>
	  </div><hr>
	  
	   <div class="input-group">
	    <span class="input-group-addon">Ingrese Password</span>
	    <input id="text" type="password" class="form-control" name="pass1" maxlength="15" placeholder="Longitud máxima de 15 caracteres" required>
	  </div><hr>
	  
	  <div class="input-group">
	    <span class="input-group-addon">Repita Password</span>
	    <input id="text" type="password" class="form-control" name="pass2" maxlength="15" placeholder="Longitud máxima de 15 caracteres" required>
	  </div><hr>
	
	  <button type="submit" class="btn btn-success btn-block" name="update_password"><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded">  Cambiar Password</button><br><hr>
	  </form>';
	  
}


/*
** funcion para validar cambio de contraseñas
*/
function passwordValidate($conn,$id,$pass1,$pass2){

    if($conn){
     
        if(strlen($pass1) <= 15 || strlen($pass2) <= 15){
    
    if(strcmp($pass2,$pass1) == 0){
        
         updatePassUser($id,$pass1,$conn);
        
        }else{
        
                echo "<br>";
			    echo '<div class="alert alert-warning" role="alert">';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Las Contraseñas no Coinciden. Intente Nuevamente!.';
			    echo "</div>";
			    echo '<meta http-equiv="refresh" content="5;URL=#"/>';
    }
    }else{
        
                echo "<br>";
			    echo '<div class="alert alert-warning" role="alert">';
			    echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" />El Password supera los 15 caracteres! Reintentelo.';
			    echo "</div>";
			    echo '<meta http-equiv="refresh" content="5;URL=#"/>';
			          
    }
    }else{
	    mysqli_error($conn);
	  }
}


/*
** funcion formulario de edicion de password de usuario
*/
function updatePassUser($id,$pass1,$conn){

    mysqli_select_db($conn,'storia');
	$sqlInsert = "update st_usuarios set password = '$pass1' where id = '$id'";
    $res = mysqli_query($conn,$sqlInsert);


	if($res){
		echo "<br>";
		echo '<div class="alert alert-success" role="alert">';
		echo '<img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Password Actualizada Correctamente.                             Deberá Ingresar Nuevamente. Aguarde un Instante que será Redireccionado. ';
		echo "</div>";
		echo '<meta http-equiv="refresh" content="5;URL=../../logout.php">';
	}else{
		echo "<br>";
		echo '<div class="alert alert-warning" role="alert">';
		echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> Hubo un error al Actualizar el Password!. Aguarde un Instante que será Redireccionado' .mysqli_error($conn);
		echo "</div>";
		echo '<meta http-equiv="refresh" content="5;URL=#">';
	}
	}



?>
