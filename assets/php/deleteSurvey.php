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
$control = true;
$array = array();
        

        if( $data = $conn->query("SELECT id FROM odpowiedz where id_pytania IN ( SELECT id FROM pytania WHERE id_ankiety = $id) ") ){
            while ($row = $data->fetch_array(MYSQL_ASSOC)) { 
                array_push($array,$row);
            }
            foreach ($array as $value){
                foreach ($value as $q_id){
                    if($conn->query("DELETE FROM odpowiedz where id = $q_id") ){}
                    else $control = false;
                }
            }

            if($conn->query("DELETE FROM pytania where id_ankiety = $id") ){}
            else $control = false;

            if($conn->query("DELETE FROM ankieta where id = $id") ){}
            else $control = false;
                        
        }
        else $control = false;
   
        $data->close();
        echo $control;

mysqli_close($conn);
?>