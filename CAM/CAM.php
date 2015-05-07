<?php
require_once '../app/init.php';

$db = new Database;
$googleClient = new Google_Client();
$auth = new Google_Auth($db,$googleClient);
$client = new Resources_Manager(new Database);
$orgName = "cam";
setcookie('orgName', $orgName, time() + 24 * 60 * 60);

$staffInfo = $client->getStaffInfo($orgName);
$staff = "";
if($tabsInfo->num_rows > 0)
{
	while($row = $staffInfo->fetch_assoc()){
		$staff .= '
			<div class="col-md-3 staff">
				<div class="section" id="'.$row["id_int"].'">
					<div class="pic">
						<img src="'.$row["img_url"].'" class="img-responsive" alt="Integrante"/>
						<strong class="nombres">' .$row["nombres"]		 .'</strong>
						<strong class="apellido_p">' .$row["apellido_p"].'</strong>
						<strong class="apellido_m">' .$row["apellido_m"].'</strong><br>
						<span>'.$row["cargo"].'</span>
					</div>
				</div>
			</div>
		';
	}
}

if($auth->isLoggedIn())
{
	$staff .= '
		<div class="col-md-3" id="newStaffMember">
			<div class="section">
				<div class="pic">
					<a href="javascript:void(0);" onclick="addStaff();"><img src="images/personas/add.png" class="img-responsive" alt="Integrante"> </a>
					<strong>Agregar</strong><br>Cargo</div>	
			</div>
		</div>';
	$tabs_head .='<li id="newTabButton"> <button class="btn btn-large btn-primary" onclick="agregarTab()"><i class="fa fa-plus-circle fa-lg fa-align-center"></i> Nueva Pestaña</button></li>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Federación de Estudiantes del Tecnológico de Monterrey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="images/icon/favicon.ico">

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="../css/compiled/theme.css">
	<link rel="stylesheet" type="text/css" href="../css/vendor/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/vendor/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/app.css">

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
	<script src="../js/vendor/jquery.flexslider.min.js"></script>
	<script src="../js/vendor/bootbox.min.js"></script>
	<script src="../js/theme.js"></script>
	<script src="../js/vendor/jquery.validate.min.js"></script>
	<?php if($auth->isLoggedIn()) echo '<script src="js/admin.js"></script>'; ?>
</head>
<body id="features" onload="load()">
    <div class="st-container">
    <?php include (__ROOT__.'/nav.php'); ?>

    <div class="st-pusher">
      <div class="st-content">
      	<header class="navbar navbar-inverse normal" role="banner">
  			<?php include (__ROOT__.'/header.php'); ?>
  		</header>

  	<div id="tabs">
  		<div class="container">
  			<div class="row header">
  				<h2>Consejo de Acciones por M&eacute;xico</h2>
  			</div>
  			<div class="row">
  				<div class="col-md-12 tabs-wrapper">
  					<ul class="nav nav-tabs">
  						<li class="active"><a href="#mision" data-toggle="tab">Qui&eacute;nes somos</a></li>
  						<li><a href="#contacto" data-toggle="tab">Contacto</a></li>
  						<li><a href="#redes" data-toggle="tab">Redes Sociales</a></li>
  					</ul>

  					<div class="tab-content">
  						<div class="tab-pane fade in active" id="mision">
  							<div class="col-md-6 info">
  								<h4>¡Bienvenidos!</h4>
  								<p id="quienesSomosTexto">

  								</p>
  							</div>
  							<div class="col-md-6 image">
  								<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZnFVT3FyUktzX0E" class="img-responsive" />
  							</div>
  						</div>

  						<div class="tab-pane fade" id="contacto">
  							<div class="col-md-12 message">
                  <div id="contact-us">
                    <div id="info-contact">
                      <form role="form" id="contact-form" method="post">
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input type="text" name="name" class="form-control" id="name" />
                        </div>
                          <div class="form-group">
                            <label for="email">Correo electr&oacute;nico</label>
                            <input type="email" name="email" class="form-control" id="email" />
                          </div>
                        <div class="form-group">
                          <label for="phone">Tel&eacute;fono</label>
                          <input type="text" name="phone" class="form-control" id="phone" />
                        </div>
                        <div class="form-group">
                          <label for="message">Tu mensaje</label>
                          <textarea name="message" class="form-control" id="message" rows="6"></textarea>
                        </div>
                        <div class="submit">
                          <input type="submit" class="button button-small" value="Enviar" />
                        </div>
                      </form>
                    </div>
                  </div>
  							</div>
  						</div>
  						<div class="tab-pane fade" id="redes">
  							<div class="col-md-6 info">
  								<h4>Redes sociales</h4>
								<p><span>Facebook:</span>
  								<a href="https://www.facebook.com/cam.mty" target="_blank">
  									cam.mty
  								</a></p>
								<p><span>Twitter:</span>
  								<a href="https://twitter.com/cam_mty" target="_blank">
  									cam_mty
  								</a></p>
								<p><span>Instagram:</span>
  								<a href="https://instagram.com/cam.mty" target="_blank">
  									cam.mty
  								</a></p>
  							</div>
  							<div class="col-md-6 image">
  								<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TExFQllid0Vyenc" class="img-responsive" style="position: relative;top: 15px;" alt="picture3" />
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
	
	<!--<div id="showcase">
  		<div class="container">
  			<div class="row header">
  				<h3>Nuestro Equipo</h3>
  			</div>
			<div id="about-us">
				<div id="info">
					<div class="container">
						<div class="row team">
							<div class="col-md-12 team-row">
								<img src="../images/testimonials/testimonial1.jpg" data-toggle="tooltip" title="Eric Smith - CEO" alt="testimonial" />
								<img src="../images/testimonials/testimonial2.jpg" data-toggle="tooltip" title="Rachel Dawes - PM" alt="testimonial" />
								<img src="../images/testimonials/testimonial3.jpg" data-toggle="tooltip" title="Henry Hill - Developer" alt="testimonial" />
								<img src="../images/testimonials/testimonial4.jpg" data-toggle="tooltip" title="Ana Rich - Designer" alt="testimonial" />
								<img src="../images/testimonials/testimonial7.jpg" data-toggle="tooltip" title="Jessica Welch - Designer" alt="testimonial" />
								<img src="../images/testimonials/testimonial8.jpg" data-toggle="tooltip" title="Charly - iOS Developer" alt="testimonial" />
							</div>
							<div class="col-md-12 team-row">
								<img src="../images/testimonials/testimonial5.jpg" data-toggle="tooltip" title="Karen Stewart - PM" alt="testimonial" />
								<img src="../images/testimonials/testimonial4.jpg" data-toggle="tooltip" title="Charly - iOS Developer" alt="testimonial" />
								<img src="../images/testimonials/testimonial7.jpg" data-toggle="tooltip" title="Jessica Welch - Designer" alt="testimonial" />
								<img src="../images/testimonials/testimonial8.jpg" data-toggle="tooltip" title="John Raynolds - UI/UX" alt="testimonial" />
								<img src="../images/testimonials/testimonial3.jpg" data-toggle="tooltip" title="Henry Hill - Developer" alt="testimonial" />
								<img src="../images/testimonials/testimonial2.jpg" data-toggle="tooltip" title="Rachel Dawes - PM" alt="testimonial" />
							</div>
						</div>
					</div>
				</div>
			 </div>
		</div>
	</div>-->

  	<div id="showcase">
  		<div class="container">
  			<div class="row header">
  				<h3>Mesas directivas</h3>
  			</div>
  			<div class="row">
  				<div class="col-md-12 pics">
  					<div class="pic">
  						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2bVRkTFFFNUd4d3M" alt="blog1" />
  						<div class="bg">
  							<p>Edificar</p>
  						</div>
  					</div>
  					<div class="pic">
  						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2bVRkTFFFNUd4d3M" alt="blog2" />
  						<div class="bg">
  							<p>Recrea</p>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<?php include (__ROOT__.'\footer.php') ?>
      </div><!-- end .st-content -->
    </div><!-- end .st-pusher -->
  </div><!-- end .st-container -->
    <script type="text/javascript">
      $(function() {
      $('.flexslider').flexslider({
        directionNav: false,
        slideshowSpeed: 4000
      });
      $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
    <script src="../js/nav-bar.js"></script>
  </body>
</html>