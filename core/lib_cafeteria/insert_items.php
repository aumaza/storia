<?php session_start();
        
        include "../connection/connection.php";
        include "lib_cafeteria.php";
                    
        $id_mesa = mysqli_real_escape_string($conn,$_POST['id_mesa']);
        $item = mysqli_real_escape_string($conn,$_POST['item']);
        addItems($id_mesa,$item,$conn);
  
?>
