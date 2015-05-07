<?php
	//if(isset($_POST["submit"])){
		// Checking For Blank Fields..

		require_once('PHPMailer/class.phpmailer.php');
		require 'PHPMailer/PHPMailerAutoload.php';

		define('GUSER', 'feitesm.website@gmail.com'); // GMail username
		define('GPWD', 'feitesm2015'); // GMail password

		function smtpmailer($to, $from, $from_name, $subject, $body) {
			global $error;
			$mail = new PHPMailer();  // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true;  // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->Username = GUSER;
			$mail->Password = GPWD;
			$mail->SetFrom($from, $from_name);
			$mail->Subject = $subject;
			$mail->Body = $body;
			$mail->AddAddress($to);
			if(!$mail->Send()) {
				$error = 'Mail error: '.$mail->ErrorInfo;
				echo $error;
				return false;
			} else {
				$error = 'Message sent!';
				return true;
			}
		}
		if (!isset($_POST["name"])||!isset($_POST["email"])||!isset($_POST["message"])||!isset($_POST["to"])||!isset($_POST['pathRedireccion'])){
			die("Datos incompletos");
		} else {
			$path = $_POST['pathRedireccion'];
			smtpmailer($_POST["to"], 'feitesm.website@gmail.com', 'FEITESM', $_POST["subject"] . " de ". $_POST["email"], $_POST["message"]);
			
		}
	//}
	echo "<script language='javascript'>
	alert('Gracias por tu mensaje!'); 
	window.location.href = '$path';
	</script>";
?>