<?php
/**
 * DocumentBlockList
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
 * DocumentBlockList Class Doc Comment
 *
 * @category Class
 * @description A object with a data property that contains an array of up to limit document blocks. Each entry in the array is a separate document block object. If no more document block are available, the resulting array will be empty.
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentBlockList implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DocumentBlockList';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'data' => '\ThunderCore\Invoice\Billingo\Model\DocumentBlock[]',
'total' => 'int',
'per_page' => 'int',
'current_page' => 'int',
'last_page' => 'int',
'prev_page_url' => 'string',
'next_page_url' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'data' => null,
'total' => null,
'per_page' => null,
'current_page' => null,
'last_page' => null,
'prev_page_url' => null,
'next_page_url' => null    ];

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
        'data' => 'data',
'total' => 'total',
'per_page' => 'per_page',
'current_page' => 'current_page',
'last_page' => 'last_page',
'prev_page_url' => 'prev_page_url',
'next_page_url' => 'next_page_url'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'data' => 'setData',
'total' => 'setTotal',
'per_page' => 'setPerPage',
'current_page' => 'setCurrentPage',
'last_page' => 'setLastPage',
'prev_page_url' => 'setPrevPageUrl',
'next_page_url' => 'setNextPageUrl'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'data' => 'getData',
'total' => 'getTotal',
'per_page' => 'getPerPage',
'current_page' => 'getCurrentPage',
'last_page' => 'getLastPage',
'prev_page_url' => 'getPrevPageUrl',
'next_page_url' => 'getNextPageUrl'    ];

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
        $this->container['data'] = isset($data['data']) ? $data['data'] : null;
        $this->container['total'] = isset($data['total']) ? $data['total'] : null;
        $this->container['per_page'] = isset($data['per_page']) ? $data['per_page'] : null;
        $this->container['current_page'] = isset($data['current_page']) ? $data['current_page'] : null;
        $this->container['last_page'] = isset($data['last_page']) ? $data['last_page'] : null;
        $this->container['prev_page_url'] = isset($data['prev_page_url']) ? $data['prev_page_url'] : null;
        $this->container['next_page_url'] = isset($data['next_page_url']) ? $data['next_page_url'] : null;
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
     * Gets data
     *
     * @return \ThunderCore\Invoice\Billingo\Model\DocumentBlock[]
     */
    public function getData()
    {
        return $this->container['data'];
    }

    /**
     * Sets data
     *
     * @param \ThunderCore\Invoice\Billingo\Model\DocumentBlock[] $data data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->container['data'] = $data;

        return $this;
    }

    /**
     * Gets total
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->container['total'];
    }

    /**
     * Sets total
     *
     * @param int $total total
     *
     * @return $this
     */
    public function setTotal($total)
    {
        $this->container['total'] = $total;

        return $this;
    }

    /**
     * Gets per_page
     *
     * @return int
     */
    public function getPerPage()
    {
        return $this->container['per_page'];
    }

    /**
     * Sets per_page
     *
     * @param int $per_page per_page
     *
     * @return $this
     */
    public function setPerPage($per_page)
    {
        $this->container['per_page'] = $per_page;

        return $this;
    }

    /**
     * Gets current_page
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->container['current_page'];
    }

    /**
     * Sets current_page
     *
     * @param int $current_page current_page
     *
     * @return $this
     */
    public function setCurrentPage($current_page)
    {
        $this->container['current_page'] = $current_page;

        return $this;
    }

    /**
     * Gets last_page
     *
     * @return int
     */
    public function getLastPage()
    {
        return $this->container['last_page'];
    }

    /**
     * Sets last_page
     *
     * @param int $last_page last_page
     *
     * @return $this
     */
    public function setLastPage($last_page)
    {
        $this->container['last_page'] = $last_page;

        return $this;
    }

    /**
     * Gets prev_page_url
     *
     * @return string
     */
    public function getPrevPageUrl()
    {
        return $this->container['prev_page_url'];
    }

    /**
     * Sets prev_page_url
     *
     * @param string $prev_page_url prev_page_url
     *
     * @return $this
     */
    public function setPrevPageUrl($prev_page_url)
    {
        $this->container['prev_page_url'] = $prev_page_url;

        return $this;
    }

    /**
     * Gets next_page_url
     *
     * @return string
     */
    public function getNextPageUrl()
    {
        return $this->container['next_page_url'];
    }

    /**
     * Sets next_page_url
     *
     * @param string $next_page_url next_page_url
     *
     * @return $this
     */
    public function setNextPageUrl($next_page_url)
    {
        $this->container['next_page_url'] = $next_page_url;

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