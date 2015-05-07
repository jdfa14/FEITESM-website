<?php
	require_once '../app/init.php';

	$id_int = $_POST['id_int'];
	$name_org = $_POST['name_org'];
	$nombres = $_POST['nombres'];
	$apellido_p = $_POST['apellido_p'];
	$apellido_m = $_POST['apellido_m'];
	$cargo = $_POST['cargo'];
	$img_url = $_POST['img_url'];

	$db = new Database;
	$auth = new Google_Auth($db,new Google_Client());
	$rm = new Resources_Manager($db);

	if($auth->isLoggedIn()){
		if($rm->actualizaIntegrante($name_org,$nombres,$apellido_p,$apellido_m,$cargo,$img_url,$id_int)){
			echo json_encode(array('success' => true, 'id_int' => $id_int, 'nombres' => $nombres, 'apellido_p' => $apellido_p,
			'apellido_m' => $apellido_m, 'cargo'=> $cargo, 'img_url' => $img_url),JSON_FORCE_OBJECT);
		}else{
			echo json_encode(array('success' => false),JSON_FORCE_OBJECT);
		}
	}
?>