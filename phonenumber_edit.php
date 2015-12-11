<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>アカウント設定の変更</title>
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/mypage.css" media="all">
	<link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/theme-default.css" media="all">
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
				<label for="phone_number">現在の電話番号</label><br>
				<input type="text" name="phone_number" id="phone_number" data-validation="number" maxlength="11" data-validation-error-msg="電話番号を入力してください" placeholder="ハイフン無し">
			</p>
			<p>
				<label for="new_phone_number">新しい電話番号</label><br>
				<input type="text" name="new_phone_number" id="new_phone_number" data-validation="number" maxlength="11" data-validation-error-msg ="新しい電話番号を入力してください" placeholder="ハイフン無し">
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