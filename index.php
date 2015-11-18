<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.cbkonami.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/top_page.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/main_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <title>OICBooksへようこそ！</title>
</head>
<body>

  <?php include("includes/header.html"); ?>
  <?php include("includes/sidebar.html"); ?>
  <main>
    <div id="advertisements" class="box"></div>
    <div id="new" class="link"><a href="#"><h3>新着順</h3></a></div><div id="discount" class="link"><a href="#"><h3>割引</h3></a></div>
    <div id="sales" class="box"></div>
    <h2>おすすめ商品情報</h2>
    <div id="recommended" class="box"></div>
  </main>
  <?php include ("includes/top.html"); ?>
  <?php include("includes/footer.html"); ?>

  <script>
    $(window).cbKonami(function () {
      window.location = "admin.php";
    });
  </script>
</body>
</html>
