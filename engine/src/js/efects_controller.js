function scrollAnimation(objeto, tiempo){
	$('html, body').animate({
	    scrollTop: objeto.offset().top
	}, tiempo);
}

function fade(objeto, tiempo){
	$(window).scroll(
		function(){
			var element = null;
			for(let i = 0; i < objeto.length; i++){
				element = $(objeto[i]);
				var screenBottom = $(window).scrollTop() + $("#home").outerHeight() + $("#weTittle").outerHeight();
				var objectTop =  element.offset().top;
				if( screenBottom > objectTop ){
					element.fadeIn(tiempo);
				}
			}
		}
	);
}

$(document).ready(function(){
	var fades = $(".fade-box");
	$(".spy").click(function(event){
		event.preventDefault();
		let objeto = $(this.hash);
		scrollAnimation(objeto, 800);
	});
	fade(fades, 1000);
});