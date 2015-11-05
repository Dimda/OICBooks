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
    <ul id="search-results">
      <?php
        include("includes/connect_DB.php");
        $keyword = $_POST["keyword"];
        $keyword = mysqli_real_escape_string($conn, $keyword);
        echo $keyword . "の検索結果";

        if($keyword == ""){
          $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT";
        }else{
          $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_NAME LIKE '%{$keyword}%'";
        }
        $result = $conn->query($sql);

        echo '<table>
                <th>画像</th><th>商品名</th><th>価格</th>';
        while($row = $result->fetch_assoc()){
            echo   '<tr>
                      <td class = "book-image" width = "20%"><img class="product-picture" src="product_image/' . $row["PRODUCT_ID"] .'.jpg"  width="auto" height="200px"></td>
                      <td class = "product-name" width = "70%"><a class = "product-name" href="product_details.php?id=' . $row["PRODUCT_ID"] . '">' . $row["PRODUCT_NAME"] .'</a></td>
                      <td class = "product-price" width = "10%">' . $row["PRODUCT_PRICE"] .'円</td>
                    </tr>';
               }
            echo '</table>';
            $conn->close();
          ?>
    </ul>

  </main>
 <?php include ("includes/top.html");?>
 <?php include("includes/footer.html"); ?>
</body>
</html>
