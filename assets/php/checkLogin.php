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

$username = $_POST['myusername'];
$password = $_POST['mypassword'];
$response = array('isExisting'=>false,'type' => "user"); 
        if( $data = $conn->query("SELECT * FROM uzytkownik where login = '$username' and haslo = '$password'") ) {
            while ($row = $data->fetch_array(MYSQL_ASSOC)) { 
                $response['isExisting'] = true;
            }
		$data->close();
        }
		if( $data_A = $conn->query("SELECT * FROM admin where login = '$username' and haslo = '$password'") ) {
            while ($row_A = $data_A->fetch_array(MYSQL_ASSOC)) { 
                $response['isExisting'] = true;
				$response['type'] = "admin";
            }
		$data_A->close();
		}
header('Content-Type: application/json');
echo json_encode($response);
mysqli_close($conn);
?>