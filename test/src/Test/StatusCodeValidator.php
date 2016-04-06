<?php
/**
 * User: dongww
 * Date: 2016/4/6
 * Time: 14:22
 */

namespace Test;

use Dongww\WebMonitor\Rule\HttpValidator;
use Httpful\Response;

class StatusCodeValidator extends HttpValidator
{
    private $code;

    public function __construct($code = 200)
    {
        $this->code = $code;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        if ($this->response->code == $this->code) {
            return true;
        }

        return false;
    }
}