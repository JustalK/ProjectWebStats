<?php
	include "../libs/constants.php";
	include "../libs/sql.php";
	
	$player_name = $_POST["NAME"];
	$player_position = intval($_POST["POSITION"]);
	$player_color = $_POST["COLOR"];
	
	$player = select("PLAYERS","*","NAME='.$player_name.'");
	
	if(sizeof($player)==0) {
		insert("PLAYERS", array("NAME"=>"$player_name","ACTIVE"=>1,"POSITION"=>$player_position,"COLORS"=>"$player_color","GAMES"=>0,"SCORES"=>0,"GOLD"=>0,"WAVES"=>0,"KILLS"=>0,"TOWERS"=>0,"SHOOTS"=>0,"CURRENT_GOLD"=>"","CURRENT_SCORES"=>"","CURRENT_WAVES"=>"","CURRENT_KILLS"=>"","CURRENT_TOWERS"=>"","CURRENT_SHOOTS"=>""));
	}
?>