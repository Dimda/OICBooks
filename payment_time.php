<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="CSS/payment_time.css">
		<title>支払いページ</title>
	</head>
	<body>
		<header>
			<div id="logo">
			<h1>OIC</h1>
			<h1>Books</h1>
			</div>
		</header>
		<h2>お届け先、配送業者、日時指定の設定</h2>
		
		<div id="address_select">
			<form action="payment_time.php?search_address=true" method="post">
			<?php
			include("includes/connect_DB.php");
			$member_ID = $_POST["member_ID"];
	        $member_ID = mysqli_real_escape_string($conn, $member_ID);
	        echo $member_ID . "の検索結果";

	        if($member_ID == ""){
	          $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT";
	        }
	        else{
	          $sql = "SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT WHERE PRODUCT_NAME LIKE '%{$member_ID}%'";
        	}
        $result = $conn->query($sql);

			?>
		</div>
		<h3>新しい住所を追加</h3>





	</body>


</html>