<?php
namespace ThunderCore\Doctrine;

use Exception;
use ThunderCore\Config\Config;
use ThunderCore\Config\ConfigurableFactoryInterface;
use ThunderCore\Config\ConfigurableFactoryTrait;
use ThunderCore\Utils\InvokableFactoryInterface;

class TablePrefixFactory implements InvokableFactoryInterface, ConfigurableFactoryInterface
{
    use ConfigurableFactoryTrait;

    /**
     * @return TablePrefix
     * @throws Exception
     */
    public function __invoke()
    {
        if (!$this->config instanceof Config) {
            throw new Exception(__CLASS__ . " can't work without configuration");
        }

        return new TablePrefix(
            $this->config->get('prefix', ''),
            $this->config->get('prefix_namespaces', array())
        );
    }
}
