<!DOCTYPE HTML>
<html>
<?php require_once('facade/head.php'); 
	require_once($facade."user_id_decode.php");
	require_once($facade."return.php");
	require_once($facade."session.php");?>

<body>
	<?php
		require_once($facade."header.php");
		$user_id = user_id_decode($_GET['user_id']);
		$user_query = 'SELECT * FROM users WHERE user_id = '.$user_id;
		$result = $connection->query($user_query);
		$user_row = $result->fetch_assoc();
		$adr_query = 'SELECT * FROM addresses WHERE user_id = '.$user_id;
		$result = $connection->query($adr_query);
		$adr_row = $result->fetch_assoc();
		$return = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		session_set_return($return, $user_id);
		echo '<div id="content">
			<p> '.$user_row['user_name'].'———'.$user_row['email'].'  </p>
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
			<button onclick="redirect(\''.$account.'add_address_form.php?user_id='.$_GET['user_id'].'\')"> Dodaj adres </button> <br>
			<button onclick="redirect(\''.$orders.'check_orders.php?user_id='.$_GET['user_id'].'\')"> Sprawdź zamówienia </button>';
		echo '</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>