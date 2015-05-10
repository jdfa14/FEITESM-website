<?php
	require_once '../app/init.php';

	$db = new Database;
	$googleClient = new Google_Client();
	$auth = new Google_Auth($db,$googleClient);
	$client = new Resources_Manager(new Database);
	$orgSign = "csa";
	setcookie('orgSign', $orgSign, time() + 24 * 60 * 60);
	$thisOrg = $client->getOrgInfo($orgSign);
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
			$("img").attr("onerror","this.src='../images/default.jpg';");
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
							<h2><?= $thisOrg['nombre'] ?></h2>
						</div>
						<?php
							$tabsInfo = $client->getTabsInfo($orgSign);
							if($tabsInfo->num_rows > 0 || $auth->isLoggedIn()) :
						?>
						<div class="row">
							<div class="col-md-12 tabs-wrapper">
								<ul class="nav nav-tabs">
									<?php
										while($row = $tabsInfo->fetch_assoc()):
									?>

									<li>
										<a class="tab_element" href="#Tab-<?=$row["id_inf"]?>" data-toggle="tab"> <?=$row["tabla_titulo"]?></a>
									</li>

									<?php
										endwhile;
										if($auth->isLoggedIn()):
									?>
									<li id="newTabButton">
											<button class="btn btn-large btn-primary" onclick="agregarTab()">
												<i class="fa fa-plus-circle fa-lg fa-align-center"></i>
												Nueva Pestaña
											</button>
										</li>
									<?php endif; ?>
								</ul>

								<div class="tab-content">
									<?php
										$tabsInfo = $client->getTabsInfo($orgSign);
										while($row = $tabsInfo->fetch_assoc()):
											if($row['contacto'] == 1):
									?>
									<div class="tab-pane fade" id="Tab-<?=$row["id_inf"]?>">
										<div class="col-md-12 message">
											<div id="contact-us">
												<div id="info-contact">
													<form role="form" id="contact-form" method="post" action="../secure_email_code.php">
														<div hidden>
															<p class="contacto">1</p>
															<p class="redes">0</p>
														</div>
														<div class="form-group">
															<label for="name">Nombre</label>
															<input type="text" name="name" class="form-control" id="name" />
															<input type="hidden" name= "to" id="to" value="<?= $thisOrg['email_contacto']?>"/>
															<input type="hidden" name= "pathRedireccion" id="to" value="<?=__FILE__?>"/>
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
									<?php elseif($row['redes'] == 1):?>
									<div class="tab-pane fade in" id="Tab-<?=$row["id_inf"]?>">
										<div hidden>
											<p class="contacto">0</p>
											<p class="redes">1</p>
										</div>
										<div class="col-md-6 info">
											<h4>Redes sociales</h4>
											<p><span>Facebook:</span>
											<a href="<?= $thisOrg['facebook'] ?>" target="_blank">
												ConsejoSA
											</a></p>
											<p><span>Twitter:</span>
											<a href="<?= $thisOrg['twitter'] ?>" target="_blank">
												csa_mty
											</a></p>
										</div>
										<div class="col-md-6 image">
											<img src="<?= $thisOrg['logo_url'] ?>" class="img-responsive" style="position: relative;top: 15px;" alt="picture3" />
										</div>
									</div>
									<?php else: ?>
									<div class="tab-pane fade in" id="Tab-<?=$row["id_inf"]?>">
										<div hidden>
											<p class="contacto">0</p>
											<p class="redes">0</p>
										</div>
										<div class="col-md-6 info">
											<h4 class ="titulo"><?=$row["titulo"]?></h4>
											<p class="contenido"><?=$row["contenido"]?></p>
										</div>
										<div class="col-md-6 image">
											<img src="<?=$row["img_url"]?>" class="img-responsive " alt="Foto" >
										</div>
									</div>
									<?php 
										endif; endwhile;
									?>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>


				<?php 
					$staffInfo = $client->getStaffInfo($orgSign);
					if($staffInfo->num_rows > 0 || $auth->isLoggedIn()):
						$cont = 0;
				?>
		  		<div class="container boxText">
		  			<div class="row header">
		  				<h3>Nuestro Equipo</h3>
		  			</div>
					<div id="about-us">
						<div id="info">
							<div class="container">
								<div class="row team">
									<?php 
										while($row = $staffInfo->fetch_assoc()):
											if($cont == 0):
									?>
									<div class="col-md-12 team-row">
									<?php	endif; ?>

										<img rowN="<?=$cont?>" src="<?=$row['img_url']?>" data-toggle="tooltip" title="<?=$row['nombres']?> <?=$row['apellido_p']?> - <?=$row['cargo']?>" alt="<?=$row['cargo']?>"  />
									<?php	if($cont == 0): ?>
											</div>
									<?php 
											endif;
										$cont = ($cont + 1) % 4;
										endwhile;
										if($auth->isLoggedIn()):
											if($cont == 0):
									?>
									<div class="col-md-12 team-row">
									<?php	endif; ?>
										<img rowN="<?=$cont?>" src="../images/personas/add.png" data-toggle="tooltip" title="Agrega nuevo integrante" alt="addNew"  />
									<?php	if($cont == 0): ?>
									</div>
									<?php 
											endif;
										endif;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php 
					$orgInfo = $client->getOrgChilds($orgSign);
					if($orgInfo->num_rows > 0 || $auth->isLoggedIn()):
						$cont = 0;
				?>
				<div id="showcase">
					<div class="container">
						<div class="row header">
							<h3>Mesas directivas</h3>
						</div>
						<div class="row">
							<div class="col-md-12 pics">
								<?php 
									while($row = $orgInfo->fetch_assoc()):
								?>
								<div class="pic">
									<div hidden>
										<p class="id_org"><?=$row['id_org']?></p>
										<p class="descripcion"><?=$row['descripcion']?></p>
										<p class="email_contacto"><?=$row['email_contacto']?></p>
										<p class="facebook"><?=$row['facebook']?></p>
										<p class="twitter"><?=$row['twitter']?></p>
									</div>
									<img src="<?=$row['logo_url']?>" alt="Persona" />
									<div class="bg nombre">
										<p><?=$row['nombre']?></p>
									</div>
								</div>
								<?php
									endwhile;
									if($auth->isLoggedIn()):
								?>
								<div class="pic">
									<img src="../images/organizaciones/default.jpg" alt="añadir"  />
									<div class="bg nombre">
										<p>Agrega nueva mesa</p>
									</div>
								</div>
								<?php endif?>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>
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