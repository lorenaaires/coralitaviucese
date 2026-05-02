<?php
require_once 'UserStorage.php';

if(isset($_POST["auth_key"]) && isset($_POST["username"])){
    $auth_key = trim($_POST["auth_key"]);
    $username = trim($_POST["username"]);
    $users = user_storage_read();
    $userIndex = user_storage_find_by_auth_key($users, $username, $auth_key);
    $array = array();

    if ($userIndex >= 0) {
        $array[] = user_storage_public_user($users[$userIndex]);
    }
}else{
    $array = array(false);
}

json_storage_output($array);
?>
