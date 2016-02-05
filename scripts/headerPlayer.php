<?php
	echo '<div class="col-md-2 col-sm-2 col-xs-2 max-height button-border-bottom"><img src="imgs/logo.png" class="img-responsive" alt="Pion"></div>'; 
	
	if($nbplayers>0) {
		echo '<div data-color="'.$colors_players[0].'" class="button-player col-md-2 col-sm-2 col-xs-2 max-height button-border-left vertical-align button-top-unselected">'.$name_players[0].'</div>';
	} 

	for($i=1;$i<JOUEUR_MAX;$i++) {
		if($nbplayers>$i) { 
			if($i==JOUEUR_MAX-1) {
				echo '<div data-color="'.$colors_players[$i].'" class="button-player col-md-2 col-sm-2 col-xs-2 max-height button-border-left button-border-right vertical-align button-top-unselected">'.$name_players[$i].'</div>';
			} else {
				echo '<div data-color="'.$colors_players[$i].'" class="button-player col-md-2 col-sm-2 col-xs-2 max-height button-border-left vertical-align button-top-unselected">'.$name_players[$i].'</div>';
			}
		} else if($nbplayers==$i) {
			echo '<div class="button-unused max-height button-border-left col-md-2 col-sm-2 col-xs-2"></div>';
		} else {
			echo '<div class="button-unused max-height col-md-2 col-sm-2 col-xs-2"></div>';
		} 
	}
	echo '<div class="col-md-2  col-sm-2 col-xs-2 max-height button-border-bottom"></div>';
?>