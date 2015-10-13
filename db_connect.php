<?php

$mysqli = new mysqli("sulley.cah.ucf.edu", "ke953110", "@Loverboy1", "ke953110");
if($mysqli->error) {
	print "Error Connecting! Message: ".$mysqli->error;
}

?>