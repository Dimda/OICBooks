<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/payment_time.css">
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
				<input id="search_db" placeholder="会員のID入力(１～４)" name="member_ID">
				<input id="search_btn" type="submit" value="検索">
			</form>
			<?php
			if($_GET["search_address"]){
				include("includes/connect_DB.php");
				$member_ID = $_POST["member_ID"];
		        $member_ID = mysqli_real_escape_string($conn, $member_ID);
		        echo $member_ID . "の検索結果";

	        if($member_ID == ""){
	          echo "入力してね";
	        }
	        else{
	        	$sql = "SELECT CUSTOMER_ID, FIRST_NAME, LAST_NAME, ADDRESS, ADDRESS2, ADDRESS3 FROM customer WHERE CUSTOMER_ID LIKE '%{$member_ID}%'";
        	}
       		$result = $conn->query($sql);

			while($row = $result->fetch_assoc()){
				echo $row["ADDRESS"];

			} 

			$conn->close();

			}
			?>
		</div>
		<h3>新しい住所を追加</h3>





	</body>


</html>