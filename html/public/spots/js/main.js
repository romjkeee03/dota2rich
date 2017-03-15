var ps = 1;
function shows(a){
	if($("#"+a).css('display')=='none'){
		$("#"+a).slideDown(650);
		$("body").attr('class','modal-open');
	}else{
		$("#"+a).slideUp(350);
		$("body").attr('class','');
	}
}
function buy_money(){
	window.location = "https://unitpay.ru/pay/24166-e5918?sum="+(($("#amount").val()=="")?"20":$("#amount").val())+"&account="+user_id+"&desc=Пополнение баланса";
}
function no_reg(){
	$(".no_reg").remove();
	$("body").append("<div class='no_reg'>Вам нужно авторизоваться</div>");
	setTimeout(function() {
		$(".no_reg").slideUp(350);
	}, 3000);
}
function buy(a,b,c){
	if(ps==2) {return false;}
	if(c>money){
		$(".no_reg").remove();
		$("body").append("<div class='no_reg'>Не достаточно средств</div>");
		setTimeout(function() {
			$(".no_reg").slideUp(350);
		}, 3000);	
	}else{
		$(".no_reg").remove();
		var p = {
			item: b,
			num: a
		};
		ps=2;
        $.post(_url + "set.php", p, function(d) {
			if(d.error){
				$("body").append("<div class='no_reg'>"+d.error+"</div>");
				setTimeout(function() {
					$(".no_reg").slideUp(350);
				}, 3000);	
			}else{
				location.reload();
			}
			ps=1;
        }, "json");
	}
}
function set_name(a,b){
		$("#tooltip").remove();
	if(b==''){
		$("#tooltip").remove();
	}else{
		$(b).prepend("<div id='tooltip' style='display: none'>"+a+"</div>");
		$("#tooltip").css({'display':'block','margin-left':"-"+((($("#tooltip").width()-30)/2)+5)+"px"});
	}
}
$(window).on('load', function () {
	$('.winner').popover('show');
})