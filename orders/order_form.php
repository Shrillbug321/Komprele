<html>
<?php require_once('facade/head.php'); 
	require_once($facade.'user_id_decode.php');	?>

<body>
	<?php
		require_once($facade."header.php");
		$user_id = user_id_decode($_GET['user_id']);
		$adr_query = 'SELECT * FROM addresses WHERE user_id = '.$user_id;
		$result = $connection->query($adr_query);
		$adr_row = $result->fetch_assoc();
		echo '<div id="content">
		<table>
			<tr>
				<td> '.$adr_row['street'].' </td> <td> '.$adr_row['house_number'].' </td> 
			</tr>
			<tr>
				<td> '.$adr_row['postal_code'].' </td> <td> '.$adr_row['city'].' </td> 
			</tr>
			<tr>
				<td> '.$adr_row['country'].' </td> <td>  </td> 
			</tr>
		</table>
		<button onclick="redirect('.$account.'edit_address_form.php)"> Edytuj adres </button>';		
		
		$trans_query = 'SELECT * FROM transport_types';
		$trans_result = $connection->query($trans_query);
		$query = 'SELECT * FROM payment_types';
		$result = $connection->query($query);
		echo 
		'<form method="post" action="order.php">
			<label> Sposób dostawy 
				<select name="transport_type_id">';
				while ($trans_row = $trans_result->fetch_assoc())
				{
					echo '<option value="'.$trans_row['transport_type_id'].'"> '.$trans_row['transport_type'].' </option>';
				}
			echo '</select> </br>
			</label>';
			
			echo '<label> Forma płatności 
				<select name="payment_type_id">';
				while ($row = $result->fetch_assoc())
				{
					echo '<option value="'.$row['payment_type_id'].'"> '.$row['payment_type'].' </option>';
				}
			echo '</select> 
			</label>
			<button> Złóż zamówienie </button>
			<input type="text" name="user_id_decode" value="'.$user_id.'" hidden> </input>
			<input type="text" name="quote" value="'.$_GET['quote'].'" hidden> </input>
			<input type="text" name="address_id" value="'.$adr_row['address_id'].'" hidden> </input>
		</form>
		</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>