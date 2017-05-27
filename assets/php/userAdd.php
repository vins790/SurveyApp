<?php

$db_host = 'ankietadb.ctackzqvraxi.eu-central-1.rds.amazonaws.com';
$db_username = 'master_ankietadb';
$db_pass = 'zaq12wsx';
$db_name = 'Ankieta';


$conn = new mysqli($db_host, $db_username, $db_pass, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

        $log=$_POST['a'];
		$pass=$_POST['b'];
        $conn->query("INSERT INTO uzytkownik (Login, Haslo) VALUES ('$log', '$pass')");
?>