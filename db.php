<?php

$host = "silva.computing.dundee.ac.uk";
$username = "17ac3u20";
$password = "222aaa";
$database = "17ac3d20"; 

try{
	
$mypdo = new PDO("mysql:host=".$host.";dbname=".$database, $username, $password);
$mypdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>