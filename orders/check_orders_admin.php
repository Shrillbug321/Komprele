<!DOCTYPE HTML>
<html>
<?php require_once('facade/head.php'); 
	require_once($facade."user_id_decode.php");?>

<body>
	<?php
		require_once($facade."header.php");
		$user_id = user_id_decode($_GET['user_id']);
		$order_query = 'SELECT * FROM check_orders WHERE ISNULL(complete_date)';
		$result = $connection->query($order_query);
		$row = $result->fetch_assoc();
		echo '<div id="content">
		<form name="sended" method="post" action="order_sended.php">';
			do
			{	
				$number = $row['order_id'];
				echo 'Zamówienie numer '.$number.'
				<input type="checkbox" name="orders[]" value="'.$number.'">
				<table>
					<tr>
						<td> '.$row['order_date'].' </td> <td> '.$row['complete_date'].' </td> 
						<td> '.$row['payment_type'].' </td> <td> '.$row['transport_type'].' </td>
					</tr>
				</table>
				<table>';
				while ($row['order_id'] == $number)
				{
					echo '<tr>
					<td> '.$row['pieces'].' </td> 
					<td> '.$row['price'].' </td> <td> '.$row['item_name'].' </td> 
					</tr>';
					$row_prev = $row;
					$row = $result->fetch_assoc();
				}
				echo '</tr>
				</table>
				<p> Razem '.$row_prev['quote'].' zł </p>';
			} while ($row);
		echo '<input type="submit" value="Zaznaczone paczki zostały wysłane">
		</form>
		</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>