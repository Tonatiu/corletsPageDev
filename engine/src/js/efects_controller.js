function scrollAnimation(objeto, tiempo){
	$('html, body').animate({
	    scrollTop: objeto.offset().top
	}, tiempo);
}

$(document).ready(function(){
	$(".spy").click(function(event){
		event.preventDefault();
		let objeto = $(this.hash);
		scrollAnimation(objeto, 800);
	});
});