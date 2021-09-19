<?php
/**
 * PartnerTaxType
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
 * PartnerTaxType Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PartnerTaxType
{
    /**
     * Possible values of this enum
     */
    const EMPTY = '';
const FOREIGN = 'FOREIGN';
const HAS_TAX_NUMBER = 'HAS_TAX_NUMBER';
const NO_TAX_NUMBER = 'NO_TAX_NUMBER';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::EMPTY,
self::FOREIGN,
self::HAS_TAX_NUMBER,
self::NO_TAX_NUMBER,        ];
    }
}
