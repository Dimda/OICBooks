<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.cbkonami.min.js"></script>
  <script src="js/Slider/jquery.bxslider.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/top_page.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/default_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="js/Slider/jquery.bxslider.css" rel="stylesheet" />
  <script>
  window.alert("このページは学校の課題作品です","width=160,height=300");
  </script>
  <title>OICBooksへようこそ</title>
</head>
<body>

  <?php include("includes/header.html"); ?>
  <?php include("includes/sidebar.html"); ?>
  <main>
    <div class="slider1">
      <div class="slide"><a href="#"><img src="img/add-1.jpg" height="400px" width="1000px"/></a></div>
      <div class="slide"><img src="img/add-2.jpg" height="400px" width="400px" /></div>
      <div class="slide"><img src="img/add-3.jpg" height="400px" width="400px" /></div>
    </div>

    <div id="new" class="link"><h2>新着商品</h2></div>
    <div class="slider2">
        <?php include ("includes/newproduct.php"); ?>
    </div>
    <h2 class="link">ランキング</h2>
    <div class="slider2">
        <?php include ("includes/ranking.php"); ?>
    </div>
  </main>
  <?php include ("includes/top.html"); ?>
  <?php include("includes/footer.html"); ?>
  <script type="text/javascript" src="js/classie.js"></script>
  <script type="text/javascript" src="js/sidebar.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
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
      $('.slider2').bxSlider({
        slideWidth: 200,
        minSlides: 4,
        maxSlides: 5,
        slideMargin: 10
      });
    });
    $(window).cbKonami(function () {
      window.location = "admin.php";
    });
  </script>

</body>
</html>
