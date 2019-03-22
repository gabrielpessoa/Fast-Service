$(document).ready(function() {
	
	$(window).on('scroll', function () {
		if($(window).scrollTop()){
			$('nav').addClass('black');
		}
		else{
			$('nav').removeClass('black');

		}
	});

	$(window).scroll(function(){
		$('.header-bg').css('opacity', 1 -
			$(window).scrollTop()/700);
	});

	$("a[rel=modal]").click(function(e){
		e.preventDefault();
		var id = $(this).attr("href");
		var alturaTela = $(document).height();
		var larguraTela = $(window).width();

		$("#mascara").css({'width': larguraTela, 'height': alturaTela});
		$("#mascara").fadeIn(1000);
		$("#mascara").fadeTo("slow", 0.8);

		var left = ($(window).width()/2) - ($(id).width()/2);
		var top = ($(window).height()/2) - ($(id).height()/2);

		$(id).css({'left': left, 'top': top});
		$(id).show();

	});

	$("#mascara").click(function(){
		$(this).fadeOut("slow");
		$(".window").fadeOut("slow");
	});
	$(".fechar").click(function(e){
		e.preventDefault();
		$("#mascara").fadeOut(1000, "linear");
		$(".window").fadeOut(1000, "linear");
	});
});