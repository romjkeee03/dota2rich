function load_chat_messages(){
	$.ajax({
					type : "GET",
					url  : "/chat",
					dataType : "json",
					cache : false,
					success : function(message){
							
						if(message && message.length > 0){
							$('#chat_messages').html('');
							message = message.reverse();
							
							
							for(var i in message){

								var item = '	<div class="item">';
			if(message[i].admin == 1){item += '<div class="avatar inline-block">';
					item += '<img src="/assets/images/adm-ava.png" alt="" />';
					item += '</div>';
					item += '<div class="info inline-block">';
					item += '<div class="name">';
					item += '<span></span>';
					if(LANG == 'en'){item += '<a href="#" style="color:red;">Administrator</a>';}else{
					item += '<a href="#" style="color:red;">Администратор</a>';}
					}else {
					item += '<div class="avatar inline-block">';
					item += '<a href="#player-modal" class="fancybox" data-profile="'+message[i].userid+'">';
					item += '<img src="'+message[i].avatar+'" alt="">';
					item += '</div>';
					item += '</a>';
					item += '<div class="info inline-block">';
					item += '<div class="name">';
					item += '<span></span>';
					item += '<a href="#player-modal" class="fancybox" data-profile="'+message[i].userid+'">'+message[i].username+'</a>';}
					item += '</div>';
				item += '<div class="text">'+message[i].messages+'</div>';
				item += '</div>';
		item += '	</div>';
	
			
					
					
					
				$('#chat_messages').append(item);
				}
				}
						setTimeout(function(){load_chat_messages();},1000);
					}
	});
}

	function add_otvet(e){inner=$(".chat textarea").val(),$(".chat textarea").val(inner+" "+e+" "),$(".chat textarea").focus()}
function add_smile(e){inner=$(".chat textarea").val(),$(".chat textarea").val(inner+" "+e+" "),$(".chat textarea").focus()}

$(document).ready(function(){
	load_chat_messages();
	
		$('.chat input[type="submit"]').on('click',function(event){
			if(typeof window.chat_user != undefined){
				var current_message = $('.chat textarea').val();
				
				var send_data = {
					user_message : current_message
				};
				$('.chat textarea').val('');
				if(send_data.user_message.length > 0 && send_data.user_message.replace(/golucky|html|script|src|scr|frame|gojackpot|starlucky|shop|skinarena|raffle|csgoup|goshuffle|gameluck|casino|goskins/gi,"***").length > 0){
						$.ajax({
							type : "POST",
							url : "/add_message?messages="+current_message,
							data : send_data,
							dataType : "json",
							cache : false,
							success : function(message){
								
								if(message && message.error) alert(message.error);
								if(message && message.clear)  $.notify(message.clear, {className :"error"});
								$('.chat textarea').val('');
								$('.chat textarea').text('');
							},
        error: function() {
            $.notify("Ваше сообщение отправлено", {className :"error"});
        }
						});
					}
			}
			return event.preventDefault();
		});
	
            
		$('#sendie').on('keyup',function(event){
			if(typeof window.chat_user != undefined){
				if(event.keyCode == 13){
					var current_message = $(this).val();

					var send_data = {
						user_message : current_message
					};
					$('#sendie').val('');
					console.log(send_data.user_message.replace(/golucky|html|script|src|scr|frame|gojackpot|starlucky|shop|skinarena|raffle|csgoup|goshuffle|gameluck|casino|goskins/gi,"***"),send_data.user_message.replace(/golucky|html|script|src|scr|frame|gojackpot|starlucky|shop|skinarena|raffle|csgoup|goshuffle|gameluck|casino|goskins/gi,"***").length,send_data.user_message.length);
					if(send_data.user_message.length > 0 && send_data.user_message.replace(/golucky|html|script|src|scr|frame|gojackpot|starlucky|shop|skinarena|raffle|csgoup|goshuffle|gameluck|casino|goskins/gi,"***").length > 0){
						$.ajax({
							type : "POST",
							url : "/add_message?messages="+current_message,
							data : send_data,
							dataType : "json",
							cache : false,
							success : function(message){
								if(message && message.error) alert(message.error);
								if(message && message.clear)  $.notify(message.clear, {className :"error"});
								$('#sendie').val('');
								$('#sendie').text('');
							},
        error: function() {
            $.notify("Ваше сообщение отправлено", {className :"success"});
        }
						});
					}
				}
			}else alert('Вы должны быть авторизованы');
			return false;
		});
});