<?php
	
	// Connect to the database

	$dbhost = "localhost";
	$dbuser= "root";
	$dbpass = "handong";
	$dbname = "251076600assign2db";
	$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname); 

	// report error if connection failed
	if (mysqli_connect_errno()) {
    	die("Database connection failed :" . 
    			mysqli_connect_error() . " (" . 
    			mysqli_connect_errno() . ")" ); 
    } 
    mysqli_close($connection);
?>

