<?php

require_once 'JsonStorage.php';

$concerto = json_storage_get_post_array('concerto');
if ($concerto === null) {
    json_storage_output(0);
    exit;
}

$concerti = json_storage_read('concerti.json', array());

if (!isset($concerto['id_uscita']) || $concerto['id_uscita'] === '' || $concerto['id_uscita'] === null) {
    $concerto['id_uscita'] = json_storage_next_id($concerti, 'id_uscita');
}

$concerto['id_uscita'] = intval($concerto['id_uscita']);

if (!isset($concerto['indirizzoFileVolantini'])) {
    $concerto['indirizzoFileVolantini'] = '';
}

$concerto['indirizzoFileVolantini'] = json_storage_normalize_volantino_path($concerto['indirizzoFileVolantini']);

$updated = false;
foreach ($concerti as $index => $storedConcerto) {
    if (isset($storedConcerto['id_uscita']) && intval($storedConcerto['id_uscita']) === $concerto['id_uscita']) {
        $concerti[$index] = $concerto;
        $updated = true;
        break;
    }
}

if (!$updated) {
    $concerti[] = $concerto;
}

$result = json_storage_write('concerti.json', $concerti);
json_storage_output($result ? 1 : 0);

?>
