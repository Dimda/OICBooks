<?php
  $ID = $_GET["id"];
  include("includes/connect_DB.php");
  $sql = "SELECT PRODUCT_NAME, PRODUCT_PRICE, PRODUCTY_DESCRIPTION FROM PRODUCT WHERE PRODUCT_ID = $ID";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    $productName = $row["PRODUCT_NAME"];
    $productDescription = $row["PRODUCT_DESCRIPTION"];
    $productPrice = $row["PRODUCT_PRICE"];
  }
 ?>
<!DOCTYPE HTML>
<html>
 <head>
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/product_details.css" media="all">
    <title><?php echo $productName; ?></title>
    <meta charset="utf-8">
 </head>
 <body>
   <?php include("includes/header.html"); ?>
   <?php include("includes/sidebar.html"); ?>
   <main>
     <div id="product-info-wrapper">
       <div id="product-picture"><img class="product-picture" src="product_image/<?php echo $ID; ?>.jpg"  width="auto" height="500px"></div>

       <div id="product-name"><b><?php echo $productName; ?></b></div>
       <div id="product-description"><?php echo $productDescription; ?></div>
       <div id="product-price"><?php echo $productPrice; ?>円</div>
    </div>
   </main>
   <?php include("includes/footer.html"); ?>
 </body>
</html>
