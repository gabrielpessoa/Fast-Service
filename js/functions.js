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
		$(window).scrollTop()/700)
});
