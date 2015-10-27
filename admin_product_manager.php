<?php include("includes/admin_top.html"); ?>

<div id="product-manager">
  <h2>商品の編入、削除</h2>
  <form action="admin_product_manager.php?searchClicked=true" method="post">
    <!--searchClickedで検索したってことを伝える-->
    <input id="search_db" placeholder="データベースの中を検索する" name="keyword">
    <input id="search_btn" type="submit" value="検索">
  </form>
  <ul class="search-results">
    <?php
      if($_GET["searchClicked"]){
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
                <th>商品名</th><th>価格</th><th>編集</th><th>削除</th>';
        while($row = $result->fetch_assoc()){
            echo   '<tr>
                      <td class = "product-name" width = "70%"><a class = "product-name" href="product_details.php?id=' . $row["PRODUCT_ID"] . '">' . $row["PRODUCT_NAME"] .'</a></td>
                      <td class = "product-price" width = "10%">' . $row["PRODUCT_PRICE"] .'円</td>
                      <td class = "edit" width = "10%"><a href="product_edit.php?ID=' . $row["PRODUCT_ID"] . '">編集</a></td>
                      <td class = "delete" width = "10%"><a onclick="return deleteCheck()" href="delete.php?ID=' . $row["PRODUCT_ID"] . '">削除</a></td>
                    </tr>';
               }
            echo '</table>';
            $conn->close();
      }
      ?>
  </ul>
</div>

<?php include("includes/admin_bottom.html");?>
<script>
  function deleteCheck() {
    return confirm("ほんまに削除しますか。");
  }
</script>
