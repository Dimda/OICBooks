<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/main_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>ログイン</title>
</head>
<body>
  <?php include("includes/sidebar.html"); ?>
  <?php include("includes/header.html"); ?>
  <main>
    <div id="login-screen">
    	<?php
        $_SESSION = array();

        if (isset($_COOKIE["PHPSESSID"])) {
         setcookie("PHPSESSID", '', time() - 1800, '/');
        }

        session_destroy();
        echo "ログアウトしました";
    	?>
    </div>
  </main>
  <?php include("includes/footer.html"); ?>
</body>
</html>