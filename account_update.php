<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>アカウント設定の変更</title>
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/mypage.css" media="all">
	<link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<?php include("includes/sidebar.html"); ?>
	<?php include("includes/header.html"); ?>
	<?php include("includes/connect_DB.php"); ?>
	<main>
		<h1>アカウント設定の変更</h1>
		<?php
		if($id = $_SESSION["CUSTOMER_ID"]){
			$sql = "SELECT CUSTOMER_ID, FIRST_NAME, LAST_NAME, FURIGANA, SEX, BIRTH_DATE, EMAIL_ADDRESS, PHONE_NUMBER, PASSWORD, ZIP_CODE, ADDRESS_STREET_1, ADDRESS_STREET_2, ADDRESS_STREET_3, EMAIL_PERMIT FROM CUSTOMER WHERE CUSTOMER_ID = '$id'";
			$result = $conn->query($sql);

			while($row = $result->fetch_assoc()){
				echo "<table>";
				echo "<tr><p><strong>名前</strong></p>".$row["FIRST_NAME"].$row["LAST_NAME"]."(".$row["FURIGANA"].")"."</tr>";
				echo "<button>編集</button>";
				echo "<tr><p><strong>Eメールアドレス</strong></p>".$row["EMAIL_ADDRESS"]."</tr>";
				echo "<button>編集</button>";
				echo "<tr><p><strong>電話番号</strong></p>".$row["PHONE_NUMBER"]."<tr>";
				echo "<button>編集</button>";
				echo "<tr><p><strong>住所</strong></p>".wordwrap($row["ZIP_CODE"],3,"-",false)."<br>".$row["ADDRESS_STREET_1"].$row["ADDRESS_STREET_2"].$row["ADDRESS_STREET_3"]."</tr>";
				echo "<tr><p><strong>現在のパスワード</strong></p>".str_repeat('*', strlen($row["PASSWORD"]))."</tr>";
				echo "<button>編集</button>";
				echo "</table>";
			}
		}

		$conn->close();
		?>
	</main>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>