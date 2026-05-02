<?php

require_once 'JsonStorage.php';

$items = json_storage_read('media-audio.json', array());
json_storage_output($items);
?>
