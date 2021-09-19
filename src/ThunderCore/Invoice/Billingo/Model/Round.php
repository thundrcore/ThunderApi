<?php
/**
 * Round
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */



namespace ThunderCore\Invoice\Billingo\Model;
use \ThunderCore\Invoice\Billingo\ObjectSerializer;

/**
 * Round Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Round
{
    /**
     * Possible values of this enum
     */
    const FIVE = 'five';
const NONE = 'none';
const ONE = 'one';
const TEN = 'ten';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::FIVE,
self::NONE,
self::ONE,
self::TEN,        ];
    }
}
