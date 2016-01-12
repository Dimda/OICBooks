
$(document).ready(function(){
  $("#add_err").css('display', 'none', 'important');
  $('form').on('submit', function(event) {
    email=$('#email').val();
    password=$('#password').val();
    event.preventDefault();
    $.ajax({
      type: 'post',
      url: 'login_check.php',
      data: 'email='+email+'&password='+password,
      success: function(html) {
        var result = String(html);
        result = result.trim();
        console.log(result);
        if(result=='true'){
          window.location="index.php";
        }else{
          console.log("失敗");
          $("#add_err").css('display', 'inline', 'important');
          $("#add_err").css('color', 'red');
          $("#add_err").html("ユーザー名かパスワードは間違っています。");
        }
      }
    });
  });
});
