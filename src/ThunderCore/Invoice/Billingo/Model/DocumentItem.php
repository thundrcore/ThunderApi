<?php
/**
 * DocumentItem
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
 * DocumentItem Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentItem implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DocumentItem';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'product_id' => 'int',
'name' => 'string',
'net_unit_amount' => 'float',
'quantity' => 'float',
'net_amount' => 'float',
'gross_amount' => 'float',
'vat' => '\ThunderCore\Invoice\Billingo\Model\Vat',
'vat_amount' => 'float',
'entitlement' => '\ThunderCore\Invoice\Billingo\Model\Entitlement'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'product_id' => null,
'name' => null,
'net_unit_amount' => 'float',
'quantity' => 'float',
'net_amount' => 'float',
'gross_amount' => 'float',
'vat' => null,
'vat_amount' => 'float',
'entitlement' => null    ];

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
        'product_id' => 'product_id',
'name' => 'name',
'net_unit_amount' => 'net_unit_amount',
'quantity' => 'quantity',
'net_amount' => 'net_amount',
'gross_amount' => 'gross_amount',
'vat' => 'vat',
'vat_amount' => 'vat_amount',
'entitlement' => 'entitlement'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'product_id' => 'setProductId',
'name' => 'setName',
'net_unit_amount' => 'setNetUnitAmount',
'quantity' => 'setQuantity',
'net_amount' => 'setNetAmount',
'gross_amount' => 'setGrossAmount',
'vat' => 'setVat',
'vat_amount' => 'setVatAmount',
'entitlement' => 'setEntitlement'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'product_id' => 'getProductId',
'name' => 'getName',
'net_unit_amount' => 'getNetUnitAmount',
'quantity' => 'getQuantity',
'net_amount' => 'getNetAmount',
'gross_amount' => 'getGrossAmount',
'vat' => 'getVat',
'vat_amount' => 'getVatAmount',
'entitlement' => 'getEntitlement'    ];

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
        $this->container['product_id'] = isset($data['product_id']) ? $data['product_id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['net_unit_amount'] = isset($data['net_unit_amount']) ? $data['net_unit_amount'] : null;
        $this->container['quantity'] = isset($data['quantity']) ? $data['quantity'] : null;
        $this->container['net_amount'] = isset($data['net_amount']) ? $data['net_amount'] : null;
        $this->container['gross_amount'] = isset($data['gross_amount']) ? $data['gross_amount'] : null;
        $this->container['vat'] = isset($data['vat']) ? $data['vat'] : null;
        $this->container['vat_amount'] = isset($data['vat_amount']) ? $data['vat_amount'] : null;
        $this->container['entitlement'] = isset($data['entitlement']) ? $data['entitlement'] : null;
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
     * Gets product_id
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->container['product_id'];
    }

    /**
     * Sets product_id
     *
     * @param int $product_id product_id
     *
     * @return $this
     */
    public function setProductId($product_id)
    {
        $this->container['product_id'] = $product_id;

        return $this;
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
     * Gets net_unit_amount
     *
     * @return float
     */
    public function getNetUnitAmount()
    {
        return $this->container['net_unit_amount'];
    }

    /**
     * Sets net_unit_amount
     *
     * @param float $net_unit_amount net_unit_amount
     *
     * @return $this
     */
    public function setNetUnitAmount($net_unit_amount)
    {
        $this->container['net_unit_amount'] = $net_unit_amount;

        return $this;
    }

    /**
     * Gets quantity
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param float $quantity quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets net_amount
     *
     * @return float
     */
    public function getNetAmount()
    {
        return $this->container['net_amount'];
    }

    /**
     * Sets net_amount
     *
     * @param float $net_amount net_amount
     *
     * @return $this
     */
    public function setNetAmount($net_amount)
    {
        $this->container['net_amount'] = $net_amount;

        return $this;
    }

    /**
     * Gets gross_amount
     *
     * @return float
     */
    public function getGrossAmount()
    {
        return $this->container['gross_amount'];
    }

    /**
     * Sets gross_amount
     *
     * @param float $gross_amount gross_amount
     *
     * @return $this
     */
    public function setGrossAmount($gross_amount)
    {
        $this->container['gross_amount'] = $gross_amount;

        return $this;
    }

    /**
     * Gets vat
     *
     * @return \ThunderCore\Invoice\Billingo\Model\Vat
     */
    public function getVat()
    {
        return $this->container['vat'];
    }

    /**
     * Sets vat
     *
     * @param \ThunderCore\Invoice\Billingo\Model\Vat $vat vat
     *
     * @return $this
     */
    public function setVat($vat)
    {
        $this->container['vat'] = $vat;

        return $this;
    }

    /**
     * Gets vat_amount
     *
     * @return float
     */
    public function getVatAmount()
    {
        return $this->container['vat_amount'];
    }

    /**
     * Sets vat_amount
     *
     * @param float $vat_amount vat_amount
     *
     * @return $this
     */
    public function setVatAmount($vat_amount)
    {
        $this->container['vat_amount'] = $vat_amount;

        return $this;
    }

    /**
     * Gets entitlement
     *
     * @return \ThunderCore\Invoice\Billingo\Model\Entitlement
     */
    public function getEntitlement()
    {
        return $this->container['entitlement'];
    }

    /**
     * Sets entitlement
     *
     * @param \ThunderCore\Invoice\Billingo\Model\Entitlement $entitlement entitlement
     *
     * @return $this
     */
    public function setEntitlement($entitlement)
    {
        $this->container['entitlement'] = $entitlement;

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
