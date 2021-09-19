<?php
/**
 * UnitPriceType
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
 * UnitPriceType Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class UnitPriceType
{
    /**
     * Possible values of this enum
     */
    const GROSS = 'gross';
const NET = 'net';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::GROSS,
self::NET,        ];
    }
}
