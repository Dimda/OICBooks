<?php
	session_start();
	
	array_push($_SESSION["cart"],$_GET["ID"],$_POST["quantity"]);

	print_r($_SESSION["cart"]);
?>