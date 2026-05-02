<?php

require_once 'JsonStorage.php';

define('UPLOAD_TARGET_CV', 'cv');
define('UPLOAD_TARGET_PHOTO', 'photo');
define('UPLOAD_TARGET_AUDIO', 'audio');

function managed_upload_output($success, $path = '', $message = '')
{
    json_storage_output(array(
        'success' => $success,
        'path' => $path,
        'message' => $message
    ));
    exit;
}

function managed_upload_path($collection)
{
    switch ($collection) {
        case UPLOAD_TARGET_CV:
            return array('relative' => 'download', 'absolute' => dirname(dirname(__DIR__)) . '/download');
        case UPLOAD_TARGET_PHOTO:
            return array('relative' => 'Media/foto', 'absolute' => dirname(dirname(__DIR__)) . '/Media/foto');
        case UPLOAD_TARGET_AUDIO:
            return array('relative' => 'Media/audio', 'absolute' => dirname(dirname(__DIR__)) . '/Media/audio');
        default:
            return null;
    }
}

function managed_upload_filename($fileName)
{
    $pathInfo = pathinfo($fileName);
    $baseName = isset($pathInfo['filename']) ? $pathInfo['filename'] : 'file';
    $extension = isset($pathInfo['extension']) ? $pathInfo['extension'] : '';

    $baseName = preg_replace('/\s+/', '_', $baseName);
    $baseName = preg_replace('/[^A-Za-z0-9._-]/', '_', $baseName);
    $baseName = trim($baseName, '._-');

    if ($baseName === '') {
        $baseName = 'file';
    }

    if ($extension !== '') {
        $extension = preg_replace('/[^A-Za-z0-9]/', '', $extension);
        if ($extension !== '') {
            return $baseName . '.' . $extension;
        }
    }

    return $baseName;
}

function managed_upload_unique_filename($directory, $fileName)
{
    $pathInfo = pathinfo($fileName);
    $baseName = isset($pathInfo['filename']) ? $pathInfo['filename'] : 'file';
    $extension = isset($pathInfo['extension']) ? $pathInfo['extension'] : '';
    $candidate = $fileName;
    $counter = 1;

    while (file_exists($directory . '/' . $candidate)) {
        $candidate = $baseName . '_' . $counter;
        if ($extension !== '') {
            $candidate .= '.' . $extension;
        }
        $counter++;
    }

    return $candidate;
}

$collection = isset($_POST['collection']) ? trim($_POST['collection']) : '';
$target = managed_upload_path($collection);

if ($target === null) {
    managed_upload_output(false, '', 'Destinazione upload non valida.');
}

if (!isset($_FILES['file']['name'])) {
    managed_upload_output(false, '', 'Nessun file ricevuto.');
}

$file = $_FILES['file'];
if ($file['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name'])) {
    managed_upload_output(false, '', 'Caricamento del file non riuscito.');
}

if (!is_dir($target['absolute'])) {
    @mkdir($target['absolute'], 0777, true);
}

if (!is_dir($target['absolute']) || !is_writable($target['absolute'])) {
    managed_upload_output(false, '', 'La cartella di destinazione non e scrivibile.');
}

$sanitizedFileName = managed_upload_filename($file['name']);
$finalFileName = managed_upload_unique_filename($target['absolute'], $sanitizedFileName);
$absolutePath = $target['absolute'] . '/' . $finalFileName;

if (!move_uploaded_file($file['tmp_name'], $absolutePath)) {
    managed_upload_output(false, '', 'Impossibile salvare il file caricato.');
}

$message = '';
if ($finalFileName !== $file['name']) {
    $message = 'File caricato con nome normalizzato: ' . $finalFileName;
}

managed_upload_output(true, $target['relative'] . '/' . $finalFileName, $message);
?>
