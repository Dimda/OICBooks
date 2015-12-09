<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="CSS/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/login.css" media="all">
  <link rel="stylesheet" type="text/css" href="CSS/default_color.css" media="all">
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

          $date = date('Y-m-d H:i:s');
          $CUSTOMER_ID = $row["CUSTOMER_ID"];
          $_SESSION["CUSTOMER_ID"] = $row["CUSTOMER_ID"];
    			$_SESSION["CUSTOMER_NAME"] = $row["FIRST_NAME"].$row["LAST_NAME"];

          $sql =  "SELECT CART_ID FROM CART WHERE CUSTOMER_ID = '$CUSTOMER_ID'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();

          if(isset($row["CART_ID"])){
            // カートの状態が”完了済”の場合の実装はまだしていない。後で条件に加える
            //echo "hello!!";
            $_SESSION["CART_ID"] = $row["CART_ID"];
            header('location: index.php');
            exit();
          } else{
            //echo "カート列を作成します";
            $sql = "INSERT INTO CART (CUSTOMER_ID,CART_DATE_ADDED,CART_STATUS) VALUES ('$CUSTOMER_ID','$date','add-test')";
            $conn->query($sql);
            $sql =  "SELECT CART_ID FROM CART WHERE CUSTOMER_ID = '$CUSTOMER_ID'";
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