<?php

require_once 'app/init.php';

$db = new Database;
$googleClient = new Google_Client();
$auth = new Google_Auth($db,$googleClient);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Sistema de Administracion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme.css">

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/theme.js"></script>
</head>

<body id="signup">
	<header class="navbar navbar-inverse normal" role="banner">
		<?php include('header.php'); ?>
	</header>
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h3 class="logo">
					<a href="#">Sistema de Administración</a>
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper clearfix">
					<div class="formy">
						<div class="row">
							<div class="col-md-12">
								<form role="form">
							  		<div class="submit">
							  			<h3>Inicia sesión con tu cuenta.</h3>
							  			<a href="<?php echo $auth->getAuthUrl(); ?>" class="button-clear">
								  			<span>ENTRAR</span>
								  		</a>
							  		</div>
								</form>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>