<?php

	include'includes/class.phpmailer.php';

	$quantity = $_POST["QUANTITY"];
	$check = $_POST["check"];
	for ($i = 0 ; $i < count($quantity); $i++) {
		if($quantity[$i] == 0)
			continue;
	$subject = "商品の発注について";
    //$subject = mysqli_real_escape_string($conn, $subject);
    $message = "test";
    //$message = mysqli_real_escape_string($conn, $message);

    $from = "oicbooks2@gmail.com";
    $pass = "cocacola1111";
    $fromname = 'OICBooks_hide';
    $to = "kutuzov1228@gmail.com";
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
    $mail->SMTPDebug = 2;
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
      echo 'Mail send Success!';
    } else {
      //エラー処理
    }
    exit;
	}

?>