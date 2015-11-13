<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>アカウント登録</title>
</head>
<body>
	<?php
	include("includes/connect_DB.php");
	$first_name = $_REQUEST['first_name']; //FIRST_NAME
	$last_name = $_REQUEST['last_name']; //LAST_NAME
	$f_phonetic = $_REQUEST['first_phonetic']; //FRIGANA
	$l_phonetic = $_REQUEST['last_phonetic']; //FRIGANA
	$phone_number = $_REQUEST['phone_number1'].'-'.$_REQUEST['phone_number2'].'-'.$_REQUEST['phone_number3']; //PHONE_NUMBER
	$pref = $_REQUEST['pref']; //ADDRESS_STREET1
	$city = $_REQUEST['city']; //ADDRESS_STREET2
	$add = $_REQUEST['add']; //ADDRESS_STREET3
	$zip = $_REQUEST['address1'].'-'.$_REQUEST['address2']; //ZIP_CODE
	$email = $_REQUEST['email']; //EMAIL_ADDRESS
	$sex = $_REQUEST['sex']; //SEX
	$password = $_REQUEST['password']; //PASSWORD
	$mailmagazine = $_REQUEST['mailmagazine']; //MAIL_OK
	$birthday = date('Y/M/D',strtotime($_REQUEST['birthday'] . $_REQUEST['month'] . $_REQUEST['day']));
	// $birthday = $_REQUEST['birthday'].'/'.$_REQUEST['month'].'/'.$_REQUEST['day'];
	echo $first_name . '<br>';
	echo $last_name . '<br>';
	echo $f_phonetic.$l_phonetic.'<br>';
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