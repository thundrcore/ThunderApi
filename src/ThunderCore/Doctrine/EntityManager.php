<?php
namespace ThunderCore\Doctrine;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\Configuration;
use ThunderCore\Logger\Interfaces\LoggerHelperInterface;
use ThunderCore\Logger\Traits\LoggerHelperTrait;

class EntityManager extends \Doctrine\ORM\EntityManager implements LoggerHelperInterface
{
    use LoggerHelperTrait;

    /**
     * @param Connection $conn
     * @param Configuration $config
     * @param EventManager $eventManager
     */
    public function __construct(Connection $conn, Configuration $config, EventManager $eventManager)
    {
        parent::__construct($conn, $config, $eventManager);
    }
}
