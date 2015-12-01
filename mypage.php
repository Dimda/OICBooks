<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/mypage.css" media="all">
    <link rel="stylesheet" type="text/css" href="CSS/main_color.css" media="all">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>OICBooks</title>
</head>
<body>
  <?php include("includes/sidebar.html"); ?>
  <?php include("includes/header.html"); ?>
	<main>
    <div id="account_service">
      <h2>アカウントサービス</h2>
      <section id="order_history">
        <h3>注文履歴</h3>
      </section>
      <section id="change">
        <h3>アカウント設定</h3>
        <nav>
          <ul>
            <li><a href="account_update.php">名前、Eメールアドレス、携帯番号、パスワードの変更</a></li>
          </ul>
        </nav>

      </section>
    </div>
  </main>
  <?php include ("includes/top.html");?>
  <?php include("includes/footer.html"); ?>
</body>
</html>
