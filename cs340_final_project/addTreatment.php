<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "trannga-db", "QB2RT4kroWg3AQtD", "trannga-db");
if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
if(!($stmt = $mysqli->prepare("INSERT INTO treatment(drug_name, uses, mode_of_action, diseaseID) VALUES (?,?,?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("ssss",$_POST['drugName'],$_POST['uses'],$_POST['action'], $_POST['diseaseName']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} 
?>

<meta http-equiv="refresh" content="0;URL=index.php" />