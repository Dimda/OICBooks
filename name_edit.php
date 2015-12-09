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
	<main>
		<form action="update_submit.php" method="POST">
		<p><strong>新しい名前</strong></p>
			<input type="text" class="name" name="first_name" maxlength="20" placeholder="姓" required> 
			<input type="text" class="name" name="last_name" maxlength="20" placeholder="名" required>
		<p><strong>フリガナ</strong></p>
			<input type="text" class="phonetic" name="first_phonetic" maxlength="30" placeholder="セイ" required> 
			<input type="text" class="phonetic" name="last_phonetic" maxlength="30" placeholder="メイ" required>
			<input type="submit"></input>
		</form>
	</main>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>