<?php

/*
** formulario para el registro de usuario via web
*/

function formRegistroWeb(){

    echo '<form action="#" method="POST">
            
            <div class="form-group">
             <label for="email">Nombre y Apellido:</label>
             <input type="text" class="form-control" name="nombre" placeholder="Ingrese su Nombre y Apellido" required>
             </div>
             
             <div class="form-group">
             <label for="email">DNI:</label>
             <input type="text" class="form-control" name="dni" maxlenght="8" placeholder="Ingrese su DNI sin puntos" required>
             </div>
            
            <div class="form-group">
             <label for="email">Email:</label>
             <input type="email" class="form-control" name="email" placeholder="Ingrese su email" required>
             </div>
             
             <div class="form-group">
             <label for="email">Dirección:</label>
             <input type="text" class="form-control" name="direccion" placeholder="Ingrese su Dirección" required>
             </div>
             
             <div class="form-group">
             <label for="email">Localidad:</label>
             <input type="text" class="form-control" name="localidad" placeholder="Ingrese Localidad" required>
             </div>
             
             <div class="form-group">
             <label for="email">Teléfono:</label>
             <input type="text" class="form-control" name="telefono" placeholder="Ingrese su Telefono Fijo" required>
             </div>
             
             <div class="form-group">
             <label for="email">Móvil:</label>
             <input type="text" class="form-control" name="movil" placeholder="Ingrese su número de celular" required>
             </div>
            
            <div class="form-group">
             <label for="pwd">Password:</label>
             <input type="password" class="form-control" name="password1" placeholder="Ingrese un password" required>
             </div>
             
             <div class="form-group">
             <label for="pwd">Repita Password:</label>
             <input type="password" class="form-control" name="password2" placeholder="Repita el password" required>
             </div>
                        
            
            <button type="submit" class="btn btn-primary btn-block" name="registro_web">Registrarse</button>
             </form>';

}

/*
** formulario para el registro de usuario via web
*/

function formResetPassWeb(){

    echo '<form action="#" method="POST">
            
            <h4 align="justify">Recordá que tu usuario es el email que ingresaste al momento de registrarte.</h4><hr>
            
            <div class="form-group">
             <label for="email">Email:</label>
             <input type="email" class="form-control" name="email" placeholder="Ingrese su email / usuario" required>
             </div><hr>
             
            <button type="submit" class="btn btn-primary btn-block" name="reset_pass">Blanquear Password</button>
             </form>';

}

/*
** funcion para verificar usuario si ya existe o no
*/
function userVerify($usuario,$conn){

    $sql = "select user from st_usuarios where user = '$usuario'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    
    if($rows == 0){
    
                echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Aún no se ha Registrado, por favor primero realice el registro.';
			    echo "</div>";
			    echo "</div>";
			    exit;
    
    }else{
      resetPass($conn,$usuario);
     }
    
}



/*
** persistencia en la base de datos para el registro de usuario via web
*/
function upUsuarioWeb($nombre,$dni,$email,$direccion,$localidad,$telefono,$movil,$password1,$password2,$conn){

    $espacio = 'cli';
    $role = 1;
    
    $sql = "select cliente_nombre, email from st_clientes where cliente_nombre = '$nombre' or email = '$email'";
    mysqli_select_db($conn,'storia');
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    
    if((is_numeric($dni)) && (is_numeric($telefono)) && (is_numeric($movil))){
          
    if($rows == 0){
            
        if(($password1 <= 15) && ($password2 <= 15)){
            
            if(strcmp($password2,$password1) == 0){
            
                            
           $consulta_1 = "INSERT INTO st_clientes".
            "(cliente_nombre,dni,email,direccion,localidad,telefono,movil,espacio)".
            "VALUES ".
        "('$nombre','$dni','$email','$direccion','$localidad','$telefono','$movil','$espacio')";
        mysqli_select_db($conn,'storia');
        $resp_1 = mysqli_query($conn,$consulta_1);
        
        $consulta_2 = "INSERT INTO st_usuarios".
            "(nombre,user,password,espacio,role)".
            "VALUES ".
        "('$nombre','$email','$password1','$espacio','$role')";
        mysqli_select_db($conn,'storia');
        $resp_2 = mysqli_query($conn,$consulta_2);
        
        
            
            if(($resp_1) && ($resp_2)){
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Cliente y Usuario Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Cliente. Contáctese con el Administrador'  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }
		    }else{
                
                echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Las Contraseñas no Coinciden.';
			    echo "</div>";
			    echo "</div>";
			               
		    }
		    }else{
                
                echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Las Contraseñas exceden la cantidad de caracteres permitidos. Como máximo son 15 caracteres.';
			    echo "</div>";
			    echo "</div>";
			                 
		    }
		    }else{
		    
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Ya existe registro como Cliente. Lo redireccionaremos a la página de ingreso. Recuerde que el usuario es su email '.$email.' . Si no recuerda su contraseña puede blanquerla en: <a href="password.php"> Blanquear Contraseña</a>.';
			    echo "</div>";
			    echo "</div>";
			    echo '<meta http-equiv="refresh" content="20;URL=../../clientes/index.php "/>';
		    
		    }
		    }else{
		    
                echo "<br>";
                echo '<div class="container">';
                echo '<div class="alert alert-warning" alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> En algunos de los campos DNI, Teléfono o Móvil a ingresado caracteres no válidos, estos campos sólo soportan valores numéricos, por Favor Revíselo.';
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
  
  $fileName = "gen_pass/$usuario.pass.txt"; 
    
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



?>
