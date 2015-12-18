<?php
	include("includes/connect_DB.php");

    $sql = "SELECT PRODUCT_NAME,PRODUCT_ID,SUM(QUANTITY) FROM ORDERED_PRODUCT GROUP BY PRODUCT_ID ORDER BY SUM(QUANTITY) DESC";
    $result = $conn->query($sql);

    $i=1;
    while($row = $result->fetch_assoc()){
      echo '<a href="product_details.php?ID=' . $row["PRODUCT_ID"] . '">'.$i." 位 ".$row["PRODUCT_NAME"]."<br><br>";
      $i+= 1;
      if($i >10)
      	break;
    }
    $conn->close();
?>