<?php
session_start();
include("includes/connect_DB.php");
mysql_set_charset('utf8');
$first_name   = mysqli_real_escape_string($conn, $_POST["first_name"]);
$last_name    = mysqli_real_escape_string($conn, $_POST["last_name"]);
$phonetic     = mysqli_real_escape_string($conn, $_POST["first_phonetic"].$_POST["last_phonetic"]);
$new_email     = mysqli_real_escape_string($conn, $_POST["user_email"]);
$password     = $_POST["pass"];
$new_password = $_POST["new_pass"];
$phone_number = $_POST['phone_number'];
$zip          = $_POST['address1'].$_POST['address2'];
$pref         = $_POST['pref'];
$city         = $_POST['city'].$_POST['add'];
$mansion      = $_POST['mansion'];
$mailmagazine = $_POST['mailmagazine'];

if ($id = $_SESSION["CUSTOMER_ID"]){

	if($first_name && $last_name && $phonetic){
		$sql = "UPDATE customer SET FIRST_NAME = '$first_name', LAST_NAME = '$last_name', FURIGANA = '$phonetic' WHERE CUSTOMER_ID = '$id'";
		// $_SESSION["CUSTOMER_NAME"] = $row["FIRST_NAME"].$row["LAST_NAME"];
	}

	if($new_email && $password){
		$sql = "UPDATE customer SET EMAIL_ADDRESS = '$new_email' WHERE CUSTOMER_ID = '$id' AND PASSWORD = '$password'";
	}

	if($phone_number){
		$sql = "UPDATE customer SET PHONE_NUMBER = '$phone_number' WHERE CUSTOMER_ID = '$id'";
	}

	if($zip && $pref && $city){
		$sql = "UPDATE customer SET ZIP_CODE = '$zip', ADDRESS_STREET1 = '$pref', ADDRESS_STREET2 = '$city', ADDRESS_STREET3 = '$mansion' WHERE CUSTOMER_ID = '$id'";
	}

	if($password && $new_password){
		$sql = "UPDATE customer SET PASSWORD = '$password' WHERE CUSTOMER_ID = '$id' AND PASSWORD = '$password'";
	}

	$conn -> query($sql);
	$conn -> close();

}
header('Location: account_update.php');
?>