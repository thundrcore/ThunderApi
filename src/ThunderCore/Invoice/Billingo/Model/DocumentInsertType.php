<?php
/**
 * DocumentInsertType
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
 * DocumentInsertType Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentInsertType
{
    /**
     * Possible values of this enum
     */
    const ADVANCE = 'advance';
const DRAFT = 'draft';
const INVOICE = 'invoice';
const PROFORMA = 'proforma';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ADVANCE,
self::DRAFT,
self::INVOICE,
self::PROFORMA,        ];
    }
}
