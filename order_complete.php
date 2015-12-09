<?php
	session_start();
	echo $_SESSION["order_sum"];
	echo "<br>";
	echo $_SESSION["add_customer_point"];
	echo "<br>";
	echo $_SESSION["take_customer_point"];
	echo "<br>";
	echo $_SESSION["delivery"];
	echo "<br>";
	echo $_SESSION["day_select"];
	echo "<br>";
	echo $_SESSION["time_select"];
	echo "<br>";

	echo "customer_id=".$_SESSION["CUSTOMER_ID"]."<br>";
	echo "billing_name=".$_SESSION["CUSTOMER_NAME"]."<br>";
	echo "delivery_name=".$_SESSION["delivery_name"]."<br>";
	echo "email_address=".$_SESSION["EMAIL_ADDRESS"]."<br>";
	echo "purchase_date="."test"."<br>";
	echo "order_status="."test"."<br>";
	echo "billing_address=".$_SESSION["BILLING_ADDRESS"]."<br>";
	echo "delivery_address=".$_SESSION["delivery_zip"].$_SESSION["address"]."<br>";
?>