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
      include "../../lib_heladeria_web/lib_heladeria_web.php";
              
        $usuario = $_SESSION['user'];
        $password = $_SESSION['pass'];
      
         
	$sql = "select nombre, avatar from st_usuarios where user = '$usuario' and password = '$password'";
	mysqli_select_db($conn,'storia');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	      $avatar = $row['avatar'];
	      
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

	
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Storia - Espacio Cliente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../../assets/img/storia-favicon.png" rel="icon">
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
    .avatar {
  vertical-align: middle;
  horizontal-align: right;
  width: 40px;
  height: 40px;
  border-radius: 60%;
}
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav"><hr>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#exit" data-toggle="tooltip" data-placement="right" title="Desconectarse del Sistema">
        <img class="img-reponsive img-rounded" src="../../icons/actions/system-shutdown.png" /> Salir</button><br>
        <form action="#" method="POST">
            <button type="submit" class="btn btn-default btn-sm" name="home" data-toggle="tooltip" data-placement="right" title="Limpiar Espacio de Trabajo">
            <img class="img-reponsive img-rounded" src="../../icons/actions/go-home.png" /> Home</button>
        </form>
        <hr>

<!--   Colapse Group       -->
        
       <div class="panel-group" id="accordion">
<!--  Inicio modulo helederia  -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" data-toggle="tooltip" data-placement="right" title="Espacio de Heladería">
            <img class="img-reponsive img-rounded" src="../../../assets/img/ice_crem-32x32.png" /> Heladería</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
      <form action="#" method="POST">
      
      <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Realizar Pedido Heladería">
	  <button type="submit" class="btn btn-default btn-sm" name="pedidos_heladeria">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/im-aim.png" /> Realizar Pedido</button></a></li>
	    
	    <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Mis Pedidos de Helado">
	  <button type="submit" class="btn btn-default btn-sm" name="mis_pedidos_heladeria">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-pim-notes.png" /> Mis Pedidos</button></a></li>
                  
      </form>
      </ul>
      
      </div>
    </div>
  </div>
<!-- fin moludo heladeria   -->
  
<!--  inicio modulo cafeteria  -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" data-toggle="tooltip" data-placement="right" title="Espacio de Cafetería">
        <img class="img-reponsive img-rounded" src="../../../assets/img/coffee-32x32.png" /> Coffe</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
      <form action="#" method="POST">
      
      <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Realizar Pedidos de Cafetería">
	  <button type="submit" class="btn btn-default btn-sm" name="pedido_cafe">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/im-aim.png" /> Realizar Pedido</button></a></li>
	    
	    <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Mis Pedidos de Cafetería">
	  <button type="submit" class="btn btn-default btn-sm" name="mis_pedidos_cafe">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-pim-notes.png" /> Mis Pedidos</button></a></li>
	   
	       
      </form>
      </ul>
      
      </div>
    </div>
  </div>
<!-- fin modulo cafeteria   -->


<!-- inicio modulo datos personales  -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" data-toggle="tooltip" data-placement="right" title="Espacio para Administración de Datos Personales">
        <img class="img-reponsive img-rounded" src="../../icons/actions/view-media-artist.png" /> Datos Personales</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
      <form action="#" method="POST">
      
      <li class="list-group-item">
	<a href="#" data-toggle="tooltip" data-placement="right" title="Cambiar mi Password">
	  <button type="submit" class="btn btn-default btn-sm" name="cambiar_password">
	    <img class="img-reponsive img-rounded" src="../../icons/actions/view-refresh.png" /> Cambiar Password</button></a></li>
	   
	   <?php
	   if($avatar == ''){
	    echo '<li class="list-group-item">
        <a href="#" data-toggle="tooltip" data-placement="right" title="Editar Datos Personales">
        <button type="submit" class="btn btn-default btn-sm" name="bio_cliente">
            <img class="img-reponsive img-rounded" src="../../icons/actions/user-group-properties.png" /> Mis Datos</button></a></li>';
	    }else{
	    
            echo '<li class="list-group-item">
            <a href="#" data-toggle="tooltip" data-placement="right" title="Editar Datos Personales">
            <button type="submit" class="btn btn-default btn-sm" name="bio_cliente">
                <img alt="Avatar" class="avatar" src="'.$avatar.'" /> Mis Datos</button></a></li>';
         
	    }
	   ?>
	       
      </form>
      </ul>
      
      </div>
    </div>
  </div>
<!-- fin modulo datos personales  -->
  
  
    </div>
    </div>

  
   


<!-- End Colapse Group -->

    <div class="col-sm-10"><hr>
      <div class="alert alert-info">
        <img class="img-reponsive img-rounded" src="../../icons/actions/dashboard-show.png" /> <strong>Espacio de Cliente</strong> - <strong> Bienvenido <?php echo $nombre ?></strong>
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
        //carga de datos del cliente / empleado
        if(isset($_POST['bio_cliente'])){
            cliente($conn,$nombre);
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
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
            $localidad = mysqli_real_escape_string($conn,$_POST['localidad']);
            $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
            $movil = mysqli_real_escape_string($conn,$_POST['movil']);
            $espacio = mysqli_real_escape_string($conn,$_POST['espacio']);
            updateCliente($id,$cliente,$email,$direccion,$localidad,$telefono,$movil,$espacio,$conn);
        }
        //formulario para cambio de avatar
        if(isset($_POST['avatar'])){
            uploadAvatar();
        }
        //persistencia de avatar
        if(isset($_POST['submit'])){
            $fileName = basename($_FILES["file"]["name"]);
            uploadFileAvatar($fileName,$nombre,$conn);
        }
        
        
        //FIN ESPACIO ADMINSTRACION GENERAL
        
        // =============================================================================================
        
        //HELADERIA
        if(isset($_POST['pedidos_heladeria'])){
            formVentaWeb($conn,$nombre);
        }
        if(isset($_POST['add_pedido_heladeria'])){
            $producto = mysqli_real_escape_string($conn,$_POST['producto']);
            $sabor_1 = mysqli_real_escape_string($conn,$_POST['sabor_1']);
            $sabor_2 = mysqli_real_escape_string($conn,$_POST['sabor_2']);
            $sabor_3 = mysqli_real_escape_string($conn,$_POST['sabor_3']);
            $sabor_4 = mysqli_real_escape_string($conn,$_POST['sabor_4']);
            $lugar_venta = mysqli_real_escape_string($conn,$_POST['lugar_venta']);
            $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
            $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
            formFinalizarPedidoHeladeria($cliente,$producto,$sabor_1,$sabor_2,$sabor_3,$sabor_4,$lugar_venta,$modo_pago,$conn);
        }
        if(isset($_POST['mis_pedidos_heladeria'])){
            pedidosCliente($conn,$nombre);
        }
        
        
        
        // =============================================================================================
        //CAFETERIA
        
        
        
        // =============================================================================================
        //MODULO CONSULTAS
        //consulta rápida de mesas
        if(isset($_POST['estado_mesas'])){
            vistaMesas($conn);
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
  <p><img class="img-reponsive img-rounded" src="../../../assets/img/storia-favicon.png" /> Storia - Heladería / Café</p>
</footer>

<?php modal_exit(); ?>
<?php modalNewCliente(); ?>

       

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    $('#end_pedido_heladeria').click(function(){
        var datos=$('#pedido_heladeria_ajax').serialize();
        $.ajax({
            type:"POST",
            url:"../../lib_heladeria_web/insert_pedido_heladeria.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Pedido Realizado Exitosamente");
                    }else{
                    alert("Hubo un problema al intentar realizar el pedido");
                }
            }
        });

        return false;
    });
});
</script>
