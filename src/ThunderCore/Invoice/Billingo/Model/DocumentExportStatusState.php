<?php
/**
 * DocumentExportStatusState
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
 * DocumentExportStatusState Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentExportStatusState
{
    /**
     * Possible values of this enum
     */
    const FAIL = 'fail';
const PENDING = 'pending';
const PROCESSING = 'processing';
const SUCCESS = 'success';
const WARNING = 'warning';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::FAIL,
self::PENDING,
self::PROCESSING,
self::SUCCESS,
self::WARNING,        ];
    }
}
