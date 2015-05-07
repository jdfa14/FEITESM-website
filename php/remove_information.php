<?php
	require_once '../app/init.php';

	$id_inf = $_POST['id_inf'];
	
	$db = new Database;
	$auth = new Google_Auth($db,new Google_Client());
	$rm = new Resources_Manager($db);

	if($auth->isLoggedIn()){
		if($rm->removeTab($id_inf)){
			echo json_encode(array('success' => true),JSON_FORCE_OBJECT);
		}else{
			echo json_encode(array('success' => false),JSON_FORCE_OBJECT);
		}
	}
?>