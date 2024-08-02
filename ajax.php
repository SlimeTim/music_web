<?php
ob_start();
$action = $_GET['action'];
include 'log_sign.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}

if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}

ob_end_flush();
?>
