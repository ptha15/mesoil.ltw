<?php
$servername = "localhost";
$username = "pma";
$password = "";
$dbname = "mesoil3_db";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');
if ($conn->connect_error)
	die("Connection failed: ".$conn->connect_error); 
?>