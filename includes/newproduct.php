<?php
  include("includes/connect_DB.php");

    $sql = "SELECT PRODUCT_NAME, PRODUCT_ID, PRODUCT_DATE_AVAILABLE FROM PRODUCT 
            ORDER BY PRODUCT_DATE_AVAILABLE DESC,PRODUCT_ID DESC";
    $result = $conn->query($sql);

    $i=1;
    while($row = $result->fetch_assoc()){

      echo '<a href="product_details.php?ID=' . $row["PRODUCT_ID"] . '">'
      .date('Y年n月j日', strtotime($row["PRODUCT_DATE_AVAILABLE"])). "　" .$row["PRODUCT_NAME"]."</a><br><br>";
      $i+= 1;
     
    }
    $conn->close();
?>