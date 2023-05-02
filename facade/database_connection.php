<?php
	$server = "db";
	$user = "root";
	$password = "exemplar";
	$database = "shop";
	$connection = new mysqli($server, $user, $password, $database);
	if ($connection->connect_error)
	{
		die("błąd");
	}
?>	