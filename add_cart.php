<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/search_results.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/main_color.css" media="all">
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
      $date = date('Y-m-d H:i:s');
      $customer_id = $_SESSION["CUSTOMER_ID"];
      echo "商品番号";
      echo "<br>";
      echo $product_id;
      echo "<br>";
      echo "個数は";
      echo "<br>";
      echo $quantity;
      echo "<br>";
      echo "時間";
      echo "<br>";
      echo $date;
      echo "<br>";
      echo "顧客id";
      echo $customer_id;

      include("includes/connect_DB.php");
      $sql = "INSERT INTO CUSTOMER (CUSTOMER_ID,CART_DATE_ADDED,CART_STATUS) VALUES ('$customer_id','$date','test02')";
      $conn->query($sql);
      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
      $conn->close();
		?>
    </div>
  </main>
 <?php include ("includes/top.html");?>
 <?php include("includes/footer.html"); ?>
</body>
</html>
