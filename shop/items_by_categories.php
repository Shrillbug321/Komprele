<html>
<?php require_once('facade/head.php'); 
require_once($facade."ftp.php");
ftp_connection();
?>

<body>
	<?php
		require_once($facade."header.php");
		$query = 'SELECT item_id, item_name, price, category_id FROM items WHERE category_id = '.$_GET['category_id'].' ORDER BY item_id DESC LIMIT 5';
		$result = $connection->query($query);
		echo '<div id="content">';
			while ($row = $result->fetch_assoc())
			{
				echo '<div class="small_picture"> <img src="'.ftp_get_image('/'.$row['item_id'], '1.jpg').'"> </div>
				<a href="'.$shop.'item.php?item_id='.$row['item_id'].'">'.$row['item_name'].' </a>
				<a href="'.$shop.'item.php?item_id='.$row['item_id'].'">'.$row['price'].' </a>
				<div style="clear:both"></div>';
			}
		echo '</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>