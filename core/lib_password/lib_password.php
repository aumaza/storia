<?php

/*
** Funcion para generar password aleatorio
*/

function generarPassword(){
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

function generarUsuario($conn,$cliente,$email,$espacio){

  $password = generarPassword();
  $role = 1;
  
  $sql = "INSERT INTO st_usuarios".
            "(nombre,user,password,espacio,role)".
            "VALUES ".
        "('$cliente','$email','$password','$espacio','$role')";
  mysqli_select_db($conn,'storia');
  $retval = mysqli_query($conn,$sql);
  
  generarArchivoTxt($cliente,$email,$password);
  
  return $retval;
 
   
}


/*
** Funcion para generar nuevo archivo de password
*/


function generarArchivoTxt($cliente,$email,$password){
  
  $fileName = "../registro/gen_pass/$cliente.pass.txt"; 
    
  if (file_exists($fileName)){
    
    $file = fopen($fileName, 'w+') or die();
    fwrite($file, $password) or die();
    fclose($file);
    
	 
  }else{
  
      $file = fopen($fileName, 'w') or die();
      fwrite($file, $password) or die();
      fclose($file);
     
	
  }
    
}



/*
** funcion que agrega un Cliente
*/
function altaClienteRapida($cliente,$dni,$email,$direccion,$localidad,$telefono,$movil,$espacio,$conn){
            
           $consulta = "INSERT INTO st_clientes".
            "(cliente_nombre,dni,email,direccion,localidad,telefono,movil,espacio)".
            "VALUES ".
        "('$cliente','$dni','$email','$direccion','$localidad','$telefono','$movil','$espacio')";
        mysqli_select_db($conn,'storia');
        
        $resp_1 = mysqli_query($conn,$consulta);
        $resp_2 = generarUsuario($conn,$cliente,$email,$espacio);
        
        $resp_3 = $resp_1 + $resp_2;
        
        if($resp_3 == 2){
        
            echo $resp = 1;
                    
        }
        else if($resp_3 < 2){
        
            echo $resp = 0;
        }


}



?>
