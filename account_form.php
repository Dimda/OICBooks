<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/default_color.css">
	<link rel="stylesheet" type="text/css" href="css/account_form.css">
	<link rel="stylesheet" type="text/css" href="css/theme-default.css">
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script> 
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
	<?php include("includes/connect_DB.php"); ?>
	<main>
		<form id="account_form" action="account_registration.php" method="post">
			<table>
				<tr>
					<th>名前<i>必須</i></th>
					<td>
						<input type="text" class="name" name="first_name" data-validation="required" data-validation-error-msg="姓を入力してください" maxlength="20" placeholder="姓" autofocus> 
						<input type="text" class="name" name="last_name" data-validation="required" data-validation-error-msg="名を入力してください" maxlength="20" placeholder="名">
					</td>
				</tr>
				<tr>
					<th>フリガナ<i>必須</i></th>
					<td>
						<input type="text" class="phonetic" name="first_phonetic" data-validation="required" maxlength="30" data-validation-error-msg="フリガナを入力してください" placeholder="セイ"> 
						<input type="text" class="phonetic" name="last_phonetic" data-validation="required" maxlength="30" data-validation-error-msg="フリガナを入力してください" placeholder="メイ">
					</td>
				</tr>
				<tr>
					<th>郵便番号<i>必須</i></th>
					<td>
						<p>〒 <input type="text" id="address1" name="address1" data-validation="number" data-validation-error-msg="郵便番号を入力してください" maxlength="3"> - <input type="text" id="address2" name="address2" data-validation="number" data-validation-error-msg="郵便番号を入力してください" maxlength="4"></p>
					</td>
				</tr>
				<tr>
					<th>住所<i>必須</i></th>
					<td>
						<p><select id="pref" name="pref" data-validation="required" data-validation-error-msg="都道府県を選択してください"><?php include("includes/pref.html"); ?></select></p>
						<p><input type="text" id="city" name="city" class="" data-validation="required" data-validation-error-msg="市区町村を入力してください" placeholder="市区町村"></p>
						<p><input type="text" id="area" name="area" class="" data-validation="required" data-validation-error-msg="町域・番地を入力してください" placeholder="町域"></p>
						<p><input type="text" id="mansion" name="mansion" class="" data-validation-error-msg="マンション名を入力してください" placeholder="マンション名"></p>
					</td>
				</tr>
				<tr>
					<th>電話番号 (ハイフン無し)<i>必須</i></th>
					<td>
						<input type="text" name="phone_number" id="phone_number" data-validation="number" maxlength="11" data-validation-error-msg="電話番号を入力してください">
					</td>
				</tr>
				<tr>
					<th>メールアドレス<i>必須</i></th>
					<td>
						<p><input type="text" id="email" name="user_email" data-validation="email" data-validation-error-msg="メールアドレスを入力してください" placeholder="半角英数字で入力してください"></p>
						<input type="text" id="confirm_email" name="repeat" data-validation="confirmation" data-validation-error-msg="メールアドレスが一致しません" data-validation-confirm="user_email" placeholder="確認のためもう一度入力してください">
					</td>
				</tr>
				<tr>
					<th>性別<i>必須</i></th>
					<td>
						<input type="radio" class="sex" name="sex" data-validation="required" data-validation-error-msg="選択してください" value="Male"> 男性 
						<input type="radio" class="sex" name="sex" data-validation="required" data-validation-error-msg="選択してください" value="F"> 女性
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
						<p><input type="password" id="pass1" name="pass_confirmation" data-validation="length" data-validation-length="6-12" data-validation-strength="2" data-validation-error-msg="パスワードを入力してください" maxlength="12" placeholder="半角英数字で入力してください"></p>
						<input type="password" id="pass2" name="pass" data-validation="confirmation" data-validation-error-msg="パスワードが一致しません" maxlength="12" placeholder="確認のためもう一度入力してください">
					</td>
				</tr>
				<tr>
					<th>メールマガジンの送付について<i>必須</i></th>
					<td>
						<input type="radio" name="mailmagazine" data-validation="required" data-validation-error-msg="選択してください" value="1"> 受け取る 
						<input type="radio" name="mailmagazine" data-validation="required" data-validation-error-msg="選択してください"　value="1"> 受け取らない
					</td>
				</tr>
			</table>
			<input type="submit" name="submit">送信</input>
			<input type="reset">リセット</input>
		</form>
	</main>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
	<script>
	  $.validate({
	    modules : 'security'
	  });
	</script>
	<?php include("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
</body>
</html>