<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/default.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/mypage.css" media="all">
    <link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>アカウントサービス</title>
</head>
<body>
  <?php include("includes/sidebar.html"); ?>
  <?php include("includes/header.html"); ?>
  <?php include("includes/connect_DB.php"); ?>
	<main>
    <div id="account_service">
      <h2>アカウントサービス</h2>
      <?php
        $id = $_SESSION["CUSTOMER_ID"];
        $result = $conn->query("SELECT FIRST_NAME, LAST_NAME, `POINT` FROM customer WHERE CUSTOMER_ID = $id");
        while($row = $result->fetch_assoc()){
          echo $row["FIRST_NAME"].$row["LAST_NAME"]."さんのポイント:".$row["POINT"].'<br>';
        }
      $conn->close();
      ?>
      <section id="order_history">
        <h3>注文履歴</h3>
        <nav>
          <ul>
            <li><a href="account_history.php">注文履歴の表示</a></li>
          </ul>
        </nav>
      </section>
      <section id="change">
        <h3>アカウント設定</h3>
        <nav>
          <ul>
            <li><a href="account_update.php">アカウント登録情報の変更</a></li>
          </ul>
        </nav>

      </section>
    </div>
  </main>
  <?php include ("includes/top.html");?>
  <?php include("includes/footer.html"); ?>
  <script type="text/javascript" src="js/classie.js"></script>
  <script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>
