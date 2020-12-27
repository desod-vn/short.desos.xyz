<?php
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'hocthu';

	$connect = mysqli_connect($server, $username, $password, $database);

	if ($connect -> connect_errno) {
  		echo "Failed to connect to MySQL: " . $connect -> connect_error;
  		exit();
	}

	mysqli_query($connect,"SET NAMES 'UTF8'");
?>