<!DOCTYPE HTML>
<html>
<?php require_once('facade/head.php'); 
	require_once($facade."user_id_decode.php");?>

<body>
	<?php
		require_once($facade."header.php");
		$query = 'SELECT * FROM categories';
		$result = $connection->query($query);
		echo '<div id="content">';
		while ($row = $result->fetch_assoc())
		{
			echo '<a href="items_by_categories.php?category_id='.$row['category_id'].'">'.$row['category'].'</a>';
		}
		echo '</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>