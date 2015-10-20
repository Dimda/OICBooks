<!DOCTYPE HTML>
<html>
 <head>
    <script src="jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
    <link rel="stylesheet" href="text/css" href="css/sidebar.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/search_results.css" media="all">
    <title>検索結果</title>
    <meta charset="utf-8">
 </head>
 <body>
   <?php include("includes/header.html"); ?>
   <?php include("includes/sidebar.html"); ?>
   <main>
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
         /*
         $keyword = $​_POST['post_​'];
         $sql;
         if($keyword == ""){
           $sql = "SELECT PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_ID = 1";
         }else{
           $sql = "SELECT PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_NAME LIKE '%($keyword)%'";
         }
         */


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

   </main>
   <?php include("includes/footer.html"); ?>
 </body>
</html>
