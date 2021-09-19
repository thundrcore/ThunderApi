<?php
namespace ThunderCore\Doctrine;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use ReflectionClass;
use ReflectionException;

/**
 * Class TablePrefix
 * A Doctrine Event Listener to use project prefixed table names in database
 *
 * @package LumiSys\Common\Doctrine\EventListener\TablePrefix
 */
class TablePrefix
{
    /**
     * @var string
     */
    protected $prefix = '';
    /**
     * @var array
     */
    protected $namespaces = array();

    /**
     * TablePrefix constructor.
     * @param $prefix
     * @param array $namespaces
     */
    public function __construct($prefix, array $namespaces = array())
    {
        $this->prefix = (string) $prefix;
        $this->namespaces = $namespaces;
    }

    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        $classMetadata = $eventArgs->getClassMetadata();
        $prefix = (empty($this->namespaces) || in_array($classMetadata->namespace, $this->namespaces)) ? $this->prefix : '';

        if (!$classMetadata->isInheritanceTypeSingleTable() || $classMetadata->getName() === $classMetadata->rootEntityName) {
            $classMetadata->setPrimaryTable(array(
                'name' => $prefix . $classMetadata->getTableName()
            ));
        }

        foreach ($classMetadata->getAssociationMappings() as $fieldName => $mapping) {
            if ($mapping['type'] == ClassMetadataInfo::MANY_TO_MANY && $mapping['isOwningSide']) {
                $prefix = '';
                try {
                    $r = new ReflectionClass($mapping['targetEntity']);
                    if (empty($this->namespaces) || in_array($r->getNamespaceName(), $this->namespaces)) {
                        $prefix = $this->prefix;
                    }
                } catch (ReflectionException $e) {
                }
                $mappedTableName = $mapping['joinTable']['name'];
                $classMetadata->associationMappings[$fieldName]['joinTable']['name'] = $prefix . $mappedTableName;
            }
        }
    }
}