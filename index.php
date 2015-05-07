<?php

require_once 'app/init.php';

$db = new Database;
$googleClient = new Google_Client();
$auth = new Google_Auth($db,$googleClient);
$client = new Resources_Manager(new Database);
$orgName = "feitesm";

if($auth->checkRedirectCode())
{
	header('Location index.php');
}
//echo $client->getOrgID($orgName);

// Datos para tabs
$tabsInfo = $client->getTabsInfo($orgName);
$tabs_head = "";
$tabs_content = "";
if($tabsInfo->num_rows > 0)
{	
	$flag = "active";
	$flag2 ="a";
	while($row = $tabsInfo->fetch_assoc()){
		$tabs_head .='<li> <a class="editable" href="' .'#'. $row["id_inf"] . '" data-toggle="tab">'.$row["tabla_titulo"].'</a></li>';
		$tabs_content .= '<div class="tab-pane fade" id="'.$row["id_inf"].'">
							<div class="col-md-6 info">
								<h4 class ="editable">'.$row["titulo"].'</h4>
								<p class="editable">
									'.$row["contenido"].'
								</p>
							</div>
							<div class="col-md-6 image">
								<img src="'.$row["img_url"].'" class="img-responsive editable" alt="Foto"/>
							</div>
						</div>';
	}
}
?>

<!--
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FEITESM</title>
	</head>
	<body>
		<?php //if(!$auth->isLoggedIn()): ?>
			<a href="<?php echo $auth->getAuthUrl(); ?>"> Sign In</a>
		<?php //else: ?>
			Edit Mode <a href="logout.php">Sign Out</a>
		<?php //endif; ?>
	</body>
</html>
-->

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Federaci&oacute;n de Estudiantes del Tecnol&oacute;gico de Monterrey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="images/icon/favicon.ico">

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
	<script src="js/theme.js"></script>
	<script src="js/admin.js"></script>

</head>

<body id="home3">

	<div class="st-container">
		<nav class="nav-menu">
			<h3>Men&uacute;</h3>
			
			<a href="CAM/principalCAM.html" class="item">
				Consejo de Acciones por M&eacute;xico (CAM)
			</a>
			<a href="CARE/principalCARE.html" class="item">
				Consejo de Asociaciones Regionales y Extranjeras (CARE)
			</a>
			<a href="CCE/principalCCE.html" class="item">
				Consejo de Comunidades Estudiantiles (CCE)
			</a>
			<a href="CEF/principalCEF.html" class="item">
				Consejo Estudiantil de Filantrop&iacute;a (CEF)
			</a>
			<a href="CSA/principalCSA.html" class="item">
				Consejo de Sociedades de Alumnos (CSA)
			</a>
			<a href="contactus.html" class="item">
				Contacto
			</a>

			<div class="social">
				<a href="#">
					<i class="fa fa-twitter"></i>
				</a>
				<a href="#">
					<i class="fa fa-facebook"></i>
				</a>
				<a href="#">
					<i class="fa fa-google-plus"></i>
				</a>
				<a href="#">
					<i class="fa fa-youtube-play"></i>
				</a>
			</div>
		</nav>

		<div class="st-pusher">
			<div class="st-content">

				<header class="navbar navbar-inverse hero" role="banner">
					<div class="container head">
						<div class="navbar-header">
							<a href="index.html" class="navbar-brand">FEITESM</a>
						</div>
						<div class="sidebar-toggle">
							<div class="line"></div>
							<div class="line"></div>
							<div class="line"></div>
						</div>
					</div>
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
										<!--<div class="cta">
											<a href="features.html" class="button-outline">
												TRY IT FREE
												<i class="fa fa-chevron-right"></i>
											</a>
										</div>-->
									</div>
									<div class="col-sm-6 hidden-xs mobiles">
										<!-- <img src="images/static-hero.png" class="animated fadeInLeft" alt="devices" /> -->
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
								<!--<h1 class="hero-text animated fadeInLeft">
									LOVE FEST
								</h1>
								<p class="sub-text animated fadeInLeft">
									What do you love?
								</p>
								<div class="cta animated fadeInRight">
									<a href="features.html" class="button-outline">See the tour</a>
									<a href="signup.html" class="button">Sign up free</a>
								</div>-->
							</div>
						</div>
					</div>

					<div class="video-modal">
						<div class="wrap" id="wrap-for-video">
						</div>
					</div>
				</div>
				<div id="tabs">
					<div class="container">
						<div class="row header">
							<div class="col-md-12">
								<h3>FEITESM</h3>
								<p>Federaci&oacute;n de Estudiantes del Tecnol&oacute;gico de Monterrey, Campus Monterrey.</p>
							</div>
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

				<div id="grid-first">
					<div class="container">
						<div class="row header">
							<h3>Nuestro equipo</h3>
						</div>
						<div class="row sections">
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/PRESIDENTE.png" class="img-responsive" alt="services1"/>
										<strong>Rolando Andr&eacute;s Ram&iacute;rez</strong><br>
										Presidente
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/VICEPRESIDENTE.png" class="img-responsive" alt="services1"/>
										<strong>Mayra Gabriela Garc&iacute;a</strong><br>
										Vicepresidente
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/SECRETARIA.png" class="img-responsive" alt="services1"/>
										<strong>Rigoberto G&oacute;mez</strong><br>
										Secretar&iacute;a General
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/PLANEACION.png" class="img-responsive" alt="services1"/>
										<strong>Perla Caballero</strong><br>
										Director de Planeaci&oacute;n
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/FINANZAS.png" class="img-responsive" alt="services1"/>
										<strong>Nancy Bautista</strong><br>
										Director de Finanzas
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/COMUNICACION.png" class="img-responsive" alt="services1"/>
										<strong>Estefan&iacute;a Leal</strong><br>
										Director de Comunicaci&oacute;n e Imagen
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/CAM.png" class="img-responsive" alt="services1"/>
										<strong>Ceci Fern&aacute;ndez</strong><br>
										Director Consejo de Acciones por M&eacute;xico
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/CARE.png" class="img-responsive" alt="services1"/>
										<strong>Martha Alejandra Paredes</strong><br>
										Director Consejo de Asociaciones Regionales y Extranjeras
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/CCE.png" class="img-responsive" alt="services1"/>
										<strong>Rafa V&eacute;lez</strong><br>
										Director Consejo de Comunidades y Cap&iacute;tulos Estudiantiles
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/CEF.png" class="img-responsive" alt="services1"/>
										<strong>Lore Flores</strong><br>
										Director Consejo Estudiantil de Filantrop&iacute;a
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="section">
									<div class="pic">
										<img src="images/feitesm/equipo/CSA.png" class="img-responsive" alt="services1"/>
										<strong>Melissa Moya</strong><br>
										Director Consejo de Sociedades de Alumnos
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="footer">
					<div class="container">
						<div class="row">
							<div class="col-sm-3 copyright">
								FEITESM 2015
							</div>
							<div class="col-sm-6 menu">
								<ul>
									<li>
										<a href="CAM/principalCAM.html">CAM</a>
									</li>
									<li>
										<a href="CARE/principalCARE.html">CARE</a>
									</li>
									<li>
										<a href="CCE/principalCCE.html">CCE</a>
									</li>
									<li>
										<a href="CEF/principalCEF.html">CEF</a>
									</li>
									<li>
										<a href="CSA/principalCSA.html">CSA</a>
									</li>
									<li>
										<a href="contactus.html">Contacto</a>
									</li>
								</ul>
							</div>
							<div class="col-sm-3 social">
								<a href="http://www.facebook.com/feitesm.mty" target="_blank">
									<img src="images/social/social-fb.png" alt="twitter" />
								</a>
								<a href="http://www.twitter.com/feitesm_mty" target="_blank">
									<img src="images/social/social-tw.png" alt="twitter" />
								</a>
							</div>
						</div>
					</div>
				</div>

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