<?php
require_once 'class.phpmailer.php';

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
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'oicbooks2'; //Gmailのアカウント名
$mail->Password = 'cocacola1111'; //Gmailのパスワード

$mail->From = 'oicbooks2@gmail.com'; //差出人(From)をセット
$fromname = '足長おじさん';
$mail->FromName = mb_encode_mimeheader($fromname, 'JIS'); //差出人(From名)をセット
$subject = 'メール送信テスト';
$mail->Subject = mb_encode_mimeheader($subject, 'JIS');   //件名(Subject)をセット
$mail->AddAddress('kutuzov1228@gmail.com'); //宛先

//body作成
$mbody = 'このメールはテストメールです。' . PHP_EOL . '返信不要';
$mail->Body  = mb_convert_encoding($mbody, 'JIS', 'UTF-8'); //本文(Body)をセット

//メール送信
if ($mail->Send()){
  echo 'Mail send Success!';
} else {
  //エラー処理
}
exit;
?>