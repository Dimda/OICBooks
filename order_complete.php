<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/payment_cart.css">
		<title>ありがとうございました</title>
	</head>
	<body>
		<header>
			<div id="logo">
			<h1>OIC</h1>
			<h1>Books</h1>
			</div>
		</header>
		<h2>メールを送信しました</h2>

		<div id="cart_select">
		<?php
			session_start();
			include("includes/connect_DB.php");
			$customer_id  = $_SESSION["CUSTOMER_ID"];
			$billing_name = $_SESSION["CUSTOMER_NAME"];
			$delivery_name= $_SESSION["delivery_name"];
			$email_address= $_SESSION["EMAIL_ADDRESS"];
			$date 		  = date('Y-m-d H:i:s');
			$order_status_description = "test";
			$billing_address = $_SESSION["BILLING_ADDRESS"];
			$delivery_address = $_SESSION["delivery_zip"].$_SESSION["address"];

			
			$sql =  "INSERT INTO `order` (`ORDER_ID`, `CUSTOMER_ID`, `BILLING_NAME`, `DELIVERY_NAME`, `EMAIL_ADDRESS`, `PURCHASE_DATE`, `ORDER_STATUS_DESCRIPTION`, `BILLING_ADDRESS`, `DELIVERY_ADDRESS`)
			 VALUES (NULL, '$customer_id', '$billing_name', '$delivery_name', '$email_address', '$date ', '$order_status_description', '$billing_address', '$delivery_address');";
			$conn->query($sql);
			$order_id = $conn->insert_id;
			$cart_id = $_SESSION["CART_ID"];
			$sql = "SELECT PRODUCT_ID,QUANTITY FROM CART_PRODUCTS WHERE CART_ID = '$cart_id'";
			$result = $conn->query($sql);

			while($row = $result->fetch_assoc()){
				$product_id = $row["PRODUCT_ID"];
				$quantity = $row["QUANTITY"];
				$sql = "SELECT PRODUCT_NAME,PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_ID = '$product_id'";
				$product_detail = $conn->query($sql);

				while($row = $product_detail->fetch_assoc()){
					$product_name = $row["PRODUCT_NAME"];
					$product_price= $row["PRODUCT_PRICE"];
				}
				$sql =  "INSERT INTO `ordered_product` (`ORDERED_PRODUCT_ID`, `PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `QUANTITY`, `ORDER_ID`)
			 				VALUES (NULL, '$product_id','$product_name','$product_price','$quantity','$order_id');";
				$conn->query($sql);
			}


			$sql =  "UPDATE CART SET CART_STATUS = 'FINISH' WHERE CART_ID = '$cart_id'";
    		$conn->query($sql);

    		$sql = "INSERT INTO CART (CUSTOMER_ID,CART_DATE_ADDED,CART_STATUS) VALUES ('$customer_id','$date','add-test')";
        	$conn->query($sql);

        	$sql =  "SELECT CART_ID FROM CART WHERE CUSTOMER_ID = '$customer_id' and CART_STATUS <> 'FINISH'";
        	$result = $conn->query($sql);
        	$row = $result->fetch_assoc();

       		$_SESSION["CART_ID"] = $row["CART_ID"];
			





			echo $_SESSION["order_sum"];
			echo "<br>";
			echo $_SESSION["add_customer_point"];
			echo "<br>";
			echo $_SESSION["take_customer_point"];
			echo "<br>";
			echo $_SESSION["delivery"];
			echo "<br>";
			echo $_SESSION["day_select"];
			echo "<br>";
			echo $_SESSION["time_select"];
			echo "<br>";

			echo "customer_id=".$_SESSION["CUSTOMER_ID"]."<br>";
			echo "billing_name=".$_SESSION["CUSTOMER_NAME"]."<br>";
			echo "delivery_name=".$_SESSION["delivery_name"]."<br>";
			echo "email_address=".$_SESSION["EMAIL_ADDRESS"]."<br>";
			echo "purchase_date=".$date."<br>";
			echo "order_status="."test"."<br>";
			echo "billing_address=".$_SESSION["BILLING_ADDRESS"]."<br>";
			echo "delivery_address=".$_SESSION["delivery_zip"].$_SESSION["address"]."<br>";






			echo '<div class="sum"></div><br/>';
			$conn -> close();
		?>
		</div>
	</body>
</html>