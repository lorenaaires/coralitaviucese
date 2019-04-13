<?php 	
function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}
//$host="89.46.111.34";$user = "Sql1049322";$password="f76075174z";$dbname = "Sql1049322_2";

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
    echo json_encode(utf8ize($array));
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
    echo json_encode(utf8ize($array));
}



	
?>