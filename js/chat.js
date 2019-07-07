$(function(){
	//Função para abrir janela
	function add_janela(id, nome, status){
		var janelas=Number($('.chats .chat').length);
		var pixels=(280+5)*janelas;
		var style='float:none; position: fixed; bottom:0; left:'+pixels+'px;';
		var splitDados=id.split(':');
		var id_user=Number(splitDados[1]);
		var janela='<div class="chat" id="janela_'+id_user+'" style="'+style+'">';
		janela+='<div class="header_window"><a href="#" class="close">X</a><span class="name">'+nome+'</span> <span id="'+id_user+'"class="'+status+'"> </span></div>';
		janela+='<div class="body"><div class="mensagens"><ul></ul></div>';
		janela+='<div class="send_message" id="'+id+'"><input type="text" name="mensagem" class="msg" id="'+id+'"></div></div></div>';
		
		$('.chats').append(janela);
	}

	// histórico de conversa
	function retorna_historico(user_id){
		var id = $(this).attr('id');
		var pega_id=$('body .users_online li a').attr('id');
		var id_teste = $(".users_online ul li").attr("id");
		var ids=pega_id.split(':');
		var my_id=ids[0];
		var user_i=ids[1];
		// console.log(user_id);
		var userOnline=Number($('.users_online ul li').attr('id'));
		$.ajax({
			type: 'POST',
			url: '../controller/mensagens_controller.php',
			data: {conversacom: user_id},//user_id
			datatype: 'json',
			success: function (retorno){
				var son = JSON.parse(retorno)
				if(son!=null){

					son.forEach(function(o, index){
		
						if(my_id==o.id_de){
							$('#janela_'+user_id+' .mensagens ul').append('<li id="'+o.id+'" class="eu"><p>'+o.mensagem+'</p></li>');	
						}
						else{
							$('#janela_'+user_id+' .mensagens ul').append('<li id="'+o.id+'"><div class="imgSmall"><img src="../img/usuarios/profile-default.png"></div><p>'+o.mensagem+'</p></li>');
						}
					
				});
				}

				// [].reverse.call($('#janela_'+o.janela_de+'.mensagens li')).appendTo($('#janela_'+o.janela_id+'.mensagens ul'));
				// var altura=$('#janela_'+o.janela_de+'.mensagens').height();
				// $('#janela_'+o.janela_de+'.mensagens').animate({scrollTop: altura}, '500');
			 }
		});
	}
		
	//Abre janelas
	$('body').on('click', '.users_online a', function(){
		var id=$(this).attr('id');

		var status=$(this).next().attr('class');
		var splitIds=id.split(':');
		var idJanela=Number(splitIds[1]);
			
		if($('#janela_'+idJanela).length==0){
			var nome= $(this).text();
			add_janela(id, nome, status);
			retorna_historico(idJanela);
		}
		else{
			$(this).removeClass('comecar');
		}
	});

	//Minimizar janela
	$('body').on('click', '.header_window', function(){
		var next=$(this).next();
		next.toggle(100);
	});
	
	//fechar janela
	$('body').on('click', '.close', function(){
		var parent=$(this).parent().parent();
		var idParent=parent.attr('id');
		var splitParent= idParent.split(':');
		var idJanelaFechada=Number(splitParent[1]);

		var contagem=Number($('.chat').length)-1;
		var indice=Number($('.close').index(this));
		var restamAfrente=contagem-indice;

		if(restamAfrente>=1){
			for(var i=1; i<= restamAfrente; i++){
				$('.chat:eq('+(indice+i)+')').animate({left:"0"}, 200);
				parent.remove();
				$('.users_online li #'+idJanelaFechada+'a').addClass('comecar');
			}
		}
		else{
			parent.remove();
		}
	});

	//Envia mensagens
	$('body').on('keyup', '.msg', function(e){
		if(e.which==13){
			var texto= $('.msg').val();
			var id= $(this).attr('id');
			var split= id.split(':');
			var destino= Number(split[1]);
			var meu_id=Number(split[0]);
			$.ajax({
				type: 'POST',
				url: '../controller/add_mensagens_controller.php',
				data: {mensagem: texto, para: destino},
				success: function(retorno){
					if(retorno!='erro'){
						$('.msg').val('');
						$("#janela_"+destino+" .mensagens ul").append("<li class='eu'><p>"+retorno+"</p></li>");
						console.log(retorno);
					}else{
						alert('Não foi possível enviar a mensagem');
					}
				}
			});
		}
	});

	$.ajax({
		url: "../controller/mensagens_controller.php",
		type: "POST",
		data: "id do usuario",
		success: function(retorno){
			// atualizar o chat e dar scroll
		}
	});
	// window.setInterval(function() {
	// 	console.log("teste");
	// }, 50);

	$(".show_chat").click(function(){
		var next=$(this).next();
		next.animate({"height": "toggle"});
		$(this).animate({"bottom": 0});
	});
});