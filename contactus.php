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
	<title>Forma de Contacto FEITESM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.css">

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/vendor/jquery.validate.min.js"></script>
	<script src="js/theme.js"></script>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="contact-us">
	<div class="st-container">
		<?php include (__ROOT__.'/nav.php'); ?>

		<div class="st-pusher">
			<div class="st-content">
	<header class="navbar navbar-inverse normal" role="banner">
  		<?php include (__ROOT__.'/header.php'); ?>
	</header>

	<div id="map" style="height:400px;">
		
		<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/?ie=UTF8&amp;ll=25.651565,-100.28954&amp;spn=0.123259,0.138495&amp;t=m&amp;z=15&amp;output=embed"></iframe>

		<div class="marker-wrapper">
			<div class="marker-icon"></div>
			<div class="marker"></div>
		</div>

		<div id="directions">
			<p>¿C&oacute;mo llegar?</p>
			<form>
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Escribe tu C&oacute;digo Postal" />
				</div>
				<button type="submit" class="button button-small">
					<span>Aceptar</span>
				</button>
			</form>
		</div>
	</div>

	<div id="info">
		<div class="container">
			<div class="row">
				<div class="col-md-8 message">
					<h3>Env&iacute;anos un mensaje</h3>
					<p>
						Puedes enviarnos un mensaje respecto a cualquier tema. <br/> Nos pondremos en contacto contigo tan pronto sea posible.
					</p>
					<form role="form" id="contact-form" method="post" action="secure_email_code.php">
						<div class="form-group">
				    		<label for="name">Nombre</label>
				    		<input type="text" name="name" class="form-control" id="name" />
				  		<input type="hidden" name= "to" id="to" value="feitesm.website@gmail.com"/>
				  		<input type="hidden" name= "pathRedireccion" id="to" value="contactus.html"/>
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
				<div class="col-md-4 contact">
					<div class="address">
						<h3>Direcci&oacute;n</h3>
						<p>
							Centro Estudiantil 221, <br />
							Av. Eugenio Garza Sada 2501 - Sur, <br />
							Col. Tecnol&oacute;gico, 64700, <br />
							Monterrey, Nuevo Le&oacute;n, M&eacute;xico
						</p>
					</div>
					<div class="phone">
						<h3>Tel&eacute;fono</h3>
						<p>
							8358-2000 ext. 3881
						</p>
					</div>
					<div class="social">
						<a href="https://www.facebook.com/feitesm.mty" target="_blank" class="fb"><img src="images/social/fb.png" alt="facebook" /></a>
						<a href="https://twitter.com/feitesm_mty" target="_blank" class="tw"><img src="images/social/tw.png" alt="twitter" /></a>
						<a href="https://instagram.com/feitesm_mty" target="_blank" class="tw"><img src="images/social/insta.png" alt="instagram" /></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include (__ROOT__.'/footer.php'); ?>
	
	 </div><!-- end .st-content -->
    </div><!-- end .st-pusher -->
  </div><!-- end .st-container -->
</body>
    <script src="js/nav-bar.js"></script>
</html>