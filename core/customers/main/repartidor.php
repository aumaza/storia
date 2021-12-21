<?php session_start();
        include "../../connection/connection.php";
        include "../../lib_heladeria_web/lib_heladeria_web.php";

        $id = $_GET['id'];
        
        if($conn){
        
        $sql = "select id from st_ventas where id = '$id'";
        mysqli_select_db($conn,'storia');
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
                $id = $row['id'];
        }
   
        $sql_1 = "select repartidor from st_repartos where id_venta = '$id'";
        mysqli_select_db($conn,'storia');
        $query_1 = mysqli_query($conn,$sql_1);
        while($row_1 = mysqli_fetch_array($query_1)){
                $repartidor = $row_1['repartidor'];
        }
        
        echo '<div class="alert alert-success">
                <p>Repartidor: '.$repartidor.'</p>
              </div>';
               
        }else{
            echo 'Hubo un problema de conexion';
        }

?>
