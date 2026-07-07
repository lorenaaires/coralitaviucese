<?php

require_once 'JsonStorage.php';

$linkCd = json_storage_read('link-cd.json', array(
    'title' => 'CD Nova Lux',
    'url' => ''
));

json_storage_output($linkCd);
?>
