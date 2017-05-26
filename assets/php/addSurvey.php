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

$survey = json_decode(stripslashes($_POST['survey']));

    // Dodanie tytulu
	$s = $survey[0][0][0];
    $d = $survey[0][0][1];

    $id_ank	  ="INSERT INTO ankieta (Tytul,Opis) VALUES ('$s','$d')";	
	if ($conn->query($id_ank) === TRUE) {$last_id = $conn->insert_id;	}	

	$n = $_POST['n']; //sprawdzam ilosc pytan
	
	for ($x = 1; $x <= $n; $x++) {
    
        $k = $survey[0][$x];//sprawdzam ilosc odpowiedzi dla danego pytania
        $px = $survey[$x][0]; // postuje kolejne pytania p1 p2
        $w_pytanie = "INSERT INTO pytania (id_ankiety,Pytanie) VALUES ('$last_id','$px')";
			
        if ($conn->query($w_pytanie) === TRUE) {$p_last_id = $conn->insert_id;	}
			
		for ($y = 0; $y < $k; $y++) {
			$po = $survey[$x][1][$y]; // postuje kolejne odpowiedzi o1 o2

			$w_odp = "INSERT INTO odpowiedz (id_pytania,opis) VALUES ('$p_last_id','$po')";
			$conn->query($w_odp);
			}
		} 
	
 mysqli_close($conn);
?>
