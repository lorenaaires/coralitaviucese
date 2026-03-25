<?php

require_once 'JsonStorage.php';

$tipologie = json_storage_read('tipologie-brani.json', array());
json_storage_output($tipologie);
?>
