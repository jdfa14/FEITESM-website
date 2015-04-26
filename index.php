<?php

require_once 'app/init.php';

$db = new Database;
$googleClient = new Google_Client();
$auth = new Google_Auth($db,$googleClient);

if($auth->checkRedirectCode())
{
	header('Location index.php');
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FEITESM</title>
	</head>
	<body>
		<?php if(!$auth->isLoggedIn()): ?>
			<a href="<?php echo $auth->getAuthUrl(); ?>"> Sign In</a>
		<?php else: ?>
			Edit Mode <a href="logout.php">Sign Out</a>
		<?php endif; ?>
	</body>
</html>