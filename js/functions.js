$(document).ready(function() {
	
	$(window).scroll(function(){
		$('.header-bg').css('opacity', 1 -
			$(window).scrollTop()/700);
	});

	//LOGIN
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

	//AVALIAÇÃO
	var average = $('.ratingAverage').attr('data-average');
	function avaliacao(average){
		average = (Number(average)*20);
		$('.bg').css('width', 0);		
		$('.barra .bg').animate({width:average+'%'}, 500);
	}
	
	avaliacao(average);

	$('.star').on('mouseover', function(){
		var indexAtual = $('.star').index(this);
		for(var i=0; i<= indexAtual; i++){
			$('.star:eq('+i+')').addClass('full');
		}
	});
	$('.star').on('mouseout', function(){
		$('.star').removeClass('full');
	});

	$('.star').on('click', function(){
		var idArticle = $('.article').attr('data-id');//codigo do servico
		var voto = $(this).attr('data-vote');//quantidade de votos
		$.post('avaliacao.php', {votar: 'sim', codigo: idArticle, estrela: voto}, function(retorno){
			avaliacao(retorno.average);
			$('.votos span').html(retorno.votos);
		}, 'jSON');
			location.reload();
	});

	var average = $('.Average').attr('data-average');
	function teste(average){
		average = (Number(average)*20);
		$('.bt').css('width', 0);		
		$('.bar .bt').animate({width:average+'%'}, 500);
	}
	
	teste(average);


	//CONTA DO USUÁRIO
	$('a[rel=account]').click(function(e){
		e.preventDefault();
		var id = $(this).attr("href");
		var alturaTela = $(document).height();
		var larguraTela = $(window).width();

		var left = ($(window).width()/2) - ($(id).width()/2);
		var top = ($(window).height()/2) - ($(id).height()/2);
		$(".account").fadeIn(500, 'linear');
		 $(id).css({'margin-top': 86});
	});

	$(".fechar").click(function(e){
		e.preventDefault();
		$(".account").fadeOut(1000, "linear");
	});
	
	$(".top").click(function(e){
		e.preventDefault();
		if($(window).scrollTop()){
			$('html,body').scrollTop(0);
		}
	});

	$("select.type").click(function(){
		var value = $(this).val();
		var consulta = "SELECT * FROM SUBCATEGORIAS WHERE SCTG_CTG_ID="+value;
		$("p.subtype").fadeIn(500, 'linear');
		$("select.subtype").fadeIn(500, 'linear');
		$.ajax({
			url: "subcategorias.php",
			type: "POST",
			data: {type: value},
			success: function(retorno){
				$("select.subtype").html(retorno);
			}
		});
	});

	$("button#login").click(function(e){
		e.preventDefault();
		var user = $("input#user").val();
		var pw = $("input#password").val();
		$.ajax({
			url: "login2.php",
			type: "POST",
			data: {username: user, password: pw},
			success: function(retorno){
				if (retorno=='senha incorreta') {
					$(".usuario").fadeOut();
					$("input#user").removeClass("red");
					$(".senha").show();
					$(".senha").html("Senha incorreta");
					$("input#password").addClass("red");
				}
				else if(retorno=='logado'){
					location.reload();
				}
				else{
					$(".senha").fadeOut();
					$("input#password").removeClass("red");	
					$(".usuario").show();
					$(".usuario").html("Usuário não existe");
					$("input#user").addClass("red");	
				}
			}
		});

	});

	$(function(){
		$('.slide ul').cycle({
			fx: 'fade',
			speed: 0,
			timeout: 0,
			prev:'.anterior',
			next:'.proxima',
		});
		$('div.slide').hover(function(){
			$('div.botao').fadeIn();},
			function(){
				$('div.botao').fadeOut();
		});
	});

});