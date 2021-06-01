<?php session_start();
        include "../../connection/connection.php";
        include "../../lib_cafeteria/lib_cafeteria.php";

              
        if($conn){
        
        $sql = "SELECT * FROM st_productos where cod_producto like 'cf%' or cod_producto like 'ks%' order by descripcion ASC";
    	mysqli_select_db($conn,'storia');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	
	echo '<div class="panel panel-success" >
	      <div class="panel-heading" align="center"><span class="pull-center "><img src="../../icons/actions/feed-subscribe.png"  class="img-reponsive img-rounded"> Precios Cafetería';
	echo '</div><br>';

      echo "<table class='table table-hover table-condensed'>";
      echo "<thead>
		    <th class='text-nowrap text-center'>Producto</th>
            <th class='text-nowrap text-center'>Precio</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['descripcion']."</a></td>";
			 echo "<td align=center>$".$fila['precio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 
		}

		echo "</table>";
		echo "<br>";
		echo '</div>';
		
		}else{
		
            echo 'Hubo un problema al conectarse a la base de datos' .mysqli_error($conn);
		
		}

?>
