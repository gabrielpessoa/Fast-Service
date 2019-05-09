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

	// Subcategorias
	$("select.type").click(function(){
		var value = $(this).val();
		var consulta = "SELECT * FROM SUBCATEGORIAS WHERE SCTG_CTG_ID="+value;
		if (value!="null") {
			$('option.null').attr('disabled', true);
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
		}
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

	//Slide com fotos dos anúncios
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


	function limpa_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                limpa_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_cep();
        }
    });

    $("a.edit_comentario").on('click', function(e){
	    	e.preventDefault();
	    	
	    	var div = $('div.coment');
			var alturaTela = $(document).height();
			var larguraTela = $(window).width();

			$("#mascara").css({'width': larguraTela, 'height': alturaTela});
			$("#mascara").fadeIn(1000);
			$("#mascara").fadeTo("slow", 0.8);

			var left = ($(window).width()/2) - ($(div).width()/2);
			var top = ($(window).height()/2) - ($(div).height()/2);

			$(div).css({'left': left, 'top': top});
			$(div).show();
	    	var value = $(this).attr('href');
	    	var split = value.split(':');
	    	var id = split[0];
	    	var comentario = split[1];
	    	var t = $(".coment, input[type=hidden]").val(id);
			$("#edit").val(comentario);
    	});

    	$("#mascara").click(function(){
			$(this).fadeOut("slow");
			$("div.coment").fadeOut();
		});

    	$(".btn-coment").click(function(e){
    		e.preventDefault();
    		var id =  $(".coment, input[type=hidden]").val();
    		var comentario = $("#edit").val();
			$.ajax({
				url: 'edita_comentario.php',
				type: 'POST',
				data: {id: id, comentario: comentario},
				success: function(retorno){
					if (retorno=='ok') {
						location.reload();
					}
				}
			});
		});

    $("#cep").mask("99999-999");
    $("#tel").mask("(99)99999-9999");
    

});