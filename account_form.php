<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/main_color.css">
	<link rel="stylesheet" type="text/css" href="css/account_form.css">
	<link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
	<script type="text/javascript" src="js/languages/jquery.validationEngine-ja.js"></script>
	<!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
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
	<script>
  	$(function(){
    	jQuery("#account_form").validationEngine();
  	});
	</script>
</head>
<body>
	<?php include("includes/sidebar.html"); ?>
	<?php include("includes/header.html"); ?>
	<main>
		<form id="account_form" action="account_registration.php" method="post">
			<table>
				<tr>
					<th>名前<i>必須</i></th>
					<td>
						姓 <input type="text" class="name validate[required]" name="first_name" maxlength="20" autofocus>
						名 <input type="text" class="name validate[required]" name="last_name" maxlength="20">
					</td>
				</tr>
				<tr>
					<th>フリガナ<i>必須</i></th>
					<td>
						セイ <input type="text" class="phonetic validate[required]" name="first_phonetic" maxlength="30">
						メイ <input type="text" class="phonetic validate[required]" name="last_phonetic" maxlength="30">
					</td>
				</tr>
				<tr>
					<th>郵便番号<i>必須</i></th>
					<td>
						<p>〒 <input type="text" id="address1" class="validate[required] number" name="address1" maxlength="3"> - <input type="text" id="address2" class="validate[required] number" name="address2" maxlength="4"></p>
					</td>
				</tr>
				<tr>
					<th>住所<i>必須</i></th>
					<td>
						<p><select id="pref" name="pref" class="validate[required] number"><?php include("includes/pref.html"); ?></select></p>
						<p><input type="text" id="city" name="city" class="validate[required]"><br>市区町村名</p>
						<p><input type="text" id="add" name="add" class="validate[required]"><br>町域番地</p>
					</td>
				</tr>
				<tr>
					<th>電話番号<i>必須</i></th>
					<td>
						<input type="text" class="phone_number validate[required, custom[phone]] minSize[3] number" name="phone_number1" maxlength="3"> - 
						<input type="text" class="phone_number validate[required, custom[phone]] minSize[3] number" name="phone_number2" maxlength="4"> - 
						<input type="text" class="phone_number validate[required, custom[phone]] minSize[3] number" name="phone_number3" maxlength="4">
					</td>
				</tr>
				<tr>
					<th>メールアドレス<i>必須</i></th>
					<td>
						<p><input type="text" id="email" class="validate[required, custom[email]]" name="email" placeholder="半角英数字で入力してください"></p>
						<input type="text" id="confirm_email" class="validate[required, custom[email], equals[email]]" name="confirm_email" placeholder="確認のためもう一度入力してください">
					</td>
				</tr>
				<tr>
					<th>性別<i>必須</i></th>
					<td>
						<input type="radio" class="sex validate[required]" name="sex" value="male"> 男性 <input type="radio" class="sex validate[required]" name="sex" value="female"> 女性
					</td>
				</tr>
				<tr>
					<th>生年月日<i>必須</i></th>
					<td>
						<?php include("includes/birthday.html"); ?>
					</td>
				</tr>
				<tr>
					<th>パスワード(6文字以上12文字以下)<i>必須</i></th>
					<td>
						<p><input type="password" id="pass1" name="pass1" class="validate[required] minSize[6]" maxlength="12" placeholder="半角英数字で入力してください"></p>
						<input type="password" id="pass2" name="pass2" class="validate[required] equals[pass1] minSize[6]" maxlength="12" placeholder="確認のためもう一度入力してください">
					</td>
				</tr>
				<tr>
					<th>メールマガジンの送付について<i>必須</i></th>
					<td>
						<p><input type="radio" name="mailmagazine" class="validate[required]" value="1"> 受け取る</p>
						<p><input type="radio" name="mailmagazine" class="validate[required]" value="0"> 受け取らない</p>
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="送信">
			<input type="reset">
		</form>

	</main>

	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
</body>
</html>