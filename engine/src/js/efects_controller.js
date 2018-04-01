var navTransfor = false;
var fadeBoxTransform = [false, false, false];
function scrollAnimation(objeto, tiempo){
	$('html, body').animate({
	    scrollTop: objeto.offset().top - $("#top-bar").height()
	}, tiempo);
}

$(document).ready(function(){
	$(".spy").click(function(event){
		event.preventDefault();
		let objeto = $(this.hash);
		scrollAnimation(objeto, 800);
	});

	$(window).scroll(function(){
		var bottomWindow = $(window).scrollTop() + $("#home").height();
		var fade_top = 0;
		var fade_bottom = 0;

		if($(window).scrollTop() == 0 && navTransfor){
			$("#top-bar").animate({"opacity":".3"}, 500);
			$("#top-bar").animate({"height" : "10%"}, 500);
			navTransfor = false;
		}
		else if($(window).scrollTop() > 0 && !navTransfor){
			$("#top-bar").animate({"opacity":"1"}, 500);
			$("#top-bar").animate({"height" : "13%"}, 500);
			navTransfor = true;
		}

		$(".fade-box").each(function(i){
			fade_top = $(this).offset().top;
			fade_bottom = $(this).offset().top + $(this).outerHeight();
			if(!fadeBoxTransform[i] && bottomWindow >= fade_top && bottomWindow <= fade_bottom){
				$(this).animate({'opacity':'1'},1000);
				fadeBoxTransform[i] = true;
			}
		});

		fade_top = $("#fade-line").offset().top;
		fade_bottom = $("#fade-line").offset().top + $("#fade-line").outerHeight();
		if(bottomWindow >= fade_top && bottomWindow <= fade_bottom){
			var targets = $("#fade-line").children(".row").children(".col-sm");
			targets.each(function(j){
				$(this).delay(900 * j).animate({'opacity':'1'}, 900);
			});
		}
	});
});