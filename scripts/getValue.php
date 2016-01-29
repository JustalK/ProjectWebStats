<?php
	include "../libs/constants.php";

	$player_name = $_POST["NAME"];
	$mysqli=mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,DATABASE_NAME);
	
	$result = $mysqli->query('SELECT * FROM PLAYERS WHERE ACTIVE=1 ORDER BY POSITION ASC');
	
	$array = [];
    while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $array[] = $row;
    }
	
	echo json_encode($array);
	mysqli_close($mysqli);
?>