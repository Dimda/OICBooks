<?php
	include("includes/connect_DB.php");

    $sql = "SELECT PRODUCT_NAME,PRODUCT_ID,SUM(QUANTITY) FROM ordered_product GROUP BY PRODUCT_ID ORDER BY SUM(QUANTITY) DESC";
    $result = $conn->query($sql);

    $i=1;
    while($row = $result->fetch_assoc()){
			echo '<div class="slide"><a href="product_details.php?ID=' . $row["PRODUCT_ID"] . '"><img src="product_image/' . $row["PRODUCT_ID"] . '.jpg" height="200px"></a></div>';
      $i+= 1;
      $i+= 1;
      if($i >10)
      	break;
    }
    $conn->close();
?>
