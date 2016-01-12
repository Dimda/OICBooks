<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/search_results.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/default_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>カートに追加しました</title>
  <meta charset="utf-8">
</head>
<body>
  <?php include("includes/header.html"); ?>
  <?php include("includes/sidebar.html"); ?>
  <main>
    <div id="add-cart">
    	<h1>カートに追加しました</h1>
    	<?php
      $product_id = $_GET["ID"];
      $quantity = $_POST["QUANTITY"];
      $cart_id = $_SESSION["CART_ID"];

      include("includes/connect_DB.php");

      $sql =  "SELECT `CART_ID` FROM `cart_products` WHERE `PRODUCT_ID` = '$product_id' and `CART_ID` =
      (SELECT `CART_ID` FROM `cart` WHERE `CART_STATUS` <> 'FINISH' and `CART_ID` = '$cart_id')";

      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      if(isset($row["CART_ID"])){
        $sql =  "SELECT QUANTITY FROM cart_product WHERE PRODUCT_ID = '$product_id'and CART_ID = 
      (SELECT CART_ID FROM cart WHERE CART_STATUS <> 'FINISH' and CART_ID = '$cart_id')";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $quantity = $row["QUANTITY"] + $quantity;
        $sql = "UPDATE cart_product SET QUANTITY = '$quantity' WHERE CART_ID = '$cart_id' AND PRODUCT_ID ='$product_id'and CART_ID = 
      (SELECT CART_ID FROM cart WHERE CART_STATUS <> 'FINISH' and CART_ID = '$cart_id')";
        $conn->query($sql);
      }else {
        $sql = "INSERT INTO cart_product (CART_ID,PRODUCT_ID,QUANTITY) VALUES ('$cart_id','$product_id','$quantity')";
        $conn->query($sql);
      }

      $sql = $conn->query("SELECT PRODUCT_NAME FROM product WHERE PRODUCT_ID = $product_id");
      while($product_name = $sql->fetch_assoc()){
        echo "商品番号".$product_name["PRODUCT_NAME"]."を";
      }
      echo "<br>";
      echo $_POST['QUANTITY'];
      echo "個追加しました";

      $conn->close();
		  ?>
    </div>
  </main>
 <?php include ("includes/top.html");?>
 <?php include("includes/footer.html"); ?>
 <script type="text/javascript" src="js/classie.js"></script>
 <script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>
