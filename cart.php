<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/main_color.css">
	<link rel="stylesheet" href="CSS/main.css">
	<link rel="stylesheet" href="CSS/cart.css">
	<link rel="stylesheet" type="text/css" href="css/search_results.css" media="all">
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
				$sum = 0;
				$cart_id = $_SESSION["CART_ID"];
				$sql = "SELECT PRODUCT_ID,QUANTITY FROM CART_PRODUCTS WHERE CART_ID = '$cart_id'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					$matches = glob('./product_image/' . $row["PRODUCT_ID"] . "*");
					echo  '<div id="box">';
					echo $row["PRODUCT_ID"];
          			echo "<br>";
					echo  '<img class="product-picture" src="' . $matches[0] . '"></br>';
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
          			echo '<input type="submit" name="" value="削除">';
          			echo '</form>';
          			echo '<form method="POST" action="cart_change.php?ID='.$id.'">';
          			echo '<input type="number" min="0" name="QUANTITY" value="0">';
          			echo '<input type="submit" name="add-cart" value="数量変更">';
					echo '</form>';
          			echo  '</div>';
          			$sum = $sum + $price["PRODUCT_PRICE"]*$row["QUANTITY"];
        		}
        		$conn->close();
			?>
		</div>
		<?php
			if($sum == 0){
        		echo '<div id="none">';
        		echo "カートの中は空です";
        		echo '</div>';
        	}else{
        		echo '<div id="payment">';
        		echo "カートの合計は";
        		echo $sum;
        		echo "円です";
        		echo '<br>';
        		echo '<a href="payment_destination.php" style="text-decoration:none;">お支払い</a>';
        		echo "</div>";
        	}
		?>
	</main>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
</body>
</html>