$(document).ready(function(){

/*************************************************************************************************************************
 * FUNCTIONS DE BASE
 **************************************************************************************************************************/
	
	/**
	 * Initialise l'affichage en fonction du joueur selectionne
	 */
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
	
	/**
	 * Fonction qui permet de changer le style en fonction du precedent bouton cliquer
	 * @param Le bouton sur lequel on se trouve
	 */
	function switchSelected(button) {
		if(buttonTop != null) {
			$(buttonTop).removeClass("button-top-selected");
			$(buttonTop).addClass("button-top-unselected");	
		}
		buttonTop = $(button);
		$(button).removeClass("button-top-unselected");
		$(button).addClass("button-top-selected");
	} 	
	
/*************************************************************************************************************************
 * CHANGEMENT DE STYLE VIA ACTION DE L'UTILISATEUR
 **************************************************************************************************************************/
	
	/**
	 * Evenement lorsque la souris arrive sur les boutons des joueurs
	 * Changement de style
	 */
	$(".button-player").mouseover(function(){
		if(!$(this).is(".button-top-selected")) {
			$(this).css("background",$(this).data("color"));
		}
	});
	
	/**
	 * Evenement lorsque la souris quitte sur les boutons des joueurs
	 * Changement de style
	 */
	$(".button-player").mouseout(function(){
		$(this).css("background","none");
		$(this).removeClass("button-top-hover");
	});
	
	/**
	 * Evenement lorsque l'on clique sur les boutons des joueurs
	 * Execution de fonction
	 */
	var buttonTop;
	$(".button-player").click(function() {
		window.location.replace("?player="+$(this).html()+"&menu="+$("#menu").html());
		switchSelected($(this));
	});
	
	/**
	 * Evenement lorsque la souris arrive sur le bouton des joueurs sur le graphe
	 * Changement de style
	 */	
	$(".button-add-player").mouseover(function(){
		if(!$(this).is(".button-add-player-selected")) {
			$(this).removeClass("button-add-player-out");
			$(this).addClass("button-add-player-hover");	
		}
	});
	
	/**
	 * Evenement lorsque la souris quitte le bouton des joueurs sur le graphe
	 * Changement de style
	 */
	$(".button-add-player").mouseout(function(){
		if(!$(this).is(".button-add-player-selected")) {
			$(this).removeClass("button-add-player-hover");
			$(this).addClass("button-add-player-out");	
		}
	});
	
	/**
	 * Evenement lorsque la souris arrive sur le bouton droite du menu bas
	 * Changement de style
	 */
	$(".btr").mouseover(function(){
		$(".bar-bottom-top-border-right").addClass("mouseover");
		$(".bottom-topright").css("borderTop","50px solid #f2f2f2");
	});
	
	/**
	 * Evenement lorsque la souris quitte le bouton droite du menu bas
	 * Changement de style
	 */
	$(".btr").mouseout(function(){
		$(".bar-bottom-top-border-right").removeClass("mouseover");
		$(".bottom-topright").css("borderTop","50px solid #dddddd");
	});
	
	/**
	 * Evenement lorsque la souris arrive sur le bouton gauche du menu bas
	 * Changement de style
	 */
	$(".btl").mouseover(function(){
		$(".bar-bottom-top-border-left").addClass("mouseover");
		$(".bottom-topleft").css("borderTop","50px solid #f2f2f2");
	});
	
	/**
	 * Evenement lorsque la souris quitte le bouton gauche du menu bas
	 * Changement de style
	 */
	$(".btl").mouseout(function(){
		$(".bar-bottom-top-border-left").removeClass("mouseover");
		$(".bottom-topleft").css("borderTop","50px solid #dddddd");
	});
	
	/**
	 * Evenement lorsque la souris arrive le bouton des malus lie aux joueurs
	 * Changement de style
	 */	
	$("#malus").mouseover(function(){
		$("#malus").css("background","#f2f2f2");
	});
	
	/**
	 * Evenement lorsque la souris quitte le bouton des malus lie aux joueurs
	 * Changement de style
	 */
	$("#malus").mouseout(function(){
		$("#malus").css("background","#dddddd");
	});
	
	/**
	 * Envoie de l'evenement lors de l'appuie sur le bouton malus
	 */
	$("#malus").click(function() {
		if(parseInt($("#bmalus").html())==2) {
			$("#bmalus").html(parseInt($("#bmalus").html())-1);
			$("#resultbmalus").html("SCORE x "+$("#bmalus").html());
		} else if(parseInt($("#bmalus").html())>1) {
			$("#bmalus").html(parseInt($("#bmalus").html())-2);
			$("#resultbmalus").html("SCORE x "+$("#bmalus").html());			
		}
	});
	
	/**
	 * Evenement lorsque la souris arrive le bouton des bonus lie aux joueurs
	 * Changement de style
	 */
	$("#bonus").mouseover(function(){
		$("#bonus").css("background","#f2f2f2");
	});
	
	/**
	 * Evenement lorsque la souris quitte le bouton des bonus lie aux joueurs
	 * Changement de style
	 */
	$("#bonus").mouseout(function(){
		$("#bonus").css("background","#dddddd");
	});
	
	/**
	 * Envoie de l'evenement lors de l'appuie sur le bouton bonus
	 */
	$("#bonus").click(function() {
		if(parseInt($("#bmalus").html())==1) {
			$("#bmalus").html(parseInt($("#bmalus").html())+1);
			$("#resultbmalus").html("SCORE x "+$("#bmalus").html());
		} else {
			$("#bmalus").html(parseInt($("#bmalus").html())+2);
			$("#resultbmalus").html("SCORE x "+$("#bmalus").html());			
		}
	});
	
	/**
	 * Interaction lorsque le joueur clique sur les boutons des joueurs
	 */
	$(".button-add-player").click(function() {
		if($(this).is(".button-add-player-selected")) {
			$(this).removeClass("button-add-player-selected");
		} else {
			$(this).addClass("button-add-player-selected");
		}
	});
});