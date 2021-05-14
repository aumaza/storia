<?php include "../connection/connection.php";
      include "libs/lib_registro.php";



?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Storia - Blanqueo de Password</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="registro.php" data-toggle="tooltip" title="Si aún no te registraste, haz click aquí">Registrate</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../#">Storia Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../clientes/#">Storia Clientes</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="bg-primary text-white">
            <div class="container text-center">
                <h1>Bienvenido al Blanqueo de Password de Storia</h1>
                <p class="lead">Si olvidate tu Password, no hay problema, completá los campos que solicitamos aquí abajo y blanquearemos tu Password!</p>
            </div>
        </header>
        <?php
        
        if($conn){
        
            if(isset($_POST['reset_pass'])){
                $usuario = mysqli_real_escape_string($conn,$_POST['email']);
                userVerify($usuario,$conn); 
            }
        
        }else{
        
            echo "Conexion Error..." .mysqli_error($conn);
        
        }
        
        
        ?>
        
        
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        
                          <?php 
                            
                            if($conn){
                          
                            formResetPassWeb(); 
                          
                            }else{
                            
                                echo "Conexion Error..." .mysqli_error($conn);
                            }
                          
                          
                          ?>
                        
                    </div>
                </div>
            </div>
        </section>
        
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
            <p class="m-0 text-center text-white">Derechos Reservados &copy; Storia</p>
            <p class="m-0 text-center text-white">Desarrollo  <a href="https://deps.slackzone.com.ar/slackzone-devel/" target="_blank">
            <img src="../../assets/img/devel-slack-logo2-32x32.png"  class="img-reponsive img-rounded"> Slackzone Development</a></p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
