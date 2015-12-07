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
					?>
				</div>
			</div>
			<div id="onfirmation">
				<div id="payment" class="box">
					<p><b>お支払い方法</b>	</p>
					<?php 
						echo "aaaaaaaaaaaa";
					?>
				</div>
			</div>
			<div id="onfirmation">
				<div id="point" class="box">
					<p><b>ポイント</b></p>
					<?php 
						echo "aaaaaaaaaaaa";
					?>
				</div>
			</div>
			<div id="onfirmation">
				<div id="delivery_schedule">
					<h3>お届け予定日: </h3>
					<?php
					if(isset($_POST["delivery"]))
					{
						$delivery = $_POST["delivery"];
						echo $delivery;
					}
					echo "<br/>";
					if(isset($_POST["day_select"]))
					{
						$day_select = $_POST["day_select"];
						echo $day_select;
					}
					echo "<br/>";
					if(isset($_POST["time_select"]))
					{
						$time_select = $_POST["time_select"];
						echo $time_select;
					}
					?>
				</div>
			</div>
		</div><div id="boxB">
			<div id="confirm">
				<a href="">注文を確定する</a>
				<p><b>注文内容</b></p>
				<p>商品: </p>
				<p>配達料・手数料: </p>
				<p id="total">注文合計: </p>
			</div>
		</div>
	</main>
</body>
</html>