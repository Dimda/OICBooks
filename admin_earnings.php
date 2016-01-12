<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/admin.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/product_edit.css" media="all">
  <title>管理者ページ</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
</head>
  <?php include("includes/admin_top.php") ?>
  <h1>
  <?php
	

  $date = date("Y");
  ?>

    <form action="admin_earnings.php" method="post" >

      <p>始まりの年と月と日を選んでください</p>
      <input type="date" name="before" size="4" maxlength="4" value=<?php echo $date ?>>

    
      <p>終わりの年と月と日を選んでください</p>
      <input type="date" name="after" size="4" maxlength="4" value=<?php echo $date ?>>
      
      <input type="submit" value="送信">
    </form>

  <?php
  include("includes/connect_DB.php");
  if(isset($_POST["before"], $_POST["after"]))
  {
    $before = $_POST["before"];
    $after = $_POST["after"];
	  $sql = "SELECT SUM(PRODUCT_PRICE*QUANTITY) FROM ordered_product WHERE PURCHASE_DATE BETWEEN '{$before}' AND '{$after}'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
      echo "売り上げは".$row["SUM(PRODUCT_PRICE*QUANTITY)"]."円です";
    }
    $conn->close();
  }
	?>
  <?php include("includes/admin_bottom.html") ?>
