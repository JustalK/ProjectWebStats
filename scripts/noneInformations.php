<?php
	echo '<div id="name" class="dnone">'.$name.'</div>';
	echo '<div id="bmalus" class="dnone">1</div>';
	echo '<div id="menu" class="dnone">'.$menu.'</div>';
	for($i = 0;$i<$nbplayers;$i++) {
		echo '<div id="color'.$i.'" class="dnone">'.$colors_players[$i].'</div>';
	}
	echo '<div id="nbrplayers" class="dnone">'.$nbplayers.'</div>';
?>