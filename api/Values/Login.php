<?php
function getAuthKey(){
    return bin2hex(openssl_random_pseudo_bytes(64));
}
require_once 'UserStorage.php';

$username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';

$users = user_storage_read();
$userIndex = user_storage_find_by_credentials($users, $username, $password);
$array = array();

if($userIndex >= 0){
    $auth_key = getAuthKey();
    $users[$userIndex]['auth_key'] = $auth_key;
    user_storage_write($users);
    $array[] = user_storage_public_user($users[$userIndex]);
    $_SESSION["logged"] = true;
    $_SESSION["logged_username"] = $username;
} else {
    $_SESSION["logged"] = false;
    $_SESSION["logged_username"] = null;
}
	
json_storage_output($array);
?>
