<?php

$dbuser = 'root';
$dbpassword = '';
$dbdatabase = 'bank';
$dbhost = 'localhost';

$connect = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabase);

if(mysqli_connect_errno()){
	echo "Failed to connect to database: ".mysqli_connect_error();
}

?>