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

$results = json_decode(stripslashes($_POST["results"]));
$q = $_POST["questionAmount"];
for ($i = 0 ; $i <= $q ; $i++ ){
    $idp = $results[$i][0];
    $ido = $results[$i][1];
    if( $conn->query("UPDATE odpowiedz SET odpowiedz=odpowiedz + 1 WHERE id_pytania=$idp  AND id= $ido") ){}
    else{
        echo "error";
    }
}
mysqli_close($conn);
?>