<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/top_page.css" media="all">
  <title>OICBooksへようこそ！</title>
</head>
<body>

  <?php include("includes/sidebar.html"); ?>
  <?php include("includes/header.html"); ?>
  <main>
    <div id="advertisements" class="box">
      <p>広告ページ</p>
    </div>
    <div id="sales" class="box">
      <p>新着商品</p>
      <div id="new" class="box"></div>
      <div id="discount" class="box"></div>
    </div>
    <div id="recommendations" class="box"><p>おすすめ商品</p></div>
  </main>
  <?php include ("includes/top.html");?>
  <?php include("includes/footer.html"); ?>

</body>
</html>
