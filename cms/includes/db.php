<?php

	// mysqli query to connect database
	$connection = mysqli_connect('localhost', 'root', '', 'cms');

	if (!$connection) {
		die("Database not connected");
	}

?>