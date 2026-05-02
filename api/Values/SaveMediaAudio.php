<?php

require_once 'JsonStorage.php';

$items = json_storage_get_post_array('items');
if ($items === null || !is_array($items)) {
    json_storage_output(0);
    exit;
}

$storedItems = json_storage_read('media-audio.json', array());
$nextId = json_storage_next_id($storedItems, 'id');
$updatedItems = array();

foreach ($items as $item) {
    if (!isset($item['id']) || $item['id'] === '' || $item['id'] === null) {
        $item['id'] = $nextId;
        $nextId++;
    }

    $item['id'] = intval($item['id']);
    $item['title'] = isset($item['title']) ? trim($item['title']) : '';
    $item['path'] = isset($item['path']) ? trim($item['path']) : '';
    $updatedItems[] = $item;
}

$result = json_storage_write('media-audio.json', $updatedItems);
json_storage_output($result ? 1 : 0);
?>
