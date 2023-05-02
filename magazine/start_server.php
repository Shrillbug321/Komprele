<?php
	echo popen("service vsftpd start", 'w');
	echo exec("service vsftpd status");
	echo shell_exec("pwd");
	//echo '<script type="text/javascript"> history.go(-1) </script>';
?>
cp /home/admin/start_server.php /var/www/html/start_server.php