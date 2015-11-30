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
				include("includes/connect_DB.php");
				$cart_id = $_SESSION["CART_ID"];
				$sql = "SELECT PRODUCT_ID,QUANTITY FROM CART_PRODUCTS WHERE CART_ID = '$cart_id'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
          			echo $row["PRODUCT_ID"];
          			echo "<br>";
          			echo $row["QUANTITY"];
          			echo "<br>";
        		}
        		$conn->close();
			?>
		</div>
	</main>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
</body>
</html>