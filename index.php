<?php include "core/connection/connection.php";
      include "core/lib_core/lib_core.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>Storia</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/storia-favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v2.3.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
          <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Acceso para Administradores y Empleados">
            <img src="core/icons/apps/preferences-desktop-cryptography.png"  class="img-reponsive img-rounded"> Administraci??n
            </button>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li><a href="#about">Sobre Nosotros</a></li>
          <li><a href="#services">Servicios</a></li>
          <li><a href="#portfolio">Productos</a></li>
          <li><a href="#team">Nuestro Equipo</a></li>
          <li><a href="clientes/#">Clientes</a></li>
          <li><a href="#contact">Contactanos</a></li>
         
         </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <br><br><hr>  
    <?php
         
         if($conn){
         
        if(isset($_POST['A'])){
    
        
	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$pass = mysqli_real_escape_string($conn,$_POST['pass']);
	
	
    session_start();
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass;
		        
	mysqli_select_db($conn,'storia');
	
	$sql = "SELECT * FROM st_usuarios where user = '$user' and password = '$pass' and role = 1";
	$q = mysqli_query($conn,$sql);
	
	
	$query = "SELECT * FROM st_usuarios where user = '$user' and password = '$pass' and role = 0";
	$retval = mysqli_query($conn,$query);
	
	
	
	if(!$q && !$retval){	
			echo '<div clas="row" align="center">
                    <div class="col-sm-6">
                    <div class="alert alert-danger" role="alert">';
			echo "Error de Conexion..." .mysqli_error($conn);
			echo "</div></div></div>";
			echo '<a href="core/logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
			exit;			
			
			}
		
			if($user = mysqli_fetch_assoc($retval)){
				

				echo '<div clas="row" align="center">
                        <div class="col-sm-6">
                        <div class="alert alert-danger" role="alert">';
				echo "<strong>Atenci??n!  </strong>" .$_SESSION["user"];
				echo "<br>";
				echo '<span class="pull-center "><img src="core/icons/status/security-low.png"  class="img-reponsive img-rounded"><strong> Usuario Bloqueado. Contacte al Administrador.</strong>';
				echo "</div></div></div>";
				exit;
			}

			else if($user = mysqli_fetch_assoc($q)){

				if(strcmp($_SESSION["user"], 'root') == 0){
                
                //logs($_SESSION["user"]);
				echo "<br>";
				echo '<div clas="row" align="center">
                        <div clas="row" align="center">
                        <div class="col-sm-6">
                        <div class="alert alert-success" role="alert">';
				echo '<button class="btn btn-success">
				      <span class="spinner-border spinner-border-sm"></span>
				      </button>';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div></div></div></div>";
  				echo '<meta http-equiv="refresh" content="5;URL=core/manager/main/main.php "/>';
				
			}else{
				//logs($_SESSION["user"]);
				
				if($user['espacio'] == 'emp'){
				
				echo '<div clas="row" align="center">
                        <div class="col-sm-6">
                        <div class="alert alert-success" role="alert">';
				echo '<button class="btn btn-success">
				      <span class="spinner-border spinner-border-sm"></span>
				      </button>';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div></div></div>";
  				echo '<meta http-equiv="refresh" content="5;URL=core/employee/main/main.php "/>';
				
			}
			if($user['espacio'] == 'rep'){
			
                echo '<div clas="row" align="center">
                        <div class="col-sm-6">
                        <div class="alert alert-success" role="alert">';
				echo '<button class="btn btn-success">
				      <span class="spinner-border spinner-border-sm"></span>
				      </button>';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div></div></div>";
  				echo '<meta http-equiv="refresh" content="5;URL=core/delivery/main/main.php "/>';
			
			}
			if($user['espacio'] == 'cli'){
			
                echo '<div clas="row" align="center">
                        <div class="col-sm-6">
                        <div class="alert alert-danger" role="alert">';
				echo '<span class="pull-center "><img src="core/icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Usted es un Cliente, debe ingresar desde el Bot??n Clientes';
				echo "</div></div></div>";
			
			}
			}
			}else{
				echo '<div clas="row" align="center">
                        <div class="col-sm-6">
                        <div class="alert alert-danger" role="alert">';
				echo '<span class="pull-center "><img src="core/icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Usuario o Contrase??a Incorrecta. Reintente Por Favor....';
				echo "</div></div></div>";
				}
				}
				}else{
                    echo "<br>";
                    echo '<div class="container">';
                    echo '<div class="alert alert-warning" alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    echo '<img class="img-reponsive img-rounded" src="core/icons/status/task-attempt.png" /> Hubo un problema al Conectarse a la Base de Datos. '  .mysqli_error($conn);
                    echo "</div>";
                    echo "</div>";
				}
	
			
	
	//cerramos la conexion
	
	mysqli_close($conn);
           
      ?><hr>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
          <h1>Experiment?? un Helado y Atenci??n Diferente</h1>
          <h2>Nuestro equipo te espera para servirte y hacerte sentir como en casa</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/storia - logo - 1.png" class="img-fluid animated" alt="">
<!--           <img src="assets/img/hero-img.svg" class="img-fluid animated" alt=""> -->
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">Podr??s hacer pedidos desde el living de casa</h3>
            <p data-aos="fade-up" data-aos-delay="100">
              Registr??ndote, podr??s realizar tu pedido sin moverte de la comodidad del living de tu casa. Segu?? mirando tv, nosotros te lo llevamos!!.
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>Simple y Sencillo</h4>
                <p>Pedis y te lo llevamos!!</p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>Nuestros Productos en tu puerta</h4>
                <p>Trabajamos para que sientas que sos parte de nosotros.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Servicios</h2>
          <p>Te mostramos nuestros servicios</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Productos</h2>
          <p>Te mostramos nuestros diferentes productos</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus-circle"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus-circle"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="icofont-plus-circle"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="icofont-plus-circle"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="icofont-plus-circle"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-plus-circle"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="icofont-plus-circle"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="icofont-plus-circle"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus-circle"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Preguntas Frecuentes</p>
        </div>

        <ul class="faq-list">

          <li data-aos="fade-up" data-aos-delay="100">
            <a data-toggle="collapse" class="" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="icofont-simple-up"></i></a>
            <div id="faq1" class="collapse show" data-parent=".faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="200">
            <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="icofont-simple-up"></i></a>
            <div id="faq2" class="collapse" data-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="300">
            <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="icofont-simple-up"></i></a>
            <div id="faq3" class="collapse" data-parent=".faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="400">
            <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="icofont-simple-up"></i></a>
            <div id="faq4" class="collapse" data-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="500">
            <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="icofont-simple-up"></i></a>
            <div id="faq5" class="collapse" data-parent=".faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="600">
            <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="icofont-simple-up"></i></a>
            <div id="faq6" class="collapse" data-parent=".faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Equipo</h2>
          <p>Te presentamos a nuestro Equipo</p>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                </div>
                </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                </div>
                </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                </div>
                </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="member">
              <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                </div>
                </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contactate</h2>
            <p>Envianos tus Inquietudes e Ideas</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Ubicaci??n:</h4>
                <p>Av. Directorio 4867 - Capital Federal - Buenos Aires</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Tel??fono:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.191765387845!2d-58.4922780847692!3d-34.64985968044753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc90a400f03cd%3A0x16c5b8b6b7121c8e!2sAv.%20Directorio%204867%2C%20C1440ASA%20CABA!5e0!3m2!1ses!2sar!4v1618495792296!5m2!1ses!2sar" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            
            <div class="container">
            <div class="card">
            <div class="card-header bg-secondary text-white" align="center">Escribinos</div>
            
            <div class="card-body">
            <form action="core/registro/mensajes.php" method="POST">
                
                <div class="form-group">
                <label for="email">Nombre:</label>
                <input type="text" class="form-control" placeholder="Ingrese su Nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
                <label for="pwd">Email:</label>
                <input type="email" class="form-control" placeholder="Ingrese su email" name="email" required>
                </div>
                
                <div class="form-group">
                <label for="pwd">Mensaje:</label>
                <textarea class="form-control" rows="5" name="mensaje" maxlength="240" required></textarea>
                </div>
                </div>
                
                <div class="card-footer">
                <button type="submit" class="btn btn-secondary btn-block" name="enviar_mensaje">Enviar</button>
                </div>
            </form>
            
            </div>
          
          </div>
          
        </div>
        
      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Storia</span></strong>. Todos los Derechos Reservados
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Desarrollo  <a href="https://deps.slackzone.com.ar/slackzone-devel/" target="_blank">
            <img src="assets/img/devel-slack-logo2-32x32.png"  class="img-reponsive img-rounded"> Slackzone Development</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  
  <?php modal_1(); ?>
  
  
  

</body>

</html>
