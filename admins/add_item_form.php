<!DOCTYPE HTML>
<html>
<?php require_once('facade/head.php'); ?>

<body>
	<?php
		require_once($facade."header.php");
		$query = 'SELECT * FROM categories';
		$categories_result = $connection->query($query);
		echo '<div id="content">
		<form class="form" id="add_item_form" enctype="multipart/form-data" action="add_item.php" method="post">
			<label> Nazwa przedmiotu <br> <input type="text" name="item_name"> </input> </label> <br>
			<label> Zdjęcie przedmiotu <br> <input type="file"  name="image"> </input> </label> <br>
			<label> Kategoria <br> <select name="category_id">';
			while( $row = $categories_result->fetch_assoc() )
			{
				echo '<option value="'.$row['category_id'].'"> '.$row['category'].' </option>';
			}
			echo '</select> </label> <br>
			<label> Cena <br> <input type="text" name="price"> </input> </label> <br>
			<label> Sztuk <br> <input type="text" name="pieces"> </input> </label> <br>
			<label> Opis <br> <textarea name="description"> </textarea> </label> <br>
			<input type="submit" name="submit" value="Dodaj przedmiot"> </input>
			<input type="text" name="user_id" value="'.$_GET['user_id'].'" hidden> </input>
		</form>
		</div>';
		require_once($facade."footer.php");
	?>	
</body>
</html>