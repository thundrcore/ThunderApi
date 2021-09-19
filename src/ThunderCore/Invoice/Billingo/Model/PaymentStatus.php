<?php
/**
 * PaymentStatus
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
 * PaymentStatus Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentStatus
{
    /**
     * Possible values of this enum
     */
    const EXPIRED = 'expired';
const NONE = 'none';
const OUTSTANDING = 'outstanding';
const PAID = 'paid';
const PARTIALLY_PAID = 'partially_paid';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::EXPIRED,
self::NONE,
self::OUTSTANDING,
self::PAID,
self::PARTIALLY_PAID,        ];
    }
}
