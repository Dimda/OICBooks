<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/payment_destination.css">
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
		
		<div id="address_select">
			<?php
			session_start();
			include("includes/connect_DB.php"); 

			$member_ID = $_SESSION["CUSTOMER_ID"];
      		$sql = "SELECT FIRST_NAME, LAST_NAME, ZIP_CODE, ADDRESS_STREET_1, ADDRESS_STREET_2, ADDRESS_STREET_3 FROM customer WHERE CUSTOMER_ID LIKE '$member_ID'";
			$result = $conn->query($sql);

			while($row = $result->fetch_assoc()){

				$firstname = $row["FIRST_NAME"];
				$lastname = $row["LAST_NAME"];
				$zipcode = $row["ZIP_CODE"];
				$addressStreet1 = $row["ADDRESS_STREET_1"];
				$addressStreet2 = $row["ADDRESS_STREET_2"];
				$addressStreet3 = $row["ADDRESS_STREET_3"];
			}

			$conn->close();
			?>
		</div>
		<h3>ご登録された住所</h3>

		<form action="payment_delivery.php" name="Address" method="post">
			<p>氏名:</p>
			<input type="text" name="Name" size="30"　maxlength="25" value="<?php echo $firstname .$lastname; ?>">

			<p>郵便番号:</p>
			<input type="text" name="Zip" size="10" maxlength="7" value="<?php echo $zipcode; ?>">

			<p>住所1:(例：大阪府大阪市)</p>
			<input type="text" name="Address1" size="30" maxlength="30" value="<?php echo $addressStreet1; ?>">

			<p>住所2:(例:天王寺区○○)</p>
			<input type="text" name="Address2" size="30" maxlength="30" value="<?php echo $addressStreet2; ?>">

			<p>住所3:(例:ｘｘマンション701</p>
			<input type="text" name="Address3" size="30" maxlength="30" value="<?php echo $addressStreet3; ?>"><br/>
				<br/>
			<input type="submit" name="btn" value="送信">
		</form>

		<h3>新しい住所を追加する</h3>

		<form action="payment_delivery.php" name="Address" method="post" >
			<p>氏名:</p>
			<input type="text" name="Name" size="30" maxlength="25">

			<p>郵便番号:</p>
			<input type="text" name="Zip" size="10" maxlength="7">

			<p>住所1:(例：大阪府大阪市)</p>
			<input type="text" name="Address1" size="30" maxlength="30">

			<p>住所2:(例:天王寺区○○)</p>
			<input type="text" name="Address2" size="30" maxlength="30">

			<p>住所3:(例:ｘｘマンション701</p>
			<input type="text" name="Address3" size="30" maxlength="30"><br/>
			<br/>
			<input type="submit" name="btn" value="送信">
		</form>

	</body>
</html>