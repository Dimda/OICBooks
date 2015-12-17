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
	include("includes/connect_DB.php");

  $date = date("Y");
  ?>

    <form action="admin_earnings.php" method="post" >

      <p>始まりの年と月を選んでください</p>
      <input type="text" name="before_year" size="4" maxlength="4" value=<?php echo $date ?>>
      <select name="before_month">
        <option value="">月を選んでください</option selected>
        <option value="01">1月</option>
        <option value="02">2月</option>
        <option value="03">3月</option>
        <option value="04">4月</option>
        <option value="05">5月</option>
        <option value="06">6月</option>
        <option value="07">7月</option>
        <option value="08">8月</option>
        <option value="09">9月</option>
        <option value="10">10月</option>
        <option value="11">11月</option>
        <option value="12">12月</option>
      </select><br/>

    
      <p>終わりの年と月を選んでください</p>
      <input type="text" name="after_year" size="4" maxlength="4" value=<?php echo $date ?>>
      <select name="after_month">
        <option value="">月を選んでください</option selected>
        <option value="01">1月</option>
        <option value="02">2月</option>
        <option value="03">3月</option>
        <option value="04">4月</option>
        <option value="05">5月</option>
        <option value="06">6月</option>
        <option value="07">7月</option>
        <option value="08">8月</option>
        <option value="09">9月</option>
        <option value="10">10月</option>
        <option value="11">11月</option>
        <option value="12">12月</option>
      </select><br/>

      
      <input type="submit" value="送信">
    </form>

  <?php
  if(isset($_POST["before_month"], $_POST["after_month"]))
  {
    $before = $_POST["before_year"]."-".$_POST["before_month"];
    $after = $_POST["after_year"]."-".$_POST["after_month"];
      echo $before;
      echo $after;
      $order_id= "SELECT ORDER_ID FROM order WHERE PURCHASE_DATE BETWEEN '2015-12-17' AND '2015-12-17'";
  	//$sql = "SELECT SUM(PRODUCT_PRICE*QUANTITY) FROM ORDERED_PRODUCT";
  	$result = $conn->query($order_id);
  	while($row = $result->fetch())
    {
  	  $sql = "SELECT SUM(PRODUCT_PRICE*QUANTITY) FROM ORDERED_PRODUCT WHERE '{$row}' = ORDER_ID";
  	}
    $result = $conn->query($sql);
    echo "売り上げは".$result."円です";
  }
	?>
  <?php include("includes/admin_bottom.html") ?>
