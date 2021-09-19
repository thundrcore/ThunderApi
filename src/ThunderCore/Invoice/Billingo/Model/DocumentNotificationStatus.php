<?php
/**
 * DocumentNotificationStatus
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
 * DocumentNotificationStatus Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentNotificationStatus
{
    /**
     * Possible values of this enum
     */
    const CLOSED = 'closed';
const DOWNLOADED = 'downloaded';
const FAILED = 'failed';
const NONE = 'none';
const OPENED = 'opened';
const READED = 'readed';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::CLOSED,
self::DOWNLOADED,
self::FAILED,
self::NONE,
self::OPENED,
self::READED,        ];
    }
}
