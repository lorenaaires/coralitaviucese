<?php
function getAuthKey(){
    return bin2hex(openssl_random_pseudo_bytes(64));
}
require 'ConnectionVar.php';
$connessione = mysqli_connect($host,$user,$password,$dbname) or die("errore di connessione");
mysqli_set_charset($connessione, "utf8");

$username = $_POST["username"];

$password = $_POST["password"];

$_SESSION["logged"] = true;
$_SESSION["logged_username"] = $username;

$auth_key = getAuthKey();
$sqlUpdate = "UPDATE loginCoro SET auth_key='".$auth_key."' WHERE nickname='".$username."'";
$result = mysqli_query($connessione, $sqlUpdate);

$sql = "SELECT * FROM loginCoro where nickname='".$username."' and password='".$password."' ";
$result = mysqli_query($connessione, $sql);

$array = array();
if($result != false)
    while($var = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $var["password"]="";
        array_push($array, $var);
    }

$connessione->close();
	
echo json_encode($array);
?>