<?php
use Dongww\WebMonitor\Detector\DbDetector;

require_once 'autoload.php';

$connectionParams = [
    'dbname'   => 'man875',
    'user'     => 'db_user',
    'password' => 'z5J9OT0urtbfVuRuViK7',
    'host'     => '10.201.2.13:33061',
    'driver'   => 'pdo_mysql',
];

$monitor = new DbDetector($connectionParams);

$response = $monitor->probe();

echo $response->getMessage();