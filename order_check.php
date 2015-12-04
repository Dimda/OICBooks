<?php
$title              = '発注確認';
$subtitle           = '発注確認';

$sideElement[0]     = '在庫情報の編集';
$sideElementLink[0] = 'admin_stock_manager.php';
$sideElement[1]     = '商品の発注';
$sideElementLink[1] = 'product_order.php';

$cssLink[0]         = 'admin.css';
$cssLink[1]         = 'admin_product_manager.css';

$scriptSource[0]    = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js';
$scriptSource[1]    = '//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js';
$scriptSource[2]    = 'js/admin_product_manager.js';

include("includes/admin_top.php");
?>
<div id="product-manager">
  <?php
    foreach ($_POST["check"] as $key => $value) {
      print $key.'=>'.$value;
      echo "<br>";
    }
  ?>
</div>

<?php include("includes/admin_bottom.html");?>
