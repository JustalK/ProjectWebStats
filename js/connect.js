$(document).ready(function(){
	pos = 1;
	var tableColor = [];
	
	var socket = io.connect("http://192.168.1.21:8081");
	socket.emit('addStats');
	
	socket.on('connection', function (message) {
		console.log("New player : "+message.pseudo);
		$("#player"+pos).html(message.pseudo);
		pos++;
	});

	$(document).click(function() {
		console.log("New player : "+message.pseudo);
		$("#player"+pos).html(message.pseudo);
		$("#player"+pos).css("color","#FFFFFF");
		$("#player"+pos).css("font-size","20px");
		tableColor.push("BLACK");
		pos++;		
	});
	
	socket.on('playerColorUpdate',function(message) {
		console.log(message.color+" "+message.pseudo);
		for(var i=1;i<pos;i++) {
			if($("#player"+i).html()==message.pseudo) {
				$("#player"+i).css("background",message.color);
				tableColor[i] = message.color;
			}
		}
	});
	
	socket.on('launchGame', function () {
		gameStart();
	});
	
	function newPlayer(name,color,pos) {
		name = name.toUpperCase();
		
		$.ajax({
 	 		method: "POST",
 	 		url: "scripts/addPlayer.php",
 	 		async: false,
 	 		data: { NAME: name, POSITION: pos, COLOR: color },
 	 		dataType: "html",
 	 		success: function(data) {
 	 			result = data;
 	 		}
 	 	});
	}
	
	function gameStart() {
		for(var i=1;i<pos;i++) {
			newPlayer($("#player"+i).html(),tableColor[i],i);
		}
		window.location.replace("index.php?player="+$("#player1").html().toUpperCase()+"&menu=0");
	};
	
});