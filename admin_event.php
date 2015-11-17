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