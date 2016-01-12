<?php
$title              = '商品管理';
$subtitle           = '商品編集';

$sideElement[0]     = '商品の編入、削除';
$sideElementLink[0] = 'admin_product_manager.php';
$sideElement[1]     = '商品追加';
$sideElementLink[1] = 'product_add.php';

$cssLink[0]         = 'admin.css';
$cssLink[1]         = 'product_edit.css';
$cssLink[2]         = 'admin_product_manager.css';

$scriptSource[0]    = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js';
$scriptSource[1]    = '//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js';
$scriptSource[2]    = 'js/addOtherOption.js';


include("includes/admin_top.php");

function findCurrentValue(&$id, &$name, &$currentID){
  if($id == $currentID){
    echo '<option value="' . $id . '" selected="selected">' . $name .'</option>';
  }else{
    echo '<option value="' . $id . '">' . $name .'</option>';
  }

}

$ID = $_GET["ID"];
$imageErrNum = array();
if(isset($_GET["imageErrNum"])){
  $imageErrNum = explode(",", $_GET["imageErrNum"]);
}


include("includes/connect_DB.php");
$sql = "SELECT * FROM product WHERE PRODUCT_ID = $ID";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
  $productName = $row["PRODUCT_NAME"];
  $productDescription = $row["PRODUCT_DESCRIPTION"];
  $productPrice = $row["PRODUCT_PRICE"];
  $product = array(
    "isbn" =>                $row["PRODUCT_ISBN"],
    "name" =>                $row["PRODUCT_NAME"],
    "author" =>              $row["PRODUCT_AUTHOR"],
    "price" =>               $row["PRODUCT_PRICE"],
    "description" =>         $row["PRODUCT_DESCRIPTION"],
    "dateAvailabe" =>        $row["PRODUCT_DATE_AVAILABLE"],
    "changeDate" =>          $row["PRODUCT_CHANGE_DATE"],
    "category" =>            $row["CATEGORY_ID"],
    "tax" =>                 $row["TAX_RATE_CODE"],
    "publisher" =>           $row["PUBLISHER_ID"],
    "stock" =>               $row["stock"],
    "keyword" =>             $row["KEYWORD"]
  );
}
?>
<form id="edit-form" action="product_edit_complete.php?ID=<?php echo $ID; ?>" method="post" enctype="multipart/form-data">
  <div class="form-contents">
    <?php
    include("includes/error_messages.php");

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
      <div class="label"><label for="product-isbn" >ISBN</label></div>
      <div class="input"><input id="product-isbn" name="productISBN" required="required" value= "<?php echo $product['isbn']; ?>"></div>
    </p>
    <p>
      <div class="label"><label for="product-name">商品名</label></div>
      <div class="input"><input id="product-name" type="text" name="productName" data-validation-error-msg="商品名を入力してください" required="required" value= "<?php echo $product['name']; ?>"></div>
    </p>
    <p>
      <div class="label"><label for="product-author">作者名</label></div>
      <div class="input"><input id="product-author" type="text" name="productAuthor" data-validation-error-msg="作者名を入力してください"　required="required" value= "<?php echo $product['author']; ?>"></div>
    </p>
    <p>
      <div class="label"><label for="product-date-available">発売日</label></div>
      <div class="input"><input id="product-date-available" data-validation="birthdate" data-validation-help="yyyy-mm-dd の形式" data-validation-error-msg="発売日を入力してください" name="productDateAvailable" required="required" value= "<?php echo $product['dateAvailabe']; ?>"></div>
    </p>
    <p>
      <div class="label"><label for="product-description">商品明細</label></div>
      <div class="input"><textarea id="product-description" type="text" cols="30" rows="15" name="productDescription" data-validation-error-msg="商品明細を入力してください" required="required"> <?php echo $product['description']; ?> </textarea></div>
    </p>
    <p>
      <div class="label"><label for="product-category">カテゴリー</label></div>
      <div class="input">
        <select id="product-category" name="productCategory" onchange='CheckOther(this.value);'>
          <?php
          $sql = "SELECT * FROM category";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
            findCurrentValue($row['CATEGORY_ID'], $row['CATEGORY_NAME'], $product['category']);
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
          $sql = "SELECT * FROM tax_rate";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
            $taxPercent = (int)substr($row["TAX_RATE"], -2) . "%";
            findCurrentValue($row['TAX_RATE_CODE'], $taxPercent, $product['tax']);
            /*echo '<option value="' . $row['TAX_RATE_CODE'] . '">' . (int)substr($row["TAX_RATE"], -2) .'%</option>';*/
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
          $sql = "SELECT * FROM publisher";
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
      <div class="input"><input id="product-price" type="number"  name="productPrice" data-validation="number" data-validation-error-msg="数字ではありません。" required="required" value= "<?php echo $product['price']; ?>"></div>
    </p>
    <p>
      <div class="label"><label for="product-stock">在庫数</label></div>
      <div class="input"><input id="product-stock" type="number" name="productstock" data-validation="number" data-validation-error-msg="数字ではありません。" required="required" value= "<?php echo $product['stock']; ?>"></div>
    </p>
    <p>
      <div class="label"><label for="product-keyword" value= "<?php echo $product['keyword']; ?>">検索キーワード</label></div>
      <div class="input"><input id="product-keyword" type="text" name="productKeyword" value=""></div>
    </p>
    <p>
      <div class="label"><label id="file-upload" for="fileToUpload">画像ファイル</label></div>
      <div class="input"><input type="file" name="fileToUpload"></div>
      <label for="fileToUpload" id="file-description">jpg, jpeg, png, gif　ファイル 5mb まで</label>
    </p>
  </div>
  </div>
  <div id="bott-buttons">
    <input type="submit" value="登録" class="button" name="submit" >
    <a href="./admin_product_manager.php" class="button">キャンセル</a>
  <div>
</form>

<?php include("includes/admin_bottom.html") ?>
<script>
  $.validate({
  form : '#edit-form'
  });
  function CheckOther(val){
   var element=document.getElementById('product-category');
   if(val=='new'){
     element.style.display='block';
     console.log("成功");
   }else{
     element.style.display='none';
   }
  }
</script>
