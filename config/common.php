<?php
/**
 * Yihai CMS
 *
 * Copyright (c) 2019, CodeUP.
 * @author  Upik Saleh <upik@codeup.id>
 */
if (!file_exists(__DIR__ . '/db.php')) {
    die('DB config must set, db.php not found in ' . __DIR__ . '/db.php');
}
$db = require __DIR__ . '/db.php';

$modules = require __DIR__ . '/modules.php';
if (file_exists(__DIR__ . '/modules-local.php'))
    $modules = array_merge($modules, require __DIR__ . '/modules-local.php');
return [
    'timeZone' => 'Asia/Makassar',
    'language' => 'id',
    'version' => '1.0.0',
    'components' => [
        'db' => $db,
    ],

    'modules' => $modules,
    'params' => require __DIR__ . '/params.php',
];