//アニメーション
document.getElementById("top").addEventListener("click", function (evt) {
	var styleBody = document.body.style;
	styleBody.transition = "initial";
	styleBody.marginTop = "-" + (window.pageYOffset - 1) + "px";
	window.scrollTo(0, 0);
	styleBody.transition = "margin-top 1s ease-in-out";
	styleBody.marginTop = "0";
	evt.preventDefault();
});


//スクロール隠す
$(document).ready(function(){
	$("#top").hide();
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#top').fadeIn();
			} else {
				$('#top').fadeOut();
			}
		});
		$('#top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
});
