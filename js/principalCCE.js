var xmlhttp = new XMLHttpRequest();
var url = "https://spreadsheets.google.com/feeds/cells/1cBfce3qNwrXgEFhRQ1KuWrZBxjFot4nvPLm-1k-RR-Q/o3myty6/public/basic?hl=en_US&alt=json";

xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		var jsonResponse = JSON.parse(xmlhttp.responseText);
		getInformation(jsonResponse);
	}
}
xmlhttp.open("GET", url, true);
xmlhttp.send();

function getInformation(response) {
	var i;
	var arrInfo = response.feed.entry;
	var quienessomos_p = document.getElementById("quienessomosParrafo");
	var correo_p = document.getElementById("correoContacto");
	var oficina_p = document.getElementById("oficinaContacto");
	var facebook_p = document.getElementById("facebookRS");
	var twitter_p = document.getElementById("twitterRS");
	var instagram_p = document.getElementById("instagramRS");
	for(i in arrInfo) {
		if(arrInfo[i].title.$t == "A2") {
			quienessomos_p.firstChild.data = arrInfo[i].content.$t;
		}
		else if(arrInfo[i].title.$t == "C2") {
			//facebook_p.firstChild.data = arrInfo[i].content.$t;
		}
		else if(arrInfo[i].title.$t == "C3") {
			//twitter_p.firstChild.data = arrInfo[i].content.$t;
		}
		else if(arrInfo[i].title.$t == "C4") {
			//instagram_p.firstChild.data = arrInfo[i].content.$t;
		}
	}
}