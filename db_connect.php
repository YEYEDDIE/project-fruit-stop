<?php 
$host = "localhost";
$user = "dhg17";
$pass ='8686';
$db = "dhg17";

try {
	$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user , $pass);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Databaskontakten lyckades!";
}
catch(PDOException $e){
	echo "Databaskontakten misslyckades!" . $e->getMessage();
}









?>
