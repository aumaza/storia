<?php session_start();
        
        include "../connection/connection.php";
        include "../lib_password/lib_password.php";
        include "lib_clientes/lib_clientes.php";
                        
                                
        $espacio = mysqli_real_escape_string($conn,$_POST['espacio']);
        $cliente = mysqli_real_escape_string($conn,$_POST['cliente']);
        $dni = mysqli_real_escape_string($conn,$_POST['dni']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $direccion = mysqli_real_escape_string($conn,$_POST['direccion']);
        $localidad = mysqli_real_escape_string($conn,$_POST['localidad']);
        $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
        $movil = mysqli_real_escape_string($conn,$_POST['movil']);
        altaClienteRapida($cliente,$dni,$email,$direccion,$localidad,$telefono,$movil,$espacio,$conn);
  
?>
