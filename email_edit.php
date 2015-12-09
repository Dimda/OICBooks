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
	<?php include("includes/header.html"); ?>
	<?php include("includes/sidebar.html"); ?>
	<main>
		<form action="update_submit.php" method="POST">
		<p><strong>新しいEメールアドレス</strong></p>
			<input type="text" id="email" name="user_email" data-validation="email" data-validation-error-msg="メールアドレスを入力してください" placeholder="半角英数字で入力してください">
		<p><strong>新しいEメールアドレスの再入力</strong></p>
			<input type="text" id="confirm_email" name="repeat" data-validation="confirmation" data-validation-error-msg="メールアドレスが一致しません" data-validation-confirm="user_email" placeholder="確認のためもう一度入力してください">
		<p><strong>現在のパスワード</strong></p>
			<input type="password" id="pass" name="pass" data-validation-error-msg="パスワードを入力してください" maxlength="12">
		<input type="submit">
		</form>
	</main>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>