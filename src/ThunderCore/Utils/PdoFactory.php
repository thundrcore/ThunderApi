<?php
namespace ThunderCore\Utils;


use Exception;
use ThunderCore\Config\ConfigurableFactoryInterface;
use ThunderCore\Config\ConfigurableFactoryTrait;
use ThunderCore\Logger;
use PDO;
use PDOException;
use Psr\Log\LoggerInterface;

class PdoFactory implements InvokableFactoryInterface, ConfigurableFactoryInterface
{
    use ConfigurableFactoryTrait;

    /**
     * @return PDO
     * @throws Exception
     */
    public function __invoke()
    {
        $logger = new Logger('SQL');

        if (null==$this->config) {
            $logger->error('Factory', (array)" can't work without configuration");
            throw new Exception(__CLASS__ . " can't work without configuration");
        }

        $pdo = $this->createPDO($logger);

       // $pdo->setAttribute(\PDO::ATTR_STATEMENT_CLASS, array(__NAMESPACE__ . '\PDOStatement', array($pdo)));

        return $pdo;
    }

    /**
     * @param LoggerInterface|null $logger
     * @return PDO
     */
    public function createPDO(LoggerInterface $logger = null)
    {
        $db_user = $this->config->get('db_user');
        $db_pass = $this->config->get('db_pass');
        $options =  $this->config->get('options', array());
        $attributes =  $this->config->get('attributes', array());

        $dsn = $this->createDsn();

        try {
            $pdo = new PDO($dsn, $db_user, $db_pass, $options);
        } catch (PDOException $e) {
            if ($logger instanceof LoggerInterface) {
                $logger->error('connect', (array)$e);
            }
            throw $e;
        }

        foreach ($attributes as $attribute => $value) {
            $pdo->setAttribute($attribute, $value);
        }

        return $pdo;
    }

    /**
     * @return string
     */
    private function createDsn()
    {
        $db_driver = $this->config->get('db_driver');
        $dsn_params =  $this->config->get('dsn');

        $params = array();
        if (!empty($dsn_params)) {
            if (is_array($dsn_params)) {
                foreach ($dsn_params as $key => $val) {
                    $params[] = "{$key}={$val}";
                }
            } else {
                $params[] = $dsn_params;
            }
        }

        return "{$db_driver}:" . implode(';', $params);
    }
}
