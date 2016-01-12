<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>アカウント設定の変更</title>
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/mypage.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/default_color.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/theme-default.css" media="all">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<?php include("includes/header.html"); ?>
	<?php include("includes/sidebar.html"); ?>
	<main>
		<form action="update_submit.php" method="POST">
		<p>
			<label for="user_email">新しいEメールアドレス</label><br>
			<input type="text" id="email" name="user_email" size="30" data-validation="email" data-validation-error-msg="メールアドレスを入力してください" placeholder="半角英数字で入力してください">
		</p>
		<p>
			<label for="repeat">新しいEメールアドレスの再入力</label><br>
			<input type="text" id="confirm_email" name="repeat" size="30" data-validation="confirmation email" data-validation-error-msg="メールアドレスが一致しません" data-validation-confirm="user_email" placeholder="確認のためもう一度入力してください">
			</p>
		<p>
			<label for="pass">現在のパスワード</label><br>
			<input type="password" id="pass" name="pass" size="30" data-validation="length" data-validation-length="6-12" data-validation-strength="2" data-validation-error-msg="パスワードを入力してください" maxlength="12">
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