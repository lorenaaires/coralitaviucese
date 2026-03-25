<?php

require_once 'JsonStorage.php';

$concerti = json_storage_read('concerti.json', array());
$anno = isset($_POST['anno']) ? $_POST['anno'] : date('Y');

usort($concerti, function ($left, $right) {
    return strcmp($right['data_fine'], $left['data_fine']);
});

if ($anno === 'home') {
    json_storage_output(array_slice($concerti, 0, 3));
    exit;
}

$concertiFiltrati = array_values(array_filter($concerti, function ($concerto) use ($anno) {
    if (!isset($concerto['data_inizio'])) {
        return false;
    }

    return substr($concerto['data_inizio'], 0, 4) === strval($anno);
}));

json_storage_output($concertiFiltrati);
?>
