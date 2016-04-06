<?php
/**
 * User: dongww
 * Date: 2016/4/6
 * Time: 11:28
 */

namespace Dongww\WebMonitor\Detector\Http;

use Dongww\WebMonitor\ResourceInterface;
use Symfony\Component\HttpFoundation\Request as baseRequest;

class Request extends baseRequest implements ResourceInterface
{
}