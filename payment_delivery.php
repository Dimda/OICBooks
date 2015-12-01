<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/payment_delivery.css">
		<title>支払いページ</title>
	</head>
	<body>
		<header>
			<div id="logo">
			<h1>OIC</h1>
			<h1>Books</h1>
			</div>
		</header>
		<h2>お届け先、配送業者、日時指定の設定</h2>

		<?php 
		session_start();
		
		if(isset($_POST["Address1"]))
		{	$_SESSION["address"] = $_POST["Address1"].$_POST["Address2"].$_POST["Address3"];
			echo "ふるいの";
			echo $_SESSION["address"];
		}
		elseif(isset($_POST["newAddress1"]))
		{	$_SESSION["Newadd"] = $_POST["newAddress1"].$_POST["newAddress2"].$_POST["newAddress3"];
			echo "新しいの";
			echo $_SESSION["Newadd"];

		}
		else
		{
			echo "aaaa";
		}


		?>

		<div id="delivery_select">
			<form method="post" action="">
				<p id="delivery">配送業者をお選びください<br/>
				<input type="radio" name="q1" value="ヤマト運輸" checked>ヤマト運輸<br/>
				<input type="radio" name="q1" value="佐川急便" >佐川急便<br/>
				<input type="radio" name="q1" value="日本郵便" >日本郵便<br/>
				</p>
			</form>
		</div>


		<?php
		date_default_timezone_set('Asia/Tokyo');
		$week = array("日", "月", "火", "水", "木", "金", "土");
		$date1 = date("Y/m/d", strtotime('+2 day'));
		$date2 = date("Y/m/d", strtotime('+3 day'));
		$date3 = date("Y/m/d", strtotime('+4 day'));

		$w1 = date('w', strtotime($date1));
		$w2 = date('w', strtotime($date2));
		$w3 = date('w', strtotime($date3));

		?>


		<h3>日にちの指定</h3>
		<select>
			<option value="<?php $date1."(".$week[$w1].")"?>"><?php echo $date1."(".$week[$w1].")"?></option>
			<option value="<?php $date2."(".$week[$w2].")"?>"><?php echo $date2."(".$week[$w2].")"?></option>
			<option value="<?php $date3."(".$week[$w3].")"?>"><?php echo $date3."(".$week[$w3].")"?></option>
		</select>

		<br/>
		<br/>

		<h3>時間の指定</h3>
		<select>
		<option value="10時～12時">10時～12時</option>
		<option value="12時～14時">12時～14時</option>
		<option value="16時～18時">16時～18時</option>
		<option value="18時～20時">18時～20時</option>
		</select>

		<div ID="payment">
				<a href="payment.php" style="text-decoration:none;">指定決定</a>
			</div>


	</body>

</html>