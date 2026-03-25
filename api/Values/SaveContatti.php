<?php

require_once 'JsonStorage.php';

$infoCoro = json_storage_get_post_array('infoCoro');

if ($infoCoro === null) {
    json_storage_output(0);
    exit;
}

if (!isset($infoCoro['idCoro'])) {
    $infoCoro['idCoro'] = 1;
}

$result = json_storage_write('contatti.json', array($infoCoro));
json_storage_output($result ? 1 : 0);
?>
