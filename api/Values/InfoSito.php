<?php 	
//$host="89.46.111.34";$user = "Sql1049322";$password="f76075174z";$dbname = "Sql1049322_2";

require 'ConnectionVar.php';
$connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");
mysqli_set_charset($connessione, "utf8");


$sql = "SELECT * FROM informazioniSito";
$result = mysqli_query($connessione, $sql);

$array = array();
if($result != false)
    while($var = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        array_push($array, $var);
    }

$connessione->close();
	
echo json_encode($array); //utf8ize($array));
?>