<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>アカウント登録</title>
</head>
<body>
	<?php
	include("includes/connect_DB.php");
	ini_set( 'display_errors', 1 );
	$first_name   = $_POST['first_name']; //FIRST_NAME
	$last_name    = $_POST['last_name']; //LAST_NAME
	$phonetic     = $_POST['first_phonetic'].$_POST['last_phonetic']; //FRIGANA
	$sex          = $_POST['sex']; //SEX
	$birthday     = $_REQUEST['birthday'].'-'.$_REQUEST['month'].'-'.$_REQUEST['day'];//BIRTH_DATE
	$email        = $_POST['email']; //EMAIL_ADDRESS
	$phone_number = $_POST['phone_number1'].$_POST['phone_number2'].$_POST['phone_number3']; //PHONE_NUMBER
	$password     = $_POST['pass1']; //PASSWORD
	$zip          = $_POST['address1'].$_POST['address2']; //ZIP_CODE
	$pref         = $_POST['pref']; //ADDRESS_STREET_1
	$city         = $_POST['city'].$_POST['area']; //ADDRESS_STREET_2
	$add          = $_POST['add']; //ADDRESS_STREET_3
	$mailmagazine = $_POST['mailmagazine']; //EMAIL_PERMIT
	$pass_md5     = MD5($password);
	$pass_str     = 'coca'.$pass_md5.'cola';
	$pass_hash    = hash('sha256', $pass_str);
	echo $first_name . '<br>';
	echo $last_name . '<br>';
	echo $phonetic.'<br>';
	echo $phone_number. '<br>';
	echo $pref.$city.$add.'<br>';
	echo $zip.'<br>';
	echo $email.'<br>';
	echo $sex.'<br>';
	echo $password.'<br>';
	echo $mailmagazine.'<br>';
	echo $birthday . '<br>';

	mysql_set_charset('utf8');
  $sql = "INSERT INTO customer (FIRST_NAME, LAST_NAME, FURIGANA, SEX, BIRTH_DATE, EMAIL_ADDRESS, PHONE_NUMBER, PASSWORD, ZIP_CODE, ADDRESS_STREET_1, ADDRESS_STREET_2, ADDRESS_STREET_3, EMAIL_PERMIT) VALUES ('$first_name', '$last_name', '$phonetic', '$sex', '$birthday', '$email', '$phone_number', '$pass_hash', '$zip', '$pref', '$city', '$add', '$mailmagazine')";
  if($conn->query($sql)){
  	echo "success";
  } else {
  	echo "failure";
  }
	?>
</body>
</html>