<?php
	require_once('facade/head.php');
	require_once($facade.'user_id_decode.php');
	require_once($facade.'return.php');
	require_once('get_order_id.php');
	if ( ($_POST['user_id']) == "" )
	{
		echo '<p> Musisz się <a class="click_here" href="'.$account.'login_form.php?return='.$_POST['return'].'"> zalogować </a> aby móc dodać do koszyka.';
		exit();
	}
	$user_id = user_id_decode($_POST['user_id']);
	$order_query = 'SELECT order_id FROM sessions WHERE user_id = '.$user_id;
	$order_result = $connection->query($order_query);
	$order_id = $order_result->fetch_assoc()['order_id'];
	if ($order_id == 0) //jeśli nie zwróciło tabeli
	{
		$query = 'INSERT INTO orders(user_id) VALUES ('.$user_id.')';
		$connection->query($query);
		
		$order_id = get_order_id($user_id);
		
		$query = 'UPDATE sessions SET order_id = '.$order_id.' WHERE user_id = '.$user_id;
		$connection->query($query);
	}		
	$query = 'INSERT INTO carts(order_id, item_id, pieces) VALUES('.$order_id.','.$_POST['item_id'].','.$_POST['pieces'].')';
	$connection->query($query);
	echo '<script type=text/javascript> history.go(-1) </script>';
?>