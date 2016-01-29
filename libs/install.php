<?php

include "constants.php";

setup();
function setup() {
	/** ######################################################################################### **/
	/** CONNECTION TO THE MYSQL's SERVER **/
	/** ######################################################################################### **/
	$link=mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD);
	if (mysqli_connect_errno())
	{
		echo "F**K ! A wild error appeared : " . mysqli_connect_error();
	}
	
	/** ######################################################################################### **/
	/** CREATING AND SELECTING THE DATABASE **/
	/** ######################################################################################### **/
	exec_sql($link,"CREATE DATABASE IF NOT EXISTS ".DATABASE_NAME);
	mysqli_select_db($link,DATABASE_NAME);

	/** ######################################################################################### **/
	/** CREATING THE TABLE **/
	/** ######################################################################################### **/
	$query = "CREATE TABLE IF NOT EXISTS PLAYERS(ID int(11) NOT NULL AUTO_INCREMENT,NAME varchar(50) NOT NULL,
			ACTIVE BOOL NOT NULL DEFAULT '0',
			COLORS varchar(50) DEFAULT NULL,
			POSITION int(11) DEFAULT 0,
			GAMES int(11) DEFAULT 0,
			SCORES int(11) DEFAULT 0,
			GOLD int(11) DEFAULT 0,
			WAVES int(11) DEFAULT 0,
			KILLS int(11) DEFAULT 0,
			TOWERS int(11) DEFAULT 0,
			SHOOTS int(11) DEFAULT 0,
			BEST_SCORES int(11) DEFAULT 0,
			BEST_GOLD int(11) DEFAULT 0,
			BEST_WAVES int(11) DEFAULT 0,
			BEST_KILLS int(11) DEFAULT 0,
			BEST_TOWERS int(11) DEFAULT 0,
			BEST_SHOOTS int(11) DEFAULT 0,
			CURRENT_SCORES TEXT,
			CURRENT_GOLD TEXT,
			CURRENT_WAVES TEXT,
			CURRENT_KILLS TEXT,
			CURRENT_TOWERS TEXT,
			CURRENT_SHOOTS TEXT,
			primary key (ID));";
	exec_sql($link,$query);
	
	

	/** ######################################################################################### **/
	/** CLOSING THE CONNECTION **/
	/** ######################################################################################### **/
	mysqli_close($link);
}

function exec_sql($link,$query) {
	if (!mysqli_query($link,$query))
	{
		echo("F**K ! A wild error appeared : " . mysqli_error($link));
	}	
}

?>