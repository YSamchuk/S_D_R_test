<?php

$db = [
    'host'     => 'localhost',
    'username' => 'banner',
    'password' => '1',
    'database' => 'banner_counts',
    'opts'     => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ],
];

$dsnConfig = "mysql:host={$db['host']};dbname:{$db['database']}";

$pdo = new PDO($dsnConfig, $db['username'], $db['password'], $db['opts']);