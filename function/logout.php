
<?php

	session_start();

	unset($_COOKIE['ID']);
	unset($_COOKIE['email']);
	unset($_COOKIE['first_name']);
	unset($_COOKIE['last_name']);

	setcookie('ID', null, -1, '/');
	setcookie('email', null, -1, '/');
	setcookie('first', null, -1, '/');
	setcookie('last_name', null, -1, '/');

		
		
	session_unset();
	session_destroy();
	

	header("Location: ../index.php");
	exit();



?>