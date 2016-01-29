<?php

/**
 * Add informations ($array) in the table ($table)
 * @param String $table The name of the table
 * @param Array $array The informations that we wanna add in the table
 * @return int the id of the row
 */
function insert($table,$array) {
	/** ######################################################################################### **/
	/** CONNECTION TO THE MYSQL's SERVER **/
	/** ######################################################################################### **/
	$link=mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,DATABASE_NAME);
	
	/** ######################################################################################### **/
	/** GETTING THE COLUMNS WITH THE ARRAY AND INSERTING THE VALUES IN THE TABLE **/
	/** ######################################################################################### **/
	$columns= "";
	$values="";
	foreach ($array as $key => $value){
		$columns .= $key.",";
		$values .= "'".$value."',";
	}
	
	$query = "INSERT INTO ".$table." (".rtrim($columns,",").") VALUES (".rtrim($values,",").");";
	exec_sql($link,$query);
	
	$id = mysqli_insert_id($link);
	
	/** ######################################################################################### **/
	/** CLOSING THE CONNECTION **/
	/** ######################################################################################### **/
	mysqli_close($link);
	
	return $id;
}

/**
 * Get the informations ($array) in the table ($table) where we have a condition ($where)
 * @param String $table The table from where we want the informations
 * @param array $array The informations that we want
 * @param string $where The condition
 * @return multitype:unknown An array with what we want (normally :x)
 */
function select($table,$array = "*",$where = NULL) {
	/** ######################################################################################### **/
	/** CONNECTION TO THE MYSQL's SERVER **/
	/** ######################################################################################### **/
	$link=mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,DATABASE_NAME);

	/** ######################################################################################### **/
	/** CREATING THE TABLE OF THE RESULT **/
	/** ######################################################################################### **/
	if(isset($where)) {
		$query = "SELECT ".$array." FROM ".$table." WHERE ".$where.";";
	} else {
		$query = "SELECT ".$array." FROM ".$table.";";
	}

	$rsl = mysqli_query($link,$query);

	$result = array();

	while(($row =  mysqli_fetch_assoc($rsl))) {
		$result[] = $row;
	}

	/** ######################################################################################### **/
	/** FREE THE VARIABLE **/
	/** ######################################################################################### **/
	mysqli_free_result($rsl);

	/** ######################################################################################### **/
	/** CLOSING THE CONNECTION **/
	/** ######################################################################################### **/
	mysqli_close($link);

	return $result;
}

/**
 * Update the informations of a table ($table) with ($array) where the row match the condition ($where)
 * @param String $table The table where we wanna push the informations
 * @param Array $array the array that contain all the informations
 * @param String $where the condition
 */
function update($table,$array,$where) {
	/** ######################################################################################### **/
	/** CONNECTION TO THE MYSQL's SERVER **/
	/** ######################################################################################### **/
	$link=mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,DATABASE_NAME);

	/** ######################################################################################### **/
	/** CREATING THE SET OF VALUE **/
	/** ######################################################################################### **/
	$tmp = "";
	foreach ($array as $key => $value){
		$tmp .= $key."='".$value."',";
	}

	$query = "UPDATE ".$table." SET ".rtrim($tmp,",")." WHERE ".$where.";";
	exec_sql($link,$query);

	/** ######################################################################################### **/
	/** CLOSING THE CONNECTION **/
	/** ######################################################################################### **/
	mysqli_close($link);
}

function clean($table) {
	/** ######################################################################################### **/
	/** CONNECTION TO THE MYSQL's SERVER **/
	/** ######################################################################################### **/
	$link=mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,DATABASE_NAME);
	
	/** ######################################################################################### **/
	/** CLEANING THE TABLE **/
	/** ######################################################################################### **/	
	$query = "DELETE FROM ".$table.";";
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