<?php
	require_once("facade/database_connection.php");
	require_once("facade/user_id_encode.php");
	echo '<script type="text/javascript" src="facade/script.js"> </script>';
	require_once("get_order_id.php");
	date_default_timezone_set("Europe/Warsaw");
	$order_id = get_order_id($_POST['user_id_decode']);
	$user_id = user_id_encode($_POST['user_id_decode']);
	$query = 'UPDATE orders SET order_date = "'.date('Y-m-d G:i:s').'", address_id = '.$_POST['address_id'].', quote = '.$_POST['quote'].', transport_type_id = '.$_POST['transport_type_id'].', payment_type_id = '.$_POST['payment_type_id'].' WHERE order_id = '.$order_id;
	echo $query;
	$success;
	if ($connection->query($query))
		$success = 1;
	else
		$success = 0;
	echo '<button id="order_done_btn" onclick="redirect(\'order_done.php?user_id='.$user_id.'&success='.$success.'\')"> </button>
	<script type="text/javascript"> document.getElementById("order_done_btn").click(); </script>';
?>