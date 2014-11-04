<?php

$con=mysql_connect("cs-server.usc.edu:2539",'root','1988');
if(!$con)
	{
		die("Could not connect to database".mysql_error($con));
}
mysql_select_db("mycompany", $con);

?>