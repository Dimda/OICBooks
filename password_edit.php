<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>アカウント設定の変更</title>
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/mypage.css" media="all">
	<link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/theme-default.css" media="all">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
</head>
<body>
	<?php include("includes/sidebar.html"); ?>
	<?php include("includes/header.html"); ?>
	<?php include("includes/connect_DB.php"); ?>
	<main>
		<form action="update_submit.php" method="POST">
			<p>
				<label for="pass">現在のパスワード</label><br>
				<input type="password" name="pass" data-validation="required" data-validation-error-msg="パスワードを入力してください" maxlength="12">
			</p>
			<p>
				<label for="new_pass">新しいパスワード</label><br>
				<input type="password" name="new_pass_confirmation" data-validation="length" data-validation-length="6-12" data-validation-strength="2" data-validation-error-msg="パスワードを入力してください" maxlength="12" placeholder="6文字以上12文字以下">
			</p>
			<p>
				<label for="confirm_new_pass">新しいパスワード(確認)</label><br>
				<input type="password" name="new_pass" data-validation="confirmation" data-validation-error-msg="パスワードが一致しません" maxlength="12" placeholder="確認のためもう一度入力してください">
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