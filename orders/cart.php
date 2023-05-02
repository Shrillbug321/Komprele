<html>
<?php require_once('facade/head.php'); 
	require_once($facade.'user_id_decode.php');
	require_once($facade.'return.php');
	require_once($facade.'session.php');	?>

<body>
	<?php
		require_once($facade."header.php");
		echo '<div id="content">';
		$user_id = user_id_decode($_GET['user_id']);
		$return = $_GET['return'];
		//echo $return;
		session_set_return($return, $user_id);
		$query = 'SELECT order_id FROM sessions WHERE user_id = '.$user_id;
		$order_id = $connection->query($query)->fetch_assoc()['order_id'];
		if ($order_id == 0)
		{
			echo 'Koszyk jest pusty </div>';
			require_once($facade."footer.php");
			exit();
		}
		$query = 'SELECT carts.order_id, items.item_name, carts.pieces, items.price, carts.pieces*items.price AS quote FROM carts INNER JOIN items USING (item_id) WHERE carts.order_id = '.$order_id;
		$result = $connection->query($query);
		$quote = 0;
		echo '<table>
			<tr> <td> Produkt </td> <td> Sztuk </td> <td> Kwota </td> </tr> ';
			while ($row = $result->fetch_assoc())
			{
				echo '<tr> <td> '.$row['item_name'].' </td> <td> '.$row['pieces'].' </td> <td> '.$row['quote'].' </td> </tr> ';
				$quote += $row['quote'];
			}
		echo '<tr> <td>  </td> <td> Razem </td> <td> '.$quote.' </td> </tr> 
			</table>
			<button onclick="redirect(\''.$orders.'order_form.php?user_id='.$_GET['user_id'].'&quote='.$quote.'\')"> Przejdź dalej </button>';
		echo '</div>';
		require_once($facade."footer.php");
	?>
</body>
</html>