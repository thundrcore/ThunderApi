<?php
/**
 * DocumentExportSortBy
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
 * DocumentExportSortBy Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentExportSortBy
{
    /**
     * Possible values of this enum
     */
    const FULFILLMENT_DATE = 'fulfillment_date';
const INVOICE_DATE = 'invoice_date';
const INVOICE_RAW_NUMBER = 'invoice_raw_number';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::FULFILLMENT_DATE,
self::INVOICE_DATE,
self::INVOICE_RAW_NUMBER,        ];
    }
}
