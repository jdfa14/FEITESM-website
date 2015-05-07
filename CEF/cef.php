<?php
require_once '../app/init.php';

$db = new Database;
$googleClient = new Google_Client();
$auth = new Google_Auth($db,$googleClient);
$client = new Resources_Manager(new Database);
$orgName = "care";
setcookie('orgName', $orgName, time() + 24 * 60 * 60);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>CEF</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="../css/compiled/theme.css">
	<link rel="stylesheet" type="text/css" href="../css/app.css">
	 <link rel="stylesheet" type="text/css" href="../css/vendor/font-awesome.css">

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="../js/bootstrap/bootstrap.min.js"></script>
	<script src="../js/vendor/jquery.flexslider.min.js"></script>
	<script src="../js/theme.js"></script>
	<script src="../js/vendor/jquery.validate.min.js"></script>
	<script src="../js/principalCEF.js"></script>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="features">
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
				<h2>Consejo Estudiantil de Filantropía</h2>
			</div>
			<div class="row">
				<div class="col-md-12 tabs-wrapper">
					<ul class="nav nav-tabs">
					  	<li class="active"><a href="#quienessomos" data-toggle="tab">Qui&eacute;nes somos</a></li>
					  	<li><a href="#contacto" data-toggle="tab">Contacto</a></li>
					  	<li><a href="#redes" data-toggle="tab">Redes Sociales</a></li>
					</ul>

					<div class="tab-content">
					  	<div class="tab-pane fade in active" id="quienessomos">
					  		<div class="col-md-6 info">
					  			<h4>¡Bienvenidos!</h4>
					  			<p>
					  				<span id="quienessomosParrafo">
									</span>
					  			</p>
					  		</div>
					  		<div class="col-md-6 image">
					  			<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2cThKVU9zV1JsMEk" class="img-responsive"  />
					  		</div>
					  	</div>
					  	<div class="tab-pane fade" id="contacto">
					  	<div class="col-md-12 message">
						  <div id="contact-us">
							<div id="info-contact">
							  <form role="form" id="contact-form" method="post" action="../secure_email_code.php">
								<div class="form-group">
								  <label for="name">Nombre</label>
								  <input type="text" name="name" class="form-control" id="name" />
								  <input type="hidden" name= "to" id="to" value="feitesm.website@gmail.com"/>
                          <input type="hidden" name= "pathRedireccion" id="to" value="CEF/principalCEF.html"/>
								</div>
								  <div class="form-group">
									<label for="email">Correo electr&oacute;nico</label>
									<input type="email" name="email" class="form-control" id="email" />
								  </div>
								<div class="form-group">
								  <label for="subject">Asunto</label>
								  <input type="text" name="subject" class="form-control" id="subject" />
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
  								<a href="https://www.facebook.com/cefmty" target="_blank">
  									cefmty
  								</a></p>
								<p><span>Instagram:</span>
  								<a href="https://instagram.com/cef_mty" target="_blank">
  									cef_mty
  								</a></p>
					  		</div>
					  		<div class="col-md-6 image">
					  			<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2SldBZ3JiVER2aE0" class="img-responsive" style="position: relative;top: 15px;" alt="picture3" />
					  		</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="showcase">
  		<div class="container">
  			<div class="row header">
  				<h3>Nuestro Equipo</h3>
  			</div>
			<div id="about-us">
				<div id="info">
					<div class="container">
						<div class="row team">
							<div class="col-md-12 team-row">
								<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2SWZxSHI4SkhDZlU" data-toggle="tooltip" title="Lorena Flores - Directora" alt="directora" />
								<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2MVNtQ25VRU41YjQ" data-toggle="tooltip" title="Mariana Gomezgil - Secretaría" alt="secretaria" />
								<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2cTQ0MXI4Nzl0N1k" data-toggle="tooltip" title="Kermith Morales - Comunicación e Imagen" alt="comunicacion" />
								<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2dzNSaDExOXpCams" data-toggle="tooltip" title="Maricarmen Ocejo" alt="testimonial" />
							</div>
							<div class="col-md-12 team-row">
								<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2U2dsclhfOTdCRVk" data-toggle="tooltip" title="Paloma Santos" alt="testimonial" />
								<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2S2d4Y0w3NnFIbXc" data-toggle="tooltip" title="Paola Madero" alt="testimonial" />
								<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2dUp0Y2hMOXMtRTg" data-toggle="tooltip" title="Xavier Sempere - Campañas Financieras" alt="finanzas" />
							</div>
						</div>
					</div>
				</div>
			 </div>
		</div>
	</div>

	<?php include (__ROOT__.'/footer.php'); ?>
	<script type="text/javascript">
	  	$(function() {
			$('.flexslider').flexslider({
				directionNav: false,
				slideshowSpeed: 4000
			});
			$('[data-toggle="tooltip"]').tooltip();
	  	});
	</script>
	 </div><!-- end .st-content -->
    </div><!-- end .st-pusher -->
  </div><!-- end .st-container -->
</body>
    <script src="../js/nav-bar.js"></script>
</html>