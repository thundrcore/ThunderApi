<?php
/**
 * DocumentLanguage
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
 * DocumentLanguage Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentLanguage
{
    /**
     * Possible values of this enum
     */
    const DE = 'de';
const EN = 'en';
const FR = 'fr';
const HR = 'hr';
const HU = 'hu';
const IT = 'it';
const RO = 'ro';
const SK = 'sk';
const US = 'us';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::DE,
self::EN,
self::FR,
self::HR,
self::HU,
self::IT,
self::RO,
self::SK,
self::US,        ];
    }
}
