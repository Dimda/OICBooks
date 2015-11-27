$(document).ready(function (){
  $('.edit, .delete').hover(function(){
    $(this).css('background-color', 'rgba(255,255,255,0.3)');
    $(this).find('a').css('color', '#1F4E5F');

  },function(){
    $(this).css('background-color', '#1F4E5F');
    $(this).find('a').css('color', '#AACFD0');
  });
});
