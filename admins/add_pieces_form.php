<!DOCTYPE HTML>
<html>
<?php require_once('facade/head.php'); 
	require_once($facade."user_id_decode.php");?>

<body>
	<?php
		require_once($facade."header.php");
		$user_id = user_id_decode($_GET['user_id']);
		$order_query = 'SELECT * FROM items';
		$result = $connection->query($order_query);
		echo '<div id="content">
		<form name="pieces" method="post" action="add_pieces.php">';
		while ($row=$result->fetch_assoc())
		{
			echo '<input class="add_pieces" type="number" name="pieces['.$row['item_id'].']" value="0" min="0"> </input> <p>'.$row['item_name'].' </p>
			<div style="clear: both;"> </div>';
		}
		/*	do
			{	
				$number = $row['order_id'];
				echo 'Zamówienie numer '.$number.'
				<input type="number" name="orders[]" value="'.$number.'">
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
			} while ($row);*/
		echo '<input type="submit" value="Dodaj">
		</form>
		</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>