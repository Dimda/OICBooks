<?php
$ID = $_GET["ID"];
include("includes/connect_DB.php");
$sql = "SELECT PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DESCRIPTION, PRODUCT_AUTHOR, STOCK FROM PRODUCT WHERE PRODUCT_ID = $ID";
$result = $conn->query($sql);
$matches = glob('./product_image/' . $_GET["ID"] . "*");
while($row = $result->fetch_assoc()){
  $productName = $row["PRODUCT_NAME"];
  $productDescription = $row["PRODUCT_DESCRIPTION"];
  $productPrice = $row["PRODUCT_PRICE"];
  $productAuthor = $row["PRODUCT_AUTHOR"];
  $productStock = $row["STOCK"];
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/sidebar.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/product_details.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <title><?php echo $productName; ?></title>
  <meta charset="utf-8">
</head>
<body>
 <?php include("includes/header.html"); ?>
 <?php include("includes/sidebar.html"); ?>
 <main>
   <div id="product-info-wrapper">
     <div id="product-picture"><img class="product-picture" src="<?php echo $matches[0] ?>"></div>
     <div id="block">
      <div id="product-name"><?php echo $productName; ?></div>
      <div id ="product-author"><?php echo $productAuthor; ?>(著)</div>
      <div id="product-stock">
        価格：<span id="product-price"><?php echo $productPrice; ?>円</span>
        <?php
        if($productStock > 0){
          if($productStock <= 10){
            echo "<div id='exist'>残り<b>".$productStock."</b>点です。</div>";
          }else{
            echo "<div id='exist'>在庫あり</div>";
          }
        }else{
          echo "<div id='nothing'>在庫なし</div>";
        }
        ?>
      </div>
      <div id="add-cart">
        <?php
        if(isset($_SESSION["CUSTOMER_NAME"])){
          echo '<form method="POST" action="add_cart.php?ID='.$ID.';">
          <input type="submit" name="add-cart" value="カートに追加">
          <input type="number" min="1" name="QUANTITY" value="1">
        </form>
        ';
      }
      ?>
      </div>
      <div id="product-description"><?php echo $productDescription; ?></div>
    </div>
</div>
</main>
<?php include ("includes/top.html"); ?>
<?php include("includes/footer.html"); ?>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>
