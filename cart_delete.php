<?php
      session_start();
      $product_id = $_GET["ID"];
      $cart_id = $_SESSION["CART_ID"];

      include("includes/connect_DB.php");
      $sql =  "DELETE FROM cart_products WHERE PRODUCT_ID = '$product_id' AND CART_ID = '$cart_id'";
      $conn->query($sql);
      $conn->close();
      header('Location: cart.php');
?>