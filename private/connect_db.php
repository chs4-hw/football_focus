<?php

/**
* 
*Start date: 18/03/2019
*Colin Smith EC1521460
*Edinburgh College
*
*Connect to database.
* 
*/

$servername = "localhost";
$username = "HNDSOFTS2A9";
$password = "BSoEExqxv5";

$link = mysqli_connect($servername, $username, $password, $username); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error()); 
} 
// Testing
// echo 'Connection OK';  
?>

