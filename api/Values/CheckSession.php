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
if(isset($_POST["auth_key"]) ){
    $auth_key =$_POST["auth_key"];   
    $username = $_POST["username"];
    $sql = "SELECT * FROM loginCoro where nickname='".$username."' and auth_key='".$auth_key."'";
    $result = mysqli_query($connessione, $sql);

    $array = array();
    if($result != false)
        while($var = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            array_push($array, $var);
        }

    $connessione->close();
}else{
    $array = array();
    array_push($array, false);
}
echo json_encode(utf8ize($array));


?>