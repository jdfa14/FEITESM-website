<?php
require_once '../app/init.php';

$db = new Database;
$googleClient = new Google_Client();
$auth = new Google_Auth($db,$googleClient);
$client = new Resources_Manager(new Database);
$orgName = "cam";
setcookie('orgName', $orgName, time() + 24 * 60 * 60);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>CCE</title>
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
	<script src="../js/principalCCE.js"></script>

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
				<h2>Consejo de Comunidades Estudiantiles</h2>
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
					  			<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2RGdEVThHSzJtU3M" class="img-responsive"  />
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
                          <input type="hidden" name= "pathRedireccion" id="to" value="CCE/principalCCE.html"/>
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
  								<a href="https://www.facebook.com/consejoce" target="_blank">
  									consejoce
  								</a></p>
								<p><span>Instagram:</span>
  								<a href="https://instagram.com/cce_mty" target="_blank">
  									cce_mty
  								</a></p>
  							</div>
					  		<div class="col-md-6 image">
					  			<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2WVJFbFVzM2thZEE" class="img-responsive" style="position: relative;top: 15px;" alt="picture3" />
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
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Abriendo Caminos</p>
						</div>
					</div>
					<div class="pic">
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>American Institute of Chemical Engineers</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>American Society of Civil Engineers</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>American Society of Mechanical Engineers</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>APICS</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Asociaci&oacute;n de Cineastas Creativos de Monterrey por Estudiantes</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Asociaci&oacute;n de Estudiantes de Difusi&oacute;n Cultural</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>Asociaci&oacute;n Estudiantil por los Pueblos Ind&iacute;genas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Asociaci&oacute;n por la Integraci&oacute;n, Respeto y Equidad</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Association for Computing Machinery</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>Association of Women Surgeons</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Borregos Club Deportivo Parkour Tec</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Caremisiones</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>Club de Cultura Japonesa</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Club de Fotograf&iacute;div</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Club de Tenis</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>Club Tec de Jiu Jitsu Brasile&ntilde;o</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Creciendo con Zaragoza, N.L.</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Dejando Huella</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>Grupo &Aacute;guilas M&eacute;xico, Sede Monterrey</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Grupo Nueva Prensa</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Grupo Valores Brigadas Misioneras</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>HIPOTEC</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Hormigas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Institute of Food Technologists Student Association Cap&iacute;tulo Monterrey</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>Institute of Industrial Engineers</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Instituto Mexicano Ejecutivos de Finanzas</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>International Degree Program Student Association</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>J&oacute;venes Unidos por Nuevo Le&oacute;n Cap&iacute;tulo Estudiantil Tec de Monterrey</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>LATIDOS</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Mujeres en Tecnolog&iacute;div</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>OHANA</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Programa de Liderazgo Empresarial Internacional</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Programa para el Desarrollo del Ingeniero Qu&iacute;mico</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>Rama Estudiantil IEEE Secci&oacute;n MTY</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog3" />
						<div class="bg">
							<p>Rugby</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog1" />
						<div class="bg">
							<p>Secci&oacute;n Estudiantil del Instituto Mexicano de Ingeniero Qu&iacute;mica</p>
						</div>
					</div>
					<div class="pic" >
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8" alt="blog2" />
						<div class="bg">
							<p>Sociedad Mexicana de Estudiantes de Biotecnolog&iacute;div y Bioingenier&iacute;a</p>
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