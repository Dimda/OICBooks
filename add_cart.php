<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/search_results.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/main_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>カートに追加しました</title>
  <meta charset="utf-8">
</head>
<body>
  <?php include("includes/header.html"); ?>
  <?php include("includes/sidebar.html"); ?>
  <main>
    <div id="add-cart">
    	<h1>カートに追加しました</h1>
    	<?php
			session_start();
	
			array_push($_SESSION["cart"],$_GET["ID"],$_POST["quantity"]);

			print_r($_SESSION["cart"]);
		?>
    </div>
  </main>
 <?php include ("includes/top.html");?>
 <?php include("includes/footer.html"); ?>
</body>
</html>
