<?php
for($i=1; $i<=3; $i++){
  if(isset($_POST['submit_image' . $i])){
    $postname = "event_image" . $i;
    $filename = "add-" . $i;
  }
}

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES[$postname]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageErrNum = array();


if(isset($postname) && is_uploaded_file ($_FILES[$postname]["tmp_name"])) {
    $check = getimagesize($_FILES[$postname]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        array_push($imageErrNum, 1);
        $uploadOk = 0;
    }
    if ($_FILES[$postname]["size"] > 5000000) {
        array_push($imageErrNum, 2);
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      array_push($imageErrNum, 3);
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      array_push($imageErrNum, 4);
      header('Location: admin_event.php?imageErrNum=' . implode(",", $imageErrNum));
    } else {
        if (!move_uploaded_file($_FILES[$postname]["tmp_name"], "img/" . $filename  . "." . $imageFileType)) {
          array_push($imageErrNum, 4);
        }else{
          header('Location: admin_event.php?success=true');
        }
    }
}else{
  header('Location: admin_event.php?success=true');
}

?>
