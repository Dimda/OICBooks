<?php
$title              = '商品管理';
$subtitle           = '商品追加';

$sideElement[0]     = '商品の編集、削除';
$sideElementLink[0] = 'admin_product_manager.php';
$sideElement[1]     = '商品追加';
$sideElementLink[1] = 'product_add.php';

$cssLink[0]         = 'admin_product_manager.css';
$cssLink[1]         = 'product_add.css';
$cssLink[2]         = 'product_manager.css';
$cssLink[3]         = 'admin.css';

$scriptSource[0]    = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js';
$scriptSource[1]    = '//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js';


include("includes/admin_top.php");
?>

<form id="edit-form" action="product_add_complete.php" method="post" enctype="multipart/form-data">
  <div class="form-contents">
    <p>
      <label for="product-name">商品名</label>
      <input id="product-name" type="text" name="productName" value="">
    </p>
    <p>
      <label for="product-author">作者名</label>
      <input id="product-author" type="text" name="productAuthor" value="">
    </p>
    <p>
      <label for="product-date-available">発売日</label>
      <input id="product-date-available" data-validation="birthdate" data-validation-help="yyyy-mm-dd の形式" name="productDateAvailable" value="">
    </p>
    <p>
      <label for="product-description">商品明細</label>
      <textarea id="product-description" type="text" cols="30" rows="15" name="productDescription"></textarea>
    </p>
    <p>
      <label for="product-price">価格</label>
      <input id="product-price" type="number"  name="productPrice" data-validation="number" data-validation-error-msg="数字ではありません。" value=''><br>
    </p>
    <p>
      <label id="file-upload" for="fileToUpload">画像ファイル</label>
      <input type="file" name="fileToUpload">
      <label for="fileToUpload" id="file-description">jpg, jpeg, png, gif　ファイル 5mb まで</label>
    </p>
  </div>
  <div id="bott-buttons">
    <input type="submit" value="登録" class="button" name="submit" >
    <a href="./admin_product_manager.php" class="button">キャンセル</a>
  </div>
</form>

<?php include("includes/admin_bottom.html"); ?>
<script>
  $.validate({
  form : '#edit-form'
  });
</script>
