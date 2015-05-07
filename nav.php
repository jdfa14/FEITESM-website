<nav class="nav-menu">
	<h3>Consejos</h3>
	
	<a href="/feitesm-website/CAM/cam.php" class="item">
		Consejo de Acciones por México (CAM)
	</a>
	<a href="/feitesm-website/CARE/care.php" class="item">
		Consejo de Asociaciones Regionales y Extranjeras (CARE)
	</a>
	<a href="/feitesm-website/CCE/CCE.php" class="item">
		Consejo de Comunidades Estudiantiles (CCE)
	</a>
	<a href="/feitesm-website/CEF/CEF.php" class="item">
		Consejo Estudiantil de Filantrop&iacute;a (CEF)
	</a>
	<a href="/feitesm-website/CSA/CSA.php" class="item">
		Consejo de Sociedades de Alumnos (CSA)
	</a>
	<a href="/feitesm-website/contactus.html" class="item">
		Contacto
	</a>
	<?php if($auth->isLoggedIn()): ?>
	<a href="logout.php">Cerrar Sesion</a>
	<?php endif; ?>

	<div class="social">
		<a href="http://www.twitter.com/feitesm_mty">
			<i class="fa fa-twitter"></i>
		</a>
		<a href="http://www.facebook.com/feitesm.mty">
			<i class="fa fa-facebook"></i>
		</a>
	</div>
</nav>