<?php

require_once 'JsonStorage.php';

$info = json_storage_read('contatti.json', array());
json_storage_output($info);
?>
