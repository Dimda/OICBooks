<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.cbkonami.min.js"></script>
  <link rel="stylesheet" type="text/css" href="CSS/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/top_page.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <title>OICBooksへようこそ</title>
</head>
<body>

  <?php include("includes/header.html"); ?>
  <?php include("includes/sidebar.html"); ?>
  <main>
    <div id="advertisements" class="box"></div>
    <div id="new" class="link"><a href="#"><h3>新着商品</h3></a></div><div id="discount" class="link"><a href="#"><h3>セール商品</h3></a></div>
    <div id="sales" class="box"></div>
    <h2>おすすめ商品</h2>
    <div id="recommended" class="box"></div>
  </main>
  <?php include ("includes/top.html"); ?>
  <?php include("includes/footer.html"); ?>
  <script type="text/javascript" src="js/classie.js"></script>
  <script type="text/javascript" src="js/sidebar.js"></script>
  <script>
    $(window).cbKonami(function () {
      window.location = "admin.php";
    });
  </script>
</body>
</html>
