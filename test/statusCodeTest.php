<?php
use Dongww\WebMonitor\Detector\Http;
use Dongww\WebMonitor\Detector\Http\Request;
use Test\StatusCodeValidator;

require_once __DIR__ . '/autoload.php';

$httpDetector = new Http();
$validator    = new StatusCodeValidator(302);

$request = Request::create(
    'http://man.875.cn',
    Request::METHOD_HEAD
);

$httpDetector->setValidator($validator);

$result = $httpDetector->probe($request);

var_dump($result);