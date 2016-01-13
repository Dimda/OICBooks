<?php
  include("includes/connect_DB.php");
/*
  <div class="slider1">
    <div class="slide"><a href="#"><img src="img/add-1.jpg" height="400px" width="1000px"/></a></div>
    <div class="slide"><img src="img/add-2.jpg" height="400px" width="400px" /></div>
    <div class="slide"><img src="img/add-3.jpg" height="400px" width="400px" /></div>
  </div>
  */

    $sql = "SELECT PRODUCT_NAME, PRODUCT_ID, PRODUCT_DATE_AVAILABLE FROM product
            ORDER BY PRODUCT_DATE_AVAILABLE DESC,PRODUCT_ID DESC";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
      echo '<div class="slide"><a href="product_details.php?ID="' . $row["PRODUCT_ID"] . '"><img src="product_image/' . $row["PRODUCT_ID"] . '.jpg" height="200px"></a></div>';
    }
    echo "終わった";
    $conn->close();
?>
