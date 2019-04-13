<?php
require 'ConnectionVar.php';
$connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");
    mysqli_set_charset($connessione, "utf8");


$sql = "SELECT * FROM Repertorio";
$result = mysqli_query($connessione, $sql);

$array = array();

if($result != false)
    while($var = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        array_push($array, $var);
    }

$connessione->close();
	
echo json_encode($array);
?>