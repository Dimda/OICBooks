<?php
  $ID = $_GET["id"];
  $file =  "images/" . $ID . ".jpg";
  if (!unlink($file))
    {
      echo ("Error deleting $file");
    }
  else
    {
      echo ("Deleted $file");
    }
?>
