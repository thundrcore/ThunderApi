<?php
/**
 * DocumentType
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
 * DocumentType Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentType
{
    /**
     * Possible values of this enum
     */
    const ADVANCE = 'advance';
const CANCELLATION = 'cancellation';
const DRAFT = 'draft';
const INVOICE = 'invoice';
const MODIFICATION = 'modification';
const PROFORMA = 'proforma';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ADVANCE,
self::CANCELLATION,
self::DRAFT,
self::INVOICE,
self::MODIFICATION,
self::PROFORMA,        ];
    }
}
