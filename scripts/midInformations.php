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

<div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 max-height absolute">
	<div id="bonus" style="position:relative;top:180px;left:15px;z-index:1000;background:#dddddd;width:90px;height:40px;line-height:40px;text-align: center;border: 1px solid #bdbdbd;">
		BONUS
	</div>
	
	<div id="malus" style="position:absolute;top:180px;right:29px;z-index:1000;background:#dddddd;width:90px;height:40px;line-height:40px;text-align: center;border: 1px solid #bdbdbd;">
		MALUS
	</div>
	
	<div id="resultbmalus" style="position:absolute;top:140px;right:29px;z-index:1000;background:#f2f2f2;width:200px;height:30px;line-height:30px;text-align: center;border: 1px solid #bdbdbd;">
		SCORE x 1
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