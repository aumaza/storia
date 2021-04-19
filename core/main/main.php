<?php session_start();
      include "../connection/connection.php";
      include "../lib_core/lib_core.php";
      include "../lib_usuarios/lib_usuarios.php";
      include "../lib_clientes/lib_clientes.php";
      include "../lib_productos/lib_productos.php";
      include "../lib_sabores/lib_sabores.php";
        
        $usuario = $_SESSION['user'];
        $password = $_SESSION['pass'];
      
         
	$sql = "select nombre from st_usuarios where user = '$usuario' and password = '$password'";
	mysqli_select_db($conn,'storia');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
	if($usuario == null || $usuario = ''){
 
    echo '<!DOCTYPE html>
            <html lang="es">
            <head>
            <title>Storia</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="../../assets/img/storia-favicon.png" rel="icon">';
            skeleton();
            echo '</head><body>';
            echo '<br><div class="container">
                    <div class="alert alert-danger" role="alert">';
            echo '<p align="center"><img src="../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> '.$usuario.' Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
            echo '<a href="../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><img src="../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
            echo "</div></div>";
            die();
            echo '</body></html>';
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Storia - Panel de Control</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../assets/img/storia-favicon.png" rel="icon">
  <?php skeleton(); ?>
 
 
 <!-- Data Table Script -->
<script>
 $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
  </script>
  <!-- END Data Table Script -->
 
 <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav"><hr>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#exit">
        <img class="img-reponsive img-rounded" src="../icons/actions/system-shutdown.png" /> Salir</button><br>
        <form action="#" method="POST">
            <button type="submit" class="btn btn-default btn-sm" name="home">
            <img class="img-reponsive img-rounded" src="../icons/actions/go-home.png" /> Home</button>
        </form>
        <hr>

<!--   Colapse Group       -->
        
       <div class="panel-group" id="accordion">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            <img class="img-reponsive img-rounded" src="../../assets/img/ice_crem-32x32.png" /> Módulo Heladería</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
      <form action="#" method="POST">
      
      <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Ventas Heladería">
	  <button type="submit" class="btn btn-default btn-sm" name="ventas_heladeria">
	    <img class="img-reponsive img-rounded" src="../icons/actions/view-bank-account.png" /> Ventas Local</button></a></li>
	    
	    <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Ventas Heladería - Pedidos">
	  <button type="submit" class="btn btn-default btn-sm" name="pedidos_heladeria">
	    <img class="img-reponsive img-rounded" src="../icons/actions/view-pim-notes.png" /> Pedidos - Heladería</button></a></li>
                  
      </form>
      </ul>
      
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        <img class="img-reponsive img-rounded" src="../../assets/img/coffee-32x32.png" /> Módulo Cafetería</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
  
  <?php
  
  if($_SESSION['user'] == 'root'){
  
  echo '<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        <img class="img-reponsive img-rounded" src="../icons/categories/preferences-desktop.png" /> Administración General</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
      <form action="#" method="POST">
      
      <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Cambiar mi Contraseña">
	  <button type="submit" class="btn btn-default btn-sm" name="cambiar_password">
	    <img class="img-reponsive img-rounded" src="../icons/actions/view-refresh.png" /> Cambiar Password</button></a></li>
      
      <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Listado de Usuarios">
	  <button type="submit" class="btn btn-default btn-sm" name="usuarios">
	    <img class="img-reponsive img-rounded" src="../icons/actions/meeting-attending.png" /> Usuarios</button></a></li>
	   
	   <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Altas de Clientes / Empleados / Repartidores">
	  <button type="submit" class="btn btn-default btn-sm" name="clientes">
	    <img class="img-reponsive img-rounded" src="../icons/actions/user-group-new.png" /> Altas</button></a></li>
	    
	    <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Listado de Productos">
	  <button type="submit" class="btn btn-default btn-sm" name="productos">
	    <img class="img-reponsive img-rounded" src="../icons/actions/feed-subscribe.png" /> Productos</button></a></li>
	    
	    <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Listado de Sabores">
	  <button type="submit" class="btn btn-default btn-sm" name="sabores">
	    <img class="img-reponsive img-rounded" src="../icons/actions/fill-color.png" /> Sabores</button></a></li>
	   
      <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Back up Base de Datos">
	  <button type="submit" class="btn btn-default btn-sm" name="back_up">
	    <img class="img-reponsive img-rounded" src="../icons/actions/svn-update.png" /> BackUp Base</button></a></li>
      
      </form>
      </ul>
      
      </div>
    </div>
    </div>
    
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        <img class="img-reponsive img-rounded" src="../icons/actions/view-statistics.png" /> Estadísticas</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
 </div>
 
  </div>';
  }
  
  ?>
  


<!-- End Colapse Group -->

    <div class="col-sm-9"><hr>
      <div class="alert alert-info">
        <img class="img-reponsive img-rounded" src="../icons/actions/dashboard-show.png" /> <strong>Espacio de Trabajo</strong> - <strong> Bienvenido <?php echo $nombre ?></strong>
      </div>
      <hr>
      
<!-- Inicio Espacio de Trabajo -->
    
    <?php
    
    if($conn){
        
        if(isset($_POST['home'])){
            echo '<a href="#"></a>';
        }
    
        //ESPACIO ADMINISTRACIÓN GENERAL
        
        //USUARIOS
        // usuarios - cambio de password
        if(isset($_POST['cambiar_password'])){
            loadUserPass($conn,$nombre);
        }
        if(isset($_POST['user_pass'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            formEditPassword($id,$conn);
        }
        if(isset($_POST['update_password'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $pass1 = mysqli_real_escape_string($conn,$_POST['pass1']);
            $pass2 = mysqli_real_escape_string($conn,$_POST['pass2']);
            passwordValidate($conn,$id,$pass1,$pass2);
        }
        // usuarios - lista usuarios
        if(isset($_POST['usuarios'])){
            usuarios($conn);
        }
        //usuarios - cambio de permisos
        if(isset($_POST['allow_user'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            formEditRole($id,$conn);
        }
        //usuarios - persistencia de cambio de permisos
        if(isset($_POST['role'])){
           $id = mysqli_real_escape_string($conn,$_POST['id']);
           $role = mysqli_real_escape_string($conn,$_POST['role']);
           cambiarPermisos($id,$role,$conn);
        }
        
        // =============================================================================================
        
        //CLIENTES
        //clientes - listado
        if(isset($_POST['clientes'])){
            clientes($conn);
        }
        //clientes - formulario de alta         
        if(isset($_POST['add_cliente'])){
            formAddCliente();
        }
        //clientes - persistencia         
        if(isset($_POST['addCliente'])){
            $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
            $localidad = mysqli_real_escape_string($conn,$_POST['localidad']);
            $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
            $movil = mysqli_real_escape_string($conn,$_POST['movil']);
            $espacio = mysqli_real_escape_string($conn,$_POST['espacio']);
            addCliente($cliente,$email,$direccion,$localidad,$telefono,$movil,$espacio,$conn);
        }
        //clientes - formulario de edición         
        if(isset($_POST['edit_cliente'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            formEditCliente($id,$conn);
        }
        //clientes - persistencia de actualización
        if(isset($_POST['update_cliente'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
            $localidad = mysqli_real_escape_string($conn,$_POST['localidad']);
            $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
            $movil = mysqli_real_escape_string($conn,$_POST['movil']);
            $espacio = mysqli_real_escape_string($conn,$_POST['espacio']);
            updateCliente($id,$cliente,$email,$direccion,$localidad,$telefono,$movil,$espacio,$conn);
        }
        
        // =============================================================================================
        
        // PRODUCTOS
        // LISTAR PRODUCTOS
        if(isset($_POST['productos'])){
            productos($conn);
        }
        //formulario de alta de producto
        if(isset($_POST['add_producto'])){
            formAddProducto();
        }
        //persistencia de producto a base de datos
        if(isset($_POST['addProducto'])){
           $tipo = mysqli_real_escape_string($conn,$_POST['tipo']); 
           $cod_producto = mysqli_real_escape_string($conn,$_POST['cod_producto']);
           $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
           $precio = mysqli_real_escape_string($conn,$_POST['precio']);
           addProducto($tipo,$cod_producto,$descripcion,$precio,$conn);
        }
        //formulario de edición de producto
        if(isset($_POST['edit_producto'])){
           $id = mysqli_real_escape_string($conn,$_POST['id']);
           formEditProducto($id,$conn);
        }
        //persistencia de actualización del producto
        if(isset($_POST['editProducto'])){
           $id = mysqli_real_escape_string($conn,$_POST['id']);
           $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
           $precio = mysqli_real_escape_string($conn,$_POST['precio']);
           updateProducto($id,$descripcion,$precio,$conn);
        }
        //formulario de aviso eliminar un registro del sistema
        if(isset($_POST['del_producto'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            formEliminarProducto($id,$conn);
        }
        //persistencia de eliminacio de un registro producto de la base de datos
        if(isset($_POST['delete_producto'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            deleteProducto($id,$conn);
        }
        
        
        // =============================================================================================
        
        // SABORES
        //listar sabores
        if(isset($_POST['sabores'])){
            sabores($conn);
        }
        //formulario de alta de sabor
        if(isset($_POST['add_sabor'])){
            formAddSabor();
        }
        //persistencia de registro sabor
        if(isset($_POST['addSabor'])){
            $cod_sabor = mysqli_real_escape_string($conn,$_POST['cod_sabor']);
            $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
            addSabor($cod_sabor,$descripcion,$conn);
        }
        //formularo de edición de sabor
        if(isset($_POST['edit_sabor'])){
           $id = mysqli_real_escape_string($conn,$_POST['id']);
           formEditSabor($id,$conn);
        }
        //persistencia actualización edición sabor
        if(isset($_POST['editSabor'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
            updateSabor($id,$descripcion,$conn);
        }
        //formulario de aviso de eliminación de registro
        if(isset($_POST['del_sabor'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            formEliminarSabor($id,$conn);
        }
        //persistencia - eliminar registro de base de datos
        if(isset($_POST['delete_sabor'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            deleteSabor($id,$conn);
        }
        
        
        
        // =============================================================================================
        
        //back-Up base de datos
        if(isset($_POST['back_up'])){
            dumpMysql($conn);
        }
    
    
    
    
    
    
    
    
    
    
    
    }else{
    
        echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
                Hubo al Intentar Conectarse a la Base de Datos.  '  .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
    
    }
    
    
    ?>


<!-- Fin Espacio de Trabajo -->
    
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p><img class="img-reponsive img-rounded" src="../../assets/img/storia-favicon.png" /> Storia - Heladería / Café</p>
</footer>

<?php modal_exit(); ?>

</body>
</html>
