<?php
	session_start();
	include'includes/class.phpmailer.php';
	include("includes/connect_DB.php");
	$customer_id  = $_SESSION["CUSTOMER_ID"];
	$billing_name = $_SESSION["CUSTOMER_NAME"];
	$delivery_name= $_SESSION["delivery_name"];
	$email_address= $_SESSION["EMAIL_ADDRESS"];
	$order_sum	  =	$_SESSION["order_sum"];
	$delivery     = $_SESSION["delivery"];
	$delivery_name= $_SESSION["delivery_name"];
	$date 		  = date('Y-m-d H:i:s');
	$order_status_description = "test";
	$day_select   = $_SESSION["day_select"];
	$time_select  = $_SESSION["time_select"];
	$billing_address = $_SESSION["BILLING_ADDRESS"];
	$delivery_address = $_SESSION["delivery_zip"].$_SESSION["address"];
	$email_message ="";

	//orderテーブル追加
	$sql =  "INSERT INTO `order` (`ORDER_ID`, `CUSTOMER_ID`, `BILLING_NAME`, `DELIVERY_NAME`, `EMAIL_ADDRESS`, `PURCHASE_DATE`, `ORDER_STATUS_DESCRIPTION`, `BILLING_ADDRESS`, `DELIVERY_ADDRESS`)
	 VALUES (NULL, '$customer_id', '$billing_name', '$delivery_name', '$email_address', '$date ', '$order_status_description', '$billing_address', '$delivery_address');";
	$conn->query($sql);
	$order_id = $conn->insert_id;
	$cart_id = $_SESSION["CART_ID"];
	$sql = "SELECT PRODUCT_ID,QUANTITY FROM CART_PRODUCTS WHERE CART_ID = '$cart_id'";
	$result = $conn->query($sql);
	//ordered_productテーブル追加
	while($row = $result->fetch_assoc()){
		$product_id = $row["PRODUCT_ID"];
		$quantity = $row["QUANTITY"];
		$sql = "SELECT PRODUCT_NAME,PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_ID = '$product_id'";
		$product_detail = $conn->query($sql);

		while($row = $product_detail->fetch_assoc()){
			$product_name = $row["PRODUCT_NAME"];
			$product_price= $row["PRODUCT_PRICE"];
			$price_sum    = $product_price * $quantity;
			$email_message= $email_message."
			「{$product_name}」を{$quantity}冊 小計{$price_sum}円";
		}
		$sql =  "INSERT INTO `ordered_product` (`ORDERED_PRODUCT_ID`, `PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `QUANTITY`, `ORDER_ID`)
	 				VALUES (NULL, '$product_id','$product_name','$product_price','$quantity','$order_id');";
		$conn->query($sql);
	}

	//cart_status更新：終了
	$sql =  "UPDATE CART SET CART_STATUS = 'FINISH' WHERE CART_ID = '$cart_id'";
	$conn->query($sql);
	//新しいカートを割り当て
	$sql = "INSERT INTO CART (CUSTOMER_ID,CART_DATE_ADDED,CART_STATUS) VALUES ('$customer_id','$date','add-test')";
	$conn->query($sql);
	//新しいセッションidを割り当て
	$sql =  "SELECT CART_ID FROM CART WHERE CUSTOMER_ID = '$customer_id' and CART_STATUS <> 'FINISH'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

		$_SESSION["CART_ID"] = $row["CART_ID"];
	
	//ポイントの割り当て
	$sql =  "SELECT POINT FROM CUSTOMER WHERE CUSTOMER_ID = '$customer_id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$point_result = $row["POINT"] - $_SESSION["take_customer_point"] + $_SESSION["add_customer_point"];
	$sql =  "UPDATE CUSTOMER SET POINT = '$point_result'WHERE CUSTOMER_ID = '$customer_id'";
	$conn->query($sql);

	//自動メール送信
	$subject = "{$billing_name}さま。商品のご購入ありがとうございました！！";
    //$subject = mysqli_real_escape_string($conn, $subject);
    $message = "
    {$date}に伺いました
    ご購入ありがとうございました
    {$email_message}
    配送料は300円です
    合計金額は{$order_sum}円です
    配達業者は{$delivery}です
    お届け日時は{$day_select}の{$time_select}で伺いました
    配達先は
    {$delivery_name}さま
    {$delivery_address}
    で伺いました
    銀行振り込みお願いします
    1234567890
    ";
    //$message = mysqli_real_escape_string($conn, $message);

    $from = "oicbooks2@gmail.com";
    $pass = "cocacola1111";
    $fromname = 'OICBooks_hide';
    $to = $_SESSION["EMAIL_ADDRESS"];
    //body作成
    $mbody = $message;
    //メール送信処理
    mb_language('japanese');
    mb_internal_encoding('UTF-8');

    //インスタンス生成
    $mail = new PHPMailer();
    $mail->CharSet = 'iso-2022-jp';
    $mail->Encoding = '7bit';

    //SMTP接続
    $mail->IsSMTP();
    $mail->SMTPAuth = TRUE;
    //$mail->SMTPDebug = 2;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.googlemail.com';
    $mail->Port = 465;
    $mail->Username = $from; //Gmailのアカウント名
    $mail->Password = $pass; //Gmailのパスワード

    $mail->From = $from; //差出人(From)をセット
    $mail->FromName = mb_encode_mimeheader($fromname, 'JIS'); //差出人(From名)をセット
    $mail->Subject = mb_encode_mimeheader($subject, 'JIS');   //件名(Subject)をセット
    $mail->AddAddress($to); //宛先
    $mail->Body  = mb_convert_encoding($mbody, 'JIS', 'UTF-8'); //本文(Body)をセット

    //メール送信
    if ($mail->Send()){
      //echo 'Mail send Success!';
    } else {
      //エラー処理
    }
	$conn -> close();
	header('location: index.php');
	exit();
?>