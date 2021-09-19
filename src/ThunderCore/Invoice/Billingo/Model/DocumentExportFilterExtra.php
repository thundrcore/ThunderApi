<?php
/**
 * DocumentExportFilterExtra
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
 * DocumentExportFilterExtra Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentExportFilterExtra implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DocumentExportFilterExtra';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'tensoft_vkod' => 'string',
'ledger_number' => '\ThunderCore\Invoice\Billingo\Model\LedgerNumberInformation',
'forintsoft_konyvelesi_naplo_szam' => 'string',
'positive_ledger_number' => 'string',
'negative_ledger_number' => 'string',
'rlb_kata' => 'bool',
'rlb_note' => 'string',
'novitax_naplokod' => 'string',
'use_gross_values' => 'bool'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'tensoft_vkod' => null,
'ledger_number' => null,
'forintsoft_konyvelesi_naplo_szam' => null,
'positive_ledger_number' => null,
'negative_ledger_number' => null,
'rlb_kata' => null,
'rlb_note' => null,
'novitax_naplokod' => null,
'use_gross_values' => null    ];

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
        'tensoft_vkod' => 'tensoft_vkod',
'ledger_number' => 'ledger_number',
'forintsoft_konyvelesi_naplo_szam' => 'forintsoft_konyvelesi_naplo_szam',
'positive_ledger_number' => 'positive_ledger_number',
'negative_ledger_number' => 'negative_ledger_number',
'rlb_kata' => 'rlb_kata',
'rlb_note' => 'rlb_note',
'novitax_naplokod' => 'novitax_naplokod',
'use_gross_values' => 'use_gross_values'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'tensoft_vkod' => 'setTensoftVkod',
'ledger_number' => 'setLedgerNumber',
'forintsoft_konyvelesi_naplo_szam' => 'setForintsoftKonyvelesiNaploSzam',
'positive_ledger_number' => 'setPositiveLedgerNumber',
'negative_ledger_number' => 'setNegativeLedgerNumber',
'rlb_kata' => 'setRlbKata',
'rlb_note' => 'setRlbNote',
'novitax_naplokod' => 'setNovitaxNaplokod',
'use_gross_values' => 'setUseGrossValues'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'tensoft_vkod' => 'getTensoftVkod',
'ledger_number' => 'getLedgerNumber',
'forintsoft_konyvelesi_naplo_szam' => 'getForintsoftKonyvelesiNaploSzam',
'positive_ledger_number' => 'getPositiveLedgerNumber',
'negative_ledger_number' => 'getNegativeLedgerNumber',
'rlb_kata' => 'getRlbKata',
'rlb_note' => 'getRlbNote',
'novitax_naplokod' => 'getNovitaxNaplokod',
'use_gross_values' => 'getUseGrossValues'    ];

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
        $this->container['tensoft_vkod'] = isset($data['tensoft_vkod']) ? $data['tensoft_vkod'] : null;
        $this->container['ledger_number'] = isset($data['ledger_number']) ? $data['ledger_number'] : null;
        $this->container['forintsoft_konyvelesi_naplo_szam'] = isset($data['forintsoft_konyvelesi_naplo_szam']) ? $data['forintsoft_konyvelesi_naplo_szam'] : null;
        $this->container['positive_ledger_number'] = isset($data['positive_ledger_number']) ? $data['positive_ledger_number'] : null;
        $this->container['negative_ledger_number'] = isset($data['negative_ledger_number']) ? $data['negative_ledger_number'] : null;
        $this->container['rlb_kata'] = isset($data['rlb_kata']) ? $data['rlb_kata'] : null;
        $this->container['rlb_note'] = isset($data['rlb_note']) ? $data['rlb_note'] : null;
        $this->container['novitax_naplokod'] = isset($data['novitax_naplokod']) ? $data['novitax_naplokod'] : null;
        $this->container['use_gross_values'] = isset($data['use_gross_values']) ? $data['use_gross_values'] : null;
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
     * Gets tensoft_vkod
     *
     * @return string
     */
    public function getTensoftVkod()
    {
        return $this->container['tensoft_vkod'];
    }

    /**
     * Sets tensoft_vkod
     *
     * @param string $tensoft_vkod tensoft_vkod
     *
     * @return $this
     */
    public function setTensoftVkod($tensoft_vkod)
    {
        $this->container['tensoft_vkod'] = $tensoft_vkod;

        return $this;
    }

    /**
     * Gets ledger_number
     *
     * @return \ThunderCore\Invoice\Billingo\Model\LedgerNumberInformation
     */
    public function getLedgerNumber()
    {
        return $this->container['ledger_number'];
    }

    /**
     * Sets ledger_number
     *
     * @param \ThunderCore\Invoice\Billingo\Model\LedgerNumberInformation $ledger_number ledger_number
     *
     * @return $this
     */
    public function setLedgerNumber($ledger_number)
    {
        $this->container['ledger_number'] = $ledger_number;

        return $this;
    }

    /**
     * Gets forintsoft_konyvelesi_naplo_szam
     *
     * @return string
     */
    public function getForintsoftKonyvelesiNaploSzam()
    {
        return $this->container['forintsoft_konyvelesi_naplo_szam'];
    }

    /**
     * Sets forintsoft_konyvelesi_naplo_szam
     *
     * @param string $forintsoft_konyvelesi_naplo_szam forintsoft_konyvelesi_naplo_szam
     *
     * @return $this
     */
    public function setForintsoftKonyvelesiNaploSzam($forintsoft_konyvelesi_naplo_szam)
    {
        $this->container['forintsoft_konyvelesi_naplo_szam'] = $forintsoft_konyvelesi_naplo_szam;

        return $this;
    }

    /**
     * Gets positive_ledger_number
     *
     * @return string
     */
    public function getPositiveLedgerNumber()
    {
        return $this->container['positive_ledger_number'];
    }

    /**
     * Sets positive_ledger_number
     *
     * @param string $positive_ledger_number positive_ledger_number
     *
     * @return $this
     */
    public function setPositiveLedgerNumber($positive_ledger_number)
    {
        $this->container['positive_ledger_number'] = $positive_ledger_number;

        return $this;
    }

    /**
     * Gets negative_ledger_number
     *
     * @return string
     */
    public function getNegativeLedgerNumber()
    {
        return $this->container['negative_ledger_number'];
    }

    /**
     * Sets negative_ledger_number
     *
     * @param string $negative_ledger_number negative_ledger_number
     *
     * @return $this
     */
    public function setNegativeLedgerNumber($negative_ledger_number)
    {
        $this->container['negative_ledger_number'] = $negative_ledger_number;

        return $this;
    }

    /**
     * Gets rlb_kata
     *
     * @return bool
     */
    public function getRlbKata()
    {
        return $this->container['rlb_kata'];
    }

    /**
     * Sets rlb_kata
     *
     * @param bool $rlb_kata rlb_kata
     *
     * @return $this
     */
    public function setRlbKata($rlb_kata)
    {
        $this->container['rlb_kata'] = $rlb_kata;

        return $this;
    }

    /**
     * Gets rlb_note
     *
     * @return string
     */
    public function getRlbNote()
    {
        return $this->container['rlb_note'];
    }

    /**
     * Sets rlb_note
     *
     * @param string $rlb_note rlb_note
     *
     * @return $this
     */
    public function setRlbNote($rlb_note)
    {
        $this->container['rlb_note'] = $rlb_note;

        return $this;
    }

    /**
     * Gets novitax_naplokod
     *
     * @return string
     */
    public function getNovitaxNaplokod()
    {
        return $this->container['novitax_naplokod'];
    }

    /**
     * Sets novitax_naplokod
     *
     * @param string $novitax_naplokod novitax_naplokod
     *
     * @return $this
     */
    public function setNovitaxNaplokod($novitax_naplokod)
    {
        $this->container['novitax_naplokod'] = $novitax_naplokod;

        return $this;
    }

    /**
     * Gets use_gross_values
     *
     * @return bool
     */
    public function getUseGrossValues()
    {
        return $this->container['use_gross_values'];
    }

    /**
     * Sets use_gross_values
     *
     * @param bool $use_gross_values use_gross_values
     *
     * @return $this
     */
    public function setUseGrossValues($use_gross_values)
    {
        $this->container['use_gross_values'] = $use_gross_values;

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
