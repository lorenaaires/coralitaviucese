<?php

require_once __DIR__ . '/../api/Values/JsonStorage.php';

function extract_insert_values($sql, $tableName)
{
    $prefix = 'INSERT INTO `' . $tableName . '` VALUES ';
    $lines = preg_split("/\r\n|\n|\r/", $sql);

    foreach ($lines as $line) {
        if (strpos($line, $prefix) === 0) {
            $line = substr($line, strlen($prefix));
            return rtrim($line, ';');
        }
    }

    return '';
}

function split_tuples($valuesBlock)
{
    $tuples = array();
    $current = '';
    $depth = 0;
    $inString = false;
    $escaped = false;
    $length = strlen($valuesBlock);

    for ($index = 0; $index < $length; $index++) {
        $char = $valuesBlock[$index];
        $current .= $char;

        if ($escaped) {
            $escaped = false;
            continue;
        }

        if ($char === '\\') {
            $escaped = true;
            continue;
        }

        if ($char === "'") {
            $inString = !$inString;
            continue;
        }

        if ($inString) {
            continue;
        }

        if ($char === '(') {
            $depth++;
            continue;
        }

        if ($char === ')') {
            $depth--;
            if ($depth === 0) {
                $tuples[] = trim($current, ", \r\n\t");
                $current = '';
            }
        }
    }

    return $tuples;
}

function split_fields($tuple)
{
    $tuple = trim($tuple);
    $tuple = trim($tuple, '()');
    $fields = array();
    $current = '';
    $inString = false;
    $escaped = false;
    $length = strlen($tuple);

    for ($index = 0; $index < $length; $index++) {
        $char = $tuple[$index];

        if ($escaped) {
            $current .= $char;
            $escaped = false;
            continue;
        }

        if ($char === '\\') {
            $current .= $char;
            $escaped = true;
            continue;
        }

        if ($char === "'") {
            $inString = !$inString;
            $current .= $char;
            continue;
        }

        if ($char === ',' && !$inString) {
            $fields[] = trim($current);
            $current = '';
            continue;
        }

        $current .= $char;
    }

    $fields[] = trim($current);

    return $fields;
}

function decode_sql_value($value)
{
    if ($value === 'NULL') {
        return null;
    }

    if (strlen($value) >= 2 && $value[0] === "'" && substr($value, -1) === "'") {
        $value = substr($value, 1, -1);
    }

    return stripcslashes($value);
}

function parse_table_rows($sql, $tableName, $columns)
{
    $valuesBlock = extract_insert_values($sql, $tableName);
    if ($valuesBlock === '') {
        return array();
    }

    $rows = array();
    foreach (split_tuples($valuesBlock) as $tuple) {
        $fields = split_fields($tuple);
        $row = array();

        foreach ($columns as $index => $columnName) {
            $row[$columnName] = array_key_exists($index, $fields) ? decode_sql_value($fields[$index]) : null;
        }

        $rows[] = $row;
    }

    return $rows;
}

function build_datasets($sql)
{
    return array(
        'contatti.json' => array(
            'rows' => parse_table_rows($sql, 'informazioniSito', array(
                'idCoro',
                'nomeCoro',
                'indirizzoCoro',
                'codiceFiscaleCoro',
                'nomePresidente',
                'nomeDirettore',
                'telefonoPresidente',
                'telefonoDirettore',
                'mailPresidente',
                'mailDirettore',
                'newsSitoCoro',
            )),
            'integer_fields' => array('idCoro'),
        ),
        'tipologie-brani.json' => array(
            'rows' => parse_table_rows($sql, 'gruppo_Repertorio', array(
                'id_gruppo_repertorio',
                'descrizione_gruppo',
                'ordine_gruppo',
            )),
            'integer_fields' => array('id_gruppo_repertorio', 'ordine_gruppo'),
        ),
        'brani.json' => array(
            'rows' => parse_table_rows($sql, 'Repertorio', array(
                'id_canti',
                'Gruppo_id',
                'Titolo',
                'Armonizzazione',
                'Testo',
            )),
            'integer_fields' => array('id_canti', 'Gruppo_id'),
        ),
        'concerti.json' => array(
            'rows' => parse_table_rows($sql, 'registroUscite', array(
                'id_uscita',
                'data_inizio',
                'data_fine',
                'quandoDescrizione',
                'luogo_uscita',
                'dettagli_uscita',
                'indirizzoFileVolantini',
            )),
            'integer_fields' => array('id_uscita'),
        ),
    );
}

function seed_json_files()
{
    $sql = file_get_contents(__DIR__ . '/../DB/data.sql');
    if ($sql === false) {
        fwrite(STDERR, "Impossibile leggere DB/data.sql\n");
        exit(1);
    }

    $datasets = build_datasets($sql);

    foreach ($datasets as $fileName => $dataset) {
        $rows = $dataset['rows'];
        $integerFields = $dataset['integer_fields'];

        foreach ($rows as &$row) {
            foreach ($integerFields as $fieldName) {
                if (isset($row[$fieldName]) && is_string($row[$fieldName]) && ctype_digit($row[$fieldName])) {
                    $row[$fieldName] = intval($row[$fieldName]);
                }
            }
        }
        unset($row);

        if (!json_storage_write($fileName, $rows)) {
            fwrite(STDERR, "Impossibile scrivere {$fileName}\n");
            exit(1);
        }
    }

    fwrite(STDOUT, "JSON generati in " . JSON_STORAGE_DIR . PHP_EOL);
}

if (realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) {
    seed_json_files();
}
