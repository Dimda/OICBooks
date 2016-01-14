<?php
  include("includes/connect_DB.php");
    $sql = "SELECT PRODUCT_ID, PRODUCT_DATE_AVAILABLE FROM product ORDER BY PRODUCT_DATE_AVAILABLE DESC";
    $result = $conn->query($sql);

    $i=1;
    while($row = $result->fetch_assoc()){
      echo '<div class="slide"><a href="product_details.php?ID=' . $row["PRODUCT_ID"] . '"><img src="product_image/' . $row["PRODUCT_ID"] . '.jpg" height="200px"></a></div>';
      $i+= 1;
      if($i >20)
      	break;
    }
    $conn->close();
?>
