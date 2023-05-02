<!DOCTYPE HTML>
<html>
<?php require_once('facade/head.php'); 
	require_once($facade."user_id_decode.php");?>

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
		echo '<div id="content">
		<button onclick="redirect(\''.$admins.'add_item_form.php?user_id='.$_GET['user_id'].'\')"> Dodaj produkt </button> <br>
		<button onclick="redirect(\''.$orders.'check_orders_admin.php?user_id='.$_GET['user_id'].'\')"> Sprawdź zamówienia </button> <br>
		<button onclick="redirect(\''.$admins.'add_pieces_form.php?user_id='.$_GET['user_id'].'\')"> Dodaj sztuki </button>
		</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>