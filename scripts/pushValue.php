<?php
	include "../libs/constants.php";
	include "../libs/sql.php";
	
	$name = $_POST["NAME"];
	$current_wave = $_POST["CURRENT_WAVE"];
	$score = $_POST["SCORE"];
	$gold = $_POST["GOLD"];
	$wave = $_POST["WAVE"];
	$zombie = $_POST["ZOMBIE"];
	$tower = $_POST["TOWER"];
	$shoot = $_POST["TIRS"];
	
	$player = select("PLAYERS","*","NAME='$name'");
	
	$exScore = explode(",", $player[0]["CURRENT_SCORES"]);
	$exGold = explode(",", $player[0]["CURRENT_GOLD"]);
	$exKill = explode(",", $player[0]["CURRENT_KILLS"]);
	$exTower = explode(",", $player[0]["CURRENT_TOWERS"]);
	$exShoot = explode(",", $player[0]["CURRENT_SHOOTS"]);
	
	var_dump(sizeof($exScore));
	if($exScore[0] == "") {
		$totalScore = $player[0]["SCORES"]+$score;
		$totalGold = $player[0]["GOLD"]+$gold;
		$totalWave = $player[0]["WAVES"]+1;
		$totalKill = $player[0]["KILLS"]+$zombie;
		$totalTower = $player[0]["TOWERS"]+$tower;
		$totalShoot = $player[0]["SHOOTS"]+$shoot;
		
		update("PLAYERS", array("CURRENT_SCORES"=>$score,
				"CURRENT_GOLD"=>$gold,
				"CURRENT_KILLS"=>$zombie,
				"CURRENT_TOWERS"=>$tower,
				"CURRENT_SHOOTS"=>$shoot,
				"SCORES"=>$totalScore,
				"GOLD"=>$totalGold,
				"KILLS"=>$totalKill,
				"TOWERS"=>$totalTower,
				"SHOOTS"=>$totalShoot
		), "NAME='$name'");		
	} else if($current_wave > sizeof($exScore)) {
		$totalScore = $player[0]["SCORES"]+$score;
		$totalGold = $player[0]["GOLD"]+$gold;
		$totalWave = $player[0]["WAVES"]+1;
		$totalKill = $player[0]["KILLS"]+$zombie;
		$totalTower = $player[0]["TOWERS"]+$tower;
		$totalShoot = $player[0]["SHOOTS"]+$shoot;
		
		$score = $player[0]["CURRENT_SCORES"].",".$score;
		$gold = $player[0]["CURRENT_GOLD"].",".$gold;
		$kill = $player[0]["CURRENT_KILLS"].",".$zombie;
		$tower = $player[0]["CURRENT_TOWERS"].",".$tower;
		$shoot = $player[0]["CURRENT_SHOOTS"].",".$shoot;
		
		update("PLAYERS", array("CURRENT_SCORES"=>$score,
				"CURRENT_GOLD"=>$gold,
				"CURRENT_KILLS"=>$zombie,
				"CURRENT_TOWERS"=>$tower,
				"CURRENT_SHOOTS"=>$shoot,
				"SCORES"=>$totalScore,
				"GOLD"=>$totalGold,
				"WAVES"=>$totalWave,
				"KILLS"=>$totalKill,
				"TOWERS"=>$totalTower,
				"SHOOTS"=>$totalShoot
		), "NAME='$name'");
	} else if($current_wave == sizeof($exScore)) {
		$tmpscore = "";
		$tmpgold = "";
		$tmpkill = "";
		$tmptower = "";
		$tmpshoot = "";
		
		for($i=0;$i<sizeof($exScore)-1;$i++) {
			$tmpscore = $tmpscore.$exScore[$i].",";
			$tmpgold = $tmpgold.$exGold[$i].",";
			$tmpkill = $tmpkill.$exKill[$i].",";
			$tmptower = $tmptower.$exTower[$i].",";
			$tmpshoot = $tmpshoot.$exShoot[$i].",";
		}
		
		if($exScore[sizeof($exScore)-1]==$score) {
			$totalScore = $player[0]["SCORES"];
			$tmpscore = $tmpscore.($exScore[sizeof($exScore)-1]);
		} else {
			$totalScore = $player[0]["SCORES"]+$score-$exScore[sizeof($exScore)-1];
			$tmpscore = $tmpscore.($exScore[sizeof($exScore)-1]+$score);
		}
		
		if($exGold[sizeof($exGold)-1]==$gold) {
			$totalGold = $player[0]["GOLD"];
			$tmpgold = $tmpgold.($exGold[sizeof($exGold)-1]);
		} else {
			$totalGold = $player[0]["GOLD"]+$gold-$exGold[sizeof($exGold)-1];
			$tmpgold = $tmpgold.($gold-$exGold[sizeof($exGold)-1]);
		}
		
		if($exKill[sizeof($exKill)-1]==$zombie) {
			$totalKill = $player[0]["KILLS"];
			$tmpkill = $tmpkill.($exKill[sizeof($exKill)-1]);
		} else {
			$totalKill = $player[0]["KILLS"]+$zombie-$exKill[sizeof($exKill)-1];
			$tmpkill = $tmpkill.($zombie-$exKill[sizeof($exKill)-1]);
		}
		
		if($exTower[sizeof($exTower)-1]==$tower) {
			$totalTower = $player[0]["TOWERS"];
			$tmptower = $tmptower.($exTower[sizeof($exTower)-1]);
		} else {
			$totalTower = $player[0]["TOWERS"]+$tower-$exTower[sizeof($exTower)-1];
			$tmptower = $tmptower.($tower-$exTower[sizeof($exTower)-1]);
		}
		
		if($exShoot[sizeof($exShoot)-1]==$shoot) {
			$totalShoot = $player[0]["SHOOTS"];
			$tmpshoot = $tmpshoot.($exShoot[sizeof($exShoot)-1]);
		} else {
			$totalShoot = $player[0]["SHOOTS"]+$shoot-$exShoot[sizeof($exShoot)-1];
			$tmpshoot = $tmpshoot.($shoot-$exShoot[sizeof($exShoot)-1]);
		}
		
		update("PLAYERS", array("CURRENT_SCORES"=>$tmpscore,
				"CURRENT_GOLD"=>$tmpgold,
				"CURRENT_KILLS"=>$tmpkill,
				"CURRENT_TOWERS"=>$tmptower,
				"CURRENT_SHOOTS"=>$tmpshoot,
				"SCORES"=>$totalScore,
				"GOLD"=>$totalGold,
				"KILLS"=>$totalKill,
				"TOWERS"=>$totalTower,
				"SHOOTS"=>$totalShoot
		), "NAME='$name'");
	}
	
	//
?>