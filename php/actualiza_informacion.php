<?php
	require_once '../app/init.php';

	$id_inf = $_POST['id_inf'];
	$tab_name = $_POST['tab_name'];
	$titulo = $_POST['titulo'];
	$contenido = $_POST['contenido'];
	$img_url = $_POST['img_url'];
	$contacto = $_POST['contacto'];
	$redes = $_POST['redes'];

	
	$db = new Database;
	$auth = new Google_Auth($db,new Google_Client());
	$rm = new Resources_Manager($db);

	if($auth->isLoggedIn()){
		if($rm->actualizaInformacion($tab_name,$titulo,$contenido,$img_url,$contacto,$redes,$id_inf)){
			echo json_encode(array('success' => true, 'id_inf' => $id_inf, 'tab_name' =>$tab_name ,'titulo' => $titulo, 'contenido' => $contenido, 'img_url' => $img_url,'contacto' => $contacto, 'redes' => $redes),JSON_FORCE_OBJECT);
		}else{
			echo json_encode(array('success' => false, 'message' => $rm->getDBError()),JSON_FORCE_OBJECT);
		}
	}
?>