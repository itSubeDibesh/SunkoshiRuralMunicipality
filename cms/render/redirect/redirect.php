<?php 
	require $_SERVER['DOCUMENT_ROOT'].'/conf/init.php';
	require '../login/checklogin.php';
	
	$officer = new Officer();
	$details = $officer->getByLogineID($_SESSION['LoginId']);
	$login = new Login();

	$info = $login->getUserByLoginID($details[0]->LoginId);
	if(isset($_SESSION,$_SESSION['Role']) && !empty($_SESSION['Role'])){
		if($details[0]->OfficerId!=""){		
			redirect(CMS_URL.'/dashbord.php');
		}else{
			redirect(CMS_URL.'/', 'error', 'You are not authorized to access this page.');
		}	
	}else{
		redirect(CMS_URL.'/', 'error', 'You are not allowed to access this page.');
	}
