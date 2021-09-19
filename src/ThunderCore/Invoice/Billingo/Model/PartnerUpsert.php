<?php
/**
 * PartnerUpsert
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
 * PartnerUpsert Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PartnerUpsert implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PartnerUpsert';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
'address' => '\ThunderCore\Invoice\Billingo\Model\Address',
'emails' => 'string[]',
'taxcode' => 'string',
'iban' => 'string',
'swift' => 'string',
'account_number' => 'string',
'phone' => 'string',
'general_ledger_number' => 'string',
'tax_type' => '\ThunderCore\Invoice\Billingo\Model\PartnerTaxType',
'custom_billing_settings' => '\ThunderCore\Invoice\Billingo\Model\PartnerCustomBillingSettings',
'group_member_tax_number' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
'address' => null,
'emails' => null,
'taxcode' => null,
'iban' => null,
'swift' => null,
'account_number' => null,
'phone' => null,
'general_ledger_number' => null,
'tax_type' => null,
'custom_billing_settings' => null,
'group_member_tax_number' => null    ];

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
'address' => 'address',
'emails' => 'emails',
'taxcode' => 'taxcode',
'iban' => 'iban',
'swift' => 'swift',
'account_number' => 'account_number',
'phone' => 'phone',
'general_ledger_number' => 'general_ledger_number',
'tax_type' => 'tax_type',
'custom_billing_settings' => 'custom_billing_settings',
'group_member_tax_number' => 'group_member_tax_number'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
'address' => 'setAddress',
'emails' => 'setEmails',
'taxcode' => 'setTaxcode',
'iban' => 'setIban',
'swift' => 'setSwift',
'account_number' => 'setAccountNumber',
'phone' => 'setPhone',
'general_ledger_number' => 'setGeneralLedgerNumber',
'tax_type' => 'setTaxType',
'custom_billing_settings' => 'setCustomBillingSettings',
'group_member_tax_number' => 'setGroupMemberTaxNumber'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
'address' => 'getAddress',
'emails' => 'getEmails',
'taxcode' => 'getTaxcode',
'iban' => 'getIban',
'swift' => 'getSwift',
'account_number' => 'getAccountNumber',
'phone' => 'getPhone',
'general_ledger_number' => 'getGeneralLedgerNumber',
'tax_type' => 'getTaxType',
'custom_billing_settings' => 'getCustomBillingSettings',
'group_member_tax_number' => 'getGroupMemberTaxNumber'    ];

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
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['emails'] = isset($data['emails']) ? $data['emails'] : null;
        $this->container['taxcode'] = isset($data['taxcode']) ? $data['taxcode'] : null;
        $this->container['iban'] = isset($data['iban']) ? $data['iban'] : null;
        $this->container['swift'] = isset($data['swift']) ? $data['swift'] : null;
        $this->container['account_number'] = isset($data['account_number']) ? $data['account_number'] : null;
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : null;
        $this->container['general_ledger_number'] = isset($data['general_ledger_number']) ? $data['general_ledger_number'] : null;
        $this->container['tax_type'] = isset($data['tax_type']) ? $data['tax_type'] : null;
        $this->container['custom_billing_settings'] = isset($data['custom_billing_settings']) ? $data['custom_billing_settings'] : null;
        $this->container['group_member_tax_number'] = isset($data['group_member_tax_number']) ? $data['group_member_tax_number'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['address'] === null) {
            $invalidProperties[] = "'address' can't be null";
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
     * Gets emails
     *
     * @return string[]
     */
    public function getEmails()
    {
        return $this->container['emails'];
    }

    /**
     * Sets emails
     *
     * @param string[] $emails emails
     *
     * @return $this
     */
    public function setEmails($emails)
    {
        $this->container['emails'] = $emails;

        return $this;
    }

    /**
     * Gets taxcode
     *
     * @return string
     */
    public function getTaxcode()
    {
        return $this->container['taxcode'];
    }

    /**
     * Sets taxcode
     *
     * @param string $taxcode taxcode
     *
     * @return $this
     */
    public function setTaxcode($taxcode)
    {
        $this->container['taxcode'] = $taxcode;

        return $this;
    }

    /**
     * Gets iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->container['iban'];
    }

    /**
     * Sets iban
     *
     * @param string $iban iban
     *
     * @return $this
     */
    public function setIban($iban)
    {
        $this->container['iban'] = $iban;

        return $this;
    }

    /**
     * Gets swift
     *
     * @return string
     */
    public function getSwift()
    {
        return $this->container['swift'];
    }

    /**
     * Sets swift
     *
     * @param string $swift swift
     *
     * @return $this
     */
    public function setSwift($swift)
    {
        $this->container['swift'] = $swift;

        return $this;
    }

    /**
     * Gets account_number
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->container['account_number'];
    }

    /**
     * Sets account_number
     *
     * @param string $account_number account_number
     *
     * @return $this
     */
    public function setAccountNumber($account_number)
    {
        $this->container['account_number'] = $account_number;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string $phone phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets general_ledger_number
     *
     * @return string
     */
    public function getGeneralLedgerNumber()
    {
        return $this->container['general_ledger_number'];
    }

    /**
     * Sets general_ledger_number
     *
     * @param string $general_ledger_number general_ledger_number
     *
     * @return $this
     */
    public function setGeneralLedgerNumber($general_ledger_number)
    {
        $this->container['general_ledger_number'] = $general_ledger_number;

        return $this;
    }

    /**
     * Gets tax_type
     *
     * @return \ThunderCore\Invoice\Billingo\Model\PartnerTaxType
     */
    public function getTaxType()
    {
        return $this->container['tax_type'];
    }

    /**
     * Sets tax_type
     *
     * @param \ThunderCore\Invoice\Billingo\Model\PartnerTaxType $tax_type tax_type
     *
     * @return $this
     */
    public function setTaxType($tax_type)
    {
        $this->container['tax_type'] = $tax_type;

        return $this;
    }

    /**
     * Gets custom_billing_settings
     *
     * @return \ThunderCore\Invoice\Billingo\Model\PartnerCustomBillingSettings
     */
    public function getCustomBillingSettings()
    {
        return $this->container['custom_billing_settings'];
    }

    /**
     * Sets custom_billing_settings
     *
     * @param \ThunderCore\Invoice\Billingo\Model\PartnerCustomBillingSettings $custom_billing_settings custom_billing_settings
     *
     * @return $this
     */
    public function setCustomBillingSettings($custom_billing_settings)
    {
        $this->container['custom_billing_settings'] = $custom_billing_settings;

        return $this;
    }

    /**
     * Gets group_member_tax_number
     *
     * @return string
     */
    public function getGroupMemberTaxNumber()
    {
        return $this->container['group_member_tax_number'];
    }

    /**
     * Sets group_member_tax_number
     *
     * @param string $group_member_tax_number The tax number of group member. Send tax number for update. Send empty string for delete. Ignored if omitted.
     *
     * @return $this
     */
    public function setGroupMemberTaxNumber($group_member_tax_number)
    {
        $this->container['group_member_tax_number'] = $group_member_tax_number;

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