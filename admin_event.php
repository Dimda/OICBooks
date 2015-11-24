<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/admin.css" media="all">
  <title>管理者ページ</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
</head>
<?php include("includes/admin_top.html") ?>

<div class="event-service">
<h2>イベント情報の登録</h2>


<form method="post" action="#" enctype="multipart/form-data">
<p>１つ目の画像<br/>
	<input type="file" name="event_image1"></p>

<p>２つ目の画像<br/>
	<input type="file" name="event_image2"></p>

<p>３つ目の画像<br/>
	<input type="file" name="event_image3"></p>

<p>４つ目の画像<br/>
	<input type="file" name="event_image4"></p>

<p><input type="submit" value="送信する"></p>

<?php include("includes/admin_bottom.html");?>
