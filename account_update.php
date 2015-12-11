<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>アカウント設定の変更</title>
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/mypage.css" media="all">
	<link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/account_update.css" media="all">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<?php include("includes/sidebar.html"); ?>
	<?php include("includes/header.html"); ?>
	<?php include("includes/connect_DB.php"); ?>
	<main>
		<h1>アカウント設定の変更</h1>
		<div id="container">
			<?php
			ini_set( 'display_errors', 1 );
			if($id = $_SESSION["CUSTOMER_ID"]){
				$sql = "SELECT CUSTOMER_ID, FIRST_NAME, LAST_NAME, FURIGANA, SEX, BIRTH_DATE, EMAIL_ADDRESS, PHONE_NUMBER, PASSWORD, ZIP_CODE, ADDRESS_STREET_1, ADDRESS_STREET_2, ADDRESS_STREET_3, EMAIL_PERMIT FROM CUSTOMER WHERE CUSTOMER_ID = '$id'";
				$result = $conn->query($sql);

				while($row = $result->fetch_assoc()){
					echo '<ul id="account_edit">';
					echo "<li class='border'><span><p><strong>名前</strong></p>";
					echo $row["FIRST_NAME"].$row["LAST_NAME"]."(".$row["FURIGANA"].")";
					echo '<a href="name_edit.php">編集</a></span></li>';

					echo "<li class='border'><span><p><strong>Eメールアドレス</strong></p>";
					echo $row["EMAIL_ADDRESS"];
					echo '<a href="email_edit.php">編集</a></span></li>';

					echo "<li class='border'><span><p><strong>電話番号</strong></p>";
					echo $row["PHONE_NUMBER"];
					echo '<a href="phonenumber_edit.php">編集</a></span></li>';

					echo "<li class='border'><span><p><strong>住所</strong></p>";
					echo $row["ZIP_CODE"]."<br>".$row["ADDRESS_STREET_1"].$row["ADDRESS_STREET_2"].$row["ADDRESS_STREET_3"];
					echo '<a href="address_edit.php">編集</a></span></li>';

					echo "<li><span><p><strong>現在のパスワード</strong></p>";
					echo str_repeat('*', strlen($row["PASSWORD"]));
					echo '<a href="password_edit.php">編集</a></span></li>';
					echo "</ul>";
				}
			$conn->close();
			}
			else {
				echo "セッションが取得できません";
			}
			?>
		</div>
		<a href="index.php">終了</a>
	</main>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>