<?php
	header("Access-Control-Allow-Origin:*");
	session_start();
	if(isset($_GET['code']))
	{
		$codeNo=$_GET['code'];
		$_SESSION['code']=$codeNo;
		$_SESSION['userId']=$_GET['id'];
	}
	
	if($_SESSION['code']!='5542587')
	{
		exit();
	}

	include_once("controller/Controller.php");
	$controller = new Controller();
	$controller->invoke();
?>