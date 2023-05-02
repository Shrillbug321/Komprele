<html>
<?php require_once('facade/head.php'); 
require_once($facade."return.php");
require_once($facade."ftp.php");
ftp_connection();?>

<body>
	<?php
		require_once($facade."header.php");
		echo '<div>';
			$return = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$return = return_encode($return);
			$query = "SELECT * FROM items INNER JOIN categories USING (category_id) INNER JOIN descriptions USING (description_id) WHERE item_id=".$_GET['item_id'];
			$result = $connection->query($query);
			$row = $result->fetch_assoc();
			echo '<div id="picture"> <img src="'.ftp_get_image('/'.$_GET['item_id'],'1.jpg').'"> </div>
			<div id="item_box"> 
				<a id="category" href="'.$shop.'items_by_categories.php?category_id='.$row['category_id'].'">'.$row['category'].'</a>
				<h2 id="item_name">'.$row['item_name'].'</h2>
				<form id="cart_box" method="post" action="'.$orders.'add_to_cart.php">
					<p class="item_data"> Cena: '.$row['price'].' zł</p>
					<p class="item_data"> Sztuk: 
						<input type="number" min="0" max="'.$row['pieces'].'" name="pieces"> </input>
					z '.$row['pieces'].'</p>
					<button id="cart_btn" > Dodaj do koszyka </button>
					<input type="text" name="user_id" value="'.$_GET['user_id'].'" hidden> </input>
					<input type="text" name="item_id" value="'.$_GET['item_id'].'" hidden> </input>
					<input type="text" name="return" value="'.$return.'" hidden> </input>
				</form>
				<div id="description"> <p>'.$row['description'].'</p> </div>
			</div>
			<div style="clear:both"> </div>';
		echo '</div>';
		require_once($facade."footer.php");
	?>	
</body>