<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/mypage.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>注文履歴</title>
</head>
<body>
  <?php include("includes/header.html"); ?>
  <?php include("includes/sidebar.html"); ?>
	<main>

	<?php
	if($id = $_SESSION["CUSTOMER_ID"]){
		$sql = "SELECT PRODUCT_NAME FROM ordered_product WHERE ORDER_ID = (SELECT ORDER_ID FROM order WHERE CUSTOMER_ID = '$id')";
		$result = $conn->query($sql);
		var_dump($result); exit;
		while($row = $result->fetch_assoc()){
			echo $row["PRODUCT_NAME"];
		}
	}
	?>

	</main>
	<?php include ("includes/top.html");?>
	<?php include("includes/footer.html"); ?>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>