<?php

require_once 'JsonStorage.php';

define('USER_STORAGE_FILE', 'users.json');

function user_storage_read()
{
    return json_storage_read(USER_STORAGE_FILE, array());
}

function user_storage_write($users)
{
    return json_storage_write(USER_STORAGE_FILE, $users);
}

function user_storage_find_index_by_nickname($users, $nickname)
{
    foreach ($users as $index => $user) {
        if (isset($user['nickname']) && $user['nickname'] === $nickname) {
            return $index;
        }
    }

    return -1;
}

function user_storage_find_by_credentials($users, $nickname, $password)
{
    foreach ($users as $index => $user) {
        $userNickname = isset($user['nickname']) ? $user['nickname'] : '';
        $userPassword = isset($user['password']) ? $user['password'] : '';

        if ($userNickname === $nickname && $userPassword === $password) {
            return $index;
        }
    }

    return -1;
}

function user_storage_find_by_auth_key($users, $nickname, $authKey)
{
    foreach ($users as $index => $user) {
        $userNickname = isset($user['nickname']) ? $user['nickname'] : '';
        $userAuthKey = isset($user['auth_key']) ? $user['auth_key'] : '';

        if ($userNickname === $nickname && $userAuthKey === $authKey) {
            return $index;
        }
    }

    return -1;
}

function user_storage_public_user($user)
{
    if (isset($user['password'])) {
        $user['password'] = '';
    }

    return $user;
}
?>
