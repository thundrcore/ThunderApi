<?php
namespace ThunderCore\Config;


use ThunderCore\Utils\ArrayUtils;

class Config
{
    /**
     * @var array
     */
    private $config = array();
    /**
     * @var array
     */
    private $base = array();

    /**
     * Config constructor.
     * @param array $config
     * @param array|string|null $base
     */
    public function __construct(array $config = array(), $base = null)
    {
        $this->config = $config;
        $this->setBase($base);
    }

    /**
     * @param array|string $dimensionNames
     * @return array|string|null
     */
    public function has($dimensionNames)
    {
        $keys = $this->_keys($dimensionNames);
        return $this->_has($keys);
    }

    /**
     * @param array|string|null $dimensionNames
     * @param array|string|null $default
     * @return array|string|null
     */
    public function get($dimensionNames=null, $default=null)
    {
        $config = $this->_get($this->_keys($dimensionNames), $this->config);
        return is_null($config) ? $default : $config;
    }

    /**
     * @param array|string|null $dimensionNames
     * @param array|string|null $value
     * @return Config
     */
    public function set($dimensionNames=null, $value=null)
    {
        $this->_set($this->_keys($dimensionNames), $value);
        return $this;
    }

    /**
     * @param array|string|null $dimensionNames
     * @return Config
     */
    public function fromDimension($dimensionNames=null)
    {
        $config = $this->_get($this->_keys($dimensionNames), $this->config);
        return new static((array)$config);
    }

    /**
     * @param array|string|null $dimensionNames
     * @return array
     */
    private function _keys($dimensionNames=null)
    {
        if (!is_null($dimensionNames) && !is_array($dimensionNames)) {
            $dimensionNames = array($dimensionNames);
        }
        $keys = $this->base;
        if (!empty($dimensionNames)) {
            foreach ($dimensionNames as $dimensionName) {
                $keys[] = $dimensionName;
            }
        }
        return $keys;
    }

    /**
     * @param array $keys
     * @return bool
     */
    private function _has(array $keys)
    {
        $config = $this->config;
        foreach ($keys as $key) {
            if (is_array($config) && array_key_exists($key, $config)) {
                $config = $config[$key];
            } else {
                return false;
            }
        }
        return true;
    }

    /**
     * @param array $keys
     * @param array|null $config
     * @return array|string|null
     */
    private function _get(array $keys = array(), array $config = null)
    {
        foreach ($keys as $key) {
            if (is_array($config) && array_key_exists($key, $config)) {
                $config = $config[$key];
            } else {
                return null;
            }
        }
        return $config;
    }

    /**
     * @param array $keys
     * @param array|string|null $value
     */
    private function _set(array $keys, $value = null)
    {
        $cfg = &$this->config;
        foreach ($keys as $key) {
            if (!array_key_exists($key, $cfg)) {
                $cfg[$key] = null;
            }
            $cfg = &$cfg[$key];
        }
        $cfg = $value;
    }

    /**
     * @param array|string|null $base
     * @return Config
     */
    public function setBase($base = null)
    {
        if (!is_null($base) && !is_array($base)) {
            $base = array($base);
        }
        $this->base = (array)$base;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->config;
    }

    /**
     * @param Config|array $config
     * @param bool $preserveNumericKeys
     * @return $this
     */
    public function merge($config, $preserveNumericKeys = false)
    {
        $merge = $config instanceof self ? $config->toArray() : (array)$config;
        $this->config = ArrayUtils::merge($this->config, $merge, $preserveNumericKeys);
        return $this;
    }
}
