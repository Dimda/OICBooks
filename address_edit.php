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
	<script type="text/javascript" src="http://jpostal.googlecode.com/svn/trunk/jquery.jpostal.js"></script>
	<script type="text/javascript">
		$(window).ready( function() {
			$('#address1').jpostal({
				postcode : [
				'#address1',
				'#address2'
				],
				address : {
					'#pref' : '%3',
					'#city' : '%4',
					'#area' : '%5'
				}
			});
		});
	</script>
</head>
<body>
	<?php include("includes/sidebar.html"); ?>
	<?php include("includes/header.html"); ?>
	<main>
		<form action="update_submit.php" method="POST">
			<p>
				<label for="">郵便番号</label><br>
				〒 <input type="text" id="address1" name="address1" data-validation="number" data-validation-error-msg="郵便番号を入力してください" maxlength="3"> - <input type="text" id="address2" name="address2" data-validation="number" data-validation-error-msg="郵便番号を入力してください" maxlength="4">
			</p>
			<p>
				<label for="pref">都道府県</label><br>
				<select id="pref" name="pref" data-validation="required" data-validation-error-msg="都道府県を選択してください"><?php include("includes/pref.html"); ?></select>
			</p>
			<p>
				<label for="city">市区町村</label><br>
				<input type="text" id="city" name="city" data-validation="required" data-validation-error-msg="市区町村を入力してください" placeholder="市区町村">
			</p>
			<p>
				<label for="area">町域・番地</label><br>
				<input type="text" id="area" name="area" data-validation="required" data-validation-error-msg="町域・番地を入力してください" placeholder="町域">
			</p>
			<p>
				<label for="mansion">マンション名</label><br>
				<input type="text" id="mansion" name="mansion" data-validation-error-msg="マンション名を入力してください" placeholder="マンション名">
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