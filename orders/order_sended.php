<?php 
	require_once('facade/head.php'); 
	require_once($facade."user_id_decode.php");
	date_default_timezone_set("Europe/Warsaw");
	foreach($_POST['orders'] as $key)
	{
		$query = 'UPDATE orders SET complete_date = "'.date('Y-m-d G:i:s').'" WHERE order_id = '.$key;
		$connection->query($query);
	}
	echo '<script type="text/javascript"> history.go(-1) </script>';
?>