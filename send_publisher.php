<?php
	include'includes/class.phpmailer.php';
    include("includes/connect_DB.php");

	$quantity = $_POST["QUANTITY"];
	$check = $_POST["check"];
	for ($i = 0 ; $i < count($quantity); $i++) {
		if($quantity[$i] == 0)
			continue;
        $sql = "SELECT PRODUCT_NAME FROM PRODUCT WHERE PRODUCT_ID = '{$check[$i]}'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $product = $row["PRODUCT_NAME"];
        }
        $sql = "SELECT PUBLISHER_NAME,PUBLISHER_MAIL FROM PUBLISHER WHERE PUBLISHER_ID = (SELECT PUBLISHER_ID FROM PRODUCT WHERE PRODUCT_ID = '{$check[$i]}')";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $message = '商品の発注:'.$row["PUBLISHER_NAME"].'様'.'
            '.$product.'を'.$quantity[$i].'個くださいな';
            $to = $row["PUBLISHER_MAIL"];
        }
        $subject = "商品の発注について";
        //$subject = mysqli_real_escape_string($conn, $subject);
        //$message = mysqli_real_escape_string($conn, $message);

        $from = "oicbooks2@gmail.com";
        $pass = "cocacola1111";
        $fromname = 'OICBooks';
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
            $sql = "SELECT STOCK FROM PRODUCT WHERE PRODUCT_ID = '{$check[$i]}'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $product_stock = $row["STOCK"];
            }
            $product_stock = $quantity[$i] + $product_stock;
            $sql = "UPDATE PRODUCT SET STOCK = '{$product_stock}' WHERE PRODUCT_ID = '{$check[$i]}'";
            $conn->query($sql);
            header('location: product_order.php');
        } else {
        //エラー処理
            echo "えらーだぜぇ";
        }
	}
    exit;
    $conn->close();
?>