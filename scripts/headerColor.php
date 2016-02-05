<?php 
echo '<div class="col-md-offset-2 col-md-2 col-sm-2 col-xs-2 hbar" style="background:'.$colors_players[0].'"></div>	';

	for($i = 1;$i<$nbplayers;$i++) {
		echo '<div class="col-md-2 col-sm-2 col-xs-2 hbar" style="background:'.$colors_players[$i].'"></div>';	
	}
?>