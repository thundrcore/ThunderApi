<?php
/**
 * CheckTaxNumberMessage
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
 * CheckTaxNumberMessage Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CheckTaxNumberMessage
{
    /**
     * Possible values of this enum
     */
    const EXTERNAL_NAV_SERVICE_UNREACHABLE = 'external_nav_service_unreachable';
const INVALID_TAX_NUMBER = 'invalid_tax_number';
const NO_ONLINE_SZAMLA_SETTINGS = 'no_online_szamla_settings';
const NON_EXIST_TAX_NUMBER = 'non_exist_tax_number';
const VALIDATION_OK = 'validation_ok';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::EXTERNAL_NAV_SERVICE_UNREACHABLE,
self::INVALID_TAX_NUMBER,
self::NO_ONLINE_SZAMLA_SETTINGS,
self::NON_EXIST_TAX_NUMBER,
self::VALIDATION_OK,        ];
    }
}
