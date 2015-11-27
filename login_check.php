<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/main_color.css" media="all">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>ログイン</title>
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
    		$password = $_POST["password"];
    		$password = mysqli_real_escape_string($conn, $password);

    		echo $email;
    		echo '<br>';
    		echo $password;

    		$sql = "SELECT CUSTOMER_ID,FIRST_NAME,LAST_NAME FROM CUSTOMER
    				WHERE EMAIL_ADDRESS = '{$email}' and 
    						PASSWORD = '$password'";
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
    			//session_start();
          $_SESSION["CUSTOMER_ID"] = $row["CUSTOMER_ID"];
    			$_SESSION["CUSTOMER_NAME"] = $row["FIRST_NAME"].$row["LAST_NAME"];
          //$_SESSION["cart_product"];
          //$_SESSION["cart_quantity"];
     		}else {
    			echo "なにもないよ";
    		}
    		$conn->close();
    	?>
    </div>
  </main>
  <?php include("includes/footer.html"); ?>
</body>
</html>