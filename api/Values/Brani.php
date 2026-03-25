<?php

require_once 'JsonStorage.php';

$brani = json_storage_read('brani.json', array());
json_storage_output($brani);
?>
