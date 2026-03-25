<?php

require_once 'JsonStorage.php';

$brani = json_storage_get_post_array('brani');
if ($brani === null || !is_array($brani)) {
    json_storage_output(0);
    exit;
}

$storedBrani = json_storage_read('brani.json', array());
$nextId = json_storage_next_id($storedBrani, 'id_canti');
$updatedBrani = array();

foreach ($brani as $brano) {
    if (!isset($brano['id_canti']) || $brano['id_canti'] === '' || $brano['id_canti'] === null) {
        $brano['id_canti'] = $nextId;
        $nextId++;
    }

    if (!isset($brano['Armonizzazione'])) {
        $brano['Armonizzazione'] = '';
    }

    if (!isset($brano['Testo'])) {
        $brano['Testo'] = '';
    }

    if (isset($brano['Gruppo_id'])) {
        $brano['Gruppo_id'] = intval($brano['Gruppo_id']);
    }

    $brano['id_canti'] = intval($brano['id_canti']);
    $updatedBrani[] = $brano;
}

$result = json_storage_write('brani.json', $updatedBrani);
json_storage_output($result ? 1 : 0);

?>
