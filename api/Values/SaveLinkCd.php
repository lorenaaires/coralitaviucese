<?php

require_once 'JsonStorage.php';

$linkCd = json_storage_get_post_array('linkCd');

if ($linkCd === null || !is_array($linkCd)) {
    json_storage_output(0);
    exit;
}

$title = isset($linkCd['title']) ? trim($linkCd['title']) : 'CD Nova Lux';
$url = isset($linkCd['url']) ? trim($linkCd['url']) : '';

if ($title === '') {
    $title = 'CD Nova Lux';
}

if ($url === '' || !filter_var($url, FILTER_VALIDATE_URL) || !preg_match('#^https?://#i', $url)) {
    json_storage_output(0);
    exit;
}

$result = json_storage_write('link-cd.json', array(
    'title' => $title,
    'url' => $url
));

json_storage_output($result ? 1 : 0);
?>
