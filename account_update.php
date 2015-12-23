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
		<div id="container">
		<h1>アカウント設定の変更</h1>
			<?php
			if($id = $_SESSION["CUSTOMER_ID"]){
				$sql = "SELECT CUSTOMER_ID, FIRST_NAME, LAST_NAME, FURIGANA, SEX, BIRTH_DATE, EMAIL_ADDRESS, PHONE_NUMBER, PASSWORD, ZIP_CODE, ADDRESS_STREET_1, ADDRESS_STREET_2, ADDRESS_STREET_3, EMAIL_PERMIT FROM customer WHERE CUSTOMER_ID = '$id'";
				$result = $conn->query($sql);

				while($row = $result->fetch_assoc()){
					echo '<ul>';
					echo '<li><p><strong>名前</strong></p>';
					echo $row["FIRST_NAME"].$row["LAST_NAME"]." (".$row["FURIGANA"].")";
					echo '<div class="btn"><a href="name_edit.php" class="btn">編集</a></div></li>';
					echo '<div class="border"></div>';

					echo '<li><p><strong>Eメールアドレス</strong></p>';
					echo $row["EMAIL_ADDRESS"];
					echo '<div class="btn"><a href="email_edit.php" class="btn">編集</a></div></li>';
					echo '<div class="border"></div>';

					echo '<li><p><strong>電話番号</strong></p>';
					if(strlen($row["PHONE_NUMBER"]) == 10){
						echo substr($row["PHONE_NUMBER"], 0, 2) . "-" . substr($row["PHONE_NUMBER"], -8, 4) . "-" . substr($row["PHONE_NUMBER"], -4, 4);
					}
					if(strlen($row["PHONE_NUMBER"]) == 11){
						echo substr($row["PHONE_NUMBER"], 0, 3) . "-" . substr($row["PHONE_NUMBER"], -8, 4) . "-" . substr($row["PHONE_NUMBER"], -4, 4);
					}
					echo '<div class="btn"><a href="phonenumber_edit.php" class="btn">編集</a></div></li>';
					echo '<div class="border"></div>';

					echo '<li><p><strong>住所</strong></p>';
					echo substr($row["ZIP_CODE"], 0, 3)."-".substr($row["ZIP_CODE"], -4, 4)."<br>".$row["ADDRESS_STREET_1"].$row["ADDRESS_STREET_2"].$row["ADDRESS_STREET_3"];
					echo '<div class="btn"><a href="address_edit.php" class="btn">編集</a></div></li>';
					echo '<div class="border"></div>';

					echo '<li><p><strong>メールマガジンの配布</strong></p>';
					if($row["EMAIL_PERMIT"] == 1){
						echo '受け取る';
					}
					if($row["EMAIL_PERMIT"] == 0){
						echo '受け取らない';
					}
					// var_dump($row["EMAIL_PERMIT"]);
					echo '<div class="btn"><a href="mailmagazine_edit.php" class="btn">編集</a></div></li>';
					echo '<div class="border"></div>';

					echo '<li><p><strong>パスワードの変更</strong></p>';
					// echo str_repeat('*', strlen($row["PASSWORD"]));
					echo '<div class="btn"><a href="password_edit.php" class="btn">編集</a></div></li>';
					echo '</ul>';
				}
			$conn->close();
			}
			else {
				echo "セッションが取得できません";
			}
			?>
		<div class="btn"><a href="index.php" class="btn">終了</a></div>
		</div>
	</main>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>