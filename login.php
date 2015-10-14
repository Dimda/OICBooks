<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
  <title>ログイン</title>
</head>
<body>
  <?php include("includes/sidebar.html"); ?>
  <?php include("includes/header.html"); ?>
  <main>
    <div id="login-screen">
      <p>
        メールアドレス
        <input id = "email">
      </p>
      <p>
        パスワード
        <input type="password" id = "password">
      </p>
      <button>ログイン</button>
    </div>
  </main>
  <?php include("includes/footer.html"); ?>
</body>
</html>
