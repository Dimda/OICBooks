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
			<form action="payment_time.php?search_address=true" method="post" ID="form">
				<input id="search_db" placeholder="会員のID入力(１～４)" name="member_ID">
				<input id="search_btn" type="submit" value="検索">
				</form>
			<?php
			if(isset($_GET["search_address"])){
				include("includes/connect_DB.php");
				$member_ID = $_POST["member_ID"];
		        $member_ID = mysqli_real_escape_string($conn, $member_ID);
		       

	        if($member_ID == ""){
	          echo "入力してね";
	        }

	        else{
	        		echo $member_ID . "の検索結果<br/>";
	        		$sql = "SELECT CUSTOMER_ID, FIRST_NAME, LAST_NAME, ZIP_CODE, ADDRESS_STREET_1, ADDRESS_STREET_2, ADDRESS_STREET_3 FROM customer WHERE CUSTOMER_ID LIKE '%{$member_ID}%'";


					$result = $conn->query($sql);


					while($row = $result->fetch_assoc()){
					?>
					<div ID="Customer_Name"><?php	
							echo $row["FIRST_NAME"];
							echo "　";	//空白
							echo $row["LAST_NAME"];
					?></div>
					<?php

					echo $row["ZIP_CODE"];
					echo "<br/>";
					echo $row["ADDRESS_STREET_1"];
					echo $row["ADDRESS_STREET_2"];
					echo "<br/>";
					echo $row["ADDRESS_STREET_3"];
					?>

					<div ID="destination">
						<a href="" style="text-decoration:none;">この住所を使う</a>
					</div>
					<?php

				} 

        	}
       		
			$conn->close();

			}
			?>

		</div>

	<h3>新しい住所を追加</h3>

	<form action="" name="newAddress" method="post">
		<p>氏名:</p>
		<input type="text" name="newName" size="30" maxlength="25">

		<p>郵便番号:</p>
		<input type="text" name="newzip1" size="5" maxlength="3">-<input type="text" name="newzip2" size="5" maxlength="4">

	</form>
	
		

	





	</body>


</html>