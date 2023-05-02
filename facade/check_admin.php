<?php require_once("facade/database_connection.php");
function check_admin($user_id)
{
	global $connection;
	$query = 'SELECT admin FROM users WHERE user_id = '.$user_id;
	$result = $connection->query($query);
	return $result->fetch_assoc()['admin'];
} 
?>