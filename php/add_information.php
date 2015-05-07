<?php
	require_once '../app/init.php';

	$orgName = $_POST['org_Name'];
	
	$db = new Database;
	$auth = new Google_Auth($db,new Google_Client());
	$rm = new Resources_Manager($db);

	if($auth->isLoggedIn()){
		$tab_id = $rm->getNextTabID();
		if($rm->addTab($orgName)){
			echo '{ "success" : true,
					"tab_id" : "'.$tab_id.'" }';
		}else{
			echo '{ "success" : false }';
		}
	}
?>