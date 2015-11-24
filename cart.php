<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/main_color.css">
	<link rel="stylesheet" href="CSS/main.css">
	<link rel="stylesheet" href="CSS/cart.css">
   <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<title>カート</title>
</head>
<body>
	<?php include("includes/sidebar.html"); ?>
	<?php include("includes/header.html"); ?>
	<main>
		<h1>ショッピングカート</h1>
		<div class="commodity">
			<?php
				print_r($_SESSION["cart"]);
				include("includes/connect_DB.php");
				$keyword = $_SESSION["cart"][0];
				$sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_ID LIKE '%{$keyword}%'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
          			$matches = glob('./product_image/' . $row["PRODUCT_ID"] . "*");
          			echo  '<div id="box">';
          			echo  '<img class="product-picture" src="' . $matches[0] . '"></br>';
          			echo  '<a class = "product-name" href="product_details.php?ID=' . $row["PRODUCT_ID"] . '">' . $row["PRODUCT_NAME"] .'</a></br>';
          			echo  '<div class="product-price">¥ '. $row["PRODUCT_PRICE"] .'</div></br>';
          			echo  '</div>';
        		}
        		$conn->close();
			?>
		</div>
	</main>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
</body>
</html>