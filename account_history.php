<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/account_history.css" media="all">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<title>注文履歴</title>
</head>
<body>
	<?php include("includes/header.html"); ?>
	<?php include("includes/sidebar.html"); ?>
	<?php include("includes/connect_DB.php"); ?>
	<main>

		<table class="v">
			<tr>
				<th>注文日</th>
				<th>商品名</th>
				<th>合計金額</th>
			</tr>
			<?php
			ini_set( 'display_errors', 1 );
			if($id = $_SESSION["CUSTOMER_ID"]){
				$sql = "SELECT `PRODUCT_NAME`, `PURCHASE_DATE`, `PRODUCT_PRICE` FROM `ordered_product` NATURAL JOIN `product` WHERE `ORDER_ID` IN (SELECT `ORDER_ID` FROM `order` WHERE `CUSTOMER_ID` = $id) ORDER BY `PURCHASE_DATE` DESC";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					?>
					<?php
					echo	"<tr>";
					echo	"<td>".$row["PURCHASE_DATE"]."</td>";
					echo	"<td>".$row["PRODUCT_NAME"]."</td>";
					echo	"<td>¥".$row["PRODUCT_PRICE"]."</td>";
					echo  "</tr>";

				}
				$conn->close();
			}
			?>
		</table>

	</main>
	<?php include ("includes/top.html");?>
	<?php include("includes/footer.html"); ?>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>