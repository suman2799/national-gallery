<?php

	$ServerName = "localhost";	// Database hostname 
	$username = "root";	// Database username
	$password = "";	// Database password		
	$dbName = "art_gallery";	// Database name

	//create connection
	$con = mysqli_connect ($ServerName, $username, $password, $dbName);
	if (mysqli_connect_errno()) {
		echo "Failed to connect!";
		exit();
	}

?>