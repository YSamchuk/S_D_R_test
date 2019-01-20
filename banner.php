<?php

/**
 *
 */

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

if ($pdo) {
    increaseBannerView($pdo);

    print '<pre>';
    printResultOfBannerView($pdo, false);
    print '</pre>';

    print '<pre>';
    printResultOfBannerView($pdo, true);
    print '</pre>';
}

/**
 * @param PDO $pdo
 * @return void
 */
function increaseBannerView($pdo): void {
    $ip = $_SERVER['REMOTE_ADDR'];

    $sql = 'INSERT INTO banner_counts.banner_views (ip) VALUES (?)';

    $pdo->prepare($sql)->execute([$ip]);
}

/**
 * @param PDO $pdo
 * @param boolean $onlyUnique
 * @return void
 */
function printResultOfBannerView($pdo, $onlyUnique = false): void {
    $sql = 'SELECT COUNT(*) FROM `banner_counts`.`banner_views`';

    if ($onlyUnique) {
        $sql = 'SELECT COUNT(DISTINCT `ip`) FROM `banner_counts`.`banner_views`';
    }

    $count = current($pdo->query($sql)->fetchAll(PDO::FETCH_COLUMN));

    print sprintf(
        'Кол-во показов баннера%s: %d',
        $onlyUnique ? '(уникальных)' : '',
        $count
    );
}

