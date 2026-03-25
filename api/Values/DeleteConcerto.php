<?php

require_once 'JsonStorage.php';

$concerto = json_storage_get_post_array('concerto');
if ($concerto === null || !isset($concerto['id_uscita'])) {
    json_storage_output(0);
    exit;
}

$concerti = json_storage_read('concerti.json', array());
$idDaEliminare = intval($concerto['id_uscita']);

$concertiFiltrati = array_values(array_filter($concerti, function ($item) use ($idDaEliminare) {
    return !isset($item['id_uscita']) || intval($item['id_uscita']) !== $idDaEliminare;
}));

$result = json_storage_write('concerti.json', $concertiFiltrati);
json_storage_output($result ? 1 : 0);
