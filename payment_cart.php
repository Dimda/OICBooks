<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/payment_cart.css">
		<title>支払いページ</title>
	</head>
	<body>
		<header>
			<div id="logo">
			<h1>OIC</h1>
			<h1>Books</h1>
			</div>
		</header>
		<h2>カートの内容の変更と確認</h2>

		<div id="cart_select">
				<?php
				session_start();
				include("includes/connect_DB.php");
				$sum = 0;
				$cart_id = $_SESSION["CART_ID"];
				$sql = "SELECT PRODUCT_NAME,QUANTITY FROM PRODUCTS WHERE PRODUCT_ID = (SELECT PRODUCT_ID FROM CART_PRODUCT WHERE CART_ID = '$cart_id' )";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
				$matches = glob('./product_image/' . $row["PRODUCT_ID"] . "*");
					echo  '<div id="box">';
					echo $row["PRODUCT_NAME"];
          			echo "<br>";
					echo "個数は";
          			echo $row["QUANTITY"];
          			echo "<br>";
          			$id = $row["PRODUCT_ID"];
          			$sql = "SELECT PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_ID = '$id'";
          			$price = $conn->query($sql);
          			$price = $price->fetch_assoc();
          			echo  '<div class="product-price">¥ '. $price["PRODUCT_PRICE"].'</div></br>';
          			echo "合計".$price["PRODUCT_PRICE"]*$row["QUANTITY"]."円";
          			echo '<br>';
          			echo '<form method="POST" action="cart_delete.php?ID='.$id.'">';
				}

				echo '<a href="payment_destination.php" style="text-decoration:none;">お支払い</a>';
			?>

		</div>



	</body>
</html>
