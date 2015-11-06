<?php include("includes/admin_top.html") ?>
  <div class="mail-service">
    <h2>ダイレクトメール送信</h2>

  </div>

  <form name="form1" action="admin_direct_mail.php?SendClicked=true" method="post">
  	<input id="subject" placeholder="件名を入力してください" name="mail_to"><br/>
  	<br/>
  	<textarea name="message" cols="60" rows="10"></textarea><br/>
  	<br/>
  	<input id="mail_btn" type="submit" value="送信">
  </form>

  <?php
      if(isset($_POST["mail_to"], $_POST["message"]) and $_GET["SendClicked"] ){
        include("includes/connect_DB.php");
        $mail_to = $_POST["mail_to"];
        $mail_to = mysqli_real_escape_string($conn, $mail_to);
        $message = $_POST["message"];
        $message = mysqli_real_escape_string($conn, $message);

        $to = "oicbooks2@gmail.com";

        $from = "yuuri_ol6_6lo@softbank.ne.jp";

        //md_send_mail($to,$mail_to,$message,"From:".$from);

        mail($to,$mail_to,$message,$from);

		$conn->close();
    echo "終了";
        }
        ?>






<?php include("includes/admin_bottom.html"); ?><?php include("includes/admin_bottom.html"); ?><?php include("includes/admin_bottom.html"); ?>
