<?php 
	require_once('facade/head.php');
	require_once("get_order_id.php");
	function update_pieces($operator, $user_id)
	{
		global $connection;
		$order_id = get_order_id($user_id);
		$query = 'SELECT item_id, SUM(carts.pieces) AS pieces FROM carts WHERE order_id = '.$order_id.' GROUP BY item_id';
		$result = $connection->query($query);
		while ($row = $result->fetch_assoc())
		{
			$query = 'UPDATE items SET pieces = pieces '.$operator.' '.$row['pieces'].' WHERE item_id = '.$row['item_id'];
			$connection->query($query);
		}
	}
	
	function add_pieces($pieces)
	{
		for($i=2; $i<=count($pieces); $i++)
		{
			echo $query = 'UPDATE items SET pieces = pieces + '.$pieces[$i].' WHERE item_id = '.$i;
			//$connection->query($query);
		}
	}
?>