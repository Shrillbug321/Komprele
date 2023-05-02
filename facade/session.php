<?php require_once("facade/database_connection.php");
	$GLOBALS['connection'] = $connection;
	
function session_init($user_id)
{
	$query = 'SELECT order_id FROM sessions WHERE user_id = '.$user_id;
	echo $query;
	$result = $GLOBALS['connection']->query($query);
	if (mysqli_num_rows($result) == 0)
	{
		echo $query = 'INSERT INTO sessions(user_id) VALUES ('.$user_id.')';
		$GLOBALS['connection']->query($query);
	}
}

function session_clear($user_id, $field)
{
	$query = 'UPDATE sessions SET '.$field.' = 0 WHERE user_id = '.$user_id;
	$GLOBALS['connection']->query($query);
}

function session_get_return($user_id)
{
	$query = 'SELECT return_site FROM sessions WHERE user_id = '.$user_id;
	$result = $GLOBALS['connection']->query($query);
	return $result->fetch_assoc()['return_site'];
}

function session_set_return($return, $user_id)
{
	$query = 'UPDATE sessions SET return_site = "'.$return.'" WHERE user_id = '.$user_id;
	return $GLOBALS['connection']->query($query);
}
?>