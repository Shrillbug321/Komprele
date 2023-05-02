<?php
	require_once("facade/head.php");
	require_once($facade."ftp.php");
	ftp_connection();
	$end_array = count($_POST['pieces']) + 2;
	for($i=2; $i<$end_array; $i++)
	{
		$query = 'UPDATE items SET pieces = pieces + '.$_POST['pieces'][$i].' WHERE item_id = '.$i;
		$connection->query($query);
	}
	echo '<script type="text/javascript"> history.go(-2) </script>';
?>