<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>アカウント設定の変更</title>
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/mypage.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/default_color.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/theme-default.css">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<?php include("includes/sidebar.html"); ?>
	<?php include("includes/header.html"); ?>
	<main>
		<form action="update_submit.php" method="POST">
		<p>
			<label>名前</label><br>
			<input type="text" class="name" name="first_name" data-validation="required" data-validation-error-msg="姓を入力してください" maxlength="20" placeholder="姓" autofocus>
			<input type="text" class="name" name="last_name" data-validation="required" data-validation-error-msg="名を入力してください" maxlength="20" placeholder="名">
		</p>
		<p>
			<label>フリガナ</label><br>
			<input type="text" class="phonetic" name="first_phonetic" data-validation="required" maxlength="30" data-validation-error-msg="フリガナを入力してください" placeholder="セイ">
			<input type="text" class="phonetic" name="last_phonetic" data-validation="required" maxlength="30" data-validation-error-msg="フリガナを入力してください" placeholder="メイ">
		</p>
		<input type="submit">
		</form>
	</main>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
	<script>
	  $.validate({
	    modules : 'security'
	  });
	</script>
</body>
</html>