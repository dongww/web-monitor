<?php
/**
 * User: dongww
 * Date: 2016/4/6
 * Time: 9:20
 */

namespace Dongww\WebMonitor;


interface ResponseInterface
{
    public function successful();
    
    public function getMessage();

    public function getContent();
}