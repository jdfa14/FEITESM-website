<?php
	require_once '../app/init.php';

	$tab_id = $_POST['tab_id'];
	
	$db = new Database;
	$auth = new Google_Auth($db,new Google_Client());
	$rm = new Resources_Manager($db);

	if($auth->isLoggedIn()){
		if($rm->removeTab($tab_id)){
			echo '{ "success" : true }';
		}else{
			echo '{ "success" : false }';
		}
	}
?>