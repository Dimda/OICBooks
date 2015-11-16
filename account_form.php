<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
	<link rel="stylesheet" type="text/css" href="CSS/main_color.css">
	<link rel="stylesheet" type="text/css" href="CSS/account_form.css">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://jpostal.googlecode.com/svn/trunk/jquery.jpostal.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<title>アカウントフォーム</title>
	<script type="text/javascript">
   $(window).ready( function() {
      $('#address1').jpostal({
         postcode : [
            '#address1',
            '#address2'
         ],
         address : {
            '#pref'  : '%3',
            '#city'  : '%4',
            '#add' : '%5'
         }
      });
   });
	</script>
</head>
<body>
	<?php include("includes/sidebar.html"); ?>
	<?php include("includes/header.html"); ?>
	<main>
		<form name="account_form" action="account_registration.php" method="post">
			<table>
				<tr>
					<th>名前</th>
					<td>
						姓 <input type="text" class="name" name="first_name" maxlength="20" autofocus>
						名 <input type="text" class="name" name="last_name" maxlength="20">
					</td>
				</tr>
				<tr>
					<th>フリガナ</th>
					<td>
						セイ <input type="text" class="phonetic" name="first_phonetic" maxlength="30">
						メイ <input type="text" class="phonetic" name="last_phonetic" maxlength="30">
					</td>
				</tr>
				<tr>
					<th>郵便番号</th>	
					<td>
						<p>〒 <input type="text" id="address1" name="address1" maxlength="3"> - <input type="text" id="address2" name="address2" maxlength="4"></p>
					</td>
				</tr>
				<tr>
					<th>住所</th>
					<td>
						<p><select id="pref" name="pref"><?php include("includes/pref.html"); ?></select></p>
						<p><input type="text" id="city" name="city"><br>市区町村名</p>
						<p><input type="text" id="add" name="add"><br>町域番地</p>
					</td>
				</tr>
				<tr>
					<th>電話番号</th>
					<td>
						<input type="text" class="phone_number" name="phone_number1" maxlength="3"> - 
						<input type="text" class="phone_number" name="phone_number2" maxlength="4"> - 
						<input type="text" class="phone_number" name="phone_number3" maxlength="4">
					</td>
				</tr>
				<tr>
					<th>メールアドレス</th>
					<td>
						<p><input type="email" id="email" name="email" placeholder="半角英数字で入力してください"></p>
						<input type="email" id="confirm_email" name="confirm_email" placeholder="確認のためもう一度入力してください">
					</td>
				</tr>
				<tr>
					<th>性別</th>
					<td>
						<input type="radio" class="sex" name="sex" value="male"> 男性 <input type="radio" class="sex" name="sex" value="female"> 女性
					</td>
				</tr>
				<tr>
					<th>生年月日</th>
					<td>
						<?php include("includes/birthday.html"); ?>
					</td>
				</tr>
				<tr>
					<th>パスワード(6文字以上12文字以下)</th>
					<td>
						<p><input type="password" id="pass1" name="pass1" minlength="6" maxlength="12" placeholder="半角英数字で入力してください"></p>
						<p id="pass1-error" class="alert-error"></p>
            <p id="pass1-error2" class="alert-error"></p>
						<input type="password" id="pass2" name="pass2" minlength="6" maxlength="12" placeholder="確認のためもう一度入力してください">
            <p id="pass2-error" class="alert-error"></p>
						<input type="button" id="checkPassButton" class="btn btn-primary" value="パスワード確認">

					</td>
				</tr>
				<tr>
					<th>メールマガジンの送付について</th>
					<td>
						<p><input type="radio" name="mailmagazine" value="true"> 受け取る</p>
						<p><input type="radio" name="mailmagazine" value="false"> 受け取らない</p>
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="送信">
		</form>
		<script src="js/formCheck.js" charset="utf-8"></script>


	</main>

	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
</body>
</html>