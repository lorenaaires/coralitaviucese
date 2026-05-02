<?php
require_once 'JsonStorage.php';

define("UPLOAD_DIR", "../../Doc_Volantini/");

function upload_output($success, $fileName = '', $message = '')
{
    json_storage_output(array(
        'success' => $success,
        'fileName' => $fileName,
        'message' => $message
    ));
    exit;
}

function sanitize_upload_filename($fileName)
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

function unique_upload_filename($fileName)
{
    $pathInfo = pathinfo($fileName);
    $baseName = isset($pathInfo['filename']) ? $pathInfo['filename'] : 'file';
    $extension = isset($pathInfo['extension']) ? $pathInfo['extension'] : '';
    $candidate = $fileName;
    $counter = 1;

    while (file_exists(UPLOAD_DIR . $candidate)) {
        $suffix = '_' . $counter;
        $candidate = $baseName . $suffix;
        if ($extension !== '') {
            $candidate .= '.' . $extension;
        }
        $counter++;
    }

    return $candidate;
}

if (!isset($_FILES['file']['name'])) {
    upload_output(false, '', 'Nessun file ricevuto.');
}

$file = $_FILES['file'];

if ($file['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name'])) {
    upload_output(false, '', 'Caricamento del file non riuscito.');
}

$sanitizedFileName = sanitize_upload_filename($file['name']);
$finalFileName = unique_upload_filename($sanitizedFileName);

if (!move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $finalFileName)) {
    upload_output(false, '', 'Impossibile salvare il file caricato.');
}

$message = '';
if ($finalFileName !== $file['name']) {
    $message = 'File caricato con nome normalizzato: ' . $finalFileName;
}

upload_output(true, $finalFileName, $message);
?>
