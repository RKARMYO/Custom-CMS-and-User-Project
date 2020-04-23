<?php
	header("Access-Control-Allow-Origin:*");
	include_once("../controller/userController.php");

	$controller = new Controller();
	$controller->userakm();
?>