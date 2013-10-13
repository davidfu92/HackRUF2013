<?php
$con = mysql_connect("localhost","root","hackru","hackru");
// Check connection
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysql_connect_error();
}
if($_GET['location']) {
	$location = mysql_query('SELECT * FROM `hackru`.`Location`');
	for($i = 0; $i < mysql_num_rows($location); $i++) {
		$results = mysql_fetch_assoc($location);
		echo json_encode($results)."<br>";
	}
}
$new = TRUE;
if($_GET['URL']) {
	echo 'SELECT * FROM `hackru`.`Site` WHERE URL = "'.$_GET['URL'].'"';
	$result = mysql_query('SELECT * FROM `hackru`.`Site` WHERE URL = "'.$_GET['URL'].'"');
	$data = mysql_fetch_assoc($result);
	if(mysql_num_rows($result) > 0) {
		$add = $data['Visit'] + 1;
	   	mysql_query('UPDATE `Site` SET `Visit` = `Visit` + 1 WHERE URL ="' . $_GET['URL'] . '"');
		$new = false;	
	}
	/*while($row = mysql_fetch_array($result))
	{
		if($row['URL'] == $_GET['URL']) {
			echo "equal";
			$add = $row['Visit'] + 1;
			echo ('UPDATE `Site` SET Visit =' . $add . ' WHERE URL ="' . $row['URL'] . '"');
			mysql_query('UPDATE `Site` SET Visit =' . $add . ' WHERE URL ="' . $row['URL'] . '"');
			$new = FALSE;
		}
//		echo "URL: " . $row['URL'] . " Visit: " . $row['Visit'];
//		echo "<br>";
	}
	 */
	if($new) {
		mysql_query('INSERT INTO `hackru`.`Site` (`URL`,`Visit`) VALUES ("' . $_GET['URL'] . '",1)');
	}
}
mysql_close($con);
?> 
