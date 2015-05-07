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
	<title>CSA</title>
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
	<script src="../js/principalCSA.js"></script>

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
				<h2>Consejo de Sociedades de Alumnos</h2>
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
					  			<p> <span id="quienessomosParrafo">
					  			</span>
					  			</p>
					  		</div>
					  		<div class="col-md-6 image">
					  			<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2eDZ5ZFFyel9iOTA" class="img-responsive"  />
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
                         						<input type="hidden" name= "pathRedireccion" id="to" value="CSA/principalCSA.html"/>
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
  								<a href="https://www.facebook.com/ConsejoSA" target="_blank">
  									ConsejoSA
  								</a></p>
								<p><span>Twitter:</span>
  								<a href="https://twitter.com/csa_mty" target="_blank">
  									csa_mty
  								</a></p>
					  		</div>
					  		<div class="col-md-6 image">
					  			<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2bWtOcGF2TnJGV3c" class="img-responsive" style="position: relative;top: 15px;" alt="picture3" />
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
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Arquitectura</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Animaci&oacute;n y Arte Digital</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Diseño Industrial</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ciencias Qu&iacute;micas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Agrobiotecnolog&iacute;a</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Bionegocios</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Biotecnolog&iacute;a</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Industrias Alimentarias</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero Biom&eacute;dico</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Nutrici&oacute;n y Bienestar Integral</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Psicolog&iacute;a Cl&iacute;nica y de la Salud</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de M&eacute;dico Cirujano Odont&oacute;logo</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero Civil</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociendad de Alumnos de Ingeniero en Diseño Automotr&iacute;z</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Desarrollo Sustentable</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero F&iacute;sico Industrial</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Innovaci&oacute;n y Desarrollo</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero Industrial y de Sistemas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero Mec&aacute;nico Administrador</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero Mec&aacute;nico Electricista</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Mecatr&oacute;nica</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Negocios y Tecnolog&iacute;as de Informaci&oacute;n</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero Qu&iacute;mico</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Sistemas Digitales y Rob&oacute;tica</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Tecnolog&iacute;as Computacionales</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Comunicaci&oacute;n y Medios Digitales</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Contaduría P&uacute;blica y Finanzas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Ingeniero en Producci&oacute;n Musical Digital</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Administraci&oacute;n de Empresas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Administraci&oacute;n Financiera</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Creaci&oacute;n y Desarrollo de Empresas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Econom&iacute;a</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Derecho y Derecho y Finanzas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Mercadotecnia</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Negocios Internacionales</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Letras Hisp&aacute;nicas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Psicolog&iacute;a</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Ciencias Pol&iacute;ticas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Publicidad y Comunicaci&oacute;n de Mercados</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog1" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Psicolog&iacute;a Organizacional</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog2" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Periodismo y Medios de Informaci&oacute;n</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de Licenciado en Relaciones Internacionales</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg" alt="blog3" />
						<div class="bg">
							<p>Sociedad de Alumnos de M&eacute;dico Cirujano</p>
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