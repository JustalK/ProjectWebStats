<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- Framework -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.socket.io/socket.io-1.4.3.js"></script>
	<script src="js/chart.js"></script>
	
	<!-- My own script -->
	<script src="js/events.js"></script>
	<script src="js/checkers.js"></script>
	<?php
		include_once 'libs/constants.php';
		include_once 'libs/sql.php';
		include_once 'libs/addTest.php';
		include_once 'scripts/getInformations.php';
	?>		
</head>
<!--
##########################################################################################################################################################################################
##########################################################################################################################################################################################
## CONTENT
##########################################################################################################################################################################################
##########################################################################################################################################################################################	
-->	

<body>	
	<!-- /********************************/
	* Definition des informations cachees
	/********************************/ -->
	<?php include_once 'scripts/noneInformations.php'; ?>

	<div class="container-fluid max-width positionZ">
		<!-- /********************************/
		* Definition de la petite barre de couleur
		/********************************/ -->
		<div class="row" >
			<?php include_once 'scripts/headerColor.php'; ?>
		</div>
	</div>
		
	<div class="container-fluid max-height">
		<!-- /********************************/
		* Menu des joueurs
		/********************************/ -->
		<div class="row bar-top">
			<?php include_once 'scripts/headerPlayer.php'; ?>
		</div>
		
		<!-- /********************************/
		* Informations au milieu 
		/********************************/ -->
		<div class="row bar-mid">
			<div class="content-mid max-height">
				<?php include_once 'scripts/midInformations.php'; ?>
			</div>
		</div>
		
		<!-- /********************************/
		* Menu de la partie basse du site
		/********************************/ -->
		<div class="row bar-bottom bar-bottom-border">
				<?php include_once 'scripts/botMenu.php'; ?>
		</div>
		
		<!-- /********************************/
		* Graphique
		/********************************/ -->
		<div class="row" style="padding-top:20px;">
				<?php include_once 'scripts/botGraph.php'; ?>
		</div>
		
		<!-- Le footer -->
		<div class="row bar-bottom bar-top-border max-width" style="position:absolute;bottom: 0;">
			<div class="col-md-12 max-height vertical-align">
				Justal K$#233vin - PolyDefense @ V 1.1
			</div>
		</div>
	</div>
</body>
</html>