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

$_SESSION["logged"] = false;
$_SESSION["logged_username"] = null;

require 'ConnectionVar.php';
$connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");

$username = $_POST["username"];

$sqlUpdate = "UPDATE loginCoro SET auth_key='null'  WHERE nickname='".$username."'";
$result = mysqli_query($connessione, $sqlUpdate);

$connessione->close();
	
$array = array();

echo json_encode(utf8ize($array));
?>