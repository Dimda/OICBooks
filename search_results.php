<!DOCTYPE HTML>
<html>
  <head>
    <script src="jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/search_results.css" media="all">
    <title>検索結果</title>
    <meta charset="utf-8">
  </head>
  <body>
    <main>
      <ul class="search-results">
        <?php
          $servername = "localhost";
          $username = "root";
          $password = "cocacola";//自分のパスワードに変更して
          $dbname = "oicbooks";

          $conn = new mysqli($servername, $username, $password, $dbname);

          if($conn->connect_error){
            die("接続失敗" . $conn->connect_error);
          }
          if (!$conn->set_charset("utf8")) {
              exit();
          }

          $name = $_POST['post_'];
          $sql;
          if($name == ""){
            $sql = "SELECT PRODUCT_NAME, PRICE FROM PRODUCTS WHERE PRODUCT_ID = 1";
          }else{
            $sql = "SELECT PRODUCT_NAME, PRICE FROM PRODUCTS WHERE PRODUCT_NAME LIKE '%($name)%'";
          }

          $sql = "SELECT PRODUCT_NAME, PRICE FROM PRODUCTS";
          $result = $conn->query($sql);
          echo '<table>
                  <th>商品名</th><th>価格</th>';
          while($row = $result->fetch_assoc()){
              echo '<tr>
                        <td><a class = "product-name" href="">' . $row["PRODUCT_NAME"] .'</a></td>
                        <td class = "product-price">' . $row["PRICE"] .'円</td>
                      </tr>';
                 }
              echo '</table>';
              $conn->close();
            ?>
      </ul>

    </main>
    <?php include("includes/footer.html"); ?>
  </body>
</html>
