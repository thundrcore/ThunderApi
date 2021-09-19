<?php
/**
 * DocumentOrganization
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */



namespace ThunderCore\Invoice\Billingo\Model;

use \ArrayAccess;
use \ThunderCore\Invoice\Billingo\ObjectSerializer;

/**
 * DocumentOrganization Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentOrganization implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DocumentOrganization';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
'tax_number' => 'string',
'bank_account' => '\ThunderCore\Invoice\Billingo\Model\DocumentBankAccount',
'address' => '\ThunderCore\Invoice\Billingo\Model\Address',
'small_taxpayer' => 'bool',
'ev_number' => 'string',
'eu_tax_number' => 'string',
'cash_settled' => 'bool'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
'tax_number' => null,
'bank_account' => null,
'address' => null,
'small_taxpayer' => null,
'ev_number' => null,
'eu_tax_number' => null,
'cash_settled' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'name',
'tax_number' => 'tax_number',
'bank_account' => 'bank_account',
'address' => 'address',
'small_taxpayer' => 'small_taxpayer',
'ev_number' => 'ev_number',
'eu_tax_number' => 'eu_tax_number',
'cash_settled' => 'cash_settled'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
'tax_number' => 'setTaxNumber',
'bank_account' => 'setBankAccount',
'address' => 'setAddress',
'small_taxpayer' => 'setSmallTaxpayer',
'ev_number' => 'setEvNumber',
'eu_tax_number' => 'setEuTaxNumber',
'cash_settled' => 'setCashSettled'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
'tax_number' => 'getTaxNumber',
'bank_account' => 'getBankAccount',
'address' => 'getAddress',
'small_taxpayer' => 'getSmallTaxpayer',
'ev_number' => 'getEvNumber',
'eu_tax_number' => 'getEuTaxNumber',
'cash_settled' => 'getCashSettled'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['tax_number'] = isset($data['tax_number']) ? $data['tax_number'] : null;
        $this->container['bank_account'] = isset($data['bank_account']) ? $data['bank_account'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['small_taxpayer'] = isset($data['small_taxpayer']) ? $data['small_taxpayer'] : null;
        $this->container['ev_number'] = isset($data['ev_number']) ? $data['ev_number'] : null;
        $this->container['eu_tax_number'] = isset($data['eu_tax_number']) ? $data['eu_tax_number'] : null;
        $this->container['cash_settled'] = isset($data['cash_settled']) ? $data['cash_settled'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets tax_number
     *
     * @return string
     */
    public function getTaxNumber()
    {
        return $this->container['tax_number'];
    }

    /**
     * Sets tax_number
     *
     * @param string $tax_number tax_number
     *
     * @return $this
     */
    public function setTaxNumber($tax_number)
    {
        $this->container['tax_number'] = $tax_number;

        return $this;
    }

    /**
     * Gets bank_account
     *
     * @return \ThunderCore\Invoice\Billingo\Model\DocumentBankAccount
     */
    public function getBankAccount()
    {
        return $this->container['bank_account'];
    }

    /**
     * Sets bank_account
     *
     * @param \ThunderCore\Invoice\Billingo\Model\DocumentBankAccount $bank_account bank_account
     *
     * @return $this
     */
    public function setBankAccount($bank_account)
    {
        $this->container['bank_account'] = $bank_account;

        return $this;
    }

    /**
     * Gets address
     *
     * @return \ThunderCore\Invoice\Billingo\Model\Address
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param \ThunderCore\Invoice\Billingo\Model\Address $address address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets small_taxpayer
     *
     * @return bool
     */
    public function getSmallTaxpayer()
    {
        return $this->container['small_taxpayer'];
    }

    /**
     * Sets small_taxpayer
     *
     * @param bool $small_taxpayer small_taxpayer
     *
     * @return $this
     */
    public function setSmallTaxpayer($small_taxpayer)
    {
        $this->container['small_taxpayer'] = $small_taxpayer;

        return $this;
    }

    /**
     * Gets ev_number
     *
     * @return string
     */
    public function getEvNumber()
    {
        return $this->container['ev_number'];
    }

    /**
     * Sets ev_number
     *
     * @param string $ev_number ev_number
     *
     * @return $this
     */
    public function setEvNumber($ev_number)
    {
        $this->container['ev_number'] = $ev_number;

        return $this;
    }

    /**
     * Gets eu_tax_number
     *
     * @return string
     */
    public function getEuTaxNumber()
    {
        return $this->container['eu_tax_number'];
    }

    /**
     * Sets eu_tax_number
     *
     * @param string $eu_tax_number eu_tax_number
     *
     * @return $this
     */
    public function setEuTaxNumber($eu_tax_number)
    {
        $this->container['eu_tax_number'] = $eu_tax_number;

        return $this;
    }

    /**
     * Gets cash_settled
     *
     * @return bool
     */
    public function getCashSettled()
    {
        return $this->container['cash_settled'];
    }

    /**
     * Sets cash_settled
     *
     * @param bool $cash_settled cash_settled
     *
     * @return $this
     */
    public function setCashSettled($cash_settled)
    {
        $this->container['cash_settled'] = $cash_settled;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
