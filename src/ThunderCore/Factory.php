<?php

namespace ThunderCore;

use ThunderCore\Config\Config;
use ThunderCore\Utils\ArrayUtils;
use RuntimeException;

class Factory{

    /**
     * @var string
     */
    protected static $config_path = BASE_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;

    /**
     * Read a config from a file.
     *
     * @param  string  $filename
     * @param  bool $returnConfigObject
     * @param  bool $useIncludePath
     * @return array|Config
     * @throws RuntimeException
     */
    public static function fromFile($filename, $returnConfigObject = false, $useIncludePath = false)
    {
        $file_path = $filename;
        if (! file_exists($filename)) {
            if (! $useIncludePath) {
                throw new RuntimeException(sprintf(
                    'Filename "%s" cannot be found relative to the working directory',
                    $filename
                ));
            }

            $file_path = stream_resolve_include_path($filename);
        }

        if (! $file_path) {
            throw new RuntimeException(sprintf(
                'Filename "%s" cannot be found relative to the working directory or the include_path ("%s")',
                $filename,
                get_include_path()
            ));
        }

        $path_info = pathinfo($file_path);

        if (! isset($path_info['extension'])) {
            throw new RuntimeException(sprintf(
                'Filename "%s" is missing an extension and cannot be auto-detected',
                $filename
            ));
        }

        $extension = strtolower($path_info['extension']);

        if ($extension === 'php') {
            if (! is_file($file_path) || ! is_readable($file_path)) {
                throw new RuntimeException(sprintf(
                    "File '%s' doesn't exist or not readable",
                    $filename
                ));
            }

            /** @noinspection PhpIncludeInspection */
            $config = include $file_path;
        } else {
            throw new RuntimeException(sprintf(
                'Unsupported config file extension: .%s',
                $path_info['extension']
            ));
        }

        return ($returnConfigObject) ? new Config($config) : $config;
    }

    /**
     * Read configuration from multiple files and merge them.
     *
     * @param  array   $files
     * @param  bool $returnConfigObject
     * @param  bool $useIncludePath
     * @return array|Config
     */
    public static function fromFiles(array $files, $returnConfigObject = false, $useIncludePath = false)
    {
        $config = array();

        foreach ($files as $file) {
            $config = ArrayUtils::merge($config, static::fromFile($file, false, $useIncludePath));
        }

        return ($returnConfigObject) ? new Config($config) : $config;
    }

    /**
     * @param $name
     * @param bool $returnConfigObject
     * @param bool $useIncludePath
     * @return array|Config
     */
    public static function fromName($name, $returnConfigObject = false, $useIncludePath = false)
    {
        $file = rtrim(self::$config_path, '/\\') . DIRECTORY_SEPARATOR . $name . '.php';
        $config = static::fromFile($file, false, $useIncludePath);
        if ($returnConfigObject) {
            return new Config($config);
        } else {
            return $config;
        }
    }

    /**
     * @param array $names
     * @param bool $returnConfigObject
     * @param bool $useIncludePath
     * @return array|Config
     */
    public static function fromNames(array $names, $returnConfigObject = false, $useIncludePath = false)
    {
        $config = array();

        foreach ($names as $name) {
            $config = ArrayUtils::merge($config, static::fromName($name, false, $useIncludePath));
        }

        if ($returnConfigObject) {
            return new Config($config);
        } else {
            return $config;
        }
    }

    /**
     * @return string
     */
    public static function getConfigPath()
    {
        return self::$config_path;
    }

    /**
     * @param string $config_path
     */
    public static function setConfigPath($config_path)
    {
        self::$config_path = $config_path;
    }
}