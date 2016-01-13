<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>アカウント登録</title>
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.cbkonami.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/top_page.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/default_color.css" media="all">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<?php
	include("includes/header.html");
	include("includes/sidebar.html");
	include("includes/connect_DB.php");
	ini_set( 'display_errors', 1 );
	$first_name   = $_POST['first_name']; //FIRST_NAME
	$last_name    = $_POST['last_name']; //LAST_NAME
	$phonetic     = $_POST['phonetic']; //FRIGANA
	$sex          = $_POST['sex']; //SEX
	$birthday     = $_POST['birthday'].'-'.$_POST['month'].'-'.$_POST['day'];//BIRTH_DATE
	$email        = $_POST['user_email']; //EMAIL_ADDRESS
	$phone_number = $_POST['phone_number']; //PHONE_NUMBER
	$zip          = $_POST['address1'].$_POST['address2']; //ZIP_CODE
	$pref         = $_POST['pref']; //ADDRESS_STREET_1
	$city         = $_POST['city'].$_POST['area']; //ADDRESS_STREET_2
	$mansion      = $_POST['mansion']; //ADDRESS_STREET_3
	$mailmagazine = $_POST['mailmagazine']; //EMAIL_PERMIT
	$password     = $_POST['pass']; //PASSWORD
	$pass_md5     = MD5($password);
	$pass_hash    = hash('sha256', 'coca'.$pass_md5.'cola');

	echo $first_name . '<br>';
	echo $last_name . '<br>';
	echo $phonetic.'<br>';
	echo $phone_number. '<br>';
	echo $pref.$city.$mansion.'<br>';
	echo $zip.'<br>';
	echo $email.'<br>';
	echo $sex.'<br>';
	echo $mailmagazine.'<br>';
	echo $birthday . '<br>';

	if($_SESSION["first_name"] != $first_name){
		//mysql_set_charset('utf8');
	 	$sql = "INSERT INTO customer (FIRST_NAME, LAST_NAME, FURIGANA, SEX, BIRTH_DATE, EMAIL_ADDRESS, PHONE_NUMBER, PASSWORD, ZIP_CODE, ADDRESS_STREET_1, ADDRESS_STREET_2, ADDRESS_STREET_3, EMAIL_PERMIT) VALUES ('$first_name', '$last_name', '$phonetic', '$sex', '$birthday', '$email', '$phone_number', '$pass_hash', '$zip', '$pref', '$city', '$mansion', '$mailmagazine')";
	 	if($conn->query($sql)){
	  		echo "success";
	 	} else {
	  		echo "failure";
		}
	 	$_SESSION["first_name"] = $first_name;
	}
  $conn -> close();
	?>
	<?php include ("includes/top.html"); ?>
	<?php include("includes/footer.html"); ?>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/sidebar.js"></script>
	<script>
	  $(window).cbKonami(function () {
	    window.location = "admin.php";
	  });
	</script>
</body>
</html>