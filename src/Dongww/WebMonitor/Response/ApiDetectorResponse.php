<?php
/**
 * User: dongww
 * Date: 2016/6/4
 * Time: 14:48
 */

namespace Dongww\WebMonitor\Response;


use Dongww\WebMonitor\ResponseInterface;

class ApiDetectorResponse implements ResponseInterface
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
     * @var string
     */
    private $content;

    public function __construct($successful, $message, $content)
    {
        $this->setSuccessful($successful);
        $this->setMessage($message);
        $this->setContent($content);
    }

    public function successful()
    {
        return $this->successful;
    }

    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param boolean $successful
     */
    public function setSuccessful($successful)
    {
        $this->successful = $successful;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }


}