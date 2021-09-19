<?php
/**
 * PartnerCustomBillingSettings
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
 * PartnerCustomBillingSettings Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PartnerCustomBillingSettings implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PartnerCustomBillingSettings';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'payment_method' => '\ThunderCore\Invoice\Billingo\Model\PaymentMethod',
'document_form' => '\ThunderCore\Invoice\Billingo\Model\DocumentForm',
'due_days' => 'int',
'document_currency' => '\ThunderCore\Invoice\Billingo\Model\Currency',
'template_language_code' => '\ThunderCore\Invoice\Billingo\Model\DocumentLanguage',
'discount' => '\ThunderCore\Invoice\Billingo\Model\Discount'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'payment_method' => null,
'document_form' => null,
'due_days' => null,
'document_currency' => null,
'template_language_code' => null,
'discount' => null    ];

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
        'payment_method' => 'payment_method',
'document_form' => 'document_form',
'due_days' => 'due_days',
'document_currency' => 'document_currency',
'template_language_code' => 'template_language_code',
'discount' => 'discount'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payment_method' => 'setPaymentMethod',
'document_form' => 'setDocumentForm',
'due_days' => 'setDueDays',
'document_currency' => 'setDocumentCurrency',
'template_language_code' => 'setTemplateLanguageCode',
'discount' => 'setDiscount'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payment_method' => 'getPaymentMethod',
'document_form' => 'getDocumentForm',
'due_days' => 'getDueDays',
'document_currency' => 'getDocumentCurrency',
'template_language_code' => 'getTemplateLanguageCode',
'discount' => 'getDiscount'    ];

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
        $this->container['payment_method'] = isset($data['payment_method']) ? $data['payment_method'] : null;
        $this->container['document_form'] = isset($data['document_form']) ? $data['document_form'] : null;
        $this->container['due_days'] = isset($data['due_days']) ? $data['due_days'] : null;
        $this->container['document_currency'] = isset($data['document_currency']) ? $data['document_currency'] : null;
        $this->container['template_language_code'] = isset($data['template_language_code']) ? $data['template_language_code'] : null;
        $this->container['discount'] = isset($data['discount']) ? $data['discount'] : null;
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
     * Gets document_form
     *
     * @return \ThunderCore\Invoice\Billingo\Model\DocumentForm
     */
    public function getDocumentForm()
    {
        return $this->container['document_form'];
    }

    /**
     * Sets document_form
     *
     * @param \ThunderCore\Invoice\Billingo\Model\DocumentForm $document_form document_form
     *
     * @return $this
     */
    public function setDocumentForm($document_form)
    {
        $this->container['document_form'] = $document_form;

        return $this;
    }

    /**
     * Gets due_days
     *
     * @return int
     */
    public function getDueDays()
    {
        return $this->container['due_days'];
    }

    /**
     * Sets due_days
     *
     * @param int $due_days due_days
     *
     * @return $this
     */
    public function setDueDays($due_days)
    {
        $this->container['due_days'] = $due_days;

        return $this;
    }

    /**
     * Gets document_currency
     *
     * @return \ThunderCore\Invoice\Billingo\Model\Currency
     */
    public function getDocumentCurrency()
    {
        return $this->container['document_currency'];
    }

    /**
     * Sets document_currency
     *
     * @param \ThunderCore\Invoice\Billingo\Model\Currency $document_currency document_currency
     *
     * @return $this
     */
    public function setDocumentCurrency($document_currency)
    {
        $this->container['document_currency'] = $document_currency;

        return $this;
    }

    /**
     * Gets template_language_code
     *
     * @return \ThunderCore\Invoice\Billingo\Model\DocumentLanguage
     */
    public function getTemplateLanguageCode()
    {
        return $this->container['template_language_code'];
    }

    /**
     * Sets template_language_code
     *
     * @param \ThunderCore\Invoice\Billingo\Model\DocumentLanguage $template_language_code template_language_code
     *
     * @return $this
     */
    public function setTemplateLanguageCode($template_language_code)
    {
        $this->container['template_language_code'] = $template_language_code;

        return $this;
    }

    /**
     * Gets discount
     *
     * @return \ThunderCore\Invoice\Billingo\Model\Discount
     */
    public function getDiscount()
    {
        return $this->container['discount'];
    }

    /**
     * Sets discount
     *
     * @param \ThunderCore\Invoice\Billingo\Model\Discount $discount discount
     *
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->container['discount'] = $discount;

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
