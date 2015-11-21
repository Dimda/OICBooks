<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/search_results.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/main_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>検索結果</title>
  <meta charset="utf-8">
</head>
<body>
  <?php include("includes/header.html"); ?>
  <?php include("includes/sidebar.html"); ?>
  <main>
    <div id="search-results">
      <?php
        include("includes/connect_DB.php");
        $keyword = $_POST["keyword"];
        $keyword = mysqli_real_escape_string($conn, $keyword);
        echo "<p>" . $keyword . "の検索結果</p>";

        if($keyword == ""){
          $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT";
        }else{
          $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_NAME LIKE '%{$keyword}%'";
        }
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
          $matches = glob('./product_image/' . $row["PRODUCT_ID"] . "*");
          echo  '<div id="box">';
          echo  '<img class="product-picture" src="' . $matches[0] . '"></br>';
          echo  '<a class = "product-name" href="product_details.php?ID=' . $row["PRODUCT_ID"] . '">' . $row["PRODUCT_NAME"] .'</a></br>';
          echo  '<div class="product-price">¥ '. $row["PRODUCT_PRICE"] .'</div></br>';
          echo  '</div>';
        }
        $conn->close();
        ?>
    </div>

  </main>
 <?php include ("includes/top.html");?>
 <?php include("includes/footer.html"); ?>
</body>
</html>
