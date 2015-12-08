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
				$sql = "SELECT PRODUCT_ID,QUANTITY FROM CART_PRODUCTS WHERE CART_ID = '$cart_id'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					echo  '<div id="box">';
          			$quantity = $row["QUANTITY"];
          			$id = $row["PRODUCT_ID"];
          			$sql = "SELECT PRODUCT_NAME, PRODUCT_PRICE  FROM PRODUCT WHERE PRODUCT_ID = '$id'";
          			$price = $conn->query($sql);
          			$price = $price->fetch_assoc();
          			echo $price["PRODUCT_NAME"];
          			echo '<br/>'.$quantity.'冊';
          			echo  '<div class="product-price">¥ '. $price["PRODUCT_PRICE"].'</div></br>';
          			$sum += $price["PRODUCT_PRICE"];
				}
				echo '<div class="sum">合計'.$sum."円</div><br/>";
				echo '<a href="payment_destination.php" style="text-decoration:none;">ＯＫ</a>';
				echo '<a href="cart.php" style="text-decoration:none;">変更</a>';

				echo '<form action="payment_destination.php" method="POST">';
				echo '<input type="hidden" name="sum" value="echo $sum"/>';
				echo '<input type="submit" value="送信"/>';
				echo '</form>';
			?>

		</div>



	</body>
</html>
