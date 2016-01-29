$(document).ready(function(){
	pos = 1;
	
	newPlayer("azeazeaze","BLUE");
	newPlayer("zzzz","RED");
	function newPlayer(name,color) {
		name = name.toUpperCase();
		$("#player"+pos).html(name);
		$("#player"+pos).css("background",color);
		
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
		pos++;
	}
	
	function gameStart() {
		window.location.replace("index.php?player="+$("#player1").html()+"&menu=0");
	};
	
});