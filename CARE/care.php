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
	<title>CARE</title>
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
	<script>

			function load(){
				xhr=new XMLHttpRequest();
		xhr.onload=respuesta;
		var url= "https://spreadsheets.google.com/feeds/cells/1cBfce3qNwrXgEFhRQ1KuWrZBxjFot4nvPLm-1k-RR-Q/oql6w2c/public/basic?hl=en_US&alt=json";
		xhr.open("GET", url, true);
		xhr.send();
			}

			function respuesta(){
				var json;
				if(xhr.status==200){
				json = JSON.parse(xhr.responseText.trim());
				var resultados = json.feed.openSearch$totalResults.$t;
				
				for (var i = resultados-1; i >= 0; i--) {
					if(json.feed.entry[i].title.$t == "A2"){
						document.getElementById("quienesSomosTexto").innerHTML = json.feed.entry[i].content.$t
					}
					else if(json.feed.entry[i].title.$t == "C6"){
						//document.getElementById("redesTexto5").innerHTML = json.feed.entry[i].content.$t
						
					}
					else if(json.feed.entry[i].title.$t == "C5"){
						//document.getElementById("redesTexto4").innerHTML = json.feed.entry[i].content.$t
						
					}
					else if(json.feed.entry[i].title.$t == "C4"){
						document.getElementById("redesTexto3").innerHTML = json.feed.entry[i].content.$t
					}
					else  if(json.feed.entry[i].title.$t == "C3"){
						document.getElementById("redesTexto2").innerHTML = json.feed.entry[i].content.$t
					}
					else if(json.feed.entry[i].title.$t == "C2"){
						document.getElementById("redesTexto1").innerHTML = json.feed.entry[i].content.$t
					}
					if(json.feed.entry[i].title.$t == "B2"){
						document.getElementById("visionTexto").innerHTML = json.feed.entry[i].content.$t
					}
					
				};


			
			}

			}
		
			</script>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
				<h2>Consejo de Asociaciones Regionales y Extranjeras</h2>
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
									En el CARE se concentran todas las asociaciones estudiantiles de los diferentes estados de M&eacute;xico y pa&iacute;ses de Latinoam&eacute;rica.
					  			</p>
					  		</div>
					  		<div class="col-md-6 image">
					  			<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2RExIU2Z3a1BMTGM" class="img-responsive"  />
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
                          <input type="hidden" name= "pathRedireccion" id="to" value="CARE/principalCARE.html"/>
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
  								<a href="https://www.facebook.com/caremty" target="_blank">
  									caremty
  								</a></p>
								<p><span>Twitter:</span>
  								<a href="https://twitter.com/CARE_Mty" target="_blank">
  									care_mty
  								</a></p>
								<p><span>Instagram:</span>
  								<a href="https://instagram.com/care_mty" target="_blank">
  									care_mty
  								</a></p>
  							</div>
					  		<div class="col-md-6 image">
					  			<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2a2lNNWkyUW5oOHM" class="img-responsive" style="position: relative;top: 15px;" alt="picture3" />
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
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TVMyUmFLWTRCaTg" alt="blog1" />
						<div class="bg">
							<p>Asociaci&oacute;n de Estudiantes de Coahuila</p>
						</div>
					</div>
					<div class="pic">
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TVMyUmFLWTRCaTg" alt="blog2" />
						<div class="bg">
							<p>Asociaci&oacute;n de Estudiantes de Tamaulipas</p>
						</div>
					</div>
					<div class="pic">
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TVMyUmFLWTRCaTg" alt="blog3" />
						<div class="bg">
							<p>Asociaci&oacute;n de Estudiantes de Tabasco</p>
						</div>
					</div>
					<div class="pic">
						<img src="https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TVMyUmFLWTRCaTg" alt="blog1" />
						<div class="bg">
							<p>Asociaci&oacute;n de Estudiantes de Veracruz</p>
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