<?php require_once("facade/database_connection.php");
function get_order_id($user_id)
{
	global $connection;
	$query = 'SELECT MAX(order_id) AS order_id FROM orders WHERE user_id = '.$user_id;
	$result = $connection->query($query);
	return $result->fetch_assoc()['order_id'];
} 
?>