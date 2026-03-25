<?php

define('JSON_STORAGE_DIR', dirname(__DIR__) . '/data');

function json_storage_path($fileName)
{
    return JSON_STORAGE_DIR . '/' . $fileName;
}

function json_storage_ensure_dir()
{
    if (!is_dir(JSON_STORAGE_DIR)) {
        mkdir(JSON_STORAGE_DIR, 0777, true);
    }
}

function json_storage_read($fileName, $defaultValue = array())
{
    json_storage_ensure_dir();

    $path = json_storage_path($fileName);
    if (!file_exists($path)) {
        json_storage_write($fileName, $defaultValue);
        return $defaultValue;
    }

    $contents = file_get_contents($path);
    if ($contents === false || trim($contents) === '') {
        return $defaultValue;
    }

    $decoded = json_decode($contents, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return $defaultValue;
    }

    return $decoded;
}

function json_storage_write($fileName, $data)
{
    json_storage_ensure_dir();

    $path = json_storage_path($fileName);
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    if ($json === false) {
        return false;
    }

    return file_put_contents($path, $json . PHP_EOL, LOCK_EX) !== false;
}

function json_storage_get_post_array($key)
{
    if (!isset($_POST[$key])) {
        return null;
    }

    return $_POST[$key];
}

function json_storage_next_id($items, $idField)
{
    $maxId = 0;

    foreach ($items as $item) {
        if (isset($item[$idField]) && intval($item[$idField]) > $maxId) {
            $maxId = intval($item[$idField]);
        }
    }

    return $maxId + 1;
}

function json_storage_output($data)
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

