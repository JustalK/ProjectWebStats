$(document).ready(function(){
	
	var canvas = document.getElementById("graph");
	canvas.width = $("#container-graph").width();
	canvas.height = $("#container-graph").height();
	var ctx = canvas.getContext("2d");
	var dataGraph = 0;
	var graph;
	var optionsGraph = { animation : false }
	
	var table_button = ["score","gold","zombie","tower","shoot"];
	var table_sql = ["CURRENT_SCORES","CURRENT_GOLD","CURRENT_KILLS","CURRENT_TOWERS","CURRENT_SHOOTS"];
	var table_sentance = ["Evolution du score en fonction des vagues de zombies",
	                      "Evolution de l'or en fonction des vagues de zombies",
	                      "Evolution des morts en fonction des vagues de zombies",
	                      "Evolution des constructions de tour en fonction des vagues de zombies",
	                      "Evolution des tirs en fonction des vagues de zombies"]
	var table_left_position;
	var table_mid_position = 1;
	var table_right_position;
	
	initGraphique();
	function initGraphique() {
		table_mid_position = parseInt($("#menu").html());
		table_right_position = table_mid_position + 1;
		table_left_position = table_mid_position - 1;
		if(table_left_position<0) table_left_position = table_button.length-1;
		$("#img-left").attr("src","imgs/"+table_button[table_left_position]+"_unselected.png");
		$("#img-mid").attr("src","imgs/"+table_button[table_mid_position]+"_unselected.png");
		$("#sentance-mid").html(table_sentance[table_mid_position]);
		$("#img-right").attr("src","imgs/"+table_button[table_right_position]+"_unselected.png");
		checkAll($("#name").html(),table_sql[table_mid_position]);
	}
	
	/**
	 * Rotate tout le menu vers la gauche lors de l'appuie sur le bouton
	 */
	$(".btl").click(function() {
		table_left_position++;
		table_left_position = table_left_position % table_button.length;
		table_mid_position = table_right_position;
		table_right_position++;
		table_right_position = table_right_position % table_button.length;
		$("#img-left").attr("src","imgs/"+table_button[table_left_position]+"_unselected.png");
		$("#img-mid").attr("src","imgs/"+table_button[table_mid_position]+"_unselected.png");
		$("#sentance-mid").html(table_sentance[table_mid_position]);
		$("#img-right").attr("src","imgs/"+table_button[table_right_position]+"_unselected.png");
		$("#menu").html(table_mid_position);
		checkAll($("#name").html(),table_sql[table_mid_position]);
	});
	
	/**
	 * Rotate tout le menu vers la droite lors de l'appuie sur le bouton
	 */
	$(".btr").click(function() {
		table_right_position = table_mid_position;
		table_mid_position = table_left_position;
		table_left_position--;
		if(table_left_position<0) table_left_position = table_button.length-1;
		table_left_position = table_left_position % table_button.length;
		$("#img-left").attr("src","imgs/"+table_button[table_left_position]+"_unselected.png");
		$("#img-mid").attr("src","imgs/"+table_button[table_mid_position]+"_unselected.png");
		$("#sentance-mid").html(table_sentance[table_mid_position]);
		$("#img-right").attr("src","imgs/"+table_button[table_right_position]+"_unselected.png");
		$("#menu").html(table_mid_position);
		checkAll($("#name").html(),table_sql[table_mid_position]);
	});
	
	$(".button-add-player").click(function() {
		if($(this).is(".button-add-player-selected")) {
			$(this).removeClass("button-add-player-selected");
		} else {
			$(this).addClass("button-add-player-selected");
		}
		checkAll($("#name").html(),table_sql[table_mid_position]);
	});
	
	$("#blblblb").click(function() {
		saveNewValue("MAUREEN",3,12,50,12,6,5,500);
	});
			
	function saveNewValue(name,current_wave,score,gold,wave,zombie,tower,tirs) {
		$.ajax({
 	 		method: "POST",
 	 		url: "scripts/pushValue.php",
 	 		async: false,
 	 		data: { NAME: name, CURRENT_WAVE: current_wave, SCORE: score, GOLD: gold, WAVE: wave, ZOMBIE: zombie, TOWER: tower, TIRS: tirs },
 	 		dataType: "html",
 	 		success: function(data) {
 	 			result = data;
 	 		}
 	 	});
		checkAll($("#name").html(),table_sql[table_mid_position]);
	};
	
	//TODO A refaire
	$(window).resize(function() {
		canvas.width = $("#container-graph").width();
		canvas.height = $("#container-graph").height();
		ctx = canvas.getContext("2d");
		graph.destroy();
		drawGraphique(dataGraph);
	});
	
	/**
	 * Verifie chacune des donnees lies aux joueurs avec la base de donnees
	 * @param player Le nom du joueur que l'on souhaite checker
	 */
	function checkAll(player,keyGraphique) {
	 	var result;
		
		$.ajax({
 	 		method: "POST",
 	 		url: "scripts/getValue.php",
 	 		async: false,
 	 		data: { NAME: player },
 	 		dataType: "json",
 	 		success: function(data) {
 	 			result = data;
 	 		}
 	 	});

		if(parseInt($("#nbrplayers").html())==1) {
			checkGraphique(result[0][keyGraphique],null,null,null);		
		} else if(parseInt($("#nbrplayers").html())==2) {
			checkGraphique(result[0][keyGraphique],result[1][keyGraphique],null,null);		
		} else if(parseInt($("#nbrplayers").html())==3) {
			checkGraphique(result[0][keyGraphique],result[1][keyGraphique],result[2][keyGraphique],null);			
		} else if(parseInt($("#nbrplayers").html())==4) {
			checkGraphique(result[0][keyGraphique],result[1][keyGraphique],result[2][keyGraphique],result[3][keyGraphique]);
		}
		
		for(var i=0;i<parseInt($("#nbrplayers").html());i++) {
			if(result[i]["NAME"]==$("#name").html()) {
				console.log(result[i]["NAME"]);
			 	checkVariable("GAMES",parseInt(result[i]["GAMES"]));
			 	checkVariable("SCORES",parseInt(result[i]["SCORES"]));
			 	checkVariable("GOLD",parseInt(result[i]["GOLD"]));
			 	checkVariable("WAVES",parseInt(result[i]["WAVES"]));
			 	checkVariable("KILLS",parseInt(result[i]["KILLS"]));
			 	checkVariable("TOWERS",parseInt(result[i]["TOWERS"]));
			 	checkVariable("SHOOTS",parseInt(result[i]["SHOOTS"]));
			}
		}
	}
	
	/**
	 * Check si le graph doit etre redessine ou non
	 * @param data les donnees que l'on doit verifier
	 */
	function checkGraphique(data0,data1,data2,data3) {
			drawGraphique(data0,data1,data2,data3);
	}
	
	
	function splitData(data) {
		var tmp = new Array();
		if(data!=0) {
			tmp = data.split(",");
			for(i in tmp) {
			    tmp[i] = parseInt(tmp[i]);
			}
		} else {
			tmp[0] = 0;
		}
		return tmp;
	}
	
	function getColors(color) {
		var playerColor = $("#"+color).html();
		var color1 = "rgba(220,220,220,0.2)";
		var color2 = "rgba(220,220,220,1)";
		
		if(playerColor == "BLUE") {
			color1 = "rgba(0,198,255,0.2)";
			color2 = "rgba(0,198,255,1)";
		} else if(playerColor == "RED") {
			color1 = "rgba(220,0,0,0.2)";
			color2 = "rgba(220,0,0,1)";			
		} else if(playerColor == "YELLOW") {
			color1 = "rgba(234,255,0,0.2)";
			color2 = "rgba(234,255,0,1)";			
		} else if(playerColor == "GREEN") {
			color1 = "rgba(0,255,12,0.2)";
			color2 = "rgba(0,255,12,1)";			
		}
		
		return [color1,color2];
	}
	
	/**
	 * Dessine le graph en fonction des donnees (data)
	 * @param data Les donnees pour ce graphique
	 */
	function drawGraphique(data0,data1,data2,data3) {
		// Creating the arrays
		var tmpLabels = new Array();
		var j = 1;
		
		if(data0!=0) {
			for(i in data0.split(",")) {
			    tmpLabels[i] = "WAVE "+j++;
			}
		} else {
			tmpLabels[0] = "WAVE 1";
		}
		
		var dataPlayerSet = [];
		var playerColors;
		if($("#btp1").is(".button-add-player-selected")) {
			playerColors = getColors("color0");
			dataPlayerSet.push({
		            label: "The data",
		            fillColor: playerColors[0],
		            strokeColor: playerColors[1],
		            pointColor: playerColors[1],
		            pointStrokeColor: "#fff",
		            pointHighlightFill: "#fff",
		            pointHighlightStroke: "rgba(220,220,220,1)",
		            data: splitData(data0)
		        });
		}
		if($("#btp2").is(".button-add-player-selected")) {
			playerColors = getColors("color1");
			dataPlayerSet.push({
	            label: "The data",
	            fillColor: playerColors[0],
	            strokeColor: playerColors[1],
	            pointColor: playerColors[1],
	            pointStrokeColor: "#fff",
	            pointHighlightFill: "#fff",
	            pointHighlightStroke: "rgba(220,220,220,1)",
	            data: splitData(data1)
	        });			
		}
		if($("#btp3").is(".button-add-player-selected")) {
			playerColors = getColors("color2");
			dataPlayerSet.push({
	            label: "The data",
	            fillColor: playerColors[0],
	            strokeColor: playerColors[1],
	            pointColor: playerColors[1],
	            pointStrokeColor: "#fff",
	            pointHighlightFill: "#fff",
	            pointHighlightStroke: "rgba(220,220,220,1)",
	            data: splitData(data2)
	        });			
		}
		if($("#btp4").is(".button-add-player-selected")) {
			playerColors = getColors("color3");
			dataPlayerSet.push({
	            label: "The data",
	            fillColor: playerColors[0],
	            strokeColor: playerColors[1],
	            pointColor: playerColors[1],
	            pointStrokeColor: "#fff",
	            pointHighlightFill: "#fff",
	            pointHighlightStroke: "rgba(220,220,220,1)",
	            data: splitData(data3)
	        });			
		}
		
		var dataTable = {
			    labels: tmpLabels,
			    datasets: dataPlayerSet
			};
		if(graph!=null) {
			graph.destroy();
		}
		graph = new Chart(ctx).Line(dataTable,optionsGraph);
	}
	
	/**
	 * Check si la valeur actuelle dans la base de donnee correspond bien a celle affiche sur le site.
	 * Si les valeurs sont differentes, on update la valeur
	 * @param variable La variable que l'on souhaite checker
	 * @param current_value La valeur dans la base de donnee
	 */
	function checkVariable(variable,current_value) {
		if(getVariable(variable)!=current_value) {
			updateVariable(variable,current_value);
		}
	}
	
	/**
	 * Met a jour la variable sur la page web
	 * @param String variable Le nom de l'id de l'element
	 * @param Int value la nouvelle valeur de l'element 
	 */
	function updateVariable(variable,value) {
		$("#"+variable.toLowerCase()).html(value);
	}
	
	/**
	 * Retourne la valeur de l'element avec l'id "variable"
	 * @return int La valeur de l'element avec l'id "variable"
	 */
	function getVariable(variable) {
		return parseInt($("#"+variable.toLowerCase()).html());
	}
});