<?php
/**
 * Category
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
 * Category Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Category
{
    /**
     * Possible values of this enum
     */
    const ADVERTISEMENT = 'advertisement';
const DEVELOPMENT = 'development';
const OTHER = 'other';
const OVERHEADS = 'overheads';
const SERVICE = 'service';
const STOCK = 'stock';
const TANGIBLE_ASSETS = 'tangible_assets';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ADVERTISEMENT,
self::DEVELOPMENT,
self::OTHER,
self::OVERHEADS,
self::SERVICE,
self::STOCK,
self::TANGIBLE_ASSETS,        ];
    }
}
