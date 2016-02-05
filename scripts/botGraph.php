<div class="col-md-offset-2 col-md-7" style="height: 30px;border-top: 1px solid #bdbdbd;border-left: 1px solid #bdbdbd;border-right: 1px solid #bdbdbd;">
	
</div>
<div id="container-graph" class="col-md-offset-2 col-md-7" style="height: 300px;border-left: 1px solid #bdbdbd;border-right: 1px solid #bdbdbd;border-bottom: 1px solid #bdbdbd;">
	<canvas id="graph">
	</canvas>
</div>

<div class="col-md-1" style="height: 300px;display:flex;justify-content: center;">
	<div style="align-self: center;width:80%;">
		
		<?php 
			for($i=0;$i<JOUEUR_MAX;$i++) {
				if($nbplayers>$i) {
					echo '<div id="btp'.($i+1).'" class="button-add-player button-add-player-out" style="color:'.$colors_players[$i].'">'.$name_players[$i].'</div>';
				}
			}
		?>
		
	</div>
</div>