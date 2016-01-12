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
				<label for="mailmagazine">メールマガジンの配布</label><br>
				<input type="radio" name="mailmagazine" data-validation="required" data-validation-error-msg="選択してください" value="1"> 受け取る
				<input type="radio" name="mailmagazine" data-validation="required" data-validation-error-msg="選択してください" value="0"> 受け取らない
			</p>
			<input type="submit" name="submit">
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