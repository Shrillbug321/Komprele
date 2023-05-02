<!DOCTYPE HTML>
<html>
<?php require_once('facade/head.php'); 
	require_once($facade."user_id_decode.php");?>

<body>
	<?php
		require_once($facade."header.php");
		$user_id = user_id_decode($_GET['user_id']);
		$order_query = 'SELECT * FROM check_orders WHERE user_id = '.$user_id;
		$result = $connection->query($order_query);
		$row = $result->fetch_assoc();
		echo '<div id="content">';
		if (mysqli_num_rows($result) == 0 )
			echo 'Nie złożono jeszcze zamówienia.';
		else do
		{	
			$number = $row['order_id'];
			echo 'Zamówienie numer '.$number.'
			<table>
				<tr>
					<td> Data zamóweienia </td> <td> Data wysłania </td> 
					<td> Płatność </td> <td> Transport </td>
				</tr>
				<tr>
					<td> '.$row['order_date'].' </td> <td> '.$row['complete_date'].' </td> 
					<td> '.$row['payment_type'].' </td> <td> '.$row['transport_type'].' </td>
				</tr>
			</table>
			<table class="order_details">
			<tr>
				<td> Sztuk </td> <td> Cena </td> <td> Przedmiot </td>
			</tr>';
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
		echo '</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>