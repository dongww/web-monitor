<?php
/**
 * User: dongww
 * Date: 2016/4/6
 * Time: 11:23
 */

namespace Dongww\WebMonitor\Detector;


use Dongww\WebMonitor\DetectorInterface;
use Dongww\WebMonitor\Detector\Http\Request;
use Dongww\WebMonitor\ResourceInterface;
use Dongww\WebMonitor\Response;
use Dongww\WebMonitor\Rule\HttpValidator;
use Httpful\Request as HttpServer;

class Http implements DetectorInterface
{
    /** @var  HttpValidator */
    protected $validator;

    public function setValidator(HttpValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param ResourceInterface $resource
     *
     * @param  array            $options
     *
     * @return Response
     */
    public function probe(ResourceInterface $resource, array $options = [])
    {
        /** @var Request $resource */

        $response = $this->getHttpServer($resource)->send();

        $this->validator->setResponse($response);

        return $this->validator->validate();
    }

    /**
     * @param Request $request
     *
     * @return HttpServer
     */
    public function getHttpServer(Request $request)
    {
        $url = $request->getUri();

        switch ($request->getMethod()) {
            case Request::METHOD_POST:
                $httpServer = HttpServer::post($url);
                break;
            case Request::METHOD_PUT:
                $httpServer = HttpServer::put($url);
                break;
            case Request::METHOD_DELETE:
                $httpServer = HttpServer::delete($url);
                break;
            default:
                $httpServer = HttpServer::get($url);
                break;
        }

        if ($request->headers) {
            $httpServer->addHeaders($request->headers->all());
        }

        if ($request->getUser()) {
            $httpServer->authenticateWith($request->getUser(), $request->getPassword());
        }

        if ($request->getContent()) {
            $httpServer->body($request->getContent());
        }

        return $httpServer;
    }
}