<?php
$con=mysql_connect("localhost","root","hackru","hackru");
// Check connection
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysql_connect_error();
}
mysql_query('INSERT INTO `hackru`.`Site` (`URL`,`Visit`) VALUES ("google.com",1)');
$result = mysql_query('SELECT * FROM `hackru`.`Site`');
while($row = mysql_fetch_array($result))
{
	echo "URL : " . $row['URL'] . " Visit: " . $row['Visit'];
	echo "<br>";
}
mysql_close($con);
?> 
