<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.cbkonami.min.js"></script>
  <script src="js/Slider/jquery.bxslider.min.js"></script>
  <link rel="stylesheet" type="text/css" href="CSS/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/top_page.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="js/Slider/jquery.bxslider.css" rel="stylesheet" />
  <title>OICBooksへようこそ</title>
</head>
<body>

  <?php include("includes/header.html"); ?>
  <?php include("includes/sidebar.html"); ?>
  <main>
    <div class="slider1">
      <div class="slide"><img src="img/tagsale2.jpg" height="400px" width="1000px"/></div>
      <div class="slide"><img src="img/100011.jpg" height="400px" width="400px" /></div>
      <div class="slide"><img src="img/100012.jpg" height="400px" width="400px" /></div>
    </div>

    <div id="new" class="link"><a href="#"><h3>新着商品</h3></a></div>
    <div id="sales" class="box">
        <?php include ("includes/newproduct.php"); ?>
    </div>
    <h2>ランキング</h2>
    <div id="recommended" class="box">
      <?php include ("includes/ranking.php"); ?>
    </div>
  </main>
  <?php include ("includes/top.html"); ?>
  <?php include("includes/footer.html"); ?>
  <script type="text/javascript" src="js/classie.js"></script>
  <script type="text/javascript" src="js/sidebar.js"></script>
  <script>
    $(document).ready(function(){
      $('.slider1').bxSlider({
        auto: true,
        mode: 'fade',
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
        slideMargin: 5
      });
    });
    $(window).cbKonami(function () {
      window.location = "admin.php";
    });
  </script>

</body>
</html>
