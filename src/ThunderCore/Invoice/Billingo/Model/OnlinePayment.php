<?php
/**
 * OnlinePayment
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
 * OnlinePayment Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class OnlinePayment
{
    /**
     * Possible values of this enum
     */
    const EMPTY = '';
const BARION = 'Barion';
const SIMPLE_PAY = 'SimplePay';
const NO = 'no';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::EMPTY,
self::BARION,
self::SIMPLE_PAY,
self::NO,        ];
    }
}
