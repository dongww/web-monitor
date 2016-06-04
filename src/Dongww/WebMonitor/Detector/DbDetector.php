<?php
/**
 * User: dongww
 * Date: 2016/6/4
 * Time: 13:13
 */

namespace Dongww\WebMonitor\Detector;

use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\DriverManager;
use Dongww\WebMonitor\DetectorInterface;
use Dongww\WebMonitor\Helper\IconvHelper;
use Dongww\WebMonitor\ResourceInterface;
use Dongww\WebMonitor\Response\DbDetectorResponse;
use Dongww\WebMonitor\ResponseInterface;

class DbDetector implements DetectorInterface
{
    private $connectionParams;

    /**
     * @var Connection
     */
    private $connection;

    public function __construct($connectionParams)
    {
        $this->connectionParams = $connectionParams;
        $config                 = new \Doctrine\DBAL\Configuration();

        $this->connection = DriverManager::getConnection($this->connectionParams, $config);
    }

    public function getConnectionParams()
    {
        return $this->connectionParams;
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
        $message    = sprintf("
DB DETECTOR:
====================================
connected %s
====================================
DRIVER:%s
DBNAME:%s
",
            $this->connectionParams['host'],
            $this->connectionParams['driver'],
            $this->connectionParams['dbname']
        );
        $successful = false;

        try {
            if ($this->connection->ping()) {
                $successful = true;
            }
        } catch (\Exception $e) {
            $message = sprintf("
DB DETECTOR:
====================================
CODE: %s
ERROR MESSAGE: %s
",
                $e->getCode(),
                IconvHelper::convert($e->getMessage())
            );
        }

        return new DbDetectorResponse(
            $successful,
            $message,
            $this->connectionParams
        );
    }
}