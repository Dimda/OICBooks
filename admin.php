<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/admin.css" media="all">
  <title>管理者ページ</title>
</head>
<body>
  <header>
    <h1>管理者ページ</h1>
    <nav>
      <ul>
        <li><a href="#">test</a></li>
        <li><a href="#">test</a></li>
        <li><a href="#">test</a></li>
        <li><a href="#">test</a></li>
      </ul>
    </nav>
  </header>
  <div id="sidebar">
    <nav>
      <ul>
        <li><a href="#">test</a></li>
        <li><a href="#">test</a></li>
        <li><a href="#">test</a></li>
        <li><a href="#">test</a></li>
      </ul>
    </nav>
  </div>
  <main>
    <div id="product-manager">
      <ul class="search-results">
        <?php
          $servername = "localhost";
          $username = "root";
          $password = "cocacola";
          $dbname = "oicbooks";

          $conn = new mysqli($servername, $username, $password, $dbname);

          if($conn->connect_error){
            die("接続失敗" . $conn->connect_error);
          }
          if (!$conn->set_charset("utf8")) {
              exit();
          }

          $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT";
          $result = $conn->query($sql);
          echo '<table>
                  <th>画像</th><th>商品名</th><th>価格</th>';
          while($row = $result->fetch_assoc()){
              echo '<tr>
                        <td rowspan="1" width= 20% ><img class="product-picture" src="product_image/' . $row["PRODUCT_ID"] .'.jpg"  width="auto" height="200"></td>
                        <td><a class = "product-name" href="">' . $row["PRODUCT_NAME"] .'</a></td>
                        <td class = "product-price">' . $row["PRODUCT_PRICE"] .'円</td>
                      </tr>';
                 }
              echo '</table>';
              $conn->close();
            ?>
      </ul>
    </div>

  </main>
</body>
</html>
