<?php
      session_start();
      $product_id = $_GET["ID"];
      $cart_id = $_SESSION["CART_ID"];
      $quantity = $_POST["QUANTITY"];

      include("includes/connect_DB.php");
      if($quantity == 0){
        $sql =  "DELETE FROM cart_products WHERE PRODUCT_ID = '$product_id' AND CART_ID = '$cart_id'";
        $conn->query($sql);
      } else {
        $sql =  "UPDATE cart_products SET QUANTITY = '$quantity' WHERE PRODUCT_ID = '$product_id' AND CART_ID = '$cart_id'";
        $conn->query($sql);
      }
      $conn->close();
      header('Location: cart.php');
?>