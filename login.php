<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/star_wars.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>サインイン</title>
</head>
<body>
  <?php include("includes/sidebar.html"); ?>
  <?php include("includes/header.html"); ?>
  <main>
    <div class="type-pers-parent">
      <div class="type-pers-child">
        <div id="login-screen">
          <form action="login_check.php" method="post" name="login">
            <p>
              メールアドレス
              <input id = "email" name="email">
            </p>
            <p>
              パスワード
              <input type="password" id = "password" name="password">
            </p>
              <input id="login_btn" type="submit" value="ログイン">
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php include("includes/footer.html"); ?>
  <script type="text/javascript" src="js/classie.js"></script>
  <script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>
