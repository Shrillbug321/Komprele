<?php
	require_once("facade/head.php");
	require_once($facade."ftp.php");
	ftp_connection();
	$query = 'INSERT INTO descriptions (description) VALUES ("'.$_POST['description'].'")';
	$result = $connection->query($query);
	$query = 'SELECT MAX(description_id) AS max FROM descriptions';
	$max = $connection->query($query)->fetch_assoc()['max'];
	$price = $_POST['price'];
	echo $price;
	$price = str_replace(',', '.', $price);
	echo $price;
	$query = 'INSERT INTO items(item_name, category_id, price, pieces, description_id) VALUES("'.$_POST['item_name'].'", '.$_POST['category_id'].', '.$price.', '.$_POST['pieces'].', '.$max.')';
	echo $query;
	$categories_result = $connection->query($query);
	ftp_put_image($_FILES['image']['tmp_name'], $max);
	echo '<script type="text/javascript"> history.go(-2) </script>';
	/*
	przydział ramek
	szamotanie*/
?>