<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>アカウント登録</title>
</head>
<body>
	<?php
	include("includes/connect_DB.php");
	$first_name = $_POST['first_name']; //FIRST_NAME
	$last_name = $_POST['last_name']; //LAST_NAME
	$fPhonetic = $_POST['first_phonetic']; //FRIGANA
	$lPhonetic = $_POST['last_phonetic']; //FRIGANA
	$phone_number = $_POST['phone_number1'].'-'.$_POST['phone_number2'].'-'.$_POST['phone_number3']; //PHONE_NUMBER
	$pref = $_POST['pref']; //ADDRESS_STREET1
	$city = $_POST['city']; //ADDRESS_STREET2
	$add = $_POST['add']; //ADDRESS_STREET3
	$zip = $_POST['address1'].'-'.$_POST['address2']; //ZIP_CODE
	$email = $_POST['email']; //EMAIL_ADDRESS
	$sex = $_POST['sex']; //SEX
	$password = $_POST['pass1']; //PASSWORD
	$mailmagazine = $_POST['mailmagazine']; //MAIL_OK
	// $birthday = date('Y/M/D',strtotime($_POST['birthday'] . $_POST['month'] . $_POST['day'])); //BIRTH_DATE
	$birthday = $_REQUEST['birthday'].'/'.$_REQUEST['month'].'/'.$_REQUEST['day'];
	echo $first_name . '<br>';
	echo $last_name . '<br>';
	echo $fPhonetic.$lPhonetic.'<br>';
	echo $phone_number. '<br>';
	echo $pref.$city.$add.'<br>';
	echo $zip.'<br>';
	echo $email.'<br>';
	echo $sex.'<br>';
	echo $password.'<br>';
	echo $mailmagazine.'<br>';
	echo $birthday . '<br>';
	?>
</body>
</html>