function validateEmailFields(){
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var phone = document.getElementById('phone').value;
	var message = document.getElementById('message').value;
	if (name.trim() == ""){
		alert("Favor de ingresar un nombre");
		return false;
	}
	if (email.trim() == ""){
		alert("Favor de ingresar un email");
		return false;
	}
	if (message.trim() == ""){
		alert("Favor de ingresar un mensaje");
		return false;
	}
}