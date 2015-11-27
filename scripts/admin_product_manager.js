$(document).ready(function (){
  $('.edit, .delete').hover(function(){
    $(this).addClass('highlighted');
  },function(){
    $(this).removeClass('highlighted');
  });
});
