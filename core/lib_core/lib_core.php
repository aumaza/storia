<?php

/*
** Funcion que carga esqueleto del sistema
//<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
//<script src="/storia/skeleton/js/jquery-3.4.1.min.js"></script>
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/storia/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/storia/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/storia/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/storia/skeleton/css/animate.min.css" >
	<link rel="stylesheet" href="/storia/skeleton/css/jquery.dataTables.min.css" >
	<link rel="stylesheet" href="/storia/skeleton/Chart.js/Chart.min.css" >
	<link rel="stylesheet" href="/storia/skeleton/Chart.js/Chart.css" >
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

    <script src="/storia/skeleton/js/jquery-3.4.1.min.js"></script>
    <script src="/storia/skeleton/js/js.cookie.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/storia/skeleton/js/bootstrap.min.js"></script>
	<script src="/storia/core/lib_core/lib_scripts.js"></script>
	
	<script src="/storia/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/storia/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/storia/skeleton/js/dataTables.select.min.js"></script>
	<script src="/storia/skeleton/js/dataTables.buttons.min.js"></script>
	
	<script src="/storia/skeleton/Chart.js/Chart.min.js"></script>
	<script src="/storia/skeleton/Chart.js/Chart.bundle.min.js"></script>
	<script src="/storia/skeleton/Chart.js/Chart.bundle.js"></script>
	<script src="/storia/skeleton/Chart.js/Chart.js"></script>';
}


/*
** funcion que recibe y periste los mensajes enviados por personas
*/
function mensajes($nombre,$email,$mensaje,$conn){

    $fecha = date("Y-m-d");
    $estado = 'No Leido';
    
    $sql = "INSERT INTO st_mensajes".
            "(nombre,email,mensaje,fecha,estado)".
            "VALUES ".
        "('$nombre','$email','$mensaje','$fecha','$estado')";
        mysqli_select_db($conn,'storia');
        $resp = mysqli_query($conn,$sql);
        
     if($resp){   
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> '.$nombre.' hemos recibido tu mensaje correctamente. Nos estaremos poniendo en contacto con vos. Que tengas un buen d??a!!';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al intentar enviar el mensaje. '  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
    }

}


function modal_1(){

    echo '  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ingreso Administraci??n</h4><hr>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
           <form action="#" method="POST">
            <div class="form-group">
                <label for="email">Usuario:</label>
                <input type="text" class="form-control" placeholder="Ingrese su usuario" name="user" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Ingrese su password" name="pass" required>
            </div><hr>
            
            <a href="core/registro/password.php"><button type="button" class="btn btn-warning btn-block">Olvid?? mi Password</button></a><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="A">Aceptar</button>
            </form> 
          
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>';

}

function modal_2(){

    echo '  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ingreso Clientes</h4><hr>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
           <form action="#" method="POST">
            <div class="form-group">
                <label for="email">Usuario:</label>
                <input type="text" class="form-control" placeholder="Ingrese su usuario" name="user" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Ingrese su password" name="pass" required>
            </div>
            
            <a href="../core/registro/password.php"><button type="button" class="btn btn-warning btn-block">Olvid?? mi Password</button></a><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="A">Aceptar</button>
            </form> 
          
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>';

}


function modal_exit(){

    echo '<!-- Modal -->
        <div id="exit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Desea Salir del Sistema?</h4>
            </div>
            <div class="modal-body" align="center">
                
                <a href="../../logout.php" data-toggle="tooltip" data-placement="left" title="Cerrar Sesi??n"> 
                    <button class="btn btn-success navbar-btn">
                        <img class="img-reponsive img-rounded" src="../../icons/actions/mail-mark-notjunk.png" /> Aceptar</button></a>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            </div>

        </div>
        </div>';

}


/*
** cargador de formulario para login
*/
function formLogin(){

   echo '<p class="lead">Ingreso para Clientes</p>
        <p>Por favor tipee sus datos</p><hr>
            <form action="index.php" method="POST">
            <div class="form-group">
            <label for="usr">Usuario:</label>
            <input style="text-align: center" type="text" class="form-control" id="usr" name="user" placeholder="Ingrese su email">
            </div>
            <div class="form-group">
            <label for="pwd">Password:</label>
            <input  style="text-align: center" type="password" class="form-control" id="pwd" name="pass">
            </div>
            <button type="submit" class="btn btn-success" name="A">Ingresar</button>
            <button type="reset" class="btn btn-danger ">Limpiar</button>
            </form>
            <hr>';

}

/*
<p>Uitlice el bot??n aqu?? debajo, para abonar el servicio por Mercado Pago. Muchas Gracias!</p>
          <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="216891779-38bdb0fe-00d9-4e46-908b-a60bca6fee8d" data-source="button"></script><hr>
*/

/*
** funcion para cambiar los permisos de un directorio
*/

function chmod_R($path, $filemode, $dirmode) {
    if (is_dir($path) ) {
        if (!chmod($path, $dirmode)) {
            $dirmode_str=decoct($dirmode);
            print "Error aplicando cambio de permisos ".$dirmode_str." en directorio ".$path."<br />";
        } else {
			print "Cambiando permisos del directorio ".$path."<br />";
		}
        $dh = opendir($path);
        while (($file = readdir($dh)) !== false) {
            if($file != '.' && $file != '..') {  // skip self and parent pointing directories
                $fullpath = $path.'/'.$file;
                chmod_R($fullpath, $filemode,$dirmode);
            }
        }
        closedir($dh);
    } else {
        if (is_link($path)) {
            print "link ".$path." is skipped\n";
            return;
        }
        if (!chmod($path, $filemode)) {
            $filemode_str=decoct($filemode);
            print "Error aplicando permisos ".$filemode_str." en fichero ".$path."<br />";
        } else {
			print "Cambiando permisos del fichero ".$path."<br />";
		}
    }
}



function modalNewCliente(){

    echo '<!-- Modal -->
            <div id="newCliente" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Alta de Cliente</h4>
                </div>
                <div class="modal-body">';
                    formAltaRapidaCliente();
                echo '</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
                </div>

            </div>
            </div>';

}


/*
** modal que pregunta sobre entrega de helado en local
*/
function modalEntregaHelado(){


    echo '<!-- Modal -->
		<div class="modal fade" id="confirm-entrega" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Entrega de Producto</h4>
					</div>

					<div class="modal-body">
                        
                        ??Desea marcar como producto entregado?
                        
                         <form action="#" method="POST" class="modalForm">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" value="id">
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Aceptar</button>
                        </div>
                        </form> 
					
						
					</div>
					
				</div>
			</div>
		</div>';


}



?>
