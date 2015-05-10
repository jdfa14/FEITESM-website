<?php

require_once 'app/init.php';

$db = new Database;
$googleClient = new Google_Client();
$auth = new Google_Auth($db,$googleClient);
$client = new Resources_Manager(new Database);
$orgSign = "feitesm";
setcookie('orgSign', $orgSign, time() + 24 * 60 * 60);
$thisOrg = $client->getOrgInfo($orgSign);

if($auth->checkRedirectCode())
{
	header('Location index.php');
}
//echo $client->getOrgID($orgSign);

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Federación de Estudiantes del Tecnológico de Monterrey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="/images/icon/favicon.ico">

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/vendor/animate.css">
	<link rel="stylesheet" type="text/css" href="css/app.css">

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/vendor/jquery.flexslider.min.js"></script>
	<script src="js/vendor/bootbox.min.js"></script>
	<script src="js/theme.js"></script>
	<script src="js/vendor/jquery.validate.min.js"></script>
	<?php if($auth->isLoggedIn()) echo '<script src="js/admin.js"></script>'; ?>
</head>

<body id="home3">
	<script type="text/javascript">
		$(document).ready(function (){
			$("#tabs .tabs-wrapper .nav-tabs li").first().addClass("active");
			$("#tabs .tabs-wrapper .tab-content .tab-pane").first().addClass("active");
		});
	</script>

	<div class="bb-alert alert alert-info" style="display: none;">
        <span>Confirm result: false</span>
    </div>
	<div class="st-container">
		<?php include (__ROOT__.'/nav.php'); ?>

		<div class="st-pusher">
			<div class="st-content">
				<header class="navbar navbar-inverse hero" role="banner">
					<?php include (__ROOT__.'/header.php'); ?>
				</header>

				<div id="hero">
					<!-- Botones de navegacion manual -->
					<a class="slide-nav prev" href="#">Prev</a>
					<a class="slide-nav next" href="#">Next</a>
					<!-- Puntitos de navegacion manual (se deben crear tantas <a> tags como imagenes haya)-->
					<nav>
						<a class="active" href="#"></a>
						<a href="#"></a>
						<a href="#"></a>
					</nav>

					<div class="slides"> <!-- Aqui se crearan tantas dics slides cuantas sean necesarias -->

						<div class="slide first active">
							<div class="bg"></div>
							<div class="container">
								<div class="row">
									<div class="col-sm-6 info">
										<h1 class="hero-text">
											EXPOTEC
										</h1>
										<p>
											"La fiesta internacional de las culturas" 
										</p>
									</div>
									<div class="col-sm-6 hidden-xs mobiles">
										<img src="images/banner/front1.jpg" class="animated fadeInLeft img-responsive" alt="devices" />
									</div>
								</div>
							</div>
						</div>
						<div class="slide second">
							<div class="bg"></div>
							<div class="container">
								<h1 class="hero-text">ACT&Uacute;A</h1>
								<p class="sub-text">
									Alza la voz.
								</p>
								<div class="video-wrapper">
									<div class="video animated fadeInUp">
										<img src="images/banner/front2.jpg" class="animated fadeInLeft img-responsive" alt="devices" />
										<!--<img class="demo-player" alt="videoplayer" videoID="jofNR_WkoCE"/>-->
									</div>
								</div>
							</div>
						</div>
						<div class="slide third">
							<div class="bg"></div>
							<div class="container">
								<div class="row">
									<div class="col-sm-6 info">
										<h1 class="hero-text">
											LOVE FEST
										</h1>
										<p>
											What do you love? 
										</p>
										<!--<div class="cta">
											<a href="features.html" class="button-outline">
												TRY IT FREE
												<i class="fa fa-chevron-right"></i>
											</a>
										</div>-->
									</div>
									<div class="col-sm-6 hidden-xs mobiles">
										<!-- <img src="images/static-hero.png" class="animated fadeInLeft" alt="devices" /> -->
										<img src="images/banner/front3.jpg" class="animated fadeInLeft img-responsive" alt="devices" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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

				<div id="grid-first">
					<div class="container">
						<div class="row header">
							<h3>Eventos</h3>
						</div>
						<div style="text-align: center">
							<iframe src="https://www.google.com/calendar/embed?src=feitesm.website%40gmail.com&	ctz=America/Mexico_City" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
						</div>
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

					<div class="container">
						<div class="row team">
							<?php 
								while($row = $staffInfo->fetch_assoc()):
							?>
							<div class="col-md-3 staff">
								<div class="section" id="<?=$row["id_int"]?>">
									<div class="pic">
										<img src="<?=$row["img_url"]?>" class="img-responsive" alt="Integrante"/>
										<strong class="nombres"><?=$row["nombres"]?></strong>
										<strong class="apellido_p"><?=$row["apellido_p"]?></strong>
										<strong class="apellido_m"><?=$row["apellido_m"]?></strong><br>
										<span><?=$row["cargo"]?></span>
									</div>
								</div>
							</div>
							<?php 
									
								$cont = ($cont + 1) % 4;
								endwhile;
								if($auth->isLoggedIn()):
							?>
							<div class="col-md-3 staff" id="newStaffMember">
								<div class="section">
									<div class="pic">
										<a href="javascript:void(0);" onclick="addStaff();"><img src="images/personas/add.png" class="img-responsive" alt="Integrante"> </a>
										<strong>Agregar</strong><br>Cargo</div>	
								</div>
							</div>
							
							<?php 
								endif;
							?>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php include (__ROOT__.'\footer.php') ?>

			</div><!-- end .st-content -->
		</div><!-- end .st-pusher -->
	</div>
	<script type="text/javascript">
		$(function () {
			// Makes the demo video appear/disappear 
			var $demo = $("#demo");
			$('#demo').on('hidden.bs.modal', function () {
			$demo.find("iframe").remove();
			})
			$('#demo').on('show.bs.modal', function () {
				if (!$demo.find("iframe").length) {
					$demo.find(".modal-body").append("<iframe src='http://player.vimeo.com/video/22439234' width='650' height='370' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>")
				}			
			});
			// triggers the off-canvas panel
			$(".sidebar-toggle").click(function (e) {
				e.stopPropagation();
				$(".st-container").toggleClass("nav-effect");
			});
			$(".st-pusher").click(function () {
				$(".st-container").removeClass("nav-effect");
			});
			 // parallax header
			 $('#cover-image').css("background-position", "50% 50%");
			$(window).scroll(function() {
				var scroll = $(window).scrollTop(), 
					slowScroll = scroll/4,
					slowBg = 50 - slowScroll;
					
				$('#cover-image').css("background-position", "50% " + slowBg + "%");
			});
		});
		$(function(){
			var videoImages = document.getElementsByClassName("demo-player");
			for(var i = 0; i < videoImages.length; i++){
				videoImages[i].setAttribute("src","http://img.youtube.com/vi/"+videoImages[i].getAttribute("videoID")+"/0.jpg");
			}
		})
		$(function () {
			var $navDots = $("#hero nav a")
			var $next = $(".slide-nav.next");
			var $prev = $(".slide-nav.prev");
			var $slides = $("#hero .slides .slide");
			var actualIndex = 0;
			var swiping = false;
			var interval;
			$navDots.click(function (e) {
				e.preventDefault();
				if (swiping) { return; }
				swiping = true;
				actualIndex = $navDots.index(this);
				updateSlides(actualIndex);
			});
			$next.click(function (e) {
				e.preventDefault();
				if (swiping) { return; }
				swiping = true;
				clearInterval(interval);
				interval = null;
				actualIndex++;
				if (actualIndex >= $slides.length) {
					actualIndex = 0;
				}
				updateSlides(actualIndex);
			});
			$prev.click(function (e) {
				e.preventDefault();
				if (swiping) { return; }
				swiping = true;
				clearInterval(interval);
				interval = null;
				actualIndex--;
				if (actualIndex < 0) {
					actualIndex = $slides.length - 1;
				}
				updateSlides(actualIndex);
			});
			function updateSlides(index) {
				// update nav dots
				$navDots.removeClass("active");
				$navDots.eq(index).addClass("active");
				// update slides
				var $activeSlide = $("#hero .slide.active");
				var $nextSlide = $slides.eq(index);
				$activeSlide.fadeOut();
				$nextSlide.addClass("next").fadeIn();
				
				setTimeout(function () {
					$slides.removeClass("next").removeClass("active");
					$nextSlide.addClass("active");
					$activeSlide.removeAttr('style');
					swiping = false;
				}, 1000);
			}
			interval = setInterval(function () {
				if (swiping) { return; }
				swiping = true;
				actualIndex++;
				if (actualIndex >= $slides.length) {
					actualIndex = 0;
				}
				updateSlides(actualIndex);
			}, 5000);
			var $videoModal = $(".video-modal");
			$(".demo-player").click(function (elem) {
				var ifr = document.createElement("IFRAME");
				ifr.setAttribute("src","https://www.youtube.com/embed/" + this.getAttribute("videoID") + "?autoplay=1");
				ifr.setAttribute("frameborder","0");
				ifr.setAttribute("autoplay","1");
				ifr.width = 620+"px";
				ifr.height= 350+"px";
				// Lo siguiente puede fallar en IE
				ifr.setAttribute("webkitallowfullscreen","");
				ifr.setAttribute("mozallowfullscreen","");
				ifr.setAttribute("allowfullscreen","");
				document.getElementById("wrap-for-video").appendChild(ifr);
				$videoModal.toggleClass("active");
				clearInterval(interval);
				interval = null;
			});
			$videoModal.click(function () {
				$videoModal.removeClass("active");
				setTimeout(function () {
					$videoModal.find(".wrap").html('');
				}, 1000);
			})
			$videoModal.find(".wrap").click(function (e) {
				e.stopPropagation();
			});
		});
	</script>
</body>

</html>