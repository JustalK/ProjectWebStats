$(document).ready(function(){
	
	initPlayer();
	function initPlayer() {
		$('.button-top-unselected').each(function(i, obj) {
			if($(obj).html() == $("#name").html()) {
				$(obj).removeClass("button-top-unselected");
				$(obj).addClass("button-top-selected");
			}
		});
		$('.button-add-player').each(function(i, obj) {
			console.log($(obj).html());
			if($(obj).html() == $("#name").html()) {
				$(obj).removeClass("button-add-player-out");	
				$(obj).addClass("button-add-player-selected");				
			}
		});
	}
	
	var buttonTop;
	$(".button-player").click(function() {
		window.location.replace("?player="+$(this).html()+"&menu="+$("#menu").html());
		switchSelected($(this));
	});
	
	function switchSelected(button) {
		if(buttonTop != null) {
			$(buttonTop).removeClass("button-top-selected");
			$(buttonTop).addClass("button-top-unselected");	
		}
		buttonTop = $(button);
		$(button).removeClass("button-top-unselected");
		$(button).addClass("button-top-selected");
	} 
	
	$(".button-player").mouseover(function(){
		if(!$(this).is(".button-top-selected")) {
			$(this).css("background",$(this).data("color"));
		}
	});
	
	$(".button-player").mouseout(function(){
		$(this).css("background","none");
		$(this).removeClass("button-top-hover");
	});
	
	$(".button-add-player").mouseover(function(){
		if(!$(this).is(".button-add-player-selected")) {
			$(this).removeClass("button-add-player-out");
			$(this).addClass("button-add-player-hover");	
		}
	});
	
	$(".button-add-player").mouseout(function(){
		if(!$(this).is(".button-add-player-selected")) {
			$(this).removeClass("button-add-player-hover");
			$(this).addClass("button-add-player-out");	
		}
	});
	
	$(".btr").mouseover(function(){
		$(".bar-bottom-top-border-right").css("background","#f2f2f2");
		$(".bottom-topright").css("borderTop","50px solid #f2f2f2");
	});
	
	$(".btr").mouseout(function(){
		$(".bar-bottom-top-border-right").css("background","#dddddd");
		$(".bottom-topright").css("borderTop","50px solid #dddddd");
	});
	
	$(".btl").mouseover(function(){
		$(".bar-bottom-top-border-left").css("background","#f2f2f2");
		$("#bottom-topleft").css("borderTop","50px solid #f2f2f2");
	});
	
	$(".btl").mouseout(function(){
		$(".bar-bottom-top-border-left").css("background","#dddddd");
		$("#bottom-topleft").css("borderTop","50px solid #dddddd");
	});
});