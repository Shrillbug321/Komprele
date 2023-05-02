<head>
	<title> Sklep </title>
	<meta charset="utf-8">
	<?php
		$magazine = "http://localhost:8102/";
		$facade = "facade/";
		$shop = "http://localhost:8082/";
		$account = "http://localhost:8083/";
		$orders = "http://localhost:8084/";
		$admins = "http://localhost:8085/";
		echo '<link rel="stylesheet" href="'.$facade.'style.css" type="text/css">
		<script type="text/javascript" src="'.$facade.'script.js"> </script>';
		require_once($facade."database_connection.php");
	?>
</head>