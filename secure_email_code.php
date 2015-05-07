<?php
	//if(isset($_POST["submit"])){
		// Checking For Blank Fields..
		if (!isset($_POST["name"])||!isset($_POST["email"])||!isset($_POST["message"])){
			die("Datos incompletos");
		} else {
			$alert = "";
			// Check if the "Sender's Email" input field is filled out
			$email = $_POST['email'];
			// Sanitize E-mail Address
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			// Validate E-mail Address
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!$email) {
			$alert = "alert('Invalid Sender's Email')";
		} else {
			$subject = isset($_POST['subject'])? $_POST['subject'] : "Sin asunto";
			$message = $_POST['message'];
			$headers = 'From:'. $email . "\r\n"; // Sender's Email
			$headers .= 'Cc:'. $email . "\r\n"; // Carbon copy to Sender
			// Message lines should not exceed 70 characters (PHP rule), so wrap it
			$message = wordwrap($message, 70);
			// Send Mail By PHP Mail Function
			$resp = mail('robert_rivmtz@hotmail.com', $subject, $message, $headers);
			if($resp){
			 echo "success";
 			 }else{
 			echo "failed."; 
  			}
			$alert = 'alert("Tu email se ha enviado, gracias!")';
			}
		}
	//}
	//echo "<script language='javascript'>
	//$alert 
	//window.location.href = 'contactus.html'
	//</script>";
?>