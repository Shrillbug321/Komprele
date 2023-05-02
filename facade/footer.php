<?php
echo '<div id="footer">
	Sklep komputerowy Komprele &copy; 2021';
	 if ( isset($_GET['user_id']) )
	 {
		 echo '<button id="append" onclick="append_user_id(\''.$_GET['user_id'].'\')" hidden> </button>
		 <script> document.getElementById("append").click(); </script>';
	 }
	?>
</div>