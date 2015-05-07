<?php
require_once '../app/init.php';

$db = new Database;
$googleClient = new Google_Client();
$auth = new Google_Auth($db,$googleClient);
$client = new Resources_Manager(new Database);
$orgName = "cam";
setcookie('orgName', $orgName, time() + 24 * 60 * 60);


// Datos para tabs
$tabsInfo = $client->getTabsInfo($orgName);
$tabs_head = "";
$tabs_content = "";
if($tabsInfo->num_rows > 0)
{
	while($row = $tabsInfo->fetch_assoc()){
		$tabs_head .='<li> <a class="tab_element" href="' .'#Tab-'. $row["id_inf"] . '" data-toggle="tab">'.$row["tabla_titulo"].'</a></li>';
		if($row['contacto'] == 1){
			$tabs_content .= 	'<div class="tab-pane fade in" id="Tab-'.$row["id_inf"].'">
										<div hidden>
											<p class="contacto">1</p>
											<p class="redes">0</p>
										</div>
			  							<div class="col-md-12 message">
											<div id="contact-us">
												<div id="info-contact">
													<form role="form" id="contact-form" method="post" novalidate="novalidate">
													<div class="form-group">
														<label for="name">Nombre</label>
														<input type="text" name="name" class="form-control" id="name">
													</div>
													<div class="form-group">
														<label for="email">Correo electrónico</label>
														<input type="email" name="email" class="form-control" id="email">
													</div>
													<div class="form-group">
														<label for="phone">Teléfono</label>
														<input type="text" name="phone" class="form-control" id="phone">
													</div>
													<div class="form-group">
														<label for="message">Tu mensaje</label>
														<textarea name="message" class="form-control" id="message" rows="6"></textarea>
													</div>
													<div class="submit">
														<input type="submit" class="button button-small" value="Enviar">
													</div>
												</form>
											</div>
										</div>
		  							</div>
		  						</div>';
		}else if($row['redes'] == 1){
		}else {
			$tabs_content .= 	'<div class="tab-pane fade in" id="Tab-'.$row["id_inf"].'">
									<div hidden>
										<p class="contacto">0</p>
										<p class="redes">0</p>
									</div>
									<div class="col-md-6 info">
										<h4 class ="titulo">'.$row["titulo"].'</h4>
										<p class="contenido">'
											.$row["contenido"].
										'</p>
									</div>
									<div class="col-md-6 image">
										<img src="'.$row["img_url"].'" class="img-responsive " alt="Foto"/>
									</div>
								</div>';
		}
	}
}

//Datos para las imagenes de los integrantes
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
	<?php if($auth->isLoggedIn()) echo '<script src="../js/admin.js"></script>'; ?>
</head>

<body id="features" >
	<script type="text/javascript">
		$(document).ready(function (){
			$("#tabs .tabs-wrapper .nav-tabs li").first().addClass("active");
			$("#tabs .tabs-wrapper .tab-content .tab-pane").first().addClass("active");
		});
	</script>
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
						<?php
							echo $tabs_head;
						?>
					</ul>

					<div class="tab-content">
						<?php
							echo $tabs_content;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

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