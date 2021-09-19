<?php
/**
 * DocumentExportQueryType
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
 * DocumentExportQueryType Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentExportQueryType
{
    /**
     * Possible values of this enum
     */
    const FULFILLMENT_DATE = 'fulfillment_date';
const INVOICE_DATE = 'invoice_date';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::FULFILLMENT_DATE,
self::INVOICE_DATE,        ];
    }
}
