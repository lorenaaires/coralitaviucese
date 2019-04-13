<?php 	
require 'ConnectionVar.php';

$connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");
mysqli_set_charset($connessione, "utf8");

$sql = "";
$anno = $_POST["anno"];
//echo $anno;

if($anno!="home"){
    $sql = "SELECT * FROM registroUscite where YEAR(data_inizio)=".$anno;
    $array = array();
    $result = mysqli_query($connessione, $sql);
    if($result != false)
        while($var = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            array_push($array, $var);
        }

    $connessione->close();
    echo json_encode($array);
}else{
    $sql = "SELECT * FROM registroUscite order by data_fine desc  LIMIT 3";
    $array = array();
    $result = mysqli_query($connessione, $sql);
    if($result != false){
        while($var = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            array_push($array, $var);
        }
    }
    $connessione->close();
    echo json_encode($array);
}



	
?>