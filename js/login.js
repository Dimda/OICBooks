
$(document).ready(function(){
 $("#add_err").css('display', 'none', 'important');
 $('form').on('submit', function(event) {
   email=$('#email').val();
   password=$('#password').val();
   event.preventDefault();
   $.post('login_check.php', 'email='+email+'&password='+password, function(html){
       var result = String(html);
       result = result.trim();
       if(result=='true'){
         window.location="index.php";
       }else{
         $("#add_err").css('display', 'inline', 'important');
         $("#add_err").css('color', 'red');
         $("#add_err").html("ユーザー名かパスワードは間違っています。");
       }
     });
 });
});
