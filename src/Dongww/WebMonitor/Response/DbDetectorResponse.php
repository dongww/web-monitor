<?php
/**
 * User: dongww
 * Date: 2016/6/4
 * Time: 13:30
 */

namespace Dongww\WebMonitor\Response;


use Dongww\WebMonitor\Response;
use Dongww\WebMonitor\ResponseInterface;

class DbDetectorResponse implements ResponseInterface
{
    /**
     * @var bool
     */
    private $successful;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     */
    private $connectionParams;

    public function __construct($successful, $message, $connectionParams)
    {
        $this->setSuccessful($successful);
        $this->setMessage($message);
    }

    /**
     * @param boolean $successful
     */
    public function setSuccessful($successful)
    {
        $this->successful = $successful;
    }

    public function successful()
    {
        return $this->successful;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getContent()
    {
        return null;
    }

    /**
     * @return array
     */
    public function getConnectionParams()
    {
        return $this->connectionParams;
    }

    /**
     * @param array $connectionParams
     */
    public function setConnectionParams($connectionParams)
    {
        $this->connectionParams = $connectionParams;
    }
}