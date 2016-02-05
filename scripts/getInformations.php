<?php 
	/**
	 * Permet de grab le nom d'un player à partir de l'URL
	 */
	if(isset($_GET["player"])) {
		$player = strtoupper($_GET["player"]);
	}
	
	/**
	 * Permet de grab le menu actuelle à partir de l'URL
	 * Si il n'y a pas eu de choix, on passe a 0
	 */
	if(isset($_GET["menu"])) {
		$menu = $_GET["menu"];
	} else {
		$menu = 0;
	}
	
	/**
	 * On selectionne les joueurs actives
	 */
	$player = select("PLAYERS","*","ACTIVE=1");
	$nbplayers = sizeof($player);
	
	/**
	 * Pour le joueur active on met l'ensemble des informations dans une base
	 */
	for($i = 0;$i<$nbplayers;$i++) {
		if($player[$i]["NAME"]==$_GET["player"]) {
			$name = $player[$i]["NAME"];
			$colors = $player[$i]["COLORS"];
			$games = $player[$i]["GAMES"];
			$scores = $player[$i]["SCORES"];
			$gold = $player[$i]["GOLD"];
			$waves = $player[$i]["WAVES"];
			$kills = $player[$i]["KILLS"];
			$towers = $player[$i]["TOWERS"];
			$shoots = $player[$i]["SHOOTS"];
		}
	}
	
	$name_players = [];
	$colors_players = [];
	for($i = 0;$i<$nbplayers;$i++) {
		$name_players[$player[$i]["POSITION"]-1] = $player[$i]["NAME"];
		$colors_players[$player[$i]["POSITION"]-1] = $player[$i]["COLORS"];
	}
	for(;$i<4;$i++) {
		$name_players[$i] = JOUEUR_DEFAULT;	
	}
?>