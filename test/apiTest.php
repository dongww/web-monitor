<?php
use Dongww\WebMonitor\Detector\ApiDetector;
use Dongww\WebMonitor\Detector\Http\Request;

require_once 'autoload.php';

$params = [
    'base_uri' => 'http://10.201.70.81:8090/',
];

$userId = '617984';

$detector = new ApiDetector($params);

$response = $detector->probe(null, [
    'method'  => 'GET',
    'uri'     => "/users/{$userId}/role",
]);

echo $response->getMessage();