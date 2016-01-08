<?php
$title            = 'イベント情報登録';
$cssLink[0]       = 'admin.css';
$cssLink[1]				=	'product_edit.css';
include("includes/admin_top.php")
?>

<div class="event-service">
<h2>イベント情報の登録</h2>

<form method="post" action="event_complete.php" enctype="multipart/form-data">
	<p>１つ目の画像<br>
		<input type="file" name="event_image1">
		<input type="submit" name="submit_image1" value="登録する">
	</p>
	<p>２つ目の画像<br>
		<input type="file" name="event_image2">
		<input type="submit" name="submit_image2" value="登録する">
	</p>
	<p>３つ目の画像<br>
		<input type="file" name="event_image3">
		<input type="submit" name="submit_image3" value="登録する">
	</p>
</form>

<?php include("includes/admin_bottom.html");?>
