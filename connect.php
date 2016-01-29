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
	<script src="js/connect.js"></script>
	
	<!-- My own script -->
	<?php
		include 'libs/constants.php';
		include 'libs/sql.php';
		$title="Index";
	?>	
</head>
<body>

<?php 
	clean("PLAYERS");
?>
	<div class="container-fluid max-height fond">
		<div class="row bar-top" style="margin-bottom:50px;">
			<div class="col-md-12 col-sm-12 col-xs-12 max-height button-border-bottom vertical-align titleText">TOWER DEFENSE</div>
		</div>
		
		<div class="row">
			<div id="player1" class="col-md-offset-4 col-md-4 col-sm-4 col-xs-4 button-connection vertical-align">EN ATTENTE D'UN JOUEUR...</div>
		</div>
		
		<div class="row">
			<div id="player2" class="col-md-offset-4 col-md-4 col-sm-4 col-xs-4 button-connection vertical-align">EN ATTENTE D'UN JOUEUR...</div>
		</div>
		
		<div class="row">
			<div id="player3" class="col-md-offset-4 col-md-4 col-sm-4 col-xs-4 button-connection vertical-align">EN ATTENTE D'UN JOUEUR...</div>
		</div>
		
		<div class="row">
			<div id="player4" class="col-md-offset-4 col-md-4 col-sm-4 col-xs-4 button-connection vertical-align">EN ATTENTE D'UN JOUEUR...</div>
		</div>				
	</div>

</body>
</html>