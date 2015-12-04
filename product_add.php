<?php
$title              = '商品管理';
$subtitle           = '商品追加';

$sideElement[0]     = '商品の編集、削除';
$sideElementLink[0] = 'admin_product_manager.php';
$sideElement[1]     = '商品追加';
$sideElementLink[1] = 'product_add.php';

$cssLink[0]         = 'admin_product_manager.css';
$cssLink[1]         = 'product_add.css';
$cssLink[2]         = 'admin.css';

$scriptSource[0]    = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js';
$scriptSource[1]    = '//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js';


include("includes/admin_top.php");
include("includes/connect_DB.php")
?>
<form id="add-form" action="product_add_complete.php" method="post" enctype="multipart/form-data">
  <div class="form-contents">
    <?php
    include("includes/error_messages.php");
    
    $imageErrNum = array();
    if(isset($_GET["imageErrNum"])){
      $imageErrNum = explode(",", $_GET["imageErrNum"]);
    }
    if(isset($_GET["imageErrNum"])){
      echo '<div class="error-log">';
        foreach($imageErrNum as $num){
          if($num == 1){
            echo $imageErrMessages[0] . "<br>";
          }else if ($num == 2){
            echo $imageErrMessages[1] . "<br>";
          }else if ($num == 3){
            echo $imageErrMessages[2] . "<br>";
          }else if ($num == 4){
            echo $imageErrMessages[3] . "<br>";
          }
        }
      echo '</div>';
    }
    if(isset($_GET["success"])){
      echo
      '<div class="success-log">
        更新しました。
      </div>';
    }

    ?>
    <p>
      <div class="label"><label for="product-isbn">ISBN</label></div>
      <div class="input"><input id="product-isbn" type="text" name="productISBN" value=""></div>
    </p>
    <p>
      <div class="label"><label for="product-name">商品名</label></div>
      <div class="input"><input id="product-name" type="text" name="productName" value=""></div>
    </p>
    <p>
      <div class="label"><label for="product-author">作者名</label></div>
      <div class="input"><input id="product-author" type="text" name="productAuthor" value=""></div>
    </p>
    <p>
      <div class="label"><label for="product-date-available">発売日</label></div>
      <div class="input"><input id="product-date-available" data-validation="birthdate" data-validation-help="yyyy-mm-dd の形式" name="productDateAvailable" value=""></div>
    </p>
    <p>
      <div class="label"><label for="product-description">商品明細</label></div>
      <div class="input"><textarea id="product-description" type="text" cols="30" rows="15" name="productDescription"></textarea></div>
    </p>
    <p>
      <div class="label"><label for="product-category">カテゴリー</label></div>
      <div class="input">
        <select id="product-category" name="productCategory">
          <?php
          $sql = "SELECT * FROM CATEGORY";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
            echo '<option value="' . $row['CATEGORY_ID'] . '">' . $row["CATEGORY_NAME"] .'</option>';
          }
          ?>
          <option value="new">新規</option>
        </select>
      </div>
    </p>
    <p>
      <div class="label"><label for="product-tax-rate">税率</label></div>
      <div class="input">
        <select id="product-tax" name="productTax">
          <?php
          $sql = "SELECT * FROM TAX_RATE";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
            echo '<option value="' . $row['TAX_RATE_CODE'] . '">' . (int)substr($row["TAX_RATE"], -2) .'%</option>';
          }
          ?>
          <option value="new">新規</option>
        </select>
      </div>
    </p>
    <p>
      <div class="label"><label for="product-publisher">出版社</label></div>
      <div class="input">
        <select id="product-publisher" name="productPublisher">
          <?php
          $sql = "SELECT * FROM PUBLISHER";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
            echo '<option value="' . $row['PUBLISHER_ID'] . '">' . $row["PUBLISHER_NAME"] .'</option>';
          }
          ?>
          <option value="new">新規</option>
        </select>
      </div>
    </p>
    <p>
      <div class="label"><label for="product-price">価格</label></div>
      <div class="input"><input id="product-price" type="number"  name="productPrice" data-validation="number" data-validation-error-msg="数字ではありません。" value=''></div>
    </p>
    <p>
      <div class="label"><label for="product-stock">在庫数</label></div>
      <div class="input"><input id="product-stock" type="text" name="productStock" data-validation="number" data-validation-error-msg="数字ではありません。" value=""></div>
    </p>
    <p>
      <div class="label"><label for="product-keyword">検索キーワード</label></div>
      <div class="input"><input id="product-keyword" type="text" name="productKeyword" value=""></div>
    </p>
    <p>
      <div class="label"><label id="file-upload" for="fileToUpload">画像ファイル</label></div>
      <div class="input"><input type="file" name="fileToUpload"></div>
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
  form : '#add-form'
  });
</script>
