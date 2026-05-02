<?php
require_once 'UserStorage.php';

$_SESSION["logged"] = false;
$_SESSION["logged_username"] = null;

$username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
$users = user_storage_read();
$userIndex = user_storage_find_index_by_nickname($users, $username);

if ($userIndex >= 0) {
    $users[$userIndex]['auth_key'] = '';
    user_storage_write($users);
}

json_storage_output(array());
?>
