<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="CSS/payment.css">
	<title>支払いページ</title>
</head>
<body>
	<header>
		<div id="logo">
		<h1>OIC</h1>
		<h1>Books</h1>
		</div>
	</header>
	<main>
		<h2>注文内容の確認・変更</h2>
		<div id="boxA">
			<div id="onfirmation">
				<div id="address" class="box">
					<p><b>お届け先住所</b></p>
					<?php
					session_start();
					echo $_SESSION["address"];
					echo '<form action="payment_destination.php">
            					<input type="submit" value="変更する">
            			</form>';
					?>
				</div>
			</div>
			<div id="onfirmation">
				<div id="payment" class="box">
					<p><b>お支払い方法</b>	</p>
					<?php 
						echo "銀行ふりこみ";
					?>
				</div>
			</div>
			<div id="onfirmation">
				<div id="point" class="box">
					<p><b>ポイント</b></p>
					<?php 
						include("includes/connect_DB.php");
						$id = $_SESSION["CUSTOMER_ID"];
						$sql =  "SELECT POINT FROM CUSTOMER WHERE CUSTOMER_ID = '$id'";
						$result = $conn->query($sql);
            			$row = $result->fetch_assoc();
            			echo "現在所有POINTは".$row["POINT"]."です";
            			if(isset($_POST["point"])){
							$point=$_POST["point"];
						}else {
							$point = 0;
						}
            			echo '<form method= "POST" action="payment.php">
            					<input type="number" name="point" value='.$point.' max='.$row["POINT"].' min=0>
            					<input type="submit" value="使用">
            					</form>';
            			$conn->close();
					?>
				</div>
			</div>
			<div id="onfirmation">
				<div id="delivery_schedule">
					<h3>お届け予定日: </h3>
					<?php
					if(isset($_POST["delivery"]))
					{
						$_SESSION["delivery"] = $_POST["delivery"];
						echo $_SESSION["delivery"];
					}else
					{
						echo $_SESSION["delivery"];
					}
					echo "<br/>";
					if(isset($_POST["day_select"]))
					{
						$_SESSION["day_select"] = $_POST["day_select"];
						echo $_SESSION["day_select"];
					}else
					{
						echo $_SESSION["day_select"];
					}
					echo "<br/>";
					if(isset($_POST["time_select"]))
					{
						$_SESSION["time_select"] = $_POST["time_select"];
						echo $_SESSION["time_select"];
					}else
					{
						echo $_SESSION["time_select"];
					}
					echo '<form action="payment_delivery.php">
            					<input type="submit" value="変更する">
            			</form>';
					?>
				</div>
			</div>
		</div><div id="boxB">
			<div id="confirm">
				<a href="">注文を確定する</a>
				<p><b>注文内容</b></p>
				<p>商品合計: 
					<?php
						echo $_SESSION["SUM"].'円';
					?>
				</p>
				<p>配達料・手数料: 
					<?php
						echo "全国一律300円";
					?>
				</p>
				<p>使用POINT 
					<?php
						if(isset($_POST["point"])){
							echo "-".$_POST["point"];
						}else{
							echo "-"."0";
						}
					?>
				</p>
				<p id="total">注文合計: 
					<?php
						if(isset($_POST["point"])){
							$order_sum = $_SESSION["SUM"] + 300 -$_POST["point"];
						}else{
							$order_sum = $_SESSION["SUM"] + 300;
						}
						echo $order_sum.'円';
					?>
				</p>
				<p>付与POINT 
					<?php
						echo floor($order_sum * 0.05);
					?>
				</p>
			</div>
		</div>
	</main>
</body>
</html>