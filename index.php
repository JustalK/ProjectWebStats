<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	
	<!-- Framework -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.js"></script>
	
	<!-- My own script -->
	<script src="js/index.js"></script>
	<script src="js/checkers.js"></script>
	<script src="js/init.js"></script>
	<?php
		include 'libs/constants.php';
		include 'libs/sql.php';
		$title="Index";
	?>		
</head>
<!--
##########################################################################################################################################################################################
##########################################################################################################################################################################################
## CONTENT
##########################################################################################################################################################################################
##########################################################################################################################################################################################	
-->	

<?php 
	if(isset($_GET["player"])) {
		$player = strtoupper($_GET["player"]);
	}
	if(isset($_GET["menu"])) {
		$menu = $_GET["menu"];
	} else {
		$menu = 0;
	}
	//$articles = select("PLAYERS","*","ID=4");
	//echo $articles[0]['NAME'];
	//update("PLAYERS", array("NAME"=>"AZDFAZFAZF"), "ID=4");
	//clean("PLAYERS");
	//insert("PLAYERS", array("NAME"=>"KEVIN","ACTIVE"=>1,"POSITION"=>1,"COLORS"=>"BLUE","GAMES"=>10,"SCORES"=>10,"TOWERS"=>1,"CURRENT_GOLD"=>"10,20,20","CURRENT_SCORES"=>"2,7,9","CURRENT_KILLS"=>"1,3,5","CURRENT_TOWERS"=>"1,2,3","CURRENT_SHOOTS"=>"1,200,200"));
	//insert("PLAYERS", array("NAME"=>"MAUREEN","ACTIVE"=>1,"POSITION"=>1,"COLORS"=>"RED","GAMES"=>100,"CURRENT_GOLD"=>"","CURRENT_SCORES"=>"11,17,19","CURRENT_KILLS"=>"","CURRENT_TOWERS"=>"","CURRENT_SHOOTS"=>""));
	//insert("PLAYERS", array("NAME"=>"JEAN","ACTIVE"=>1,"POSITION"=>3,"COLORS"=>"YELLOW","GAMES"=>100,"CURRENT_GOLD"=>"180,120,278","CURRENT_SCORES"=>"17,22,10","CURRENT_KILLS"=>"1,15,20","CURRENT_TOWERS"=>"1,2,3","CURRENT_SHOOTS"=>"100,5,2"));
	//insert("PLAYERS", array("NAME"=>"MICHELLE","ACTIVE"=>1,"POSITION"=>3,"COLORS"=>"GREEN","GAMES"=>100,"CURRENT_GOLD"=>"0,10,140","CURRENT_SCORES"=>"10","CURRENT_KILLS"=>"1,15,20","CURRENT_TOWERS"=>"1,2,3","CURRENT_SHOOTS"=>"100,5,2"));
	//insert("PLAYERS", array("NAME"=>"ROBERT","ACTIVE"=>0,"POSITION"=>0,"COLORS"=>"RED","GAMES"=>100,"CURRENT_GOLD"=>"210,120,200","CURRENT_SCORES"=>"10","CURRENT_KILLS"=>"1,15,20","CURRENT_TOWERS"=>"1,2,3","CURRENT_SHOOTS"=>"100,5,2"));
	$id = 1;
	
	$player = select("PLAYERS","*","ACTIVE=1");
	$nbplayers = sizeof($player);
	
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
<body>	
	<div id="name" style="display: none;"><?php echo $name; ?></div>
	<div id="menu" style="display: none;"><?php echo $menu; ?></div>
	<?php for($i = 0;$i<$nbplayers;$i++) { ?>
		<div id="color<?php echo $i; ?>" style="display: none;"><?php echo $colors_players[$i]; ?></div>
	<?php } ?>
	<div id="nbrplayers" style="display: none;"><?php echo $nbplayers; ?></div>
	
	
	<div class="container-fluid max-width" style="position:absolute;z-index:1000;">
		<div class="row" >
			<div class="col-md-offset-2 col-md-2 col-sm-2 col-xs-2" style="height:5px;background: <?php echo $colors_players[0]; ?>"></div>	
			<?php for($i = 1;$i<$nbplayers;$i++) { ?>
				<div class="col-md-2 col-sm-2 col-xs-2" style="height:5px;background: <?php echo $colors_players[$i]; ?>"></div>	
			<?php } ?>
		</div>
	</div>
	
	<div class="container-fluid max-height">
		<div class="row bar-top">
			<div class="col-md-2 col-sm-2 col-xs-2 max-height button-border-bottom"></div>
			<?php if($nbplayers>0) { ?>
				<div data-color="<?php echo $colors_players[0]; ?>" class="button-player col-md-2 col-sm-2 col-xs-2 max-height button-border-left vertical-align button-top-unselected"><?php echo $name_players[0]; ?></div>
			<?php } ?>
			
			<?php if($nbplayers>1) { ?>
				<div data-color="<?php echo $colors_players[1]; ?>" class="button-player col-md-2 col-sm-2 col-xs-2 max-height button-border-left vertical-align button-top-unselected"><?php echo $name_players[1]; ?></div>
			<?php } else if($nbplayers==1) { ?>
				<div class="button-unused max-height button-border-left col-md-2 col-sm-2 col-xs-2"></div>
			<?php } else { ?>
				<div class="button-unused max-height col-md-2 col-sm-2 col-xs-2"></div>
			<?php } ?>
			
			<?php if($nbplayers>2) { ?>
				<div data-color="<?php echo $colors_players[2]; ?>" class="button-player col-md-2 col-sm-2 col-xs-2 max-height button-border-left vertical-align button-top-unselected"><?php echo $name_players[2]; ?></div>
			<?php } else if($nbplayers==2) { ?>
				<div class="button-unused button-border-left max-height col-md-2 col-sm-2 col-xs-2"></div>
			<?php } else { ?>
				<div class="button-unused max-height col-md-2 col-sm-2 col-xs-2"></div>
			<?php } ?>
			
			<?php if($nbplayers>3) { ?>
				<div data-color="<?php echo $colors_players[3]; ?>" class="button-player col-md-2 col-sm-2 col-xs-2 max-height button-border-left button-border-right vertical-align button-top-unselected"><?php echo $name_players[3]; ?></div>
			<?php } else if($nbplayers==3) { ?>
				<div class="button-unused button-border-left max-height col-md-2 col-sm-2 col-xs-2"></div>
			<?php } else { ?>
				<div class="button-unused max-height col-md-2 col-sm-2 col-xs-2"></div>
			<?php } ?>
			
			<div class="col-md-2  col-sm-2 col-xs-2 max-height button-border-bottom"></div>
		</div>
		<div class="row bar-mid" style="position:relative;top: 0;">
			<div class="content-mid max-height">
			
				<!-- Le cadre qui est en dessous l'image du pion -->
				<div class="col-md-2  col-sm-2 col-xs-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 max-height vertical-align absolute">
					<div class="vertical-align relative">
						 <img src="imgs/cadre.png" class="img-responsive" alt="Cadre"> 
					</div>
				</div>
				
				<!-- Le pion qui est au dessus de l'image du cadre -->
				<div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 max-height vertical-align absolute">
					<div class="vertical-align relative">
						 <img src="<?php echo 'imgs/'.$colors.'.png'; ?>" class="img-responsive" alt="Pion"> 
					</div>
				</div>
				
				<!-- Le tableau de valeur -->
				<div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-4 col-sm-offset-4 col-xs-offset-4 max-height vertical-align">
					<div class="container table-mid vertical-align"><div class="max-width">
						<div class="row table-row-size max-width">
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align max-height"><img src="imgs/game_all.png" class="img-responsive" alt="Game"></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align-only max-height annotation">Parties jou&#233es : <p id="games"><?php echo $games; ?></p></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align max-height"><img src="imgs/score_all.png" class="img-responsive" alt="Gold"></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align-only max-height annotation">Scores total : <p id="scores"><?php echo $scores; ?></p></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align max-height"><img src="imgs/gold_all.png" class="img-responsive" alt="Gold"></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align-only max-height annotation">Or gagn&#233 : <p id="gold"><?php echo $gold; ?></p></div>
						</div>
					
						<div class="row table-row-size max-width">
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align max-height"><img src="imgs/wave_all.png" class="img-responsive" alt="Gold"></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align-only max-height annotation">Vagues d&#233truites : <p id="waves"><?php echo $waves; ?></p></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align max-height"><img src="imgs/zombie_all.png" class="img-responsive" alt="Game"></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align-only max-height annotation">Zombis tu&#233s : <p id="kills"><?php echo $kills; ?></p></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align max-height"><img src="imgs/tower_all.png" class="img-responsive" alt="Gold"></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align-only max-height annotation">Tours construites : <p id="towers"><?php echo $towers; ?></p></div>
						</div>
					
						<div class="row table-row-size max-width" >
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align max-height"><img src="imgs/shoot_all.png" class="img-responsive" alt="Game"></div>
							<div class="col-md-2 col-sm-2 col-xs-2 vertical-align-only max-height annotation">Tirs totaux : <p id="shoots"><?php echo $shoots; ?></p></div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Le menu du bas -->
		<div class="row bar-bottom bar-bottom-border">
			<div class="col-md-1 col-md-offset-2 max-height no-padding-right">
				<div class="bottom-topright absolute right btr"></div>
				<div id="bottom-topright-effect-1" class="absolute right"></div>
			</div>
			<div class="col-md-1 max-height vertical-align no-padding-left bar-bottom-top bar-bottom-top-border bar-bottom-top-border-right btr"><img id="img-left" src="imgs/score_unselected.png" class="img-responsive" alt="Game" style="padding: 20px;"></div>
			
			<div class="col-md-4 max-height vertical-align bar-bottom-top-border bar-bottom-top-middle">
					<img id="img-mid" src="imgs/score_unselected.png" class="img-responsive" alt="Game" style="padding: 20px;">
					<p id="sentance-mid">Gold en fonction des waves</p>
			</div>
			
			<div class="col-md-1 max-height vertical-align no-padding-right bar-bottom-top bar-bottom-top-border bar-bottom-top-border-left btl"><img id="img-right" src="imgs/shoot_unselected.png" class="img-responsive" alt="Game" style="padding: 20px;"></div>
			<div class="col-md-1 max-height no-padding-left">
				<div id="bottom-topleft" class="absolute left btl"></div>
				<div id="bottom-topleft-effect-1" class="absolute left"></div>
			</div>
		</div>
		
		<div class="row" style="padding-top:20px;">
			<div class="col-md-offset-2 col-md-7" style="height: 30px;border-top: 1px solid #bdbdbd;border-left: 1px solid #bdbdbd;border-right: 1px solid #bdbdbd;">
				qsdqds
			</div>
			<div id="container-graph" class="col-md-offset-2 col-md-7" style="height: 500px;border-left: 1px solid #bdbdbd;border-right: 1px solid #bdbdbd;border-bottom: 1px solid #bdbdbd;">
				<canvas id="graph">
				</canvas>
			</div>
			
			<div class="col-md-1" style="height: 500px;display:flex;justify-content: center;">
				<div style="align-self: center;width:80%;">
					<?php if($nbplayers>0) { ?>
						<div id="btp1" class="button-add-player button-add-player-out" style="color: <?php echo $colors_players[0]; ?>"><?php echo $name_players[0]; ?></div>
					<?php } ?>
					
					<?php if($nbplayers>1) { ?>
						<div id="btp2" class="button-add-player button-add-player-out" style="color: <?php echo $colors_players[1]; ?>"><?php echo $name_players[1]; ?></div>
					<?php } ?>
					
					<?php if($nbplayers>2) { ?>
						<div id="btp3" class="button-add-player button-add-player-out" style="color: <?php echo $colors_players[2]; ?>"><?php echo $name_players[2]; ?></div>
					<?php } ?>
					
					<?php if($nbplayers>3) { ?>
						<div id="btp4" class="button-add-player button-add-player-out" style="color: <?php echo $colors_players[3]; ?>"><?php echo $name_players[3]; ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<!-- Le footer -->
		<div id="blblblb" class="row bar-bottom bar-top-border max-width" style="position:absolute;bottom: 0;">
			<div class="col-md-12 max-height vertical-align">
				Justal Kévin - PolyWeb @ V 1.1
			</div>
		</div>
	</div>
</body>
</html>