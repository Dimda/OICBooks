<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/default_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
  <title>サインイン</title>
</head>
<body>
  <?php include("includes/sidebar.html"); ?>
  <?php include("includes/header.html"); ?>
  <main>
    <div id="login-screen">
    	<?php
    		include("includes/connect_DB.php");
    		$email = $_POST["email"];
    		$email = mysqli_real_escape_string($conn, $email);
    		$password = mysqli_real_escape_string($conn, $_POST["password"]);
        $pass_md5     = MD5($password);
        $pass_hash    = hash('sha256', 'coca'.$pass_md5.'cola');


    		// echo $email;
    		// echo '<br>';
    		// echo $pass_hash;

    		$sql = "SELECT CUSTOMER_ID,FIRST_NAME,LAST_NAME,ZIP_CODE,ADDRESS_STREET_1,ADDRESS_STREET_2,ADDRESS_STREET_3,EMAIL_ADDRESS FROM CUSTOMER
    				WHERE EMAIL_ADDRESS = '{$email}' and
    						PASSWORD = '$pass_hash'";
    		$result = $conn->query($sql);
    		$row = $result->fetch_assoc();
    		echo '<br>';
    		echo '<br>';
    		if(isset($row["CUSTOMER_ID"])){
    			echo $row["CUSTOMER_ID"];
          echo '<br>';
          echo $row["FIRST_NAME"].$row["LAST_NAME"];
          echo '<br>';
          echo date('Y年m月d日H時i分s秒');

          $date = date('Y-m-d H:i:s');
          $CUSTOMER_ID = $row["CUSTOMER_ID"];
          $_SESSION["CUSTOMER_ID"] = $row["CUSTOMER_ID"];
    			$_SESSION["CUSTOMER_NAME"] = $row["FIRST_NAME"].$row["LAST_NAME"];
          $_SESSION["BILLING_ADDRESS"] = $row["ZIP_CODE"].$row["ADDRESS_STREET_1"].$row["ADDRESS_STREET_2"].$row["ADDRESS_STREET_3"];
          $_SESSION["EMAIL_ADDRESS"] = $row["EMAIL_ADDRESS"];

          $sql =  "SELECT CART_ID FROM CART WHERE CUSTOMER_ID = '$CUSTOMER_ID' and CART_STATUS <> 'FINISH' ";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();

          if(isset($row["CART_ID"])){
            $_SESSION["CART_ID"] = $row["CART_ID"];
            header('location: index.php');
            exit();
          } else{
            //"カート列を作成します";
            $sql = "INSERT INTO CART (CUSTOMER_ID,CART_DATE_ADDED,CART_STATUS) VALUES ('$CUSTOMER_ID','$date','add-test')";
            $conn->query($sql);
            $sql =  "SELECT CART_ID FROM CART WHERE CUSTOMER_ID = '$CUSTOMER_ID' and CART_STATUS <> 'FINISH'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $_SESSION["CART_ID"] = $row["CART_ID"];
            header('location: index.php');
            exit();
          }
     		}else {
    			echo "メールアドレスかパスワードが間違っています";
    		}
    		$conn->close();
    	?>
    </div>
  </main>
  <?php include("includes/footer.html"); ?>
  <script type="text/javascript" src="js/classie.js"></script>
  <script type="text/javascript" src="js/sidebar.js"></script>
</body>
</html>