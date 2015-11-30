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

		<select>
			<option value="<?php $date1."(".$week[$w1].")"?>"><?php echo $date1."(".$week[$w1].")"?></option>
			<option value="<?php $date2."(".$week[$w2].")"?>"><?php echo $date2."(".$week[$w2].")"?></option>
			<option value="<?php $date3."(".$week[$w3].")"?>"><?php echo $date3."(".$week[$w3].")"?></option>
		</select>

		<!-- メモ：前のhtmlからデータを持ってくる -->

	</body>

</html>