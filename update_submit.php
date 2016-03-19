<?php
session_start();
include("includes/connect_DB.php");
mysql_set_charset('utf8');
$first_name       = mysqli_real_escape_string($conn, $_POST["first_name"]);
$last_name        = mysqli_real_escape_string($conn, $_POST["last_name"]);
$phonetic         = mysqli_real_escape_string($conn, $_POST["first_phonetic"].$_POST["last_phonetic"]);
$email   		  = $_POST["email"];
$new_email        = $_POST["repeat"];
$zip              = mysqli_real_escape_string($conn, $_POST['address1'].$_POST['address2']);
$pref             = mysqli_real_escape_string($conn, $_POST['pref']);
$city             = mysqli_real_escape_string($conn, $_POST['city'].$_POST['area']);
$mansion          = mysqli_real_escape_string($conn, $_POST['mansion']);
$epass_hash   	  = hash('sha256', 'coca'.MD5($_POST["epass"]).'cola');
$pass_md5     	  = MD5($_POST["pass"]);
$pass_hash   	  = hash('sha256', 'coca'.$pass_md5.'cola');
$newpass_md5      = MD5($_POST["new_pass"]);
$newpass_hash     = hash('sha256', 'coca'.$newpass_md5.'cola');
$phone_number     = $_POST['phone_number'];
$new_phone_number = $_POST["new_phone_number"];
$mailmagazine     = $_POST['mailmagazine'];

if ($id = $_SESSION["CUSTOMER_ID"]){

	if($first_name && $last_name && $phonetic){
		$sql = "UPDATE customer SET FIRST_NAME = '$first_name', LAST_NAME = '$last_name', FURIGANA = '$phonetic' WHERE CUSTOMER_ID = '$id'";
		$_SESSION["CUSTOMER_NAME"] = $_POST["first_name"].$_POST["last_name"];
		$conn->query($sql);
	}
	if($new_email && $epass_hash){
		$sql = "UPDATE customer SET EMAIL_ADDRESS = '$new_email' WHERE CUSTOMER_ID = '$id' AND PASSWORD = '$epass_hash'";
		$conn->query($sql);
	}
	if($phone_number && $new_phone_number){
		$sql = "UPDATE customer SET PHONE_NUMBER = '$new_phone_number' WHERE CUSTOMER_ID = '$id' AND PHONE_NUMBER = '$phone_number'";
		$conn->query($sql);
	}
	if($zip && $pref && $city){
		$sql = "UPDATE customer SET ZIP_CODE = '$zip', ADDRESS_STREET_1 = '$pref', ADDRESS_STREET_2 = '$city', ADDRESS_STREET_3 = '$mansion' WHERE CUSTOMER_ID = '$id'";
		$conn->query($sql);
	}
	if($newpass_hash && $pass_hash){
		$sql = "UPDATE customer SET PASSWORD = '$newpass_hash' WHERE CUSTOMER_ID = '$id' AND PASSWORD = '$pass_hash'";
		$conn->query($sql);
	}
	if($mailmagazine == 0 || $mailmagazine == 1){
		$sql = "UPDATE customer SET EMAIL_PERMIT = '$mailmagazine' WHERE CUSTOMER_ID = '$id'";
		$conn->query($sql);
	}
}
$conn->close();
header('Location: account_update.php');
?>