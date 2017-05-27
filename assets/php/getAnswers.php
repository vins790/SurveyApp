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

$id = $_POST["id"];

$array = array(); 
        if( $data = $conn->query("SELECT opis, id FROM odpowiedz where id_pytania = $id") ) {
            while ($row = $data->fetch_array(MYSQL_ASSOC)) { 
                array_push($array,$row);
            }
        header('Content-Type: application/json');
        echo json_encode($array);    
        $data->close();
        }

mysqli_close($conn);
?>