<?php
use Dongww\WebMonitor\Detector\DbDetector;

require_once 'autoload.php';

$connectionParams = [
    'dbname'   => 'man875',
    'user'     => 'db_user',
    'password' => 'z5J9OT0urtbfVuRuViK7',
    'host'     => '10.201.2.13:3306',
    'driver'   => 'pdo_mysql',
];

$detector = new DbDetector($connectionParams);

$response = $detector->probe();

echo $response->getMessage();