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
function is_session_started () {
    return function_exists ( 'session_status' ) ? ( PHP_SESSION_ACTIVE == session_status () ) : ( ! empty ( session_id () ) ); 
}
//$host="89.46.111.34";$user = "Sql1049322";$password="f76075174z";$dbname = "Sql1049322_2";
function getAuthKey(){
    return bin2hex(openssl_random_pseudo_bytes(64));
}
require 'ConnectionVar.php';
$connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");

session_start();
$username = $_POST["username"];

$password = $_POST["password"];

$_SESSION["logged"] = true;
$_SESSION["logged_username"] = $username;

$auth_key = getAuthKey();
$sqlUpdate = "UPDATE loginCoro SET auth_key='".$auth_key."' WHERE nickname='".$username."'";
//echo $sqlUpdate;
$result = mysqli_query($connessione, $sqlUpdate);

$sql = "SELECT * FROM loginCoro where nickname='".$username."' and password='".$password."' ";
$result = mysqli_query($connessione, $sql);

$array = array();
if($result != false)
    while($var = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        array_push($array, $var);
    }

$connessione->close();
	
echo json_encode(utf8ize($array));
?>