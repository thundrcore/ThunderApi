<?php
/**
 * DocumentExportOtherOptions
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
 * DocumentExportOtherOptions Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentExportOtherOptions
{
    /**
     * Possible values of this enum
     */
    const ALL = 'all';
const EXPIRED = 'expired';
const OUTSTANDING = 'outstanding';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ALL,
self::EXPIRED,
self::OUTSTANDING,        ];
    }
}
