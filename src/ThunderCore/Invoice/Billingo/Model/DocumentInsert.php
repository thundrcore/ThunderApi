<?php
/**
 * DocumentInsert
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
 * DocumentInsert Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentInsert implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DocumentInsert';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'vendor_id' => 'string',
'partner_id' => 'int',
'block_id' => 'int',
'bank_account_id' => 'int',
'type' => '\ThunderCore\Invoice\Billingo\Model\DocumentInsertType',
'fulfillment_date' => '\DateTime',
'due_date' => '\DateTime',
'payment_method' => '\ThunderCore\Invoice\Billingo\Model\PaymentMethod',
'language' => '\ThunderCore\Invoice\Billingo\Model\DocumentLanguage',
'currency' => '\ThunderCore\Invoice\Billingo\Model\Currency',
'conversion_rate' => 'float',
'electronic' => 'bool',
'paid' => 'bool',
'items' => '\ThunderCore\Invoice\Billingo\Model\OneOfDocumentInsertItemsItems[]',
'comment' => 'string',
'settings' => '\ThunderCore\Invoice\Billingo\Model\DocumentSettings',
'advance_invoice' => 'int[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'vendor_id' => null,
'partner_id' => null,
'block_id' => null,
'bank_account_id' => null,
'type' => null,
'fulfillment_date' => 'date',
'due_date' => 'date',
'payment_method' => null,
'language' => null,
'currency' => null,
'conversion_rate' => 'float',
'electronic' => null,
'paid' => null,
'items' => null,
'comment' => null,
'settings' => null,
'advance_invoice' => null    ];

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
        'id' => 'id',
'vendor_id' => 'vendor_id',
'partner_id' => 'partner_id',
'block_id' => 'block_id',
'bank_account_id' => 'bank_account_id',
'type' => 'type',
'fulfillment_date' => 'fulfillment_date',
'due_date' => 'due_date',
'payment_method' => 'payment_method',
'language' => 'language',
'currency' => 'currency',
'conversion_rate' => 'conversion_rate',
'electronic' => 'electronic',
'paid' => 'paid',
'items' => 'items',
'comment' => 'comment',
'settings' => 'settings',
'advance_invoice' => 'advance_invoice'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'vendor_id' => 'setVendorId',
'partner_id' => 'setPartnerId',
'block_id' => 'setBlockId',
'bank_account_id' => 'setBankAccountId',
'type' => 'setType',
'fulfillment_date' => 'setFulfillmentDate',
'due_date' => 'setDueDate',
'payment_method' => 'setPaymentMethod',
'language' => 'setLanguage',
'currency' => 'setCurrency',
'conversion_rate' => 'setConversionRate',
'electronic' => 'setElectronic',
'paid' => 'setPaid',
'items' => 'setItems',
'comment' => 'setComment',
'settings' => 'setSettings',
'advance_invoice' => 'setAdvanceInvoice'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'vendor_id' => 'getVendorId',
'partner_id' => 'getPartnerId',
'block_id' => 'getBlockId',
'bank_account_id' => 'getBankAccountId',
'type' => 'getType',
'fulfillment_date' => 'getFulfillmentDate',
'due_date' => 'getDueDate',
'payment_method' => 'getPaymentMethod',
'language' => 'getLanguage',
'currency' => 'getCurrency',
'conversion_rate' => 'getConversionRate',
'electronic' => 'getElectronic',
'paid' => 'getPaid',
'items' => 'getItems',
'comment' => 'getComment',
'settings' => 'getSettings',
'advance_invoice' => 'getAdvanceInvoice'    ];

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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['vendor_id'] = isset($data['vendor_id']) ? $data['vendor_id'] : null;
        $this->container['partner_id'] = isset($data['partner_id']) ? $data['partner_id'] : null;
        $this->container['block_id'] = isset($data['block_id']) ? $data['block_id'] : null;
        $this->container['bank_account_id'] = isset($data['bank_account_id']) ? $data['bank_account_id'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['fulfillment_date'] = isset($data['fulfillment_date']) ? $data['fulfillment_date'] : null;
        $this->container['due_date'] = isset($data['due_date']) ? $data['due_date'] : null;
        $this->container['payment_method'] = isset($data['payment_method']) ? $data['payment_method'] : null;
        $this->container['language'] = isset($data['language']) ? $data['language'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['conversion_rate'] = isset($data['conversion_rate']) ? $data['conversion_rate'] : null;
        $this->container['electronic'] = isset($data['electronic']) ? $data['electronic'] : false;
        $this->container['paid'] = isset($data['paid']) ? $data['paid'] : false;
        $this->container['items'] = isset($data['items']) ? $data['items'] : null;
        $this->container['comment'] = isset($data['comment']) ? $data['comment'] : null;
        $this->container['settings'] = isset($data['settings']) ? $data['settings'] : null;
        $this->container['advance_invoice'] = isset($data['advance_invoice']) ? $data['advance_invoice'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['partner_id'] === null) {
            $invalidProperties[] = "'partner_id' can't be null";
        }
        if ($this->container['block_id'] === null) {
            $invalidProperties[] = "'block_id' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['fulfillment_date'] === null) {
            $invalidProperties[] = "'fulfillment_date' can't be null";
        }
        if ($this->container['due_date'] === null) {
            $invalidProperties[] = "'due_date' can't be null";
        }
        if ($this->container['payment_method'] === null) {
            $invalidProperties[] = "'payment_method' can't be null";
        }
        if ($this->container['language'] === null) {
            $invalidProperties[] = "'language' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
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
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets vendor_id
     *
     * @return string
     */
    public function getVendorId()
    {
        return $this->container['vendor_id'];
    }

    /**
     * Sets vendor_id
     *
     * @param string $vendor_id vendor_id
     *
     * @return $this
     */
    public function setVendorId($vendor_id)
    {
        $this->container['vendor_id'] = $vendor_id;

        return $this;
    }

    /**
     * Gets partner_id
     *
     * @return int
     */
    public function getPartnerId()
    {
        return $this->container['partner_id'];
    }

    /**
     * Sets partner_id
     *
     * @param int $partner_id partner_id
     *
     * @return $this
     */
    public function setPartnerId($partner_id)
    {
        $this->container['partner_id'] = $partner_id;

        return $this;
    }

    /**
     * Gets block_id
     *
     * @return int
     */
    public function getBlockId()
    {
        return $this->container['block_id'];
    }

    /**
     * Sets block_id
     *
     * @param int $block_id block_id
     *
     * @return $this
     */
    public function setBlockId($block_id)
    {
        $this->container['block_id'] = $block_id;

        return $this;
    }

    /**
     * Gets bank_account_id
     *
     * @return int
     */
    public function getBankAccountId()
    {
        return $this->container['bank_account_id'];
    }

    /**
     * Sets bank_account_id
     *
     * @param int $bank_account_id bank_account_id
     *
     * @return $this
     */
    public function setBankAccountId($bank_account_id)
    {
        $this->container['bank_account_id'] = $bank_account_id;

        return $this;
    }

    /**
     * Gets type
     *
     * @return \ThunderCore\Invoice\Billingo\Model\DocumentInsertType
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \ThunderCore\Invoice\Billingo\Model\DocumentInsertType $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets fulfillment_date
     *
     * @return \DateTime
     */
    public function getFulfillmentDate()
    {
        return $this->container['fulfillment_date'];
    }

    /**
     * Sets fulfillment_date
     *
     * @param \DateTime $fulfillment_date fulfillment_date
     *
     * @return $this
     */
    public function setFulfillmentDate($fulfillment_date)
    {
        $this->container['fulfillment_date'] = $fulfillment_date;

        return $this;
    }

    /**
     * Gets due_date
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->container['due_date'];
    }

    /**
     * Sets due_date
     *
     * @param \DateTime $due_date due_date
     *
     * @return $this
     */
    public function setDueDate($due_date)
    {
        $this->container['due_date'] = $due_date;

        return $this;
    }

    /**
     * Gets payment_method
     *
     * @return \ThunderCore\Invoice\Billingo\Model\PaymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->container['payment_method'];
    }

    /**
     * Sets payment_method
     *
     * @param \ThunderCore\Invoice\Billingo\Model\PaymentMethod $payment_method payment_method
     *
     * @return $this
     */
    public function setPaymentMethod($payment_method)
    {
        $this->container['payment_method'] = $payment_method;

        return $this;
    }

    /**
     * Gets language
     *
     * @return \ThunderCore\Invoice\Billingo\Model\DocumentLanguage
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param \ThunderCore\Invoice\Billingo\Model\DocumentLanguage $language language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return \ThunderCore\Invoice\Billingo\Model\Currency
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param \ThunderCore\Invoice\Billingo\Model\Currency $currency currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets conversion_rate
     *
     * @return float
     */
    public function getConversionRate()
    {
        return $this->container['conversion_rate'];
    }

    /**
     * Sets conversion_rate
     *
     * @param float $conversion_rate conversion_rate
     *
     * @return $this
     */
    public function setConversionRate($conversion_rate)
    {
        $this->container['conversion_rate'] = $conversion_rate;

        return $this;
    }

    /**
     * Gets electronic
     *
     * @return bool
     */
    public function getElectronic()
    {
        return $this->container['electronic'];
    }

    /**
     * Sets electronic
     *
     * @param bool $electronic electronic
     *
     * @return $this
     */
    public function setElectronic($electronic)
    {
        $this->container['electronic'] = $electronic;

        return $this;
    }

    /**
     * Gets paid
     *
     * @return bool
     */
    public function getPaid()
    {
        return $this->container['paid'];
    }

    /**
     * Sets paid
     *
     * @param bool $paid paid
     *
     * @return $this
     */
    public function setPaid($paid)
    {
        $this->container['paid'] = $paid;

        return $this;
    }

    /**
     * Gets items
     *
     * @return \ThunderCore\Invoice\Billingo\Model\OneOfDocumentInsertItemsItems[]
     */
    public function getItems()
    {
        return $this->container['items'];
    }

    /**
     * Sets items
     *
     * @param \ThunderCore\Invoice\Billingo\Model\OneOfDocumentInsertItemsItems[] $items items
     *
     * @return $this
     */
    public function setItems($items)
    {
        $this->container['items'] = $items;

        return $this;
    }

    /**
     * Gets comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment
     *
     * @param string $comment comment
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->container['comment'] = $comment;

        return $this;
    }

    /**
     * Gets settings
     *
     * @return \ThunderCore\Invoice\Billingo\Model\DocumentSettings
     */
    public function getSettings()
    {
        return $this->container['settings'];
    }

    /**
     * Sets settings
     *
     * @param \ThunderCore\Invoice\Billingo\Model\DocumentSettings $settings settings
     *
     * @return $this
     */
    public function setSettings($settings)
    {
        $this->container['settings'] = $settings;

        return $this;
    }

    /**
     * Gets advance_invoice
     *
     * @return int[]
     */
    public function getAdvanceInvoice()
    {
        return $this->container['advance_invoice'];
    }

    /**
     * Sets advance_invoice
     *
     * @param int[] $advance_invoice advance_invoice
     *
     * @return $this
     */
    public function setAdvanceInvoice($advance_invoice)
    {
        $this->container['advance_invoice'] = $advance_invoice;

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
