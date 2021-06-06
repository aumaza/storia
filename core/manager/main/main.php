<?php session_start();
      include "../../connection/connection.php";
      include "../../lib_core/lib_core.php";
      include "../../lib_usuarios/lib_usuarios.php";
      include "../../lib_clientes/lib_clientes.php";
      include "../../lib_productos/lib_productos.php";
      include "../../lib_sabores/lib_sabores.php";
      include "../../lib_heladeria/lib_heladeria.php";
      include "../../lib_cafeteria/lib_cafeteria.php";
      include "../../lib_consultas/lib_consultas.php";
      include "../../lib_delivery/lib_delivery.php";
              
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
            <link href="../../../assets/img/storia-favicon.png" rel="icon">';
            skeleton();
            echo '</head><body>';
            echo '<br><div class="container">
                    <div class="alert alert-danger" role="alert">';
            echo '<p align="center"><img src="../../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> '.$usuario.' Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
            echo '<a href="../../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><img src="../../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
            echo "</div></div>";
            die();
            echo '</body></html>';
	}

	
	$sql_mensajes = "select count(id) as cantidad from st_mensajes where estado = 'No Leido'";
	mysqli_select_db($conn,'storia');
	$res_mensajes = mysqli_query($conn,$sql_mensajes);
	while($row_mensajes = mysqli_fetch_array($res_mensajes)){
        $cantidad_mensajes = $row_mensajes['cantidad'];
	}
	
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Storia - Panel de Control - Espacio Administrador</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../../assets/img/storia-favicon.png" rel="icon">
  <?php skeleton(); ?>
  

  <!-- Insertar ventas de heladeria en local -->
<script type="text/javascript">
$(document).ready(function(){
    $('#add_venta_heladeria_local').click(function(){
        var datos=$('#fr_heladeria_local_ajax').serialize();
        $.ajax({
            type:"POST",
            url:"insert_pedido_heladeria_local.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Producto Agregado Exitosamente!!");
                    $('#producto').val('');
                    $('#sabor_1').val('Ninguno');
                    $('#sabor_2').val('Ninguno');
                    $('#sabor_3').val('Ninguno');
                    $('#sabor_4').val('Ninguno');
                    $('#empleado').val('');
                    $('#lugar_venta').val('');
                    $('#modo_pago').val('');
                    $('#cliente').val('');
                    $('#producto').focus();
                }else{
                    alert("Hubo un problema al intentar Guardar el Producto");
                }
            }
        });

        return false;
    });
});
</script>
 
 
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
    th {
    text-align:center
    }
  </style>
</head>
<body onload="nobackbutton();">

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav"><hr>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#exit" data-toggle="tooltip" data-placement="right" title="Desconectarse del Sistema">
        <img class="img-reponsive img-rounded" src="../../icons/actions/system-shutdown.png" /> Salir</button><br>
        <form action="#" method="POST">
            <button type="submit" class="btn btn-default btn-block" name="home" data-toggle="tooltip" data-placement="right" title="Limpiar Espacio de Trabajo">
            <img class="img-reponsive img-rounded" src="../../icons/actions/go-home.png" /> Home</button>
        </form>
        <hr>

<!--   Colapse Group       -->
        
       <div class="panel-group" id="accordion">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" data-toggle="tooltip" data-placement="right" title="Espacio Administración de Heladería">
            <img class="img-reponsive img-rounded" src="../../../assets/img/ice_crem-32x32.png" /> Módulo Heladería</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
      <form action="#" method="POST">
      
      <li class="list-group-item">
	  <button type="submit" class="btn btn-default btn-xs btn-block" name="add_venta" data-toggle="tooltip" data-placement="right" title="Nueva Venta en Local">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/list-add.png" /> Nueva Venta</button></li>
	 
	 <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="ventas_heladeria" data-toggle="tooltip" data-placement="right" title="Ventas Heladería en Local">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-bank-account.png" /> Ventas Local</button></li>
    
    <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="ventas_heladeria_web" data-toggle="tooltip" data-placement="right" title="Ventas Heladería vía Web">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-bank-account.png" /> Ventas Web</button></li>
    
      </form>
      </ul>
      
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" data-toggle="tooltip" data-placement="right" title="Espacio Administración de Cafetería">
        <img class="img-reponsive img-rounded" src="../../../assets/img/coffee-32x32.png" /> Módulo Cafetería</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
      <form action="#" method="POST">
      
      <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="ventas_cafeteria" data-toggle="tooltip" data-placement="right" title="Listado de mesas cerradas">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-bank-account.png" /> Total Mesas</button></li>
	    
	    <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="mesas_cafeteria" data-toggle="tooltip" data-placement="right" title="Apertura y Cierre de Mesas">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/story-editor.png" /> Mesas</button></li>
	    
	    <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="ventas_cafeteria_web" data-toggle="tooltip" data-placement="right" title="Ventas de Cafetería vía Web">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-bank-account.png" /> Ventas Web</button></li>
	    
	    <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="ventas_cafeteria_local" data-toggle="tooltip" data-placement="right" title="Ventas de Cafetería en Local">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-bank-account.png" /> Ventas Local</button></li>
	   
	       
      </form>
      </ul>
      
      </div>
    </div>
  </div>
  
  <?php
  
  if($_SESSION['user'] == 'root'){
  
  echo '<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" data-toggle="tooltip" data-placement="right" title="Espacio sólo Permitido para el Administrador">
        <img class="img-reponsive img-rounded" src="../../icons/categories/preferences-desktop.png" /> Administración General</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
      <form action="#" method="POST">
      
      <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="cambiar_password" data-toggle="tooltip" data-placement="right" title="Cambiar mi Contraseña">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-refresh.png" /> Cambiar Password</button></li>
      
      <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="usuarios" data-toggle="tooltip" data-placement="right" title="Listado de Usuarios">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> Usuarios</button></li>
	   
	   <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="clientes" data-toggle="tooltip" data-placement="right" title="Altas de Clientes / Empleados / Repartidores">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/user-group-new.png" /> Altas</button></li>
	    
	    <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="productos" data-toggle="tooltip" data-placement="right" title="Listado de Productos">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/feed-subscribe.png" /> Productos</button></li>
	    
	    <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="sabores" data-toggle="tooltip" data-placement="right" title="Listado de Sabores">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/fill-color.png" /> Sabores</button></li>';
	    
	    if($cantidad_mensajes == 0){
	    
        echo '<li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="mensajes" data-toggle="tooltip" data-placement="right" title="No hay mensajes nuevos">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/mail-mark-unread.png" /> Mensajes</button></li>';
	    
	    }else if($cantidad_mensajes > 0){
	    
            echo '<li class="list-group-item">
            <button type="submit" class="btn btn-default btn-xs btn-block" name="mensajes" data-toggle="tooltip" data-placement="right" title="Tiene '.$cantidad_mensajes.' mensajes nuevos">
                <img class="img-reponsive img-rounded" src="../../icons/actions/mail-mark-unread-new.png" /> Mensajes</button></li>';
	    
	    }
	
    echo '</form>
       <li class="list-group-item">
      <a href="explorer/index.php" data-toggle="tooltip" data-placement="right" title="Ir al Exlorardor de Archivos" target="_blank"><button type="button" class="btn btn-default btn-xs btn-block"><img class="img-reponsive img-rounded" src="../../icons/places/user-home.png" /> Explorer</button></a></li>
      
      </ul>
      
      </div>
    </div>
    </div>
    
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" data-toggle="tooltip" data-placement="right" title="Espacio Análisis de Datos y Estadísticas">
        <img class="img-reponsive img-rounded" src="../../icons/actions/view-statistics.png" /> Módulo Estadísticas</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
      <form action="#" method="POST">
      
      <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="estadisticas" data-toggle="tooltip" data-placement="right" title="Estadísticas Generales">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/office-chart-pie.png" /> Estadísticas</button></li>
	    
     <li class="list-group-item">
	<button type="submit" class="btn btn-default btn-xs btn-block" name="ventas" data-toggle="tooltip" data-placement="right" title="Total Ventas en el Día y Acumuladas">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-investment.png" /> Estadísticas Ventas</button></li>
      
      </form>
      </ul>
      </div>
    </div>
  </div>
 </div>
 
  </div>';
  }
  
  ?>
  


<!-- End Colapse Group -->

    <div class="col-sm-10"><hr>
      <div class="alert alert-info">
        <img class="img-reponsive img-rounded" src="../../icons/actions/dashboard-show.png" /> <strong>Espacio de Trabajo</strong> - <strong> Bienvenido <?php echo $nombre ?></strong>
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
        if(isset($_POST['mensajes'])){
            mensajesClientes($conn);
        }
        if(isset($_POST['mensaje_leido'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            lecturaMensaje($id,$conn);
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
            $dni = mysqli_real_escape_string($conn,$_POST['dni']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
            $localidad = mysqli_real_escape_string($conn,$_POST['localidad']);
            $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
            $movil = mysqli_real_escape_string($conn,$_POST['movil']);
            $espacio = mysqli_real_escape_string($conn,$_POST['espacio']);
            addCliente($cliente,$dni,$email,$direccion,$localidad,$telefono,$movil,$espacio,$conn);
        }
        //clientes - formulario de edición         
        if(isset($_POST['edit_cliente'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            formEditCliente($id,$nombre,$conn);
        }
        //clientes - persistencia de actualización
        if(isset($_POST['update_cliente'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
            $dni = mysqli_real_escape_string($conn,$_POST['dni']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
            $localidad = mysqli_real_escape_string($conn,$_POST['localidad']);
            $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
            $movil = mysqli_real_escape_string($conn,$_POST['movil']);
            $espacio = mysqli_real_escape_string($conn,$_POST['espacio']);
            updateCliente($id,$cliente,$dni,$email,$direccion,$localidad,$telefono,$movil,$espacio,$conn);
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
        //HELADERIA
        //listar ventas
        if(isset($_POST['ventas_heladeria'])){
            ventasHeladeriaLocal($conn);
        }
        if(isset($_POST['ventas_heladeria_web'])){
            ventasHeladeriaWeb($conn);
        }
        //formulario de nueva ventas
        if(isset($_POST['add_venta'])){
            formAddVenta($conn);
        }
        //persistencia nueva ventas
        if(isset($_POST['addVenta'])){
            $producto = mysqli_real_escape_string($conn,$_POST['producto']);
            $sabor_1 = mysqli_real_escape_string($conn,$_POST['sabor_1']);
            $sabor_2 = mysqli_real_escape_string($conn,$_POST['sabor_2']);
            $sabor_3 = mysqli_real_escape_string($conn,$_POST['sabor_3']);
            $sabor_4 = mysqli_real_escape_string($conn,$_POST['sabor_4']);
            $empleado = mysqli_real_escape_string($conn,$_POST['empleado']);
            $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
            $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
            $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
            addVentaHeladeria($producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$empleado,$lugar_venta,$modo_pago,$cliente,$conn);
        }
        //formulario de edicion de venta
        if(isset($_POST['edit_venta'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            formEditVenta($id,$conn);
        }
        //persistencia de actualizacion de un registro de ventas 
        if(isset($_POST['editVenta'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $producto = mysqli_real_escape_string($conn,$_POST['producto']);
            $sabor_1 = mysqli_real_escape_string($conn,$_POST['sabor_1']);
            $sabor_2 = mysqli_real_escape_string($conn,$_POST['sabor_2']);
            $sabor_3 = mysqli_real_escape_string($conn,$_POST['sabor_3']);
            $sabor_4 = mysqli_real_escape_string($conn,$_POST['sabor_4']);
            $empleado = mysqli_real_escape_string($conn,$_POST['empleado']);
            $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
            $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
            $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
            updateVentaHeladeria($id,$producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$empleado,$lugar_venta,$modo_pago,$cliente,$conn);
        }
        //eliminar registro de venta
        if(isset($_POST['del_venta'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            formEliminarVenta($id,$conn);
        }
        //persistencia - eliminar registro de ventas
        if(isset($_POST['delete_venta'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            deleteVenta($id,$conn);
        }
        if(isset($_POST['asignar_repartidor'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            formAsignarRepartidor($id,$conn);
        }
        if(isset($_POST['asignar_rep'])){
            $id_venta = mysqli_real_escape_string($conn,$_POST['id']);
            $producto = mysqli_real_escape_string($conn,$_POST['producto']);
            $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
            $direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
            $movil = mysqli_real_escape_string($conn,$_POST['movil']);
            $tipo_pago = mysqli_real_escape_string($conn,$_POST['tipo_pago']);
            $importe = mysqli_real_escape_string($conn,$_POST['importe']);
            $fecha = mysqli_real_escape_string($conn,$_POST['fecha']);
            $hora = mysqli_real_escape_string($conn,$_POST['hora']);
            $repartidor = mysqli_real_escape_string($conn,$_POST['repartidor']);
            addPedidoRepartidor($id_venta,$producto,$cliente,$direccion,$movil,$tipo_pago,$importe,$fecha,$hora,$repartidor,$conn);
        }
        if(isset($_POST['estado_entrega'])){
            $id = mysqli_real_escape_string($conn,$_POST['id']);
            updateEntregaHelado($id,$conn);
        }
        
        
        // =============================================================================================
        //CAFETERIA
        //listar ventas
        if(isset($_POST['ventas_cafeteria'])){
            ventasCafeteria($conn);
        }
        // listar ventas cafeteria
        if(isset($_POST['ventas_cafeteria_web'])){
            ventasCafeteriaWeb($conn);
        }
        if(isset($_POST['ventas_cafeteria_local'])){
            ventasCafeteriaLocal($conn);
        }
        if(isset($_POST['new_venta_cafeteria'])){
            formAddVentaCafeteriaLocal($conn);
        }
        if(isset($_POST['addVentaCafeteria'])){
            $producto = mysqli_real_escape_string($conn,$_POST['producto']);
            $empleado = mysqli_real_escape_string($conn,$_POST['empleado']);
            $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
            $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
            $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
            formFinalVentaCafeteriaLocal($producto,$empleado,$lugar_venta,$modo_pago,$cliente,$conn);
        }
        //vista de todas las mesas
        if(isset($_POST['mesas_cafeteria'])){
            mesas($conn);
        }
        //formulario de apertura de mesa
        if(isset($_POST['open_mesa'])){
            $mesa = mysqli_real_escape_string($conn,$_POST['mesa_number']);
            openTable($mesa,$nombre,$conn);
        }
        //persistencia apertura de mesa
        if(isset($_POST['abrir_mesa'])){
            $mesa = mysqli_real_escape_string($conn,$_POST['mesa_number']);
            $fecha = mysqli_real_escape_string($conn,$_POST['fecha']);
            $hora = mysqli_real_escape_string($conn,$_POST['hora']);
            $empleado = mysqli_real_escape_string($conn,$_POST['empleado']);
            aperturaMesa($mesa,$fecha,$hora,$empleado,$conn);
        }
        //formulario para agregar items a la mesa
        if(isset($_POST['add_producto_mesa'])){
            $mesa = mysqli_real_escape_string($conn,$_POST['mesa_number']);
            formAddItems($mesa,$conn);
        }
        //detalle de pedidos en mesa
        if(isset($_POST['details_mesa'])){
            $mesa = mysqli_real_escape_string($conn,$_POST['mesa_number']);
            detallesMesa($mesa,$conn);
        }
        //formulario de cierre de mesa
        if(isset($_POST['cerrar_mesa'])){
            $mesa = mysqli_real_escape_string($conn,$_POST['mesa_numero']);
            $id_mesa = mysqli_real_escape_string($conn,$_POST['id_mesa']);
            formCloseMesa($id_mesa,$mesa,$conn);
        }
        //persistencia cierre de mesa
        if(isset($_POST['close_mesa'])){
            $id_mesa = mysqli_real_escape_string($conn,$_POST['id_mesa']);
            $total = mysqli_real_escape_string($conn,$_POST['total']);
            closeMesa($id_mesa,$total,$conn);
        }
        //impresion de ticket al cerrar la mesa
        if(isset($_POST['print_ticket'])){
            $id_mesa = mysqli_real_escape_string($conn,$_POST['id']);
            ticket($id_mesa,$conn);
        }
        if(isset($_POST['filtro_cafeteria'])){
            filtrosCafeteria();
        }
        if(isset($_POST['calculo_cafeteria'])){
            $mesa_numero = mysqli_real_escape_string($conn,$_POST['mesa_numero']);
            $fecha_desde = mysqli_real_escape_string($conn,$_POST['fecha_desde']);
            $fecha_hasta = mysqli_real_escape_string($conn,$_POST['fecha_hasta']);
            totalCafeteria($mesa_numero,$fecha_desde,$fecha_hasta,$conn);
        }
        
        
        // =============================================================================================
        // Estadisticas  
        
        // estadisticas generales
        if(isset($_POST['estadisticas'])){
            analytics($conn);
        }
        if(isset($_POST['ventas'])){
            ventas($conn);
        }
        
    
    
    
    
    
    
    
    }else{
    
        echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo '<img class="img-reponsive img-rounded" src="../../icons/status/task-attempt.png" /> 
                Hubo un problema al Intentar Conectarse a la Base de Datos.  '  .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
    
    }
    
    
    ?>


<!-- Fin Espacio de Trabajo -->
    
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p><img class="img-reponsive img-rounded" src="../../../assets/img/storia-favicon.png" /> Storia - Heladería / Café</p>
</footer>

<?php modal_exit(); ?>
<?php modalNewCliente(); ?>
<?php modalPreciosHeladeria(); ?>
<?php modalPreciosCafeteria(); ?>

       

</body>
</html>

<!-- Insertar items en mesas -->
<script type="text/javascript">
$(document).ready(function(){
    $('#insertar_item').click(function(){
        var datos=$('#frmajax').serialize();
        $.ajax({
            type:"POST",
            url:"../../lib_cafeteria/insert_items.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Item Agregado Exitosamente!!");
                    }else{
                    alert("Hubo un problema al intentar Guardar el Item");
                }
            }
        });

        return false;
    });
});
</script>


<!-- insertar ventas de cafe -->
<script type="text/javascript">
$(document).ready(function(){
    $('#add_venta_cafeteria').click(function(){
        var datos=$('#frcafeajax').serialize();
        $.ajax({
            type:"POST",
            url:"../../lib_cafeteria/insert_productos.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Producto Agregado Exitosamente!!");
                    location.href = "main.php";
                    }else{
                    alert("Hubo un problema al intentar Guardar el Producto");
                }
            }
        });

        return false;
    });
});
</script>


<!-- Insertar ventas de cafeteria en local -->
<script type="text/javascript">
$(document).ready(function(){
    $('#add_venta_cafeteria_local').click(function(){
        var datos=$('#fr_cafeteria_local_ajax').serialize();
        $.ajax({
            type:"POST",
            url:"../../lib_cafeteria/insert_pedido_cafeteria_local.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Producto Agregado Exitosamente!!");
                    $('#producto').val('');
                    $('#cantidad').val('1');
                    $('#empleado').val('');
                    $('#lugar_venta').val('');
                    $('#modo_pago').val('');
                    $('#cliente').val('');
                    $('#producto').focus();
                }else{
                    alert("Hubo un problema al intentar Guardar el Producto");
                }
            }
        });

        return false;
    });
});
</script>

<!-- Alta de Cliente Rápida -->
<script type="text/javascript">
$(document).ready(function(){
    $('#alta_rapida_cliente').click(function(){
        var datos=$('#alta_rapida_cliente_ajax').serialize();
        $.ajax({
            type:"POST",
            url:"../../lib_clientes/insertar_cliente_nuevo.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Alta de Cliente Exitosa!!. Presione F5 para recargar el Fomulario de venta");
                    $('#newCliente').modal('hide');
                    window.location.reload(true);
                }else{
                    alert("Hubo un problema al intentar dar de alta al Cliente");
                }
            }
        });

        return false;
    });
});
</script>



<!-- Consultas de Precios -->
<!-- precios heladeria modal -->
  <script>
$('.openHelado').on('click',function(){
        $('.modal-body').load("precios_heladeria.php",function(){
        $('#precios_heladeria').modal({show:true});
        
    });
});
</script>

<!-- precios cafeteria modal -->
  <script>
$('.openCafe').on('click',function(){
        $('.modal-body').load("precios_cafeteria.php",function(){
        $('#precios_cafeteria').modal({show:true});
        
    });
});
</script>


