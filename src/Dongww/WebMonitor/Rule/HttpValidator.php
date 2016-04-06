<?php
/**
 * User: dongww
 * Date: 2016/4/6
 * Time: 14:05
 */

namespace Dongww\WebMonitor\Rule;

use Dongww\WebMonitor\ValidatorInterface;
use Httpful\Response;

abstract class HttpValidator implements ValidatorInterface
{
    protected $response;

    public function setResponse(Response $response)
    {
        $this->response = $response;
    }
}