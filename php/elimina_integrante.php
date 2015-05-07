<?php
	require_once '../app/init.php';

	$id_int = $_POST['id_int'];

	$db = new Database;
	$auth = new Google_Auth($db,new Google_Client());
	$rm = new Resources_Manager($db);

	if($auth->isLoggedIn()){
		if($rm->eliminaIntegrante($id_int)){
			echo json_encode(array('success' => true, 'id_int' => $id_int ),JSON_FORCE_OBJECT);
		}else{
			echo json_encode(array('success' => false),JSON_FORCE_OBJECT);
		}
	}
?>