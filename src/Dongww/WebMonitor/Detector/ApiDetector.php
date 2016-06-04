<?php
/**
 * User: dongww
 * Date: 2016/4/6
 * Time: 11:26
 */

namespace Dongww\WebMonitor\Detector;

use Dongww\WebMonitor\DetectorInterface;
use Dongww\WebMonitor\ResourceInterface;
use Dongww\WebMonitor\Response;
use Dongww\WebMonitor\Response\ApiDetectorResponse;
use Dongww\WebMonitor\ResponseInterface;
use GuzzleHttp\Client;

class ApiDetector implements DetectorInterface
{

    private $httpClient;

    public function __construct($params = [])
    {
        $this->httpClient = new Client($params);
    }

    /**
     * @param ResourceInterface $resource
     *
     * @param  array            $options
     *
     * @return ResponseInterface
     */
    public function probe(ResourceInterface $resource = null, array $options = [])
    {
        $successful = false;
        $message    = "";
        $content    = "";

        try {
            $response = $this->httpClient->request(
                $options['method'],
                $options['uri'],
                $options['options'] ?: []
            );

            $content    = (string)$response->getBody();
            $successful = true;
            $message    = sprintf("
API DETECTOR:
====================================
%s %s
====================================
HTTP CODE: %s
RESPONSE: %s
",
                $options['method'],
                $options['uri'],
                $response->getStatusCode(),
                $content
            );
        } catch (\Exception $e) {
            $message = "";
        }

        return new ApiDetectorResponse($successful, $message, $content);

    }
}